<li class="<?php  echo $id;  ?>-item <?php if (count($item->subs)) { ?>menu-item-has-children<?php } ?>">
  <a href="<?php  echo $item->href;  ?>" target="<?php  echo $item->target;  ?>" title="<?php  echo $item->title;  ?>"><?php  echo $item->ico;  ?><?php  echo $item->text;  ?></a>
  <?php if (count($item->subs)) { ?>
  <ul class="sub-menu">
    <?php  foreach ( $item->subs as $item) { ?><?php  include $this->GetTemplate('lm-module-navbar');  ?><?php }   ?>
  </ul>
  <?php } ?>
</li>