<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowActions = [
        
    ];
    public function formAction()
    {
        $layout = $this->getLayout();
        var_dump($this->_allowActions);
        
        // echo "here in index.php";
        // // echo "in form action";
        // $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addCss('css/page.css');
        // $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');


        // $productForm= $layout->createBlock('catalog/admin_product')->setTemplate('product/form.phtml');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        //    print_r($layout->createBlock('catalog/admin_product_form'));
        $child->addChild('productForm', $productForm);
        $layout->toHtml();


    }
    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception('Request not valid');
            }
            $data = $this->getRequest()->getParams('pdata');
            $data['image_link']=$_FILES['pdata']['name']['image_link'];

            if (!isset($data['price']) || !is_numeric($data['price'])) {
                throw new Exception('Price is not valid');
            }
            // echo "<pre>";
            // $id = (isset($data['product_id'])) ? $data['product_id'] : 0;
            $productModel = Mage::getModel('catalog/product');
            $productModel->setData($data);
            
            // $productModel->save();
            $uploadDir = 'media/product/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
    
            $uploadedFile = $_FILES['pdata']['name']['image_link'];
        echo $uploadedFile; 
            $uploadPath = $uploadDir.basename($uploadedFile);
    
            if (move_uploaded_file($_FILES['pdata']['tmp_name']['image_link'], $uploadPath)) {
                // Save file path to the database
                $productModel->setImageLink($uploadPath);
                $productModel->save();
                $this->setRedirect("admin/catalog_product/form?id={$productModel->getId()}");
                // $this->setRedirect("admin/banner/form?id={$productModel->getId()}");
            } else {
                throw new Exception('File upload failed.');
            }
            // $productModel= new Catalog_Model_Product();// print_r($productModel);
            // $productModel->save();
            // print_r($productModel);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
    //delete
    public function deleteAction()
    {
        // $id = $this->getRequest()->getParams('id',0);
        Mage::getModel('catalog/product')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();

        $this->setRedirect('admin/catalog_product/list');
        // $productModel->delete($id);
        // header("Location: list");
    }

    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');


        // echo "here in index.php";
        // $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addCss('css/page.css');
        // $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('productList', $productList);
        // $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/header.css');
        // $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/footer.css');
        $layout->toHtml();
        // header("Location:product_list.php");

    }

    public function testAction()
    {
        echo "<pre>";
        $productModel = Mage::getModel('catalog/product');
        print_r($productModel);
        $productModel = Mage::getModel('catalog/product')->setData(['as', 'ab']);
        print_r($productModel);

    }



}