<?php
class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    protected $_allowActions = [


    ];
    public function formAction()
    {
        // echo "in form action of admin banner";
        $layout = $this->getLayout();
        // var_dump($this->_allowActions);
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/form.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $bannerForm = $layout->createBlock('banner/admin_form');
        $child->addChild('bannerForm', $bannerForm);
        $layout->toHtml();
    }

    public function listAction()
    {
        // echo "in list action of admin banner";
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/footer.css');
        $child = $layout->getChild('content');
        $bannerList = $layout->createBlock('banner/admin_list');
        $child->addChild('bannerList', $bannerList);
        $layout->toHtml();

    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new Exception('Request not valid');
            }
            $data = $this->getRequest()->getParams('b_data');
            $data['banner_image']=$_FILES['b_data']['name']['banner_image'];
            echo "<pre>";
            print_r($data); 
            $bannerModel = Mage::getModel('banner/banner');
            $bannerModel->setData($data);
            $uploadDir = 'media/banner/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
    
            $uploadedFile = $_FILES['b_data']['name']['banner_image'];
        echo $uploadedFile; 
            $uploadPath = $uploadDir.basename($uploadedFile);
    
            if (move_uploaded_file($_FILES['b_data']['tmp_name']['banner_image'], $uploadPath)) {
                // Save file path to the database
                $bannerModel->setBannerImage($uploadPath);
                $bannerModel->save();
                $this->setRedirect("admin/banner/form?id={$bannerModel->getId()}");
            } else {
                throw new Exception('File upload failed.');
            }
            // $bannerModel->save();
            // $this->setRedirect("admin/banner/form?id={$bannerModel->getId()}");
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function deleteAction()
    {
        Mage::getModel('banner/banner')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();
        $this->setRedirect('admin/banner/list');
    }
}