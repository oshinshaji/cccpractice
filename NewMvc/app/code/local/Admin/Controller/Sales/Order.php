<?php
class Admin_Controller_Sales_Order extends Core_Controller_Front_Action
{

    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $statusList = $layout->createBlock('sales/admin_order_list');
        $child->addChild('statusList', $statusList);
        $layout->toHtml();
    }
    public function viewAction()
    {
        echo "in sales order view";
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $orderView = $layout->createBlock('sales/admin_order_view');
        $child->addChild('orderView', $orderView);
        $layout->toHtml();
    }

    public function saveAction()
    {
        // echo "in save action";
        echo "<pre>";
        // print_r(Mage::getModel('sales/order_status_history'));
        $data = $this->getRequest()->getParams('s_data');
        $from=Mage::getModel('sales/order_status_history')->getLastToStatus();
        print_r($from);
        $fromStatus=$from->getToStatus();
        echo "<pre>";
        print_r($fromStatus);
        $data['from_status']=$fromStatus;
        $toStatus = $data['to_status'];
        $orderId = $data['order_id'];

        Mage::getModel('sales/order_status_history')
        ->setData($data)
        ->save();

        Mage::getModel('sales/order')
            ->addData('order_id', $orderId)
            ->addData('status_method', $toStatus)->save();


    }
}