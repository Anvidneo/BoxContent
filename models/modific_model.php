<?php
class modific_model{
    private $db;
 
    public function __construct(){
        require_once("db/db.php");
        $this->db=Conect::connection();
        $this->db = $this->db['con'];
    }

    # FUNCTIONS TO CATEGORIES
    public function insert_category($param){
        # Generate query
        $sql = "INSERT INTO tbl_categories (name, description) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert category successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert category error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_category($id, $name, $description){
        # Generate query
        $sql = "UPDATE tbl_categories SET name = '$name', description = '$description' WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update category successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update category error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_category($id){
        # Generate query
        $sql = "DELETE FROM tbl_categories WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete category successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete category error'
            );
        }

        # Return result
        return $data;
    }

    # FUNCTIONS TO PRODUCTS
    public function insert_product($param){
        # Generate query
        $sql = "INSERT INTO tbl_products (id_category, name, price, weight, date_created, stock, reference) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert product successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert product error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_product($id, $id_category, $name, $price, $weight, $stock, $reference){
        # Generate query
        $sql = "UPDATE tbl_products SET id_category = $id_category, name = '$name', price = $price, weight = $weight, stock = $stock, reference = $reference WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update product successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update product error'
            );
        }
        # Return result
        return $data;
    }

    public function sell_product($id, $date_last_sale, $stock){
        # Generate query
        $sql = "UPDATE tbl_products SET date_last_sale = '$date_last_sale', stock = $stock WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Sell product successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Sell product error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_product($id){
        # Generate query
        $sql = "DELETE FROM tbl_products WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete product successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete product error'
            );
        }

        # Return result
        return $data;
    }

}
?>
