<?php
include '../Model/database.php';

class LoginController
{
    public function __construct()
    {
        session_start();
        // parent::__construct();
        if ($_GET['page'] === 'register') {
            $this->register();
        } elseif ($_GET['page'] === 'login') {
            $this->login();
        } elseif ($_GET['page'] === 'logout') {
            $this->logout();
        }
    }


    public function login()
    {
        $Database = new Database();

        if ($_SERVER["REQUEST_METHOD"] == "POST" and (!empty($_POST['email']) and !empty($_POST['password']))) {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Valid Email!';
                header("Location: ../login.php");
            }
            $password = $_POST['password'];
            $readResult = $Database->select('user', 'email', $email);

            if (!empty($readResult)) {
                $hashedPasswordFromDatabase = $readResult['password'];
                if (password_verify($password, $hashedPasswordFromDatabase)) {
                    // AUTH true Login Success
                    $_SESSION['user_id'] = $readResult['user_id'];
                    $_SESSION['toastr'] = array(
                        'type'      => 'success', // or 'success' or 'info' or 'warning'
                    'message' => 'welcome ..!',
                    );
                    header("Location:../view/index.php ");
                    die();
                } else {
                    // Incorrect Password
                    $_SESSION['toastr'] = array(
                        'type'      => 'error', // or 'success' or 'info' or 'warning'
                        'message' => 'Incorrect Email or Password!',
                    );
                    header("Location: ../View/login.php");
                }
            } else {
                $_SESSION['toastr'] = array(
                    'type'      => 'error', // or 'success' or 'info' or 'warning'
                    'message' => 'Incorrect Email or Password!',
                );
                header("Location: ../View/login.php");
            }
            
        } else {
            // $_SESSION['toastr'] = array(
            //     'type'      => 'error', // or 'success' or 'info' or 'warning'
            //     'message' => 'Login fail ',
            // );
            header("Location: ../View/login.php");
        }
    }

    public function register()
    {
        $Database = new Database();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //For image
            $image_link = $_FILES['file'];
            $file_upload_path = '../view/assets/upload';
            $file_name = rand(10, 10000) . rand() . $image_link['name'];
            $file_temp = $image_link['tmp_name'];
            $file = $file_upload_path . $file_name;
            if (move_uploaded_file($file_temp, $file)) {
                echo "";
            } else {
                echo "unable to upload file";
                die();
            }
            // creating associative arrays
            $userNew = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $password,
                'user_type' => '1',
                'user_image' => $file,

            );
            $database = new Database();
            $insertResult = $database->insert('user', $userNew);
            $_SESSION['toastr'] = array(
                'type'      => 'success', // or 'success' or 'info' or 'warning'
            'message' => 'User created succesfully!',
            );
            header("Location: ../View/login.php");
        }
    }



    public function logout()
    {
        session_destroy();
        header("Location: ../View/login.php");

    }
}
new LoginController();

?>  