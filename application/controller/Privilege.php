<?php
class Privilege extends Controller
{
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
    }

    public function role()
    {
        $role_model = $this->loadModel('RoleModel');
        $roles = $role_model->getAllRoles();

        require 'application/views/admin/header.php';
        require 'application/views/privilege/role.php';
        require 'application/views/admin/footer.php';
    }

    public function addRole()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_role"])) {
            // load model, perform an action on the model
            $role_model = $this->loadModel('RoleModel');
            $role_model->addRole($_POST["name"], $_POST["description"]);
        }

        header('location: ' . URL . 'privilege/role');
    }

    public function deleteRole($id)
    {
        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $role_model = $this->loadModel('RoleModel');
            $role_model->deleteStore($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'privilege/role');
    }
    
}