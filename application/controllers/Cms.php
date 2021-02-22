<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

 public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('fetch_modal');
	} 
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{    
		$data['data'] =$this->fetch_modal->select_product();
		 $this->load->view('home', $data);
		 //$this->load->view('shop', $data);
	}
	
	public function shop()
	{    
		 $data['data'] =$this->fetch_modal->select_product();
		 $this->load->view('shop', $data);
	}
	
	public function about()
	{    
		 $this->load->view('about');
	}
	
	public function wishlist()
	{    
		 $this->load->view('wishlist');
    }
	
	public function cart()
	{    
		$data['data'] =  $this->fetch_modal->select_addCart();
		$data['subtotal'] =  $this->fetch_modal->totalCart();
		 $this->load->view('cart', $data);
	}
	
	public function contact()
	{    
		 $this->load->view('contact');
	}
	
	public function productSingle($url='')
	{    
		$data['data'] =$this->fetch_modal->select_product_single($url);
		$data['data1'] =$this->fetch_modal->select_product();
		 $this->load->view('product-single',$data);
	}
	
	public function productPrice(){
		  $id = $_POST['id'];
		  $wei = $_POST['wei'];
		 $value =  $this->fetch_modal->productPriceget($id,$wei);
		 echo json_encode($value);
		 exit();
	}

	public function addCart(){
		$id = $_POST['id'];
		$wei = $_POST['wei'];
		$quantity = $_POST['quantity'];
	   $value =  $this->fetch_modal->insertAddcart($id,$wei,$quantity);
	   echo json_encode($value);
	   exit();
	}

	public function loadCartCount(){
	   $value =  $this->fetch_modal->cartcountload();
	   echo json_encode($value);
	   exit();
	}
	
	public function cartItemDelete(){
		$id = $_POST['cartid'];
	   $value =  $this->fetch_modal->deleteCart($id);
	   echo json_encode($value);
	   exit();
	}

	public function quantityUpdate(){
		$id = $_POST['cartid'];
		$quantity = $_POST['quantity'];
	   $value =  $this->fetch_modal->quantityUpdateapi($id,$quantity);
	   echo json_encode($value);
	   exit();
	}

	
	public function searchboxArray(){
		$data  = $_POST['search']; 
		$value =  $this->fetch_modal->searchArray($data);
		echo json_encode($value);
		exit();
	 }

	 public function register(){
		$data = array(
			'name' => $_POST['name'],
			'mobile' => $_POST['mobile'],
			'email' => $_POST['email'], 
			'password' => $_POST['password']
		);
		$value =  $this->fetch_modal->userRegister($data);
		if($value=='malerdy'){
		print_r($value);
		exit();
		}
		else if($value=='ealerdy'){
		print_r($value);
		exit();
		}else{
		$lid = $_SESSION['logid'] = $value;
		$arr = explode(' ',trim($data['name']));
		 $_SESSION['name'] = $arr[0];
		//echo json_encode($lid);
		}
	}
	public function userlogin(){
		$data = array(
			'email' => $_POST['user'], 
			'password' => $_POST['password']
		);
		$value =  $this->fetch_modal->userLogin($data);
		$lid = $_SESSION['logid'] = $value['id'];
		$_SESSION['lomobile'] = $value['mobile'];
		$_SESSION['loname'] = $value['name'];
		$arr = explode(' ',trim($value['name']));
		 $_SESSION['name'] = $arr[0];
		echo json_encode($value);
	}


	public function logout(){
		$this->session->sess_destroy();
		echo "log out success";
		exit();
	}

	public function checkout()
	{    
		$data['subtotal'] =  $this->fetch_modal->totalCart();
		$data['address'] =  $this->fetch_modal->select_address();
		// print_r($data['address']);
		// exit();
		 $this->load->view('checkout', $data);
	}

	public function checkAddress(){
		$data = array(
			'cus_id' => $_SESSION['logid'],
			'name' => $_POST['fname'], 
			'mobile' => $_POST['mobile'],
			'address' => $_POST['address'],
			'city' => $_POST['city'],
			'pin_code' => $_POST['postcode']

		);
		$value =  $this->fetch_modal->userAddress($data, $_POST['addressid']);
		echo $value;
		exit();
	}

	function thankyou(){
		$this->load->view('thank-you');
	}
	function orderSuccess(){
		echo $data  = $this->fetch_modal->success_order($_POST['method'], $_POST['billid']);
		
	}

	function myorder(){
		$data['data'] =  $this->fetch_modal->fetchOrder();
		// print_r($data);
		// exit();
		$this->load->view('order', $data);
	}

	public function orderlist()
	{    
		$data['data'] =  $this->fetch_modal->select_addCart();
		$data['subtotal'] =  $this->fetch_modal->totalCart();
		 $this->load->view('order-list', $data);
	}

}
