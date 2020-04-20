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
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index($urlPath="default",$page=1){
		$cat_id = $this->Cat_model->getCatId(rawurldecode($urlPath));
		// cat_id 是否存在
		if(!$cat_id){
			redirect('/','location',301);
		}

		$page = ($page ==1 ) ? $page : substr($page,0,-5);
		$limit=20;
		$config['base_url'] = site_url('/cat/'.$urlPath);
		//$config['first_url'] = site_url('/welcome');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Item_model->getItemCount($cat_id);
		$config['suffix'] = '.html';
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		$data['items'] = $this->Item_model->getItemInfoPage($cat_id,($page-1) * $limit);

		// 设置header 信息
		$seoInfos = $this->Cat_model->getCatInfos($cat_id);
		$header['title'] = $seoInfos->title;
        $header['keywords'] = $seoInfos->keywords;
        $header['description'] = $seoInfos->description;
        $header['nav'] = $this->Cat_model->getCatList();

		$this->load->view('header',$header);
		$this->load->view('cat/cat_message',$data);
		$this->load->view('footer');
		//redirect('/','location',301);
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

		return call_user_func_array(array('Cat', 'index'), $params);
	}

}
