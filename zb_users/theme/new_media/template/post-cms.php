<?php echo '404';die();?>
<div class="main container-w">
	{if $zbp->Config( 'new_media' )->slider_on=='1'}
	<div class="index-swiper mb20">
		<div class="slide">
			<div class="bd">
				<div class="swiper-container">
					<div class="swiper-wrapper">
					    {if $zbp->Config('new_media')->homeSliderArray} 
    					    {php} if(json_decode($homeSliderArray,true)){ $homeSliderArray = json_decode($homeSliderArray,true);}
    					    {/php} 
    					    {if is_array($homeSliderArray)}
        					    {foreach $homeSliderArray as $slider}
        						<div class="swiper-slide">
        							<a href="{$slider['url']}" target="_blank">
        								<img src="{$slider['img']}" alt="{$slider['title']}">
        								<p>{$slider['title']}</p>
        							</a>
        						</div>
        						{/foreach} 
    						{/if}
						{/if}
						</div>
					<div class="swiper-pagination"></div>
					<!-- Add Arrows 
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>-->
				</div>
			</div>
		</div>
		<!-- 轮播结束 -->
	</div>
	{/if}
	<div class="container-w cl">
		<div class="main-left">
			<div class="art-list cl">
                {foreach $articles as $key=>$article}
                    {$i=$key}
                    {if $article.IsTop}
                        {template:post-istop}
                    {else}
                        {template:post-multi}
                    {/if}                 
    			{/foreach}				
			</div>
			{template:pagebar}
		</div>
		{template:post-sidebar}
	</div>
</div>
<!-- 友链 -->
{if $zbp->Config('new_media')->links_on=='1'}
<div class="container-w">
    <div class="link-to ">
        <div class="wrap">
        	<div class="bar">
        		<p>友情链接</p>
        	</div>
        	<ul class="link-ul">{module:link}</ul>
    	</div>
    </div>
</div>
{/if}