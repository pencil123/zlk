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
		//如果是分类页
/*			$where = "cid=cat_id AND cat_slug='".$cat."'";
			$this->db->join($this->cat_table,$where);
			$this->db->where(' end_time > ',$this->today);
			$this->db->order_by('id DESC');
			$query = $this->db->get($this->item_table,$limit,$offset);*/
		$query = $this->db->get_where($this->item_table,array('url_path'=>$urlPath));
		return $query->row();
	}
}
