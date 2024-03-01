<?php
class Core_Block_Template extends Core_Block_Abstract{

    public $template;
    protected $_child=[];
    public function toHtml(){
        //changes ob
        ob_start();
        ob_clean();
        $this->render();
        ob_end_flush();

    }

    public function addChild($key,$value){
        $this->_child[$key]=$value;
        // print_r($this->_child);
    }

    

    public function removeChild($key){
        //changes
        unset($this->_child[$key]);
        return $this;
    }

    public function getChild($key){
        // echo "here in getchild"; 
        return $this->_child[$key];
    }

    public function getChildHtml($key){
        $html='';
        if($key == '' && count($this->_child)){
            foreach($this->_child as  $_child){
                $html.= $_child->toHtml();
            }

        }
        else{
            $html=$this->_child[$key]->toHtml();
        }
        return $html;
    }

    public function setTemplate($template){
        $this->template = $template;
        return $this;
    }

    public function getTemplate(){

        return $this->template;
        
    }
    public function getUrl($path){
        return $this->getRequest()->getUrl($path);

    }
}
?>