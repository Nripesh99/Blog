<?php
@include_once '../Model/database.php';
@include_once '../../Model/database.php';
class CategoryController{
    public function __construct()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'addCategory') {
                $this->addCategory();
            } elseif ($_GET['page'] === 'addSubCategory') {
                $this->addSubCategory();
            } else {
                // Handle the case where 'page' is not recognized
            }
        } else {
            // Handle the case where 'page' is not set
        }
    }
  
    
        function addCategory(){
        $datbase= new Database;
        $newCategory = array(
            'category_name' => $_POST['category'], 
        );
        $result=$datbase->insert('category', $newCategory);
        if($result){
            $_SESSION['toastr'] = array(
                'type'      => 'success', // or 'success' or 'info' or 'warning'
                'message' => 'Inserted Succesfully!',
            );

        }else{
            $_SESSION['toastr'] = array(
                'type'      => 'error', // or 'success' or 'info' or 'warning'
                'message' => 'error in inserting data!',
            );
        }
    }
    function addSubCategory(){
        $datbase= new Database;
        $newCategory = array(
            'category_name' => $_POST['subCategory'], 
            'category_parent_id' =>$_POST['category_parent_id'],
        );
 
        $result=$datbase->insert('category', $newCategory);
       
        if($result){
            $_SESSION['toastr'] = array(
                'type'      => 'success', // or 'success' or 'info' or 'warning'
                'message' => 'Inserted Succesfully!',
            );

        }else{
            $_SESSION['toastr'] = array(
                'type'      => 'error', // or 'success' or 'info' or 'warning'
                'message' => 'error in inserting data!',
            );
        }
    }
function viewCategory(){
    $database = new Database;
    $result = $database->view('category');

    // if ($result) {
    //     $_SESSION['toastr'] = array(
    //         'type'      => 'success',
    //         'message'   => 'Data Retrieved Successfully!',
    //     );
    // } else {
    //     $_SESSION['toastr'] = array(
    //         'type'      => 'error',
    //         'message'   => 'Error in retrieving data!',
    //     );
    // }

    return $result;
}


}
new CategoryController;
?>