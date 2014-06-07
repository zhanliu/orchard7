<?php
class Admin extends Controller
{
    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
    */
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
    }

    public function category()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $category_model = $this->loadModel('AdminCategoryModel');
        $categories = $category_model->getAllCategories();

        $stats_model = $this->loadModel('CategoryStatsModel');
        $amount_of_categories = $stats_model->getAmountOfCategories();

        // debug message to show where you are, just for the demo
        echo 'Message from Controller: You are in the controller *admin, using the method cat()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/category.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily

    }

    public function addCategory()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addCatetory().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_category"])) {
            // load model, perform an action on the model
            $category_model = $this->loadModel('AdminCategoryModel');
            $category_model->addCategory($_POST["name"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'admin/category');
    }


}