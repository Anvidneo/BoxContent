<?php
class update_controller {
    private $db;

    public function __construct(){
        require_once("models/modific_model.php");
        $this->con = new modific_model();
    }

    public function update_category($post){
        # Define the variable
        $id             = $post['id'];
        $name           = $post['name'];
        $description    = $post['description'];

        # Call the model
        $data = $this->con->update_category($id, $name, $description);
        
        # Return response
        return $data;
    }

    public function update_product($post){
        # Define the variable
        $id             = $post['id'];
        $id_category    = $post['id_category'];
        $name           = $post['name'];
        $price          = $post['price'];
        $weight         = $post['weight'];
        $stock          = $post['stock'];
        $reference      = $post['reference'];

        # Call the model
        $data = $this->con->update_product($id, $id_category, $name, $price, $weight, $stock, $reference);
        
        # Return response
        return $data;
    }

    public function sell_product($post){
        # Define the variable
        $id = $post['id'];
        $params = array(
            'id' => $id
        );

        # Consult data of product
        require_once('controllers/consult_controller.php');
        $con = new consult_controller();
        $data = $con->consult_products($params);
        $stock = ($data['data'][0]['stock'] - $post['stock']);

        # Validate if product have more that 1 in stock
        if ($data['data'][0]['stock'] <= 0) {
            $data = array(
                'state'     => 0,
                'message'   => 'The product dont have stock'
            );
        } else if ($stock < 0) {
            $data = array(
                'state'     => 0,
                'message'   => 'The product dont have stock'
            );
        } else {
            $date_last_sale = date("Y-m-d");
    
            # Call the model
            $data = $this->con->sell_product($id, $date_last_sale, $stock);
        }
        
        # Return response
        return $data;
    }

}
?>
