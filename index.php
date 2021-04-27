<?php
    header('Access-Control-Allow-Origin: *');
    $request = array_key_exists('request', $_POST) ? $_POST['request']: '';
    
    switch ($request) {
        # CATEGORIES
        case 'new_category':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_category($_POST);
            $res = $data;
            break;

        case 'category':
            $id = $_POST['id'];

            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_categories($id);
            $res = $data;
            break;
        
        case 'update_category':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_category($_POST);
            $res = $data;
            break;
        
        case 'delete_category':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_category($_POST);
            $res = $data;
            break;

        # PRODUCTS
        case 'new_product':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_product($_POST);
            $res = $data;
            break;

        case 'products':
            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_products($_POST);
            $res = $data;
            break;
        
        case 'update_product':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_product($_POST);
            $res = $data;
            break;

        case 'sell_product':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->sell_product($_POST);
            $res = $data;
            break;
        
        case 'delete_product':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_product($_POST);
            $res = $data;
            break;

        # DEFAULT
        default:
            require_once('views/index.php');
            $res = '';
            break;

    }
    // ob_end_clean();
    $res = json_encode($res);
    echo $res;
?>
