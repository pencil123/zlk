<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

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
		$this->load->helper('url');
	}

	public function index($url_path="default")
	{
		if('default' == $url_path){
			redirect('/','location',301);
		}
		$item_info = $this->Item_model->getItemInfo($url_path);
		if(!$item_info) {
			show_404();
		}
		$item_info->share_addr = '/ticket/'.$url_path;
		$item['details'] = $item_info;
	//	var_dump($item['details']);
		$this->load->view('header');
		$this->load->view('item_message',$item);
		$this->load->view('footer');
	}
}
