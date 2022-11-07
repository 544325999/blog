<?php if (downlee_is_mobile()) { ?>
<?php if (strlen ( $zbp->Config('downlee')->sycmsadyd ) > 8) { ?><div class="syimgid-box auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<div id="syimgmedia" class="mediad post-syimg-m"><?php  echo $zbp->Config('downlee')->sycmsadyd;  ?></div>
</div><?php } ?>
<?php }else{  ?><?php if (strlen ( $zbp->Config('downlee')->sycmsad ) > 8) { ?><div class="syimgid-box auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<div id="syimgmedia" class="mediad post-syimg-pc"><?php  echo $zbp->Config('downlee')->sycmsad;  ?></div>
</div><?php } ?><?php } ?>