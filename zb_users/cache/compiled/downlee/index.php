<?php  /* Template Name:首页模板 * Template Type:index-cms */  ?>
<?php if ($type=='index') { ?>
	<?php  include $this->GetTemplate('index-cms');  ?>
<?php }elseif($type=='author' || $type=='date' || $type=='tag') {  ?>
    <?php  include $this->GetTemplate('post-tag');  ?>
<?php }else{  ?>
	<?php  include $this->GetTemplate('catalog');  ?>
<?php } ?>