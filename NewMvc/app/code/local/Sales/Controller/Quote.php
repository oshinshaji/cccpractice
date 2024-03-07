<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        echo "in add action in quote";
        echo "<pre>";
        $cartData = $this->getRequest()->getParams('cart_data');
        $quantity = $cartData['quantity'];
        $productId = $cartData['id'];
        $productData = Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter('product_id', $productId);
        // $productData['$quantity']= $quantity;
        // $array=$productData->getData();
        // print_r($array);
        // $model=Mage::getModel('catalog/product');
        // $model->setData($quantity);
        // print_r($productData->getData() );
/* 
        foreach($productData->getData() as $data){
            // $data['$quantity']= $quantity;         
            print_r($data);
        } */

        foreach ($productData->getData() as $data) {
            // $data['$quantity']= $quantity;
            print_r($data);
            echo "Quantity:";
            print_r($quantity);
        }
    }
}