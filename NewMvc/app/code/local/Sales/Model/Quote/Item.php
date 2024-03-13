<?php
class Sales_Model_Quote_Item extends Core_Model_Abstract{

    public function _beforeSave(){
        if($this->getProductId()){
            $row_total=$this->getProduct()->getPrice() * $this->getQty();
            $this->addData('row_total',$row_total);
            $this->addData('price',$this->getProduct()->getPrice());
        }
    }

    public function getProduct(){
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }

    public function init(){
        $this->_modelClass='sales/quote_item';
        $this->resourceClass='Sales_Model_Resource_Quote_Item';
        $this->collectionClass='Sales_Model_Resource_Collection_Quote_Item';
    }
    
    public function addItem(Sales_Model_Quote $quote,$productId,$quantity){
        $item=$quote->getItemCollection()->addFieldToFilter('product_id',$productId)->getFirstItem();
        // print_r(get_class($item));
        echo "<pre>";
        // print_r($item);
        // print_r($item->getProductId());
        $itemId=($item && $item->getId())?$item->getId():0;
        $quantity=($item && $item->getId())?($item->getQty()+$quantity):$quantity;
        $data= [
            "item_id"=>$itemId,
            "quote_id"=>$quote->getId(),
            "product_id"=>$productId,
            "price"=>0,
            "qty"=>$quantity,
            "row_total"=>0
        ];
        Mage::getModel('sales/quote_item')->setData($data)
        ->save();    
    }
}