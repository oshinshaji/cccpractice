<?php
class Page_Block_Head extends Core_Block_Template{

    protected $_css=[];
    protected $_js=[];
    public function __construct(){
        $this->setTemplate('page/head.phtml');
    }

    public function addJs($file){
        // echo "here in addjs";
        $this->_js[]=$file;
        // print_r ($this->_js);
    }

    public function addCss($file){
        $this->_css[]=$file;
    }

    public function getJs(){
        // echo "here in getjs";
        // print_r($this->_js);
        return $this->_js;
      
        
        // print_r ($this->_js);
    }

    public function getCss(){
        // echo "here in getcss";
        return $this->_css;
    }
    
}
?>