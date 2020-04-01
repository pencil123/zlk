<?php

class Item_model extends CI_Model{
	var $item_table = '';

	function __construct()
	{
		parent::__construct();
		$this->item_table = $this->db->dbprefix('item');
	}

	/**
	 * 初始化函数
	 *
	 * 在已经创建数据库的情况下，初始化数据库表信息
	 * 之后接受输入管理员邮箱密码，保存到数据库
	 */
	function init()
	{
		$this->load->database();
		$this->load->library('pagination');
	}

	public function getItemInfo($urlPath='default'){
		$query = $this->db->get_where($this->item_table,array('url_path'=>$urlPath));
		return $query->row();
	}

	public function getItemShareAddr($urlPath='default'){
		$this->db->select('share_addr');
		$query = $this->db->get_where($this->item_table,array('url_path'=>$urlPath));
		return $query->row()->share_addr;
	}

	public function getItemInfoPage($type,$offset='0'){
		//如果是分类页
		$this->db->select('url_path,title,author,big_img');
		$this->db->where('type ',$type);
		$query = $this->db->get($this->item_table,16,$offset);
		return $query;
	}
}
