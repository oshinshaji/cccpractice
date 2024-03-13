<?php
class Chatting_Block_User extends Core_Block_Template{
    public function __construct()
    {
        $this->setTemplate('chatting/form.phtml');
    }
}