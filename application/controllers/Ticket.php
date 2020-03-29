<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

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
		$this->load->model('Ticket_model');
		$this->load->model('Item_model');
	}

	public function index($urlPath){
		$data['urlPath'] = $urlPath;
		$this->load->view('header');
		$this->load->view('ticket/ticket_message',$data);
		$this->load->view('footer');
		//redirect('/','location',301);
	}

	public function verify()
	{
		$number = $this->input->post('number');
		$number = trim($number);
		$urlPath = $this->input->post('urlPath');

		if (24 != strlen($number)) {
			echo "下载码错误!";
			return false;
		}
		$numberInfo = $this->Ticket_model->updateNumber($number);

		if (!$numberInfo){
			echo "下载码不存在!";
			return true;
		}elseif ( 2 == $numberInfo){
			echo "下载码已经使用过，已失效！";
			return true;
		}elseif(1 == $numberInfo){
			$download = $this->Item_model->getItemShareAddr($urlPath);
			echo $download;
		}
	}
}
