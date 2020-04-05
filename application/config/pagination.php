<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pagination Config
 *
 * Just applying codeigniter's standard pagination config with twitter
 * bootstrap stylings
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @author Mike Funk
 * @link http://codeigniter.com/user_guide/libraries/pagination.html
 * @email mike@mikefunk.com
 *
 * @file pagination.php
 * @version 1.3.1
 * @date 03/12/2012
 *
 * Copyright (c) 2011
 */
// --------------------------------------------------------------------------

$config['uri_segment'] = 3;
$config['num_links'] = 2;
//$config['page_query_string'] = TRUE;
// $config['use_page_numbers'] = TRUE;
//$config['query_string_segment'] = '';
//$config['use_page_numbers'] = TRUE;
$config['suffix'] = '.html';
$config['attributes'] = array('class' => 'page-link');
/*$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination pagination-new">';
$config['full_tag_close'] = '</ul></nav><!--pagination-->';*/

$config['first_link'] = FALSE;
/*$config['first_link'] = '&laquo; first';
$config['first_tag_open'] = '<li class="prev page">';
$config['first_tag_close'] = '</li>';*/

$config['last_link'] = FALSE;
/*$config['last_link'] = 'Last &raquo;';
$config['last_tag_open'] = '<li class="next page">';
$config['last_tag_close'] = '</li>';*/

$config['next_link'] = '下一页';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '上一页';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active2"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

// $config['display_pages'] = FALSE;
//
$config['anchor_class'] = 'follow_link';

/* End of file pagination.php */
