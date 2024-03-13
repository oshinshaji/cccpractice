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
            if (!$customerId) {
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

    public function checkoutAction(){
        // echo "in checkout action";
        $layout=$this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/footer.css');
        $child=$layout->getChild('content');
        $checkout=$layout->createBlock('sales/quote_checkout');
        $child->addChild('checkout',$checkout);
        $layout->toHtml();
       
    }

    public function saveAction(){
        echo "in save action of sales quote";
        try{
            if(!$this->getRequest()->isPost()){
                throw new  Exception('Request is not valid');
            }
            $data=$this->getRequest()->getParams('qc_data');
            $quoteCustomerModel=Mage::getModel('sales/quote_customer');
            $quoteCustomerModel->setData($data)->save();
        }
        catch(Exception $e){
            var_dump($e->getMessage());


        }
    }

}