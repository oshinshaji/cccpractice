<?php
class Admin_Controller_Account extends Core_Controller_Admin_Action{
    protected $_allowAction=[
        'login',
    ];
    public function testAction(){
        echo "protecte";
    }
    public function loginAction(){
        var_dump(Admin_Model_User::USERNAME);
        //form userna password 
        //static conn=stant
        // $username=$_POST;
        // $password=$_POST;
        // if(post dattaa with model constant)
    }
}