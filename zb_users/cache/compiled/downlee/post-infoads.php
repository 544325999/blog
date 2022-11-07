<?php if (downlee_is_mobile()) { ?>
<?php if (strlen ( $zbp->Config('downlee')->sycmsadyd ) > 8) { ?><article class="info-list auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<div id="infomedia" class="mediad post-info-m"><?php  echo $zbp->Config('downlee')->sycmsadyd;  ?></div>
</article><?php } ?>
<?php }else{  ?><?php if (strlen ( $zbp->Config('downlee')->sycmsad ) > 8) { ?><article class="info-list auto-list<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown" data-wow-delay="0.25s<?php } ?>">
	<div id="infomedia" class="mediad post-info-pc"><?php  echo $zbp->Config('downlee')->sycmsad;  ?></div>
</article><?php } ?><?php } ?>