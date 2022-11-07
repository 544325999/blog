<?php if (downlee_is_mobile()) { ?>
<?php if (strlen ( $zbp->Config('downlee')->sycmsadyd ) > 8) { ?><article class="item-body auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>" id="post-<?php  echo $i;  ?>">
	<div id="itemedia" class="mediad post-item-m"><?php  echo $zbp->Config('downlee')->sycmsadyd;  ?></div>
</article><?php } ?>
<?php }else{  ?><?php if (strlen ( $zbp->Config('downlee')->sycmsad ) > 8) { ?><article class="item-body auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>" id="post-<?php  echo $i;  ?>">
	<div id="itemedia" class="mediad post-item-pc"><?php  echo $zbp->Config('downlee')->sycmsad;  ?></div>
</article><?php } ?><?php } ?>