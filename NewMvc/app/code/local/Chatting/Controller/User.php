<?php
class Chatting_Controller_User extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $userForm = $layout->createBlock('chatting/user');
        $child->addChild('userForm', $userForm);
        $layout->toHtml();
    }

    public function saveAction()
    {
        echo "in save action"; {
            $data = $this->getRequest()->getParams('chatting_data');
            $productModel = Mage::getModel('chatting/chatting');
            Mage::getSingleton('core/session')->set('username', $productModel->getId());
            echo "session";
            $sessionId = Mage::getSingleton('core/session')->get('username');
            print_r($_SESSION);
            $productModel->setData($data)->save();
        }
    }
}
