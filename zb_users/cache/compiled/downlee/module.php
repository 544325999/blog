<section class="widget<?php if ($zbp->Config('downlee')->gdtxoff=='1') { ?> wow fadeInDown<?php } ?>" id="<?php  echo $module->HtmlID;  ?>">
<?php if ((!$module->IsHideTitle)&&($module->Name)) { ?><h3 class="widget-title"><?php  echo $module->Name;  ?></h3>
<?php } ?><?php if ($module->Type=='div') { ?><div class="widget-box <?php  echo $module->HtmlID;  ?>"><?php  echo $module->Content;  ?></div>
<?php } ?><?php if ($module->Type=='ul') { ?><ul class="widget-box <?php  echo $module->HtmlID;  ?>"><?php  echo $module->Content;  ?></ul>
<?php } ?></section>