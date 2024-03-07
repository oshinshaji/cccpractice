<?php
class Chatting_Block_User extends Core_Block_Template{
    public function __construct()
    {
        $this->setTemplate('chatting/form.phtml');
    }

    public function getUser(){
        return Mage::getModel('chatting/chatting')
        ->load($this->getRequest()->getParams('id', 0));
    }
    public function getLastUser(){
        $model=Mage::getModel('chatting/model');
    }

}