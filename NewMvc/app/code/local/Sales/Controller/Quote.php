<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    protected $_loginRequiredActions = [
        'checkout'
    ];
    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        $action = $this->getRequest()->getActionName();
        if (in_array($action, $this->_loginRequiredActions)) {
            $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
            $actionUrl = $this->getRequest()->getRequestUri();
            if (!$customerId) {
                Mage::getSingleton('core/session')->set('actionUrl', $actionUrl);
                $this->setRedirect('customer/account/login');
                exit();
            }
        }
    }
    public function addAction()
    {
        $cartData = $this->getRequest()->getParams('cart_data');
        Mage::getSingleton('sales/quote')->addProduct($cartData);
        $quoteModel = Mage::getSingleton('sales/quote');
        // $this->setRedirect("sales/quote/view?id={$quoteModel->getId()}");
        $this->setRedirect("sales/quote/view");
    }

    public function viewAction()
    {
        // echo "in cart view";
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/cart.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $cartView = $layout->createBlock('sales/view');
        $child->addChild('cartView', $cartView);
        $layout->toHtml();
    }

    public function checkoutAction()
    {
        // echo "in checkout action";
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/cart.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $checkout = $layout->createBlock('sales/quote_checkout');
        $child->addChild('checkout', $checkout);
        $layout->toHtml();

    }

    public function saveAction()
    {
        // echo "in save action of sales quote";
        echo "<pre>";
        /* try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception('Request is not valid');
            } */
        $customerData = $this->getRequest()->getParams('qc_data');  
        Mage::getSingleton('sales/quote')->addCustomer($customerData);

        $shippingData = $this->getRequest()->getParams('sm_data');
        $shippingObj=Mage::getSingleton('sales/quote')->addShipping($shippingData);
        Mage::getSingleton('sales/quote')->addShipId($shippingObj->getId());

        $paymentData = $this->getRequest()->getParams('pm_data');
        // print_r($paymentData);
        $paymentObj=Mage::getSingleton('sales/quote')->addPayment($paymentData);
        // print_r($paymentObj);
        Mage::getSingleton('sales/quote')->addPayId($paymentObj->getId());
        /*  } catch (Exception $e) {
             var_dump($e->getMessage());
         } */
         Mage::getSingleton('sales/quote')->convert();
    }

    public function shippingMethodSaveAction()
    {

        /*    $data = $this->getRequest()->getParams('sm_data');
           Mage::getSingleton('sales/quote')->addShipping($data); */
        /*    $quoteCustomerModel = Mage::getModel('sales/quote');
           echo "<pre>";
           print_r($data);
           $quoteCustomerModel->setData($data)->save(); */
        // $this->setRedirect("sales/quote/checkout?id={$quoteCustomerModel->getId()}");
        /* $quoteCustomerModel = Mage::getModel('sales/quote_customer');
        $quoteCustomerModel->setData($data)->save();
        // print_r($quoteCustomerModel->getId());
        $this->setRedirect("sales/quote/checkout?id={$quoteCustomerModel->getId()}"); */

    }
    public function paymentMethodSaveAction()
    {
        /* $data = $this->getRequest()->getParams('pm_data');
        Mage::getSingleton('sales/quote')->addPayment($data); */
        // $quoteCustomerModel = Mage::getModel('sales/quote_customer');
        // $quoteCustomerModel->setData($data)->save();
        // // print_r($quoteCustomerModel->getId());
        // $this->setRedirect("sales/quote/checkout?id={$quoteCustomerModel->getId()}");
        /* echo "in save action of sales quote";
        try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception('Request is not valid');
            }
            $data = $this->getRequest()->getParams('pm_data');
            $quoteCustomerModel = Mage::getModel('sales/quote');
            echo "<pre>";
            print_r($data);
            $quoteCustomerModel->setData($data)->save();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        } */
    }
    public function removeAction()
    {
        $data = $this->getRequest()->getParams('remove');
        print_r($data);
        $itemId = $data['item_id'];
        $quoteId = $data['quote_id'];
        Mage::getModel('sales/quote_item')
            ->load($itemId)
            ->delete();
        Mage::getModel('sales/quote')
            ->load($quoteId)
            ->save();
        $this->setRedirect('sales/quote/view');
    }

    public function updateQuantityAction()
    {
        $updatedata = $this->getRequest()->getParams('update');
        $itemId = $updatedata['item_id'];
        $quoteId = $updatedata['quote_id'];
        $quantity = $updatedata['qty'];

        $data = Mage::getModel('sales/quote_item')
            ->load($itemId)->getData();
        $data['qty'] = $quantity;

        Mage::getModel('sales/quote_item')
            ->setData($data)
            ->save();
        Mage::getModel('sales/quote')
            ->load($quoteId)
            ->save();

        $this->setRedirect('sales/quote/view');

    }

}