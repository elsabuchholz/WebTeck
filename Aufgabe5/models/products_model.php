<?php

class Products_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
   */
   public function all() {
      return $this->_db->select('SELECT * FROM products ORDER BY id DESC LIMIT 0, 20');
   }
public function oneProd($id) {

      return $this->_db->select('SELECT * FROM products where id='.$id)[0];
   }

   public function putIndb($data) {
      $this->_db->insert('products',$data);
   }
 
   public function deleteProduct($id){
     
    //var_dump( $id);
      
      $this->_db->delete('products', 'id='.$id);
     // $this->_db->deleteById('products', $data);
   }
    public function regDb($data){
     
      $this->_db->insert('members',$data);
   }
 public function compare($data){


$dbpassword=$this->_db->select('SELECT password FROM members where username="'.$data['username'].'"');
$dbpassword=$dbpassword[0]['password'];
var_dump($dbpassword);
return PASSWORD::validate($data['password'],$dbpassword);

 //var_dump(bool);
     //passwort vergleichen
 // if ($data['password']==this->_db->select('SELECT password FROM members'))
   //  $compdata= $this->_db->select('SELECT * FROM members where password='.$password);
    // if ($password == $compdata){
      //return 
   //  }
   }

   public function updateProd($data, $id){
     var_dump( $id);
      $this->_db->update('products',$data, 'id='.$id);
   }
   public function search($search){
      //var_dump( $where);
 return $this->_db->select('SELECT * FROM products where name like \'%'.$search.'%\'');
      
   }

}