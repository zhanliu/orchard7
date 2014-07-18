<?php
class Privilege extends Controller
{
    public function index()
    {
        require 'application/views/common/header.php';
        require 'application/views/common/index.php';
        require 'application/views/common/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
    }

    public function role()
    {
        $role_model = $this->loadModel('RoleModel');
        $roles = $role_model->getAllRoles();

        require 'application/views/common/header.php';
        require 'application/views/privilege/role.php';
        require 'application/views/common/footer.php';
    }

    public function addRole()
    {
        require 'application/views/common/header.php';
        require 'application/views/privilege/add_role.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddRole()
    {
        if (isset($_POST["submit_add_role"])) {

            $role_model = $this->loadModel('RoleModel');
            $role_model->addRole($_POST["name"], $_POST["description"]);
        }

        header('location: ' . URL . 'privilege/role');
    }

    public function deleteRole($id)
    {
        if (isset($id)) {
            $role_model = $this->loadModel('RoleModel');
            $role_model->deleteRole($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'privilege/role');
    }

    public function credential()
    {
        $credential_model = $this->loadModel('CredentialModel');
        $credentials = $credential_model->getAllCredentials();

        require 'application/views/common/header.php';
        require 'application/views/privilege/credential.php';
        require 'application/views/common/footer.php';
    }

    public function addCredential()
    {
        $role_model = $this->loadModel('RoleModel');
        $roles = $role_model->getAllRoles();

        require 'application/views/common/header.php';
        require 'application/views/privilege/add_credential.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddCredential()
    {
        if (isset($_POST["submit_add_credential"])) {
            $credential_model = $this->loadModel('CredentialModel');
            $credential_model->addCredential($_POST["role_id"], $_POST["login"], $_POST["password"], $_POST["description"]);
        }

        header('location: ' . URL . 'privilege/credential');
    }

    public function deleteCredential($id)
    {
        if (isset($id)) {
            $credential_model = $this->loadModel('CredentialModel');
            $credential_model->deleteCredential($id);
        }

        header('location: ' . URL . 'privilege/credential');
    }
}

