<?php
include "config.php"; 

if (isset($_POST['submit']) && isset($_POST['table']) && isset($_POST['action'])) { 
    $table = $_POST['table']; 
    $action = $_POST['action']; 

    switch ($action) {
        case 'Select':
            include_once "interface.php";
            include_once "select.php";
            break;

        case 'Insert':
            include_once "insert.php";
            break;

        case 'Update':
            switch($table){
                case 'product_type_dyrectory':
                    include "get_prod_type.html";
                    break; 

                case 'trademark_directory':
                    include "get_trademark.html";
                    break;    

                case 'price_list':
                    include "get_price_list.html";
                    break;    
            }
            break;
        
        default:
            include_once "interface.php";
            echo "Invalid option selected.";
            break;
    }
}
?>