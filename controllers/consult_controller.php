<?php
class consult_controller {
    private $db;

    public function __construct(){
        require_once("models/consult_model.php");
        $this->con = new consult_model();
    }

    public function consult_categories($id = ''){
        # Call the model
        $data = $this->con->get_categories($id);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

    public function consult_products($post){
        # Define the variable
        $id          = $post['id'];
        $category    = $post['id_category'];

        # Call the model
        $data = $this->con->get_products($id, $category);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

}
?>
