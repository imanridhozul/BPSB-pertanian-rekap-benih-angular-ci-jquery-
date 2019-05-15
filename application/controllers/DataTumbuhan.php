<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTumbuhan extends CI_Controller
{
   public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPkl');
			    
		//	 $this->load->library('Excel_generator');
			
		}
	public function index()
	{
		$data['jenis'] = $this->ModelPkl->dataHome();
		$data['title']='Halaman Home';
		$this->load->view('head',$data);
		$this->load->view('row');
		$this->load->view('Homes',$data);
		
		
	}
	public function fl()
	{
		$jenis=$this->uri->segment(3);
		//$data['jenis'] = $this->ModelPkl->getDataByJenis();
		$data['title']='Data ||'.$jenis;
		$this->load->view('head',$data);
		$this->load->view('row');
		$this->load->view('detail',$data);
		
		
	}
	
	
	
	

}