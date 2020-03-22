<?php

class Ticket_model extends CI_Model{
	var $item_table = '';

	function __construct()
	{
		parent::__construct();
		$this->ticket_table = $this->db->dbprefix('ticket');
		$this->load->helper('date');
		$this->sendTime = date('Y-m-d H:i:s');
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

	/**
	 * 1、 判断码是否存在
	 * 2、码是否已经使用
	 * 3、更新下载券，返回下载地址
	 * @param $number
	 * @return false 券不存在
	 * @return 1 券更新
	 * @return 2 券不可用
	 */
	public function updateNumber($number){
		$query=$this->db->get_where($this->ticket_table,array('number'=>$number));
		$numberInfo = $query->row();
	//下载券是否存在
		if (!$numberInfo){
			return false;
		}


		//下载券是否已经使用
		if( $numberInfo->used ){
			return 2;
		}

//		return $this->sendTime;

		//更新下载券信息
		$this->db->reset_query();
		$updateData = array(
			'used' => 1,
			'ip_addr' => '127.0.0.1',
			'send_time' => $this->sendTime,
		);
		$this->db->where('number',$number);
		$this->db->update($this->ticket_table,$updateData);
		return 1;
	}

}
