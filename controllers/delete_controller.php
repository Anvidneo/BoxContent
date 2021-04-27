<?php
class delete_controller {
    private $db;

    public function __construct(){
        require_once("models/modific_model.php");
        $this->con = new modific_model();
    }

    public function delete_category($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        $data = $this->con->delete_category($id);
        
        # Return response
        return $data;
    }

    public function delete_product($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        $data = $this->con->delete_product($id);
        
        # Return response
        return $data;
    }

}
?>
