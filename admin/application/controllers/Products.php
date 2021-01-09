<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

 public function __construct(){
		parent::__construct();
		$this->load->model('add_product');
	} 

//------------------------------------------Add product controller-------------------------------	 
	public function index()
	{
		$this->load->view('add-products');
    }

	public function validation_product()
	{
		$editid = $this->input->POST('editid');
		
		$imgData = array();	
		   $filesCount = count($_FILES['userfile']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
                $_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['userfile']['error'][$i];
                $_FILES['file']['size']     = $_FILES['userfile']['size'][$i];
                
                // File upload configuration
                $uploadPath = './uploads/products/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					$imgData[] = $fileData['file_name'];
                }
            }
		
		if($editid)
		{
			$slug_url = $this->php_slug($this->input->POST('title'));
			$data = array(
			'title' => $this->input->POST('title'),
			'price' => $this->input->POST('price'),
			'discount_price' => $this->input->POST('discount_price'), 
			'weight' => $this->input->POST('weight'), 
			'quantity' => $this->input->POST('quantity'), 
			'description' => $this->input->POST('description'),
			'slug_url'=>$slug_url
			);
			

			if(isset($_FILES["product_img"]['name']) && !empty($_FILES["product_img"]['name'])  )
			{
				$img = $this->do_uploadpdf();
				$data['image']= $img;
			}
			
			$run = $this->add_product->update_product($data, $editid);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Product Updated Successfully.'); 
			redirect(base_url('products/productlist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Updated error.'); 
			  redirect(base_url('products/productlist'));
			}
		}	
		else
		{
		$img = $this->do_uploadpdf();
		$slug_url = $this->php_slug($this->input->POST('title'));
		$data = array(
			'title' => $this->input->POST('title'),
			'price' => $this->input->POST('price'),
			'discount_price' => $this->input->POST('discount_price'), 
			'weight' => $this->input->POST('weight'), 
			'quantity' => $this->input->POST('quantity'), 
			'image' => $img, 
			'description' => $this->input->POST('description'),
			'slug_url'=>$slug_url
			);
		  $run = $this->add_product->insert_product($data);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Product Added Successfully.'); 
			redirect(base_url('products/productlist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Product error.'); 
			  redirect(base_url('products/productlist'));
			}
		}
		
		
	}
	
	function php_slug($string)  
	 {  
		  $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));  
		  return $slug;  
	 }
	
	function do_uploadpdf()
	{
		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size']	= '1500';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$new_name = time().$_FILES["product_img"]['name'];
        $config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('product_img'))
		{
		$error = array('error' => $this->upload->display_errors());
        $error = array('error' => $this->upload->display_errors());
		return $error['error'];
		}
		else
		{
		$data = $this->upload->data();
		return $data['file_name'];
		}
	} 
	
	
	function do_uploadBrochurePdf()
	{
		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '1500';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$new_name = time().$_FILES["brochurepdf"]['name'];
        $config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('brochurepdf'))
		{
		$error = array('error' => $this->upload->display_errors());
        $error = array('error' => $this->upload->display_errors());
		return $error['error'];
		}
		else
		{
		$data = $this->upload->data();
		return $data['file_name'];
		}
	} 
	
	

//------------------------------------------product list controller-------------------------------
	public function productlist()
	{
		$data['alldata'] = $this->add_product->select_product();
		$this->load->view('product-list', $data);
    }
	
	public function editproduct($id)
	{
     $data[0] =  $this->add_product->select_single($id);
	 $data['row']  = $data[0][0];
		$this->load->view('add-products',$data);
    }
   
   public function showImage()
   {
	 $data['dataphoto'] =  $this->add_product->select_photo($_POST['productid']);
	 echo json_encode($data, true);
   } 
   
   public function deleteImage($id)
   {
	        $run = $this->add_product->delete_product_image($id);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Images Deleted Successfully.'); 
			redirect(base_url('products/productlist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Image delete error.'); 
			  redirect(base_url('products/productlist'));
			}
   }
   
   public function deleteproduct($id)
   {
	        $run = $this->add_product->delete_product($id);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Product Deleted Successfully.'); 
			redirect(base_url('products/productlist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Product delete error.'); 
			  redirect(base_url('products/productlist'));
			}
   }

//------------------------------Add slider controller --------------------------   
	public function slider(){
	   $this->load->view('add-slider');
	}
	
	public function validation_slider()
	{
		 $do_uploadSlider = $this->do_uploadSlider();
		 $data = array(
			'title' => $this->input->POST('title'),
			'image' => $do_uploadSlider
			); 
			
			$run = $this->add_product->insert_slider($data);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Slider Added Successfully.'); 
			redirect(base_url('products/sliderlist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Slider error.'); 
			  redirect(base_url('products/sliderlist'));
			}
			
	
	}
	
	function do_uploadSlider()
	{
		$config['upload_path'] = './uploads/banner/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size']	= '1500';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$new_name = $_FILES["banner"]['name'];
        $config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('banner'))
		{
		$error = array('error' => $this->upload->display_errors());
        $error = array('error' => $this->upload->display_errors());
		return $error['error'];
		}
		else
		{
		$data = $this->upload->data();
		return $data['file_name'];
		}
	}

	public function sliderlist()
	{   
		$data['alldata'] = $this->add_product->select_slider();
		$this->load->view('slider-list', $data);
    }
    
	 public function deleteslider($id)
	   {
				$run = $this->add_product->delete_slider($id);
				if($run)
				{
				$this->session->set_flashdata('messageadd','Product Deleted Successfully.'); 
				redirect(base_url('products/sliderlist'));
				}
				else{
				 $this->session->set_flashdata('messageadd','Product delete error.'); 
				  redirect(base_url('products/sliderlist'));
				}
	   }
	   
	   public function setStatus()
	   {
			$id =  $this->input->POST('id');
			$status = $this->input->POST('status');	
			$run = $this->add_product->changeStatus($id, $status);
			 if($run)
				echo 1;	
				else
				echo 0;
	   }
	//------------------------------------------Add News controller-------------------------------	   
	 
    public function news()
	{
		$this->load->view("add-news");
	}
	public function validation_news()
	{	
       $editid = $this->input->POST('editid');
        if($editid)
		{
			//echo $editid;
			$data = array(
			'title' => $this->input->POST('title'),
			'news_date' => $this->input->POST('date'),
			'description' => $this->input->POST('description'), 
			'meta_tag_title' => $this->input->POST('metatagtitle'),
			'meta_tag_description' => $this->input->POST('metatagdescription'), 
			'meta_tag_keyword' => $this->input->POST('metatagkeyword')
			);
			
			if(isset($_FILES["newsimg"]['name']) && !empty($_FILES["newsimg"]['name']))
			{
				$image = $this->do_uploadimage();
				$data['image']= $image;
			}
			
			$run = $this->add_product->update_news($data,$editid);
			if($run)
			{
			$this->session->set_flashdata('messageadd','News Updated Successfully.'); 
			redirect(base_url('products/newslist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','News error.'); 
			  redirect(base_url('products/newslist'));
			}
		}else{  	
		$image = $this->do_uploadimage();
		 $data = array(
			'title' => $this->input->POST('title'),
			'news_date' => $this->input->POST('date'),
			'image' => $image,  
			'description' => $this->input->POST('description'), 
			'meta_tag_title' => $this->input->POST('metatagtitle'),
			'meta_tag_description' => $this->input->POST('metatagdescription'), 
			'meta_tag_keyword' => $this->input->POST('metatagkeyword')
			);
		  $run = $this->add_product->insert_news($data);
			if($run)
			{
			$this->session->set_flashdata('messageadd','News Added Successfully.'); 
			redirect(base_url('products/newslist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','News error.'); 
			  redirect(base_url('products/newslist'));
			}
		}	
			
	}
	
	function do_uploadimage()
	{
		$config['upload_path'] = './uploads/news/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size']	= '1500';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$new_name = $_FILES["newsimg"]['name'];
        $config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('newsimg'))
		{
		$error = array('error' => $this->upload->display_errors());
        $error = array('error' => $this->upload->display_errors());
		return $error['error'];
		}
		else
		{
		$data = $this->upload->data();
		return $data['file_name'];
		}
	}
    //------------------------------------------News list controller-------------------------------
    public function newslist()
	{
		$data['alldata'] = $this->add_product->news_list();
		$this->load->view("news-list", $data);
		
	}	
	
	public function editnews($id)
	{
     $data[0] =  $this->add_product->select_single_news($id);
	 $data['row']  = $data[0][0];
		$this->load->view('add-news',$data);
    }
	
	public function deletenews($id)
	   {
				$run = $this->add_product->delete_news($id);
				if($run)
				{
				$this->session->set_flashdata('messageadd','News Deleted Successfully.'); 
				redirect(base_url('products/newslist'));
				}
				else{
				 $this->session->set_flashdata('messageadd','News delete error.'); 
				  redirect(base_url('products/newslist'));
				}
	   }
	   
	   
	//------------------------------------------Add Blog controller-------------------------------	   
	 
    public function blog()
	{
		$this->load->view("add-blog");
	}
	public function validation_blog()
	{	
       $editid = $this->input->POST('editid');
        if($editid)
		{
			//echo $editid;
			$data = array(
			'title' => $this->input->POST('title'),
			'blog_date' => $this->input->POST('date'),
			'description' => $this->input->POST('description'), 
			'meta_tag_title' => $this->input->POST('metatagtitle'),
			'meta_tag_description' => $this->input->POST('metatagdescription'), 
			'meta_tag_keyword' => $this->input->POST('metatagkeyword')
			);
			
			if(isset($_FILES["newsimg"]['name']) && !empty($_FILES["newsimg"]['name']))
			{
				$image = $this->do_uploadimageblogs();
				$data['image']= $image;
			}
			
			$run = $this->add_product->update_blog($data,$editid);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Blog Updated Successfully.'); 
			redirect(base_url('products/bloglist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Blog error.'); 
			  redirect(base_url('products/bloglist'));
			}
		}else{  	
		$image = $this->do_uploadimageblogs();
		 $data = array(
			'title' => $this->input->POST('title'),
			'blog_date' => $this->input->POST('date'),
			'image' => $image,  
			'description' => $this->input->POST('description'), 
			'meta_tag_title' => $this->input->POST('metatagtitle'),
			'meta_tag_description' => $this->input->POST('metatagdescription'), 
			'meta_tag_keyword' => $this->input->POST('metatagkeyword')
			);
		    $run = $this->add_product->insert_blog($data);
			if($run)
			{
			$this->session->set_flashdata('messageadd','Blog Added Successfully.'); 
			redirect(base_url('products/bloglist'));
			}
			else{
			 $this->session->set_flashdata('messageadd','Blog error.'); 
			  redirect(base_url('products/bloglist'));
			}
		}	
			
	}
	
	function do_uploadimageblogs()
	{
		$config['upload_path'] = './uploads/blogs/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size']	= '1500';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$new_name = $_FILES["blogimg"]['name'];
        $config['file_name'] = $new_name;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('blogimg'))
		{
		$error = array('error' => $this->upload->display_errors());
        $error = array('error' => $this->upload->display_errors());
		return $error['error'];
		}
		else
		{
		$data = $this->upload->data();
		return $data['file_name'];
		}
	}   
	
	//------------------------------------------blog list controller-------------------------------
    public function bloglist()
	{
		$data['alldata'] = $this->add_product->blog_list();
		$this->load->view("blog-list", $data);	
	}	
	
	public function editblog($id)
	{
     $data[0] =  $this->add_product->select_single_blog($id);
	 $data['row']  = $data[0][0];
	 $this->load->view('add-blog',$data); 
    }
	
	public function deleteblog($id)
	   {
				$run = $this->add_product->delete_blog($id);
				if($run)
				{
				$this->session->set_flashdata('messageadd','Blog Deleted Successfully.'); 
				redirect(base_url('products/bloglist'));
				}
				else{
				 $this->session->set_flashdata('messageadd','Blog delete error.'); 
				  redirect(base_url('products/bloglist'));
				}
	   }
}