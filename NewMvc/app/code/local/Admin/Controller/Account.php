<?php
class Admin_Controller_Account extends Core_Controller_Admin_Action{
    protected $_allowActions=[
        'login'
    ];
    public function testAction(){
        echo "protected";
    }
    public function loginAction(){
        // $userName=Admin_Model_User::USERNAME;
        // $password=Admin_Model_User::PASSWORD;
        if(!$this->getRequest()->isPost()){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        // $layout->getChild('head')->addJs(Mage::getBaseUrl() . 'skin/js/hjjhbk');

        $loginForm = $layout->createBlock('catalog/admin_account_login');
        $child->addChild('form', $loginForm);
        $layout->toHtml();
        }
        else
        {
            try{
                $userName=Admin_Model_User::USERNAME;
                $password=Admin_Model_User::PASSWORD;
                // echo $password;
                $data= $this->getRequest()->getParams('al_data');
                $adminEmail= $data['admin_email'];
                $adminPassword=$data['admin_password'];
                // echo $adminPassword;
                if($userName==$adminEmail && $password==$adminPassword){
                    echo "yess";
                    Mage::getSingleton('core/session')->set('logged_in_admin_username', $userName);
                    // echo Mage::getSingleton('core/session')->get('logged_in_admin_username');
                }
                else{
                    echo "wrong admin credentials";
                    Mage::getSingleton("core/session")->remove('logged_in_admin_username');

                }
            }
            catch(Exception $e){
                var_dump($e->getMessage());
            }
        }
        //form userna password 
        //static conn=stant
        // $username=$_POST;
        // $password=$_POST;

        // if(post dattaa with model constant)
      
        
    
}
}