<?php 
class Cart_Controller_Index extends Core_Controller_Front_Action{
    public function viewAction(){
        // echo "in cart view";
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/cart.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $cartView = $layout->createBlock('cart/view');
        $child->addChild('cartView', $cartView);
        $layout->toHtml();
    }
}