<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'sales/quote';
        $this->resourceClass = "Sales_Model_Resource_Quote";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote";
    }

    public function _beforeSave(){
        $grandTotal=0;
        foreach($this->getItemCollection()->getData() as $_item){
            $grandTotal+=$_item->getRowTotal();
        }
        $this->addData('grand_total',$grandTotal);
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        // $quoteId = ($quoteId) ? $quoteId : 0;
        $quoteId =  (!$quoteId) ? 0 : $quoteId;
        $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        "tax_percent" => 0,
                        "grand_total" => 0
                    ]
                )->save();
            Mage::getSingleton('core/session')->set('quote_id', $quote->getId());
            $this->load($quote->getId());
        }

    }

    public function addProduct($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')
                ->addItem($this, $data['product_id'], $data['qty']);
            $this->save();
        }
        /*   if($this->getId()){ why is this line important
              Mage::getModel('sales/quote_item')->addItem($this,$data['product_id'],$data['quantity']);
              $this->save();
          } */
    }

    public function getItemCollection()
    {
        $quote = Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
        return $quote;
    }
}