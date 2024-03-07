<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_loginRequiredActions = [
        'dashboard'
    ];
    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        // echo $this->getRequest()->getActionName();
        // echo $this->getRequest()->getControllerName();
        // echo $this->getRequest()->getModuleName();

        $action = $this->getRequest()->getActionName();
        if (in_array($action, $this->_loginRequiredActions)) {
            $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
            if (!$customerId) {
                $this->setRedirect('customer/account/login');
                exit();
            }
        }
    }
    public function registerAction()
    {
        // echo "in registerAction";
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $registerForm = $layout->createBlock('customer/register');
        $child->addChild('form', $registerForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        // echo "in saveAction";
        try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception('Request not valid');
            }
            $data = $this->getRequest()->getParams('cdata');
            $productModel = Mage::getModel('customer/customer');
            $productModel->setData($data)->save();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /*  public function loginAction()
     {
         $session=Mage::getSingleton('core/session');
         echo "in loginAction";
         $layout = $this->getLayout();
         $child = $layout->getChild('content');
         $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
         $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
         $loginForm = $layout->createBlock('customer/login');
         $child->addChild('form', $loginForm);
         $layout->toHtml();
         try {
             if (!$this->getRequest()->isPost()) {
                 throw new Exception('Request not valid');
             }
             $data = $this->getRequest()->getParams('ldata');
             $email = $data['customer_email'];
             $password = $data['password'];
             $data = Mage::getModel('customer/customer')->getCollection()
                 ->addFieldToFilter('customer_email', $email)
                 ->addFieldToFilter('password', $password);
             $count = 0;
             $customerId=0;
             // echo "<pre>";
             // print_r($data);
             foreach ($data->getData() as $data) {
                 $count++;
                 $customerId = $data->getCustomerId();
                 echo $customerId;
             }
             if ($count) {
                 echo "logged in";
                 echo $customerId;
                 // Mage::getSingleton('core/session')->set('logged_in_customer_id', $customerId);
                 $session->set('logged_in_customer_id', $customerId);

                 // print_r($_SESSION);

                 // header("Location:dashboard");


             } else {
                 echo "wrong credentials";
                 session_destroy();
             }

         } catch (Exception $e) {
             var_dump($e->getMessage());
         }
         // header("Location:dashboard");
     } */
    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
            $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
            // $layout->getChild('head')->addJs(Mage::getBaseUrl() . 'skin/js/hjjhbk');
            $loginForm = $layout->createBlock('customer/login');
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        } else {
            try {
                $message = [];
                $data = $this->getRequest()->getParams('ldata');
                $email = $data['customer_email'];
                $password = $data['password'];
                $data = Mage::getModel('customer/customer')->getCollection()
                    ->addFieldToFilter('customer_email', $email)
                    ->addFieldToFilter('password', $password);
                    
                $count = 0;
                $customerId = 0;
                foreach ($data->getData() as $data) {
                    $count++;
                    $customerId = $data->getCustomerId();
                }
                if ($count) {
                    Mage::getSingleton('core/session')->set('logged_in_customer_id', $customerId);
                    // $session->set('logged_in_customer_id', $customerId);
                    $message = [
                        'type' => 'success',
                        'message' => 'Successful'
                    ];
                    //    $this->setRedirect("customer/account/dashboard");
                    // header("Location: " . Mage::getBaseUrl().'customer/account/dashboard');
                    //    exit();
                } else {
                    // echo "wrong credentials";
                    Mage::getSingleton("core/session")->remove('logged_in_customer_id');
                    // throw new Exception('Email Id And Password Is Invalid');
                    $message = [
                        'type' => 'invalid',
                        'message' => 'Wrong credentials'
                    ];
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
                $message = [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ];
            }
            echo json_encode($message);
        }
    }

    /* public function dashboardAction()
    {
        // echo "in dashboard";
        $session=Mage::getSingleton('core/session');

        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');

        $child = $layout->getChild('content');
        $dashboard = $layout->createBlock('customer/dashboard');
        $child->addChild('form', $dashboard);
        $layout->toHtml();
        $customerId = $session->get('logged_in_customer_id');
        // print_r($customerId);
        // print_r($_SESSION);

        // echo $customerId;
        // echo "here";
        if ($customerId) {
            // echo "yesss";
           Mage::getModel('customer/customer')->load($customerId);
        }

    } */

    public function dashboardAction()
    {
        // $session = Mage::getSingleton('core/session');
        $layout = $this->getLayout()->setTemplate('core/2column.phtml');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/customer/dashboard.css');

        $child = $layout->getChild('content');
        $dashboard = $layout->createBlock('customer/dashboard');
        $child->addChild('dashboardForm', $dashboard);
        $layout->toHtml();
        // $customerId = $session->get('logged_in_customer_id');
        // echo "in dashboard";
        // print_r($customerId);
        // print_r($_SESSION);
        // echo $customerId;
        // echo "here";
        /*  if ($customerId) {
             // echo "yesss";
            Mage::getModel('customer/customer')->load($customerId);
         } */
    }
    public function deleteAction()
    {
        // $id = $this->getRequest()->getParams('id',0);
        Mage::getModel('customer/customer')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();
        // $productModel->delete($id);
    }
    /*  public function doneAction(){
         $data = $this->getRequest()->getParams('ldata');
         // print_r($data);
         // $productModel = Mage::getModel('customer/customer');
         // $productModel->setData($data);
         $email= $data['customer_email'];
         $password=$data['password'] ;
         $data=Mage::getModel('customer/customer')->getCollection()
         ->addFieldToFilter('customer_email',$email)
         ->addFieldToFilter('password',$password);
         echo "<pre>";
         
         $count=0;
         foreach($data->getData() as $data){
             $count++;
         }
         // echo $count;
         if($count){
             echo "logged in";
         }
         else{
             echo "wrong credentials";
         }
         // echo "done";
     } */


}