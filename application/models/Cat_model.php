<?php

class Cat_model extends CI_Model{
	var $item_table = '';

	function __construct()
	{
		parent::__construct();
		$this->cat_table = $this->db->dbprefix('cat');
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

	public function getCatId($urlPath='default'){
		$this->db->select('id');
		$query = $this->db->get_where($this->cat_table,array('url_path'=>$urlPath));
		$catId = $query->row();
		if(!$catId){
			return false;
		}else {
			return $catId->id;
		}
	}

	public function getCatInfos($id){
		$query = $this->db->get($this->cat_table,array('id'=>$id));
		return $query->row();
	}

	public function getCatList(){
        $this->db->select('name,url_path');
        $this->db->order_by('id');
	    $query = $this->db->get($this->cat_table);
	    return $query;
    }
}
