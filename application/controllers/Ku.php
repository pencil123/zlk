<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ku extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->model('Item_model');
		$this->load->model('Cat_model');
		$this->load->library('pagination');
	}


	public function index($page = "1")
	{
		$config['uri_segment'] = 2;
		$page = ($page ==1) ? $page : substr($page,0,-5);
		if(!$page) $page = 1;
		$limit=20;


		$config['base_url'] = site_url('/ku/');
		$config['first_url'] = site_url('/');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Item_model->getItemCount();
		$config['suffix'] = '.html';
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();


		$data['items'] = $this->Item_model->getItemInfoPage('',($page-1) * $limit);
		//$data['items'] = $this->Item_model->getItemInfoPage($cat_id);

		// 设置header 信息
		$header['title'] = "电子资料分享下载 - 资料库";
		$header['keywords'] = "电子书,电子视频,资料分享,资料下载,资料库";
		$header['description'] = "小站收集和分享电子书籍和电子视频资料,欢迎各位加入资料库分享大家庭。";

		$header['nav'] = $this->Cat_model->getCatList();

		$this->load->view('header',$header);
		$this->load->view('ku/ku_message',$data);
		$this->load->view('footer');
	}


	/**
	 * url转移
	 *
	 * 把/cat/pants/50这样的url转到index($cat_slug,$offset = 0)来处理
	 * 好处是只用创建一个function index就可以处理所有的类别/shirts或者/pants等等
	 *
	 * @slug String 类别slug，比如pants
	 * @params array 其他后续参数
	 */
	public function _remap($slug, $params = array())
	{
		//把$slug插入到$param后面，然后$param作为一个整体传递给index()调用
		array_unshift($params,$slug);

		return call_user_func_array(array('Ku', 'index'), $params);
	}
}
