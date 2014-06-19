<?php
class Stock extends Controller
{
    public function index()
    {
        require 'application/views/common/header.php';
        require 'application/views/common/index.php';
        require 'application/views/common/footer.php';
    }

    public function category()
    {
        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getAllCategories();

        $stats_model = $this->loadModel('CategoryStatsModel');
        $amount_of_categories = $stats_model->getAmountOfCategories();

        require 'application/views/common/header.php';
        require 'application/views/stock/category.php';
        require 'application/views/common/footer.php';
    }

    public function addCategory() {
        require 'application/views/common/header.php';
        require 'application/views/stock/add_category.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddCategory()
    {
        if (isset($_POST["submit_add_category"])) {
            $category_model = $this->loadModel('CategoryModel');
            $category_model->addCategory($_POST["name"]);
        }

        header('location: ' . URL . 'stock/category');
    }

    public function deleteCategory($id)
    {
        // if we have an id of a song that should be deleted
        if (isset($id)) {
            $categories_model = $this->loadModel('CategoryModel');
            $categories_model->deleteCategory($id);
        }

        header('location: ' . URL . 'stock/category');
    }



    public function product()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        $stats_model = $this->loadModel('ProductStatsModel');
        $amount_of_products = $stats_model->getAmountOfProducts();

        require 'application/views/common/header.php';
        require 'application/views/stock/product.php';
        require 'application/views/common/footer.php';
    }

    public function addProduct() {
        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getAllCategories();

        require 'application/views/common/header.php';
        require 'application/views/stock/add_product.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddProduct()
    {
        if (isset($_POST["submit_add_product"])) {
            // load model, perform an action on the model
            $product_model = $this->loadModel('ProductModel');
            $product_model->addProduct($_POST["name"], $_POST["category_id"], $_POST["unit"], $_POST["price"], $_POST["tag"], $_POST["description"], $_POST["img_url"], $_POST["is_archived"]);
        }

        header('location: ' . URL . 'admin/product');
    }

    public function deleteProduct($id)
    {
        if (isset($id)) {
            $product_model = $this->loadModel('ProductModel');
            $product_model->deleteProduct($id);
        }
        header('location: ' . URL . 'stock/product');
    }

    public function productDetail($id) {
        $product_model = $this->loadModel('ProductModel');
        $product = $product_model->getProductById($id);

        require 'application/views/common/header.php';
        require 'application/views/stock/product_detail.php';
        require 'application/views/common/footer.php';
    }

    public function getProductDetailById($id) {
        $product_model = $this->loadModel('ProductModel');
        $product = $product_model->getProductById($id);

        echo json_encode($product[0]);
    }

    public function Combo($id)
    {
        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        $stats_model = $this->loadModel('ComboStatsModel');
        $amount_of_combos = $stats_model->getAmountOfCombos();

        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        $comboDetailJson = "{";
        foreach ($combos as $combo) {
            $comboProducts = $product_model->getProductsByComboId($combo->id);

            $comboDetailJson = $comboDetailJson . '"ID' . $combo->id .'":[';
            foreach ($comboProducts as $comboProduct) {
                $comboDetailJson = $comboDetailJson . '{"name":"' . $comboProduct->name . '","quantity":"' . $comboProduct->quantity . '"},';
            }
            $comboDetailJson = $comboDetailJson .'],';
        }
        $comboDetailJson = $comboDetailJson . '}';

        // debug message to show where you are, just for the demo
        require 'application/views/common/header.php';
        require 'application/views/stock/combo.php';
        require 'application/views/common/footer.php';
    }

    public function deleteCombo($id)
    {
        if (isset($id)) {
            $combos_model = $this->loadModel('ComboModel');
            $combos_model->deleteCombo($id);
        }

        header('location: ' . URL . 'stock/combo');
    }

    public function addCombo() {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        require 'application/views/common/header.php';
        require 'application/views/stock/add_combo.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddCombo() {
        if (isset($_POST["submit_add_combo"])) {
            // load model, perform an action on the model
            $combo_model = $this->loadModel('ComboModel');
            $combo_id = $combo_model->addCombo($_POST["name"], $_POST["price"], $_POST["description"], $_POST["tag"], $_POST["is_archived"]);

            // insert multiple records into mapping table
            $product_ids = $_POST['product_id'];
            $quantities = $_POST['quantity'];

            $combo_detail_model = $this->loadModel('ComboDetailModel');
            $index = 0;
            foreach($product_ids as $product_id) {
                $combo_detail_model->addMapping($combo_id, $product_id, $quantities[$index]);
                $index++;
            }

        }

        require 'application/views/common/header.php';
        require 'application/views/stock/combo.php';
        require 'application/views/common/footer.php';

    }

}

