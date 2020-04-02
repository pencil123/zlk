<div class="container">
	<div class="items_cat">
		<?php foreach ($items->result() as $item):?>
			<div class="item_cat">
				<img src="/uploads/<?php echo $item->url_path.'/'.$item->big_img;?>"/>
				<p class="title-area"><?php echo $item->title;?></p>
				<p class="author-area"><?php echo $item->author;?></p>
			</div>
		<?php endforeach;?>
	</div>
</div>
