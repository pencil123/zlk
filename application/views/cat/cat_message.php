<div>
<table>
	<?php foreach ($items->result() as $item):?>
	<tr><th><?php echo $item->url_path ?></th><th><?php echo $item->title?></th><th><?php echo $item->author?></th><th><?php echo $item->big_img?></th></tr>
	<?php endforeach;?>
</table>
</div>
