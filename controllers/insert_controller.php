<?php
class insert_controller {
    private $db;

    public function __construct(){
        require_once("models/modific_model.php");
        $this->con = new modific_model();
    }

    # Insert new category
    public function insert_category($post){
        # Define the variables
        $name           = $post['name'];
        $description    = $post['description'];

        # Call the model
        $param = "'$name', '$description'";
        $data = $this->con->insert_category($param);
        
        # Return response
        return $data;
    }
    
    # Insert new post
    public function insert_product($post){
        # Define the variables
        $id_category    = $post['id_category'];
        $name           = $post['name'];
        $price          = $post['price'];
        $weight         = $post['weight'];
        $date_created   = date("Y-m-d");
        $stock          = $post['stock'];
        $reference      = $post['reference'];

        # Call the model
        $param = "$id_category, '$name', $price, $weight, '$date_created', $stock, $reference";
        $data = $this->con->insert_product($param);
        
        # Return response
        return $data;
    }
}
?>
