<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->model('Item_model');
		$this->load->model('Cat_model');
	}

	public function index($urlPath){
		$cat_id = $this->Cat_model->getCatId($urlPath);
		// cat_id 是否存在
		if(!$cat_id){
			redirect('/','location',301);
		}
		$data['items'] = $this->Item_model->getItemInfoPage($cat_id);
//		var_dump($data['items']);
		$this->load->view('header');
		$this->load->view('cat/cat_message',$data);
		$this->load->view('footer');
		//redirect('/','location',301);
	}
}
