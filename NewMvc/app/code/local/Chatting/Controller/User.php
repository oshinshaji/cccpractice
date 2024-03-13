<?php
class Chatting_Controller_User extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $userForm = $layout->createBlock('chatting/user');
        $child->addChild('userForm', $userForm);
        $layout->toHtml();
    }

    public function saveAction()
    {
            $data = $this->getRequest()->getParams('chatting_data');
            $chatModel = Mage::getModel('chatting/chatting');
            echo "<pre>";
            $sessionId=Mage::getSingleton('core/session')->getId();
            $data['session_id']= $sessionId;
            $data=array_merge($data,['session_id'=>$sessionId]);
            $chatModel->setData($data)->save();
            print_r($data);
        
    }

    public function listAction(){
        echo "in list action";
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $chatList = $layout->createBlock('chatting/list');
        $child->addChild('chatList', $chatList);
        $layout->toHtml();
    }
}
