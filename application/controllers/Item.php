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

	private function endsWith($haystack, $needle){
		return $needle === '' || substr_compare($haystack, $needle, -strlen($needle)) === 0;
	}

	public function index($url_path="default")
	{
		if('default' == $url_path){
			redirect('/','location',301);
		}

		$url_path = ($this->endsWith($url_path,'.html')) ? substr($url_path,0,-5):$url_path;


		$item_info = $this->Item_model->getItemInfo($url_path);
		$item_info->small_imgs = json_decode($item_info->small_img,true);
		if(!$item_info) {
			show_404();
		}
		$item_info->share_addr = '/ticket/'.$url_path;
		$item['details'] = $item_info;

		// 设置header 信息
		$header['title'] = $item_info->title."资料下载分享";
		$header['keywords'] = $item_info->keywords;
		$header['description'] = $item_info->description;

		$this->load->view('header',$header);
		$this->load->view('item/item_message',$item);
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

		return call_user_func_array(array('Item', 'index'), $params);
	}
}
