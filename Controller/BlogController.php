<?php
@include '../Model/database.php';
@include '../../Model/database.php';
error_reporting(E_ALL ^ E_NOTICE);
// session_start();
class BlogController
{

    public function __construct()
    {
        $this->handleRequest();
    }
    public function handleRequest()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'addBlog') {
                $this->addBlog();
            } elseif ($_GET['page'] === 'viewBlog') {
                $this->viewBlog();
            } elseif ($_GET['page'] === 'editBlog') {
                $this->editBlog();
            } elseif ($_GET['page'] === 'viewBlogCondition') {
                if (isset($_GET['blog_id'])) {
                    $this->viewBlogCondition($_GET['blog_id']);
                } else {
                    // Handle the case where 'blog_id' is not set
                }
            } elseif ($_GET['page'] === 'deleteBlog') {
              
                if (isset($_GET['blog_id'])) {
                    $this->deleteBlog($_GET['blog_id']); // Call the deleteBlog method
                } else {
                    // Handle the case where 'blog_id' is not set
                }
            }elseif ($_GET['page'] === 'addImage'){
                $this ->addImage();
            } else {
                // Handle other cases or display an error
                return;
            }
        }
    }

    public function addBlog()
    {
        session_start();
        global $database; // Declare $database as a global variable

        $database = new Database;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $date = date("Y-m-d h:i:sa");
            //For image
            $image_link = $_FILES['file'];
            $file_upload_path = '../view/assets/upload/userUpload';
            $file_name = rand(10, 10000) . rand() . $image_link['name'];
            $file_temp = $image_link['tmp_name'];
            $file = $file_upload_path . $file_name;
            if (move_uploaded_file($file_temp, $file)) {
                echo "";
            } else {
                echo "unable to upload file";
                die();
            }
            $user_id = $_SESSION['user_id'];
            $newBlog = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $file,
                'date_published' => $date,
                //session ko value extract garna milea chaina!!!!!!!!
                'user_id' => $user_id
            );
            $addBlog = $database->insert('blog', $newBlog);
            $this->addCategory($addBlog);
            $_SESSION['toastr'] = array(
                'type' => 'success', // or 'success' or 'info' or 'warning'
                'message' => 'File added succesfully!',
            );
            header("Location: ../View/blog/blog2.php");
        }

    }
    function addCategory($blogid)
    {
        $database = new Database; // Instantiate the $database object

        if (empty($_POST['subCategory'])) {
            $category_id = $_POST['category'];
        } else {
            $category_id = $_POST['subCategory'];
        }
        $blog_category = array(
            'blog_id' => $blogid,
            'category_id' => $category_id,
        );
        $addCategory = $database->insert('blog_category', $blog_category);
    }
    public function viewBlog()
    {
        $database = new Database;
        $viewBlog = $database->view('blog');
        return $viewBlog;
    }
    public function recommendBlog()
    {
        $database = new Database;
        $limit = 4;
        // $order_by='date';
        $recommendBlog = $database->viewRandom('blog', $limit);
        return $recommendBlog;
    }
    public function editBlog()
    {
        $database = new Database;
        if ($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
            $editBlog = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],

            );
        } else {
            $image_link = $_FILES['file'];
            $file_upload_path = '../view/assets/upload/userUpload';
            $file_name = rand(10, 10000) . rand() . $image_link['name'];
            $file_temp = $image_link['tmp_name'];
            $file = $file_upload_path . $file_name;
            if (move_uploaded_file($file_temp, $file)) {
                echo "";
            } else {
                $_SESSION['toastr'] = array(
                    'type' => 'error', // or 'success' or 'info' or 'warning'
                    'message' => 'Unable to upload the file!',
                );
                header("Location: ../View/blog/blog2.php");
            }

            $editBlog = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'image' => $file,
            );
        }
        $blog_id = $_POST['blog_id'];
        $condition = "WHERE blog_id=" . $blog_id;
        $editBlog = $database->edit('blog', $editBlog, $condition);
        $_SESSION['toastr'] = array(
            'type' => 'success', // or 'success' or 'info' or 'warning'
            'message' => 'File updated succesfully!',
        );
        header("Location: ../View/blog/blog2.php");

    }

    public function viewBLogCondition($blog_id)
    {
        $database = new Database;
        $condition = " blog_id =" . $blog_id . "";

        $viewBLog = $database->viewOnCondition('blog', $condition);
        return $viewBLog;
    }
    public function viewBLogLimit($offset, $limit)
    {
        $database = new Database;
        $condition = " ORDER BY blog_id DESC LIMIT $offset, $limit";
        $viewBlog = $database->viewonLimit('blog', $condition);
        return $viewBlog;
    }
    public function deleteBlog($blogId)
    {
        $database = new Database;
        $condition = "where blog_id =" . $blogId;

        $deleteBlog = $database->delete('blog', $condition);
        header('location: ../View/adminView/blog.php');

    }
    public function addImage(){
        if (isset($_FILES['upload']['name'])) {
            $file_name = $_FILES['upload']['name'];
            $file_path = '../view/assets/upload/userUpload/' . $file_name;
            $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        
            if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png') {
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $file_path)) {
                    $data['file'] = $file_name;
                    $data['url'] = '../../' .$file_path;
                    $data['uploaded'] = 1;
                } else {
                    $data['uploaded'] = 0;
                    $data['error']['message'] = 'Error! File not uploaded';
                }
            } else {
                $data['uploaded'] = 0;
                $data['error']['message'] = 'Invalid extension';
            }
        } else {
            $data['uploaded'] = 0;
            $data['error']['message'] = 'No file selected';
        }
        
        echo json_encode($data);
        
    }

}


new BlogController;
?>