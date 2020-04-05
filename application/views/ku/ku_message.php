<div class="container">
	<div class="items_cat">
		<?php foreach ($items->result() as $item):?>
			<div class="item_cat">
				<a href="/item/<?php echo $item->url_path?>.html" ><img src="/uploads/<?php echo $item->url_path.'/'.$item->big_img;?>"/></a>
				<a href="/item/<?php echo $item->url_path?>.html" ><p class="title-area"><?php echo $item->title;?></p></a>
				<p class="author-area"><?php echo $item->author;?></p>
			</div>
		<?php endforeach;?>
	</div>
</div>

<nav class="container">
	<ul class="pagination">
		<?=$pagination;?>
	</ul>
</nav ><!-- .pagenav_wrapper -->
