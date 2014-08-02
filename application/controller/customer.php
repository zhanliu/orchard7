<?php
class Customer extends Controller
{
    public function index()
    {
        require 'application/views/common/header.php';
        require 'application/views/common/index.php';
        require 'application/views/common/footer.php';
    }


    public function manageCustomer()
    {
        $customer_model = $this->loadModel('CustomerModel');
        $customers = $customer_model->getAllCustomersWithDetails();


        require 'application/views/common/header.php';
        require 'application/views/customer/customer.php';
        require 'application/views/common/footer.php';
    }



}

