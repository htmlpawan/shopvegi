<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_product extends CI_Model {
	   public function __construct(){
		parent::__construct();
        $this->load->database();  
	} 

//------------------------------Add product Model -------------------------- 
	public function select_dashboard()
	{    
			$sql = "select (select count(*) from add_product) as product_total, (select count(*) from `add-news`) as news_total,  (select count(*) from `add_home_slider`) as slider_total, (select count(*) from `add-blog`) as blog_total";
			$query = $this->db->query($sql);
		return $query->result_array();
	}

public function insert_product($data)
{	    
		$run = $this->db->insert('add_product', $data);
	    if($run)
	    return true;	
		else
		return false; 
}

public function update_product($data, $editid)
{	    
		$this->db->where('id', $editid);
		$run =  $this->db->update('add_product', $data);

	    if($run)
	    return true;	
		else
		return false;  
}


//------------------------------product list Model --------------------------
	public function select_product()
	{    
			$query = $this->db->get('add_product');
			return $query->result_array();
	}
	public function select_photo($id){
	   $this->db->where('productid', $id);
	  $query = $this->db->get('photo');
	  return $query->result_array();
	}
	
	public function select_single($id){
	   $this->db->where('id', $id);
	  $query = $this->db->get('add_product');
	  return $query->result_array();
	  //$query = $this->db->get_where('mytable', array('id' => $id)
	}
	
	public function delete_product($id)
	{
        $this->db->where('id', $id);
        $run =  $this->db->delete('add_product');
		return $run;
	}
	
	public function delete_product_image($id)
	{
        $this->db->where('id', $id);
        $run =  $this->db->delete('photo');
		return $run;
	}
	
	//------------------------------Add slider Model --------------------------
	
	function insert_slider($data){
	 $run = $this->db->insert('add_home_slider', $data);
	 return $run;
	}
	
	public function select_slider()
	{    
			$query = $this->db->get('add_home_slider');
			return $query->result_array();
	}
	
	function changeStatus($id, $status){
	        $this->db->where('id', $id);
			$this->db->set('status', $status);
			$run = $this->db->update('add_home_slider'); 
	      return $run;
	}
	
	public function delete_slider($id)
	{
        $this->db->where('id', $id);
        $run =  $this->db->delete('add_home_slider');
		return $run;
	}
	
	//------------------------------Add News Model --------------------------
	function insert_news($data){
	 $run = $this->db->insert('add-news', $data);
	 return $run;
	}
	//------------------------------News List Model --------------------------
	public function news_list()
	{    
			$query = $this->db->get('add-news');
			return $query->result_array();
	}
	
    public function select_single_news($id){
	   $this->db->where('id', $id);
	  $query = $this->db->get('add-news');
	  return $query->result_array();
	}
	
	public function update_news($data,$editid)
		{	    
		$this->db->where('id', $editid);
		$run =  $this->db->update('add-news', $data);
		return $run;
		}
		
	public function delete_news($id)
	{
        $this->db->where('id', $id);
        $run =  $this->db->delete('add-news');
		return $run;
	}
	
	//------------------------------Add blog Model --------------------------
	function insert_blog($data){
	 $run = $this->db->insert('add-blog', $data);
	 return $run;
	}
	
	//------------------------------blog List Model --------------------------
		public function blog_list()
		{    
				$query = $this->db->get('add-blog');
				return $query->result_array();
		}
		
		public function select_single_blog($id){
		   $this->db->where('id', $id);
		  $query = $this->db->get('add-blog');
		  return $query->result_array();
		}
	
		public function update_blog($data,$editid)
		{	    
		$this->db->where('id', $editid);
		$run =  $this->db->update('add-blog', $data);
		return $run;
		}
		
		public function delete_blog($id)
		{
			$this->db->where('id', $id);
			$run =  $this->db->delete('add-blog');
			return $run;
		}
}
?>