<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $type=='index'}<title>{$zbp->Config('downlee')->webtitle} - {$zbp->Config('downlee')->websubtitle}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}</title>
	<meta name="description" content="{$zbp->Config('downlee')->Description}" />
	<meta name="keywords" content="{$zbp->Config('downlee')->Keywords}" />
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$zbp->Config('downlee')->webtitle}" />
	<meta property="og:image" content="{$zbp->Config('downlee')->weblogo}" />
	<meta property="og:url" content="{$host}" />
	{elseif $type=='category'}<title>{if strlen ( $category->Metas->Categorytitle ) > 2}{$category->Metas->Categorytitle}{else}{$category.Name} - {$zbp->Config('downlee')->webtitle}{/if}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}</title>
	<meta name="Keywords" content="{if strlen ( $category->Metas->Categorykey ) > 2}{$category->Metas->Categorykey}{else}{$category.Name}{/if}">
	<meta name="description" content="{if $category.Intro>'0'}{$category.Intro}{else}关于{$category.Name}分类的相关文章列表{/if}">
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$title}" />
	<meta property="og:image" content="{$zbp->Config('downlee')->weblogo}" />
	<meta property="og:url" content="{php}echo substr($zbp->host,0,-1) . $zbp->currenturl;{/php}" />
	{elseif $type=='tag'}<title>{if strlen ( $tag->Metas->Tagstitle ) > 2}{$tag->Metas->Tagstitle}{else}{$tag.Name} - {$zbp->Config('downlee')->webtitle}{/if}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}</title>
	<meta name="Keywords" content="{if strlen ( $tag->Metas->Tagskey ) > 2}{$tag->Metas->Tagskey}{else}{$tag.Name}{/if}">
	<meta name="description" content="{if $tag.Intro >'0'}{$tag.Intro}{else}关于{$tag.Name}标签的相关文章列表{/if}">
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$title}" />
	<meta property="og:image" content="{$zbp->Config('downlee')->weblogo}" />
	<meta property="og:url" content="{php}echo substr($zbp->host,0,-1) . $zbp->currenturl;{/php}" />
	{elseif $type=='article'}<title>{if strlen ( $article->Metas->ArticleTitle ) > 2}{$article->Metas->ArticleTitle}{else}{$title} - {if ($zbp->Config('downlee')->nocatitle=='0') || ($zbp->Config('downlee')->nocatitle==null)}{$article.Category.Name} - {/if}{$zbp->Config('downlee')->webtitle}{/if}</title>
	{php}$keywords = $article->TagsName;$description = preg_replace('/[\r\n]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),88)).'...');{/php}<meta name="keywords" content="{if strlen ( $article->Metas->Articlekey ) > 0}{$article->Metas->Articlekey}{else}{$keywords}{/if}" />
	<meta name="description" content="{if strlen ( $article->Metas->Articledesc ) > 0}{$article->Metas->Articledesc}{else}{$description}{/if}" />
	<meta name="author" content="{$article.Author.StaticName}">
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$article.Title}" />
	<meta property="og:image" content="{downlee_firstimg($article)}" />
	<meta property="og:url" content="{$article.Url}" />
	<meta property="og:release_date" content="{$article.Time('Y-m-d')}T{$article.Time('H:i:s')}" />
	<meta property="og:updated_time" content="{$article.Time('Update','Y-m-d')}T{$article.Time('Update','H:i:s')}" />
	<meta property="og:article:author" content="{$article.Author.StaticName}"/>
	{elseif $type=='page'}<title>{if strlen ( $article->Metas->ArticleTitle ) > 2}{$article->Metas->ArticleTitle}{else}{$title} - {$zbp->Config('downlee')->webtitle}{/if}</title>
	<meta name="keywords" content="{$title},{$name}" />
	{php}$description = preg_replace('/[\r\n]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),88)).'...');{/php}<meta name="description" content="{$description}" />
	<meta name="author" content="{$article.Author.StaticName}">
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$title}" />
	<meta property="og:image" content="{downlee_firstimg($article)}" />
	<meta property="og:url" content="{$article.Url}" />
	<meta property="og:release_date" content="{$article.Time('Y-m-d')}T{$article.Time('H:i:s')}" />
	<meta property="og:updated_time" content="{$article.Time('Update','Y-m-d')}T{$article.Time('Update','H:i:s')}" />
	<meta property="og:article:author" content="{$article.Author.StaticName}"/>
	{else}<title>{$title} - {$zbp->Config('downlee')->webtitle}</title>
	<meta name="Keywords" content="{$title},{$name}">
	<meta name="description" content="关于{$title}相关的文章分类列表">
	<meta name="author" content="{$zbp.members[1].StaticName}">
	<meta property="og:type" content="{$type}"/>
	<meta property="og:title" content="{$title}" />
	<meta property="og:image" content="{$zbp->Config('downlee')->weblogo}" />
	<meta property="og:url" content="{php}echo substr($zbp->host,0,-1) . $zbp->currenturl;{/php}" />
	{/if}