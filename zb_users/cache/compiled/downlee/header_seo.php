<?php if ($type=='index') { ?><title><?php  echo $zbp->Config('downlee')->webtitle;  ?> - <?php  echo $zbp->Config('downlee')->websubtitle;  ?><?php if ($page>'1') { ?> - 第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
	<meta name="description" content="<?php  echo $zbp->Config('downlee')->Description;  ?>" />
	<meta name="keywords" content="<?php  echo $zbp->Config('downlee')->Keywords;  ?>" />
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $zbp->Config('downlee')->webtitle;  ?>" />
	<meta property="og:image" content="<?php  echo $zbp->Config('downlee')->weblogo;  ?>" />
	<meta property="og:url" content="<?php  echo $host;  ?>" />
	<?php }elseif($type=='category') {  ?><title><?php if (strlen ( $category->Metas->Categorytitle ) > 2) { ?><?php  echo $category->Metas->Categorytitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?> - <?php  echo $zbp->Config('downlee')->webtitle;  ?><?php } ?><?php if ($page>'1') { ?> - 第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
	<meta name="Keywords" content="<?php if (strlen ( $category->Metas->Categorykey ) > 2) { ?><?php  echo $category->Metas->Categorykey;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?>">
	<meta name="description" content="<?php if ($category->Intro>'0') { ?><?php  echo $category->Intro;  ?><?php }else{  ?>关于<?php  echo $category->Name;  ?>分类的相关文章列表<?php } ?>">
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $title;  ?>" />
	<meta property="og:image" content="<?php  echo $zbp->Config('downlee')->weblogo;  ?>" />
	<meta property="og:url" content="<?php echo substr($zbp->host,0,-1) . $zbp->currenturl; ?>" />
	<?php }elseif($type=='tag') {  ?><title><?php if (strlen ( $tag->Metas->Tagstitle ) > 2) { ?><?php  echo $tag->Metas->Tagstitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?> - <?php  echo $zbp->Config('downlee')->webtitle;  ?><?php } ?><?php if ($page>'1') { ?> - 第<?php  echo $pagebar->PageNow;  ?>页<?php } ?></title>
	<meta name="Keywords" content="<?php if (strlen ( $tag->Metas->Tagskey ) > 2) { ?><?php  echo $tag->Metas->Tagskey;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>">
	<meta name="description" content="<?php if ($tag->Intro >'0') { ?><?php  echo $tag->Intro;  ?><?php }else{  ?>关于<?php  echo $tag->Name;  ?>标签的相关文章列表<?php } ?>">
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $title;  ?>" />
	<meta property="og:image" content="<?php  echo $zbp->Config('downlee')->weblogo;  ?>" />
	<meta property="og:url" content="<?php echo substr($zbp->host,0,-1) . $zbp->currenturl; ?>" />
	<?php }elseif($type=='article') {  ?><title><?php if (strlen ( $article->Metas->ArticleTitle ) > 2) { ?><?php  echo $article->Metas->ArticleTitle;  ?><?php }else{  ?><?php  echo $title;  ?> - <?php if (($zbp->Config('downlee')->nocatitle=='0') || ($zbp->Config('downlee')->nocatitle==null)) { ?><?php  echo $article->Category->Name;  ?> - <?php } ?><?php  echo $zbp->Config('downlee')->webtitle;  ?><?php } ?></title>
	<?php $keywords = $article->TagsName;$description = preg_replace('/[\r\n]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),88)).'...'); ?><meta name="keywords" content="<?php if (strlen ( $article->Metas->Articlekey ) > 0) { ?><?php  echo $article->Metas->Articlekey;  ?><?php }else{  ?><?php  echo $keywords;  ?><?php } ?>" />
	<meta name="description" content="<?php if (strlen ( $article->Metas->Articledesc ) > 0) { ?><?php  echo $article->Metas->Articledesc;  ?><?php }else{  ?><?php  echo $description;  ?><?php } ?>" />
	<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $article->Title;  ?>" />
	<meta property="og:image" content="<?php  echo downlee_firstimg($article);  ?>" />
	<meta property="og:url" content="<?php  echo $article->Url;  ?>" />
	<meta property="og:release_date" content="<?php  echo $article->Time('Y-m-d');  ?>T<?php  echo $article->Time('H:i:s');  ?>" />
	<meta property="og:updated_time" content="<?php  echo $article->Time('Update','Y-m-d');  ?>T<?php  echo $article->Time('Update','H:i:s');  ?>" />
	<meta property="og:article:author" content="<?php  echo $article->Author->StaticName;  ?>"/>
	<?php }elseif($type=='page') {  ?><title><?php if (strlen ( $article->Metas->ArticleTitle ) > 2) { ?><?php  echo $article->Metas->ArticleTitle;  ?><?php }else{  ?><?php  echo $title;  ?> - <?php  echo $zbp->Config('downlee')->webtitle;  ?><?php } ?></title>
	<meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>" />
	<?php $description = preg_replace('/[\r\n]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),88)).'...'); ?><meta name="description" content="<?php  echo $description;  ?>" />
	<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $title;  ?>" />
	<meta property="og:image" content="<?php  echo downlee_firstimg($article);  ?>" />
	<meta property="og:url" content="<?php  echo $article->Url;  ?>" />
	<meta property="og:release_date" content="<?php  echo $article->Time('Y-m-d');  ?>T<?php  echo $article->Time('H:i:s');  ?>" />
	<meta property="og:updated_time" content="<?php  echo $article->Time('Update','Y-m-d');  ?>T<?php  echo $article->Time('Update','H:i:s');  ?>" />
	<meta property="og:article:author" content="<?php  echo $article->Author->StaticName;  ?>"/>
	<?php }else{  ?><title><?php  echo $title;  ?> - <?php  echo $zbp->Config('downlee')->webtitle;  ?></title>
	<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
	<meta name="description" content="关于<?php  echo $title;  ?>相关的文章分类列表">
	<meta name="author" content="<?php  echo $zbp->members[1]->StaticName;  ?>">
	<meta property="og:type" content="<?php  echo $type;  ?>"/>
	<meta property="og:title" content="<?php  echo $title;  ?>" />
	<meta property="og:image" content="<?php  echo $zbp->Config('downlee')->weblogo;  ?>" />
	<meta property="og:url" content="<?php echo substr($zbp->host,0,-1) . $zbp->currenturl; ?>" />
	<?php } ?>