<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetch_modal extends CI_Model {
	   public function __construct(){
		parent::__construct();
        $this->load->database();  
	   } 

	public function select_product()
	{    
			$this->db->select('id,title,price,discount_price,image,slug_url');
			$query = $this->db->get('add_product');
			return $query->result_array();
			
	}
	
	public function select_product_single($id)
	{    
			$this->db->where('slug_url', $id);
			$query = $this->db->get('add_product');
			$data=$query->result_array()[0];
			return $data;
	}

	public function productPriceget($id,$wei){

		    $this->db->where('id', $id);
			$query = $this->db->get('add_product');
			if($query->result_array()[0]['discount_price'])
			{
			 $data= $query->result_array()[0]['discount_price'];
			}
			else{
			$data=$query->result_array()[0]['price'];
			}
			$dis = $query->result_array()[0]['price']/$wei;
            $data = array('price'=>$data/$wei, 'discout'=> $dis);
			return $data;
       
	}


	public function insertAddcart($id,$wei,$quantity){	 
		    $this->db->where('id', $id);
			$query = $this->db->get('add_product');
			if($query->result_array()[0]['discount_price'])
			{
			 $total= $query->result_array()[0]['discount_price']/$wei;
			}
			else{
			$total=$query->result_array()[0]['price']/$wei;
			}

			$cusId = $_SESSION['logid'];
			$data = array(
				'cus_id' => $cusId,
				'pro_id' => $id,
				'pro_name' =>$query->result_array()[0]['title'], 
				'weight' => $wei, 
				'price' => $total, 
				'quantity' => $quantity,
				 'img' =>$query->result_array()[0]['image']
				);

			$run = $this->db->insert('cus_add_cart', $data);
			if($run){
			 $query = $this->db->query("SELECT * FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
			 return $query->num_rows();	
			}
			else
			{
			return false;
			} 
			
	}

	public function cartcountload(){
		$cusId = $_SESSION['logid'];
		$query = $this->db->query("SELECT * FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
		return $query->num_rows();	
	}

	public function select_addCart()
	{       $cusId = $_SESSION['logid'];
		    $query = $this->db->query("SELECT * FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
			return $query->result_array();
	}


	public function deleteCart($id)
	{
		      
		$cusId = $_SESSION['logid'];
		$this->db->where('id', $id);
		$run =  $this->db->delete('cus_add_cart');
		// $query = $this->db->query("SELECT `price`,`quantity` FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
		
		// if($run)
		// return $query->num_rows();
		// else
		// return false;
		$query = $this->db->query("SELECT `price`,`quantity` FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
		$total=0;
		for($i=0; $i<$query->num_rows(); $i++){
		$total +=  $query->result_array()[$i]['price']*$query->result_array()[$i]['quantity'];
		}

        $de=0; if($total<150){
			$de = 40; 
		}else{
			$de = 0;
		}
			$data = array(
				'count' => $query->num_rows(),
				'subtotal' =>$total,
				'delivery' =>$de,
				'total' =>$total+$de
				);
		if($query)
		return $data;
		else
		return false;
	}

	public function totalCart(){       
	$cusId = $_SESSION['logid'];
	$query = $this->db->query("SELECT `price`,`quantity` FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
	$total=0;
	for($i=0; $i<$query->num_rows(); $i++){
	$total +=  $query->result_array()[$i]['price']*$query->result_array()[$i]['quantity'];
	}
	return $total;
	}

	function quantityUpdateapi($id,$quantity){
        $this->db->set('quantity', $quantity);
		$this->db->where('id', $id);
		$run = $this->db->update('cus_add_cart');
		$query = $this->db->query("SELECT `price`,`quantity` FROM `cus_add_cart` WHERE `id`='$id'");
		$totalrow = $query->result_array()[0]['price']*$query->result_array()[0]['quantity'];

		$cusId = $_SESSION['logid'];
		$query = $this->db->query("SELECT `price`,`quantity` FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
		$total=0;
		for($i=0; $i<$query->num_rows(); $i++){
		$total +=  $query->result_array()[$i]['price']*$query->result_array()[$i]['quantity'];
		}

        $de=0; if($total<150){
			$de = 40; 
		}else{
			$de = 0;
		}
			$data = array(
				'quantityrow' => $totalrow,
				'subtotal' =>$total,
				'delivery' =>$de,
				'total' =>$total+$de
				);
		if($run)
		return $data;
		else
		return false;
	}

	public function searchArray($data){  
		$query = $this->db->query("SELECT `title`,`slug_url` FROM `add_product` WHERE `slug_url` LIKE '%$data%'");
		$data=array();
		for($i=0; $i<$query->num_rows(); $i++){
			$row = array(
				'id' => $i,
				'name' =>$query->result_array()[$i]['slug_url'],
				'value' =>$query->result_array()[$i]['title']
				);
		    array_push($data, $row);
		}
		return $data;
		}
public function userRegister($data)
{	
	$queryMobile = $this->db->query("SELECT `mobile` FROM `user_regi` WHERE `mobile`='".$data['mobile']."'");
	$queryEmail = $this->db->query("SELECT `email` FROM `user_regi` WHERE `email`='".$data['email']."'");
		if($queryMobile->num_rows()===1){
			return "malerdy";
		} 
		else if($queryEmail->num_rows()===1){
			return "ealerdy";
		}
		else{
			$run = $this->db->insert('user_regi', $data);
			if($run)
			return $this->db->insert_id();	
			else
			return false;
		} 
	}

	public function userLogin($data)
	{   
			$this->db->where('email', $data['email']);
			$this->db->where('password', $data['password']);
			$this->db->select('id, name, mobile, email');
			$query = $this->db->get('user_regi');
			if($query->num_rows()==1){
			    return $query->result_array()[0];
			}		
			else
			{
				return 0;
			}
	}

	public function userAddress($data, $editid)
	{	    
		if($editid)
		{
		$this->db->where('id', $editid);
		$this->db->set($data);
		$run = $this->db->update('checkout_address');
		}
		else{
		$run = $this->db->insert('checkout_address', $data);
		}
	    if($run)
	    return true;	
		else
		return false; 
	}

	public function select_address()
	{       $cusId = $_SESSION['logid'];
		    $query = $this->db->query("SELECT * FROM `checkout_address` WHERE `cus_id`='$cusId'");
			return $query->result_array();
	}

	public function success_order($method,$billid){
		$cusId = $_SESSION['logid'];
		$query = $this->db->query("SELECT `pro_id`,`pro_name`,`weight`,`price`,`quantity` FROM `cus_add_cart` WHERE `cus_id`='$cusId'");
		$total=0;
		$digits = 4;
        $orderid = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$data1  = $query->result_array();
		for($i=0; $i<$query->num_rows(); $i++){
		$total +=  $query->result_array()[$i]['price']*$query->result_array()[$i]['quantity'];
		$data1[$i]=array('cust_id'=> $cusId) + $data1[$i];
		$data1[$i]=array('order_id'=> $orderid) + $data1[$i];
		}

        $de=0; if($total<150){
			$de = 40; 
		}else{
			$de = 0;
		}

	$str = '';
	$length = 12;
	$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
			$data = array(
				'transaction_id' => $str,
				'order_id' => $orderid,
				'cust_id' => $cusId,
				'count' => $query->num_rows(),
				'subtotal' =>$total,
				'delivery' =>$de,
				'total' =>$total+$de,
				'pay_method'=>$method,
				'address_id'=>$billid
				);
		$this->db->insert_batch('order_item', $data1); 
		$run = $this->db->insert('transaction', $data);
		$this->db->where('cus_id', $cusId);
		$this->db->delete('cus_add_cart');
		if($run)
	    return true;	
		else
		return false;
	}

	public function fetchOrder(){
		$cusId = $_SESSION['logid'];
		$query = $this->db->query("SELECT `order_item`.*, COUNT(*) as 'itemno', `add_product`.`image`  FROM `order_item` INNER join `add_product` on `order_item`.pro_id = `add_product`.`id` WHERE `order_item`.`cust_id`='$cusId' GROUp by `order_item`.`order_id`");
		$run = $query->result_array();
		if($run)
	    return $query->result_array();	
		else
		return false;

	}

	
}
?>