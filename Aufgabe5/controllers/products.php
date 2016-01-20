<?php

class Products extends Controller {



   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      $data['products'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
   }

   public function add() {
      $data['title'] = 'Neues Produkt';
      $data['form_header'] = 'Neues Produkt anlegen';

      $this->_view->render('header', $data);
      $this->_view->render('products/form', $data);
      $this->_view->render('footer');
   }
   public function log() {
      $data['title'] = 'Log Dich';
     

      $this->_view->render('header', $data);
      $this->_view->render('products/login', $data);
      $this->_view->render('footer');
   }
   public function reg() {
      $data['title'] = 'Registriere Dich';
     

      $this->_view->render('header', $data);
      $this->_view->render('products/register', $data);
      $this->_view->render('footer');
   }
    public function register() {
      $postdata = array(
       'username' => $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL),
        'password' => $password = PASSWORD::hash($_POST['password'],FILTER_SANITIZE_STRING )
     );

      $this->_model->regDb($postdata);

       $this->_view->render('header', $data);
      $this->_view->render('products/login', $data);
      $this->_view->render('footer');
   
   }
   public function login() {
   //db ausführen session usw.
    SESSION::init();
   SESSION::display();
    //form auslesen
     $postdata = array(
       'username' => $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL),
        'password' => $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING )
     );
     

     $this->_model->compare($postdata);
    // var_dump(bool);
     if (true){

      $data['products'] = $this->_model->all();
       $this->_view->render('header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
     }
     else{
      echo "Bitte registriere Dich";
       $this->_view->render('header', $data);
      $this->_view->render('products/register', $data);
      $this->_view->render('footer');
     }
      
  //an Model weiterreichen und dort vergleichen
  
   }

   public function logout(){
    SESSION::destroy();
     }
    public function search() {
      
          $search = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
           $data['products'] = $this->_model->search($search);
      $this->_view->render('header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
   }


   public function insert() {
      
        $postdata = array(
       'name' => $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING),
       'url'  => $url = filter_var($_POST['url'], FILTER_SANITIZE_URL),                                 
        'image'     => $image = filter_var($_POST['image'], FILTER_SANITIZE_URL),
       'price'     => $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT ));

      $data['title'] = 'Übersicht neu';
      $this->_model->putIndb($postdata);
      URL::redirect('',303);
      //$data['products'] = $this->_model->all();

     // $this->_view->render('header', $data);
      //$this->_view->render('products/list', $data);
      //$this->_view->render('footer');
   }

   public function delete( $id) {
    //  var_dump($id);
    // $id_a= array('id'=> $id);
         // $where = array('id' => $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT));
      $data['title'] = 'Übersicht gelöscht';
      $this->_model->deleteProduct($id);
      $data['products'] = $this->_model->all();
//var_dump($data);
      $this->_view->render('header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
   }
    public function update($id) {
      var_dump($id);
       $postdata = array(
       'name' => $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING),
       'url'  => $url = filter_var($_POST['url'], FILTER_SANITIZE_URL),                                 
        'image'     => $image = filter_var($_POST['image'], FILTER_SANITIZE_URL),
       'price'     => $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT ));
       

      $data['title'] = 'Übersicht neu';
      $this->_model->updateProd($postdata, $id);
      URL::redirect('',303);
      //$data['products'] = $this->_model->all();

     // $this->_view->render('header', $data);
      //$this->_view->render('products/list', $data);
      //$this->_view->render('footer');
   }

   

   public function edit($id) {
      
     $data['product'] = $this->_model->oneProd($id);
   
   
    
//var_dump($data['product']);
      $this->_view->render('header', $data);
      $this->_view->render('products/form', $data);
      $this->_view->render('footer');
   }
}