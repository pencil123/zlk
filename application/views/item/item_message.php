<div id="item">
	<div class="container">
		<div id="route">
			首页 -> 计算机 -> Jenkins2
		</div>

		<div id="item_brief">
			<div id="big_img">
				<img src="/uploads/<?php echo $details->url_path.'/'.$details->big_img?>">
			</div>
			<div id="item_infos">
				<ul>
					<li><strong>标题：</strong><?php echo $details ->title;?></li>
					<li><strong>作者：</strong><?php echo $details ->author;?></li>
					<li><strong>出版社：</strong><?php echo $details ->publisher;?></li>
					<li><strong>关键词：</strong><?php echo $details ->keywords;?></li>
					<li><strong>类别：</strong><?php echo $details ->type;?></li>
				</ul>
				<div id="download_info">
					<a onclick="plsInputCode('<?php echo $details ->url_path;?>');">使用下载码获取下载地址</a>
					<p>所有资源使用下载码进行下载，如果没有下载码可以加右边微信账号加载。</p>
				</div>
			</div>
			<div id="weixin_info">
				<div id="weixin_img">
					<img src="/static/imgs/upweixin.jpg">
				</div>
			</div>
		</div>

		<div id="context">
				<a class="context_title" onclick="switchOne('.context_text','.context_imgs');">文字显示</a>
				<a class="context_title" onclick="switchOne('.context_imgs','.context_text');">图片显示</a>
		</div>

		<div class="context_text">
			<?php echo $details->context;?>
		</div>

		<div class="context_imgs" style="display:none">
			<?php foreach($details->small_imgs['small'] as $smallimg):?>
				<img src="/uploads/<?php echo $details->url_path.'/'.$smallimg ;?>" />
			<?php endforeach;?>
		</div>
	</div>

</div>
