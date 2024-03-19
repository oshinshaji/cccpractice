<?php
class Sales_Controller_Customer_Order extends Core_Controller_Front_Action{
    public function viewAction(){
        echo "in customer order view";
    }

    public function listAction(){
        echo "in customer order list";
        $layout=$this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/footer.css');

        $child=$layout->getChild('content');
        $orderList=$layout->createBlock('sales/customer_order_list');
    
        $child->addChild('orderList',$orderList);
        $layout->toHtml();
        
    }
}