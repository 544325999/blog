zbp.plugin.unbind("comment.reply.start","system");zbp.plugin.on("comment.reply.start","downlee",function(b){var M=b;$("#inpRevID").val(M);var bY=$("#comt-respond");var d=$("#cancel-reply");bY.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");$("#AjaxComment"+M).before(bY);bY.addClass("");d.show().click(function(){var b=$("#temp-frm");$("#inpRevID").val(0);if(!b.length||!bY.length)return b.before(bY);b.remove();$(this).hide();bY.removeClass("");$(".commentlist").before(bY);return false});try{$("#txaArticle").focus()}catch(b){}return false});zbp.plugin.on("comment.get","downlee",function(b,M){$("#com_pagination a").html("Waiting...");$("#cancel-reply").click()});zbp.plugin.on("comment.got","downlee",function(){UBBFace();$("#cancel-reply").click()});zbp.plugin.on("comment.post.success","downlee",function(){$("#cancel-reply").click()});function addNumber(b){document.getElementById("txaArticle").value+=b}if($("#comment-tools,.msgarticle,.comment-content").length){objActive="txaArticle";function InsertText(b,M,bY){if(M==""){return""}var d=document.getElementById(b);if(document.selection){if(d.currPos){if(bY&&d.value==""){d.currPos.text=M}else{d.currPos.text+=M}}else{d.value+=M}}else{if(bY){d.value=d.value.slice(0,d.selectionStart)+M+d.value.slice(d.selectionEnd,d.value.length)}else{d.value=d.value.slice(0,d.selectionStart)+M+d.value.slice(d.selectionStart,d.value.length)}}}function ReplaceText(b,M,bY){var d=document.getElementById(b);var c;if(document.selection&&document.selection.type=="Text"){if(d.currPos){var g=document.selection.createRange();g.text=M+g.text+bY;return""}else{c=M+bY;return c}}else{if(d.selectionStart||d.selectionEnd){c=M+d.value.slice(d.selectionStart,d.selectionEnd)+bY;return c}else{c=M+bY;return c}}}}if($(".face-show").length){$("a.face-show").click(function(){$(".ComtoolsFrame").slideToggle(15)})}function UBBFace(){if($(".msgarticle,#divNewcomm,#divComments").length){$(".msgarticle,#divNewcomm,#divComments").each(function b(){var M=$(this).html();M=M.replace(/\[B\](.*)\[\/B\]/g,"<strong>$1</strong>");M=M.replace(/\[U\](.*)\[\/U\]/g,"<u>$1</u>");M=M.replace(/\[S\](.*)\[\/S\]/g,"<del>$1</del>");M=M.replace(/\[I\](.*)\[\/I\]/g,"<em>$1</em>");M=M.replace(/\[([A-Za-z0-9]*)\]/g,'<img src="'+bloghost+'/zb_users/theme/downlee/include/emotion/$1.png" alt="$1.png">');$(this).html(M)})}}UBBFace();zbp.plugin.on("comment.post.success","downlee",function(b,M,bY,d){$("#cancel-reply").click();UBBFace()});(function(b,M){b(function(){var M=b("#cundang"),bY=b(".al_mon_list.item h3",M),d=b(".al_post_list",M),c=b(".al_post_list:first,.al_mon_list.item:nth-child(2) ul.al_post_list",M);d.hide();c.show();bY.css("cursor","pointer").on("click",function(){b(this).next().slideToggle(0)});var g=function(b,M,bY){if(b>d.length){return}if(M=="up"){d.eq(b).slideUp(bY,function(){g(b+1,M,bY-10<1?0:bY-10)})}else{d.eq(b).slideDown(bY,function(){g(b+1,M,bY-10<1?0:bY-10)})}};b("#al_expand_collapse").on("click",function(M){M.preventDefault();if(b(this).data("s")){b(this).data("s","");g(0,"up",300)}else{b(this).data("s",1);g(0,"down",300)}})})})(jQuery,window);function autotree(){$(document).ready(function(){var b=1,M=$("#listree-ol");$("#listree-bodys").find("h1, h2, h3,h4,h5,h6").each(function(bY){if(""!==$(this).text().trim()){$(this).attr("id","listree-list"+bY).attr("class","listree-list");var d=parseInt($(this)[0].tagName.slice(1));0===bY||d===b?(bY=$('<li><a id="listree-click" href="#listree-list'+bY+'">'+$(this).text()+"</a></li>"),M.append(bY)):d>b?(bY=$('<ul><li><a id="listree-click" href="#listree-list'+bY+'">'+$(this).text()+"</a></li></ul>"),M.append(bY),M=bY):d<b&&(bY=$('<li><a id="listree-click" href="#listree-list'+bY+'">'+$(this).text()+"</a></li>"),1===d?($("#listree-ol").append(bY),M=$("#listree-ol")):(M.parent("ol").append(bY),M=M.parent("ol")));b=d}});$(".listree-btn").click(function(){"目录[+]"==$(".listree-btn").text()?$(".listree-btn").attr("title","收起").text("目录[-]").parent().next().show():$(".listree-btn").attr("title","展开").text("目录[+]").parent().next().hide();return!1});$("a#listree-click").click(function(b){b.preventDefault();$("html, body").animate({scrollTop:$($(this).attr("href")).offset().top-15},800)});1<b&&$(".listree-box").css("display","block")})}autotree();jQuery(document).ready(function(b){var M=b(".listree-list");if(M.length<1)return;var bY=[];function d(){M.each(function(){var M=b(this).offset();bY.push(Math.floor(M.top))})}function c(M){var bY=b("#listree-ol li");var d=b(".listree-list dt");if(bY.length<1)return;var c=bY.outerHeight();if(!bY.eq(M).hasClass("current")){bY.removeClass("current");bY.eq(M).addClass("current");d.animate({top:c*M+(bY.outerHeight()-d.outerHeight())/2+1},50)}}function g(){var b=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0;var d=Math.ceil(b+65);var g=0;for(var F=0;F<bY.length;F++){if(d>=bY[F]){g=F}else{break}}if(g<0)g=0;if(!M.eq(g).hasClass("current")){M.removeClass("current");M.eq(g).addClass("current");c(g)}}d();setTimeout(g,0);b(window).on("scroll",g)});(function(b){b.fn.theiaStickySidebar=function(M){var bY={containerSelector:"",additionalMarginTop:0,additionalMarginBottom:0,updateSidebarHeight:true,minWidth:0,disableOnResponsiveLayouts:true,sidebarBehavior:"modern"};M=b.extend(bY,M);M.additionalMarginTop=parseInt(M.additionalMarginTop)||0;M.additionalMarginBottom=parseInt(M.additionalMarginBottom)||0;d(M,this);function d(M,bY){var d=c(M,bY);if(!d){console.log("TST: Body width smaller than options.minWidth. Init is delayed.");b(document).scroll(function(M,bY){return function(d){var g=c(M,bY);if(g){b(this).unbind(d)}}}(M,bY));b(window).resize(function(M,bY){return function(d){var g=c(M,bY);if(g){b(this).unbind(d)}}}(M,bY))}}function c(M,bY){if(M.initialized===true){return true}if(b("body").width()<M.minWidth){return false}g(M,bY);return true}function g(M,bY){M.initialized=true;b("head").append(b('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));bY.each(function(){var bY={};bY.sidebar=b(this);bY.options=M||{};bY.container=b(bY.options.containerSelector);if(bY.container.length==0){bY.container=bY.sidebar.parent()}bY.sidebar.parents().css("-webkit-transform","none");bY.sidebar.css({position:"relative",overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"});bY.stickySidebar=bY.sidebar.find(".theiaStickySidebar");if(bY.stickySidebar.length==0){var d=/(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;bY.sidebar.find("script").filter(function(b,M){return M.type.length===0||M.type.match(d)}).remove();bY.stickySidebar=b("<div>").addClass("theiaStickySidebar").append(bY.sidebar.children());bY.sidebar.append(bY.stickySidebar)}bY.marginTop=parseInt(bY.sidebar.css("margin-top"));bY.marginBottom=parseInt(bY.sidebar.css("margin-bottom"));bY.paddingTop=parseInt(bY.sidebar.css("padding-top"));bY.paddingBottom=parseInt(bY.sidebar.css("padding-bottom"));var c=bY.stickySidebar.offset().top;var g=bY.stickySidebar.outerHeight();bY.stickySidebar.css("padding-top",0);bY.stickySidebar.css("padding-bottom",0);c-=bY.stickySidebar.offset().top;g=bY.stickySidebar.outerHeight()-g-c;if(c==0){bY.stickySidebar.css("padding-top",0);bY.stickySidebarPaddingTop=0}else{bY.stickySidebarPaddingTop=0}if(g==0){bY.stickySidebar.css("padding-bottom",0);bY.stickySidebarPaddingBottom=0}else{bY.stickySidebarPaddingBottom=0}bY.previousScrollTop=null;bY.fixedScrollTop=0;F();bY.onScroll=function(bY){if(!bY.stickySidebar.is(":visible")){return}if(b("body").width()<bY.options.minWidth){F();return}if(bY.options.disableOnResponsiveLayouts){var d=bY.sidebar.outerWidth(bY.sidebar.css("float")=="none");if(d+50>bY.container.width()){F();return}}var c=b(document).scrollTop();var g="static";if(c>=bY.container.offset().top+(bY.paddingTop+bY.marginTop-bY.options.additionalMarginTop)){var dA=bY.paddingTop+bY.marginTop+M.additionalMarginTop;var cN=bY.paddingBottom+bY.marginBottom+M.additionalMarginBottom;var cd=bY.container.offset().top;var f=bY.container.offset().top+cT(bY.container);var cc=0+M.additionalMarginTop;var O;var cO=bY.stickySidebar.outerHeight()+dA+cN<b(window).height();if(cO){O=cc+bY.stickySidebar.outerHeight()}else{O=b(window).height()-bY.marginBottom-bY.paddingBottom-M.additionalMarginBottom}var fb=cd-c+bY.paddingTop+bY.marginTop;var bM=f-c-bY.paddingBottom-bY.marginBottom;var gZ=bY.stickySidebar.offset().top-c;var a=bY.previousScrollTop-c;if(bY.stickySidebar.css("position")=="fixed"){if(bY.options.sidebarBehavior=="modern"){gZ+=a}}if(bY.options.sidebarBehavior=="stick-to-top"){gZ=M.additionalMarginTop}if(bY.options.sidebarBehavior=="stick-to-bottom"){gZ=O-bY.stickySidebar.outerHeight()}if(a>0){gZ=Math.min(gZ,cc)}else{gZ=Math.max(gZ,O-bY.stickySidebar.outerHeight())}gZ=Math.max(gZ,fb);gZ=Math.min(gZ,bM-bY.stickySidebar.outerHeight());var C=bY.container.height()==bY.stickySidebar.outerHeight();if(!C&&gZ==cc){g="fixed"}else if(!C&&gZ==O-bY.stickySidebar.outerHeight()){g="fixed"}else if(c+gZ-bY.sidebar.offset().top-bY.paddingTop<=M.additionalMarginTop){g="static"}else{g="absolute"}}if(g=="fixed"){bY.stickySidebar.css({position:"fixed",width:bY.sidebar.width(),top:gZ,left:bY.sidebar.offset().left+parseInt(bY.sidebar.css("padding-left"))})}else if(g=="absolute"){var bS={};if(bY.stickySidebar.css("position")!="absolute"){bS.position="absolute";bS.top=c+gZ-bY.sidebar.offset().top-bY.stickySidebarPaddingTop-bY.stickySidebarPaddingBottom}bS.width=bY.sidebar.width();bS.left="";bY.stickySidebar.css(bS)}else if(g=="static"){F()}if(g!="static"){if(bY.options.updateSidebarHeight==true){bY.sidebar.css({"min-height":bY.stickySidebar.outerHeight()+bY.stickySidebar.offset().top-bY.sidebar.offset().top+bY.paddingBottom})}}bY.previousScrollTop=c};bY.onScroll(bY);b(document).scroll(function(b){return function(){b.onScroll(b)}}(bY));b(window).resize(function(b){return function(){b.stickySidebar.css({position:"static"});b.onScroll(b)}}(bY));function F(){bY.fixedScrollTop=0;bY.sidebar.css({"min-height":"0px"});bY.stickySidebar.css({position:"static",width:""})}function cT(M){var bY=M.height();M.children().each(function(){bY=Math.max(bY,b(this).height())});return bY}})}}})(jQuery);$(document).ready(function(){$(".main-content .sidebar").theiaStickySidebar({additionalMarginTop:20,additionalMarginBottom:10})});window["eval"](function(b,M,bY,d,c,g){c=function(b){return(b<62?"":c(window["parseInt"](b/62)))+((b=b%62)>35?window["String"]["fromCharCode"](b+29):b["toString"](36))};if("0"["replace"](0,c)==0){while(bY--)g[c(bY)]=d[bY];d=[function(b){return g[b]||b}];c=function(){return"([3-9df-hj-moqrt-zA-Z]|1\\w)"};bY=1}while(bY--)if(d[bY])b=b["replace"](new window["RegExp"]("\\b"+c(bY)+"\\b","g"),d[bY]);return b}('6(7).S(3(){$("<E T=\'U-V\'><i T=\'icon v-chevron-down\'></i></E>").insertBefore(".F-G");$("#W,#X,#Y,.w:x-y(1),.w:x-y(2)").l("wow");$("#W,#X,#Y,.w:x-y(1),.w:x-y(2)").l("fadeInDown");4 8=$(".8-sousuo,.9");$(".8-sjlogo i.8-Z").g(3(){$(".8-Z").H("on");$("body.home").H("cur");$(".mobile_nav").H("mobile_nav_on")});6(".m .8-I > d,.m .8-I > d ul d").11(3(){6(5).12(".m .U-V").bind("g",3(){$(\'.m .F-G\').h(\'f\');6(5).12().h(3(){j(6(5).13("f")){6(5).l("f");o""}o"f"});6(5).siblings(".m .F-G").slideToggle()})})});6(7).S(3($){$(\'#v-change E\').g(3(){4 J=\'.single-entry p\';4 K=1;4 14=16;4 L=$(J).q(\'15\');4 r=parseFloat(L,10);4 17=L.slice(-2);4 M=$(5).z(\'M\');switch(M){18\'v-dec\':r-=K;19;18\'v-inc\':r+=K;19;default:r=14}$(J).q(\'15\',r+17);o 1a})});$(N).1b(3(){4 a=$(N).scrollTop(),c=$(7).1c(),b=$(N).1c();k=a/(c-b)*100;k=k.toFixed(1);$("#percentageCounter").q({width:k+"%"});70<k&&$("#1e").q({O:"0"});70>k&&$("#1e").q({O:"-66px"})}).trigger("1b");$(3(){4 1f=$(".place a:eq(1)").z("t");4 1g=1h.t;4 s=7.1h;$(".8-I d a").11(3(){j($(5).z("t")==1f||$(5).z("t")==1g){$(5).u(\'d\').h("f")};j(5.t==s.toString().split("#")[0]){$(5).u("d").h("f");$(5).u().u().u("d").h("f");o 1a}})});$("#A").g(3(){j(7.P("A").Q=="1i"){7.P("A").Q="mobile_close"}else{7.P("A").Q="1i"}});$("a.search_btn,i.O-search").g(3(e){j($(".9,.B").13("C")){$(".9,.B").l("C");o}e.stopPropagation();$(".9,.B").h("C");$(".9 D.1j,D#ms").focus()});$(7).g(3(e){4 R=$(\'.9 D.1j,D#ms\');j(!R.is(e.1l)&&R.has(e.1l).length===0){$(".9,.B").l("C")}});console.log("\\n %c \\u8d44\\u6e90\\u4e3b\\u9898 %c https://www.liblog.cn/blog/555.html \\n\\n","color: #1m; 1n: #030307; 1o:1p 0;","1n: #1m; 1o:1p 0;");',[],88,"|||function|var|this|jQuery|document|nav|search_top||||li||active|click|addClass||if|scrollPercent|removeClass|mobile_aside||return||css|fs_css_c||href|parent|font|widget|nth|child|attr|mClick|m_searchform|open|input|span|sub|menu|toggleClass|pills|selector|increment|fs_css|id|window|top|getElementById|className|_con|ready|class|toggle|btn|list1|list2|list3|bar||each|children|hasClass|font_size|fontSize||fs_unit|case|break|false|scroll|height||navigation|surl|surl2|location|mobile_click|text||target|fadfa3|background|padding|5px"["split"]("|"),0,{}));$(document).on("click","#loadmore a:not(.noajx)",function(){var b=$(this);var M=b.attr("href").replace("?ajx=wrap","");$(this).addClass("#loadmore").text("加载中...");$.ajax({url:M,beforeSend:function(){},success:function(b){$(".auto-side .auto-main").append($(b).find(".auto-list"));nextHref=$(b).find(".auto-side .loadmore a").attr("href");$("#loadmore a").removeClass("loading").text("点击加载更多");if(nextHref!=undefined){$("#loadmore").removeClass("loading");$(".auto-side .loadmore a").attr("href",nextHref)}else{$("#loadmore").removeClass("loading");$("#post_over").attr("href","javascript:;").text("没有啦!!!").attr("class","noajx load-more disabled")}},complete:function(){$(".auto-list img").lazyload({placeholder:bloghost+"zb_users/theme/downlee/style/images/grey.gif",failurelimit:30})},error:function(){location.href=M}});return false});jQuery(document).ready(function(b){var M=b(".nav-pills").attr("data-type");b(".nav-pills>li ").each(function(){try{var bY=b(this).attr("id");if("index"==M){if(bY=="nvabar-item-index"){b("#nvabar-item-index").addClass("active")}}else if("category"==M){var d=b(".nav-pills").attr("data-infoid");if(d!=null){var c=d.split(" ");for(var g=0;g<c.length;g++){if(bY=="navbar-category-"+c[g]){b("#navbar-category-"+c[g]+"").addClass("active")}}}}else if("article"==M){var d=b(".nav-pills").attr("data-infoid");if(d!=null){var c=d.split(" ");for(var g=0;g<c.length;g++){if(bY=="navbar-category-"+c[g]){b("#navbar-category-"+c[g]+"").addClass("active")}}}}else if("page"==M){var d=b(".nav-pills").attr("data-infoid");if(d!=null){if(bY=="navbar-page-"+d){b("#navbar-page-"+d+"").addClass("active")}}}else if("tag"==M){var d=b(".nav-pills").attr("data-infoid");if(d!=null){if(bY=="navbar-tag-"+d){b("#navbar-tag-"+d+"").addClass("active")}}}}catch(b){}});b(".nav-pills").delegate("a","click",function(){b(".nav-pills>li").each(function(){b(this).removeClass("active")});if(b(this).closest("ul")!=null&&b(this).closest("ul").length!=0){if(b(this).closest("ul").attr("id")=="menu-navigation"){b(this).addClass("active")}else{b(this).closest("ul").closest("li").addClass("active")}}})});$(document).keypress(function(b){var M=$(".button");if(b.ctrlKey&&b.which==13||b.which==10){M.click();document.body.focus();return}if(b.shiftKey&&b.which==13||b.which==10)M.click()});$(function(){$("#backtop").each(function(){$(this).find(".top").click(function(){$("html, body").animate({"scroll-top":0},"fast")});$(".bottom").click(function(){$("html, body").animate({scrollTop:$(".footer").offset().top},800);return false})});var b=false;$(window).scroll(function(){var M=$(window).scrollTop();if(M>500){$("#backtop").data("expanded",true)}else{$("#backtop").data("expanded",false)}if($("#backtop").data("expanded")!=b){b=$("#backtop").data("expanded");if(b){$("#backtop .top").slideDown()}else{$("#backtop .top").slideUp()}}})});$(function(){var b=$(".top-bar");var M=$(document).scrollTop();var bY=$(document);var d=$(".fixed-nav").outerHeight();$(window).scroll(function(){var c=$(document).scrollTop();if(bY.scrollTop()>=30){b.addClass("fixed-nav");$(".navTmp").fadeIn()}else{b.removeClass("fixed-nav fixed-enabled fixed-appear");$(".navTmp").fadeOut()}if(c>d){$(".fixed-nav").addClass("fixed-enabled")}else{$(".fixed-nav").removeClass("fixed-enabled")}if(c>M){$(".fixed-nav").removeClass("fixed-appear")}else{$(".fixed-nav").addClass("fixed-appear")}M=$(document).scrollTop()})});(function(){var b=$(document);var M=$("#divTags ul li");M.each(function(){var b=10;var M=0;var bY=parseInt(Math.random()*(b-M+1)+M);$(this).addClass("divTags"+bY)})})();function getAsideLifeTime(){let b=+new Date;let M=new Date((new Date).toLocaleDateString()).getTime();let bY=(b-M)/1e3/60/60;let d=bY/24*100;$("#dayProgress .title span").html(parseInt(bY));$("#dayProgress .progress .progress-inner").css("width",parseInt(d)+"%");$("#dayProgress .progress .progress-percentage").html(parseInt(d)+"%");let c={0:7,1:1,2:2,3:3,4:4,5:5,6:6};let g=c[(new Date).getDay()];let F=g/7*100;$("#weekProgress .title span").html(g);$("#weekProgress .progress .progress-inner").css("width",parseInt(F)+"%");$("#weekProgress .progress .progress-percentage").html(parseInt(F)+"%");let cT=(new Date).getFullYear();let dA=(new Date).getDate();let cN=(new Date).getMonth()+1;let cd=new Date(cT,cN,0).getDate();let f=dA/cd*100;$("#monthProgress .title span").html(dA);$("#monthProgress .progress .progress-inner").css("width",parseInt(f)+"%");$("#monthProgress .progress .progress-percentage").html(parseInt(f)+"%");let cc=cN/12*100;$("#yearProgress .title span").html(cN);$("#yearProgress .progress .progress-inner").css("width",parseInt(cc)+"%");$("#yearProgress .progress .progress-percentage").html(parseInt(cc)+"%")}getAsideLifeTime();setInterval(()=>{getAsideLifeTime()},1e3);function switchNightMode(){if(zbp.cookie.get("night")=="1"||$("body").hasClass("night")){zbp.cookie.set("night","0");$("body").removeClass("night");console.log("夜间模式关闭")}else{zbp.cookie.set("night","1");$("body").addClass("night");console.log("夜间模式开启")}}function switchcloseside(){if(zbp.cookie.get("sidehide")=="1"||$("body").hasClass("sidehide")){zbp.cookie.set("sidehide","0");$("body").removeClass("sidehide");console.log("关闭侧栏")}else{zbp.cookie.set("sidehide","1");$("body").addClass("sidehide");console.log("开启侧栏")}}!function(b){var M=b.find(".order a"),bY=b.find("[name=order]"),d=b.find("[name=sort]");M.click(function(){var M=$(this).data("type");if(M===bY.val()){d.val(d.val().toString()==="1"?0:1)}else{d.val(""===bY.val()&&!$(this).index()?1:0);bY.val(M)}b.submit();return false})}($("#sort-list"));