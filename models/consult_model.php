<?php
class consult_model{
    private $db;
 
    public function __construct(){
        require_once("db/db.php");
        $this->db=Conect::connection();
        $this->db = $this->db['con'];
    }

    public function get_categories($id = ''){
        # Validate the role
        if ($id == '') {
            $where = "WHERE id != ''";
        } else {
            $where = "WHERE id = '$id'";
        }

        # Generate query
        $sql = "SELECT * FROM tbl_categories as a $where";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'            =>$row['id'],
                'name'          =>$row['name'],
                'description'   =>$row['description']
            );
        }
        
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }

    public function get_products($id = '', $category = ''){
        # Validate the id and category
        $where  = ($id == '') ? "WHERE id != ''": "WHERE id = '$id'";
        $where2 = ($category == '') ? "": "AND id_category = '$category'";
        
        # Generate query
        $sql = "SELECT a.* FROM tbl_products as a $where $where2";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'            =>$row['id'],
                'id_category'   => $row['id_category'],
                'name'          => $row['name'],
                'price'         => $row['price'],
                'weight'        => $row['weight'],
                'stock'         => $row['stock'],
                'reference'     => $row['reference'],
                'date_last_sale'=> $row['date_last_sale'],
                'date_created'  => $row['date_created'],
            );
        }
        
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }
    
}
?>
