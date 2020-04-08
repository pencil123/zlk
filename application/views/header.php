<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="<?php echo $keywords;?> " />
	<meta name="description" content="<?php echo $description;?>" />
	<link rel="stylesheet" type="text/css" href="/static/css/mains.css" />
</head>
<body>

<div id="site-header">
	<div class="container">
		<div class="header-msg">
			<a href="/" >天空飘来两个字:淡定！</a>
		</div>
		<div class="nav">
      <?php foreach ($nav->result() as $item):?>
        <a href="<?php echo $item->url_path;?>"><p class="active"><?php echo $item->name;?></p></a>
      <?php endforeach;?>
		</div>
	</div>
</div>
