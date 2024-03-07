<?php
class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('core/1column.phtml');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        // echo "<pre>";

        $head = $this->createBlock('page/head');
        $this->addChild('head', $head);

        $header = $this->createBlock('page/header');
        $this->addChild('header', $header);

        $content = $this->createBlock('page/content');
        $this->addChild('content', $content);

        $footer = $this->createBlock('page/footer');
        $this->addChild('footer', $footer);

        /* FOR ADMIN */
        /*   $head= $this->createBlock('page/admin_head');
          $this->addChild('adminHead',$head); */

        $adminHeader = $this->createBlock('page/admin_header');
        $this->addChild('adminHeader', $adminHeader);

        $adminContent = $this->createBlock('page/admin_content');
        $this->addChild('adminContent', $adminContent);
        // print_r($this->getChildHtml('adminContent'));

        $adminFooter = $this->createBlock('page/admin_footer');
        $this->addChild('adminFooter', $adminFooter);
    }
    public function createBlock($className)
    {
        return Mage::getBlock($className);
        // ->setLayout($this);
    }

}