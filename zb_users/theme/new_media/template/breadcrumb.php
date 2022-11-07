<?php echo'404';die();?>
{if $type=='index'&&$page=='1'}
<div class="breadcrumb container-w"></div>
{else}
<div class="breadcrumb container-w">
    <div id="b" class="cl">
        <div class="fl">
        <a href="{$host}" title="{$name}" target="_blank" class="iconfont icon-home">首页</a> 
        {if $type=='category'||$type=='article'}
            {php}
            $html='';
            function navcate($id){
                global $html;
                $cate = new Category;
                $cate->LoadInfoByID($id);
                $html ='<span class="iconfont icon-right"></span><a href="' .$cate->Url.'" title="' .$cate->Name. '">' .$cate->Name. '</a>'.$html;
                if(($cate->ParentID)>0){navcate($cate->ParentID);}
            }
            
            if($type=='category'){navcate($category->ID);}else{navcate($article->Category->ID);}
            global $html;
            echo $html;
            {/php}
            
            
            {if $type=='article'}<span class="iconfont icon-right">文章详情</span>{/if}
            {elseif $type=='page'}<span class="iconfont icon-right">页面</span>
            {else}
             <span class="iconfont icon-right">{$title}</span>
        {/if}
        
            {if $user.ID>0}
            {if $type=='category'}<a href="{$host}zb_system/admin/category_edit.php?act=CategoryEdt&id={$category.ID}" target="_blank" style="margin-left:10px;" class="iconfont icon-edit">编辑</a>
            {elseif $type=='article'||$type=='page'}<a href="{$host}zb_system/admin/edit.php?act=ArticleEdt&id={$article.ID}" target="_blank" style="margin-left:10px;" class="iconfont icon-edit">编辑</a>
            {elseif $type=='tag'}<a href="{$host}zb_system/admin/tag_edit.php?act=TagEdt&id={$tag.ID}" target="_blank" style="margin-left:10px;" class="iconfont icon-edit">编辑</a>
            {else}
            {/if}
        {/if}
        </div>
    </div>
</div>
{/if}