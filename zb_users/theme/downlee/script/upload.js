!function(d){var F=$("body");function a(){var a="ajax_upload"+(new Date).getTime(),I=$(this);F.append(`<input type="file" id="${a}" accept="${d.accept}" style="display:none">`);var dY=$("#"+a);F.one("change","#"+a,function(){var F=new FormData;F.append("file",$(this)[0].files[0]);$.ajax({url:ajaxurl+d.src,type:"POST",dataType:"json",data:F,contentType:false,processData:false,xhr:function(){var F=new XMLHttpRequest,a;F.upload.addEventListener("progress",function(F){if(F.lengthComputable){a=Math.floor(F.loaded/F.total*100);d.progress&&d.progress(I,a)}});return F},success:function(F){d.success(I,F)},error:function(F){d.error&&d.error(I,F)}})}),dY.click()}F.on("click",d.click,a)}({src:"downlee_upload",click:".upimgbutton",accept:".jpg,.jpeg,.png,.gif,.bmp,.svg",success:function(d,F){console.log("上传成功，图片链接："+F.url);d.siblings(".uplod_img").attr("value",F.url);d.siblings("img").attr("src",F.url);d.val("选择文件")},error:function(d){alert("上传失败")},progress:function(d,F){d.val("上传进度："+F+"%")}});function aliaslabel(){if(zbp.cookie.get("aliashide")=="1"||$(".introbox").hasClass("aliascur")){zbp.cookie.set("aliashide","0");$(".introbox").removeClass("aliascur")}else{zbp.cookie.set("aliashide","1");$(".introbox").addClass("aliascur")}}if(zbp.cookie.get("aliashide")===null||zbp.cookie.get("aliashide")==1){$(".introbox").addClass("aliascur")}(function(d){d.fn.theiaStickySidebar=function(F){var a={containerSelector:"",additionalMarginTop:0,additionalMarginBottom:0,updateSidebarHeight:true,minWidth:0,disableOnResponsiveLayouts:true,sidebarBehavior:"modern"};F=d.extend(a,F);F.additionalMarginTop=parseInt(F.additionalMarginTop)||0;F.additionalMarginBottom=parseInt(F.additionalMarginBottom)||0;I(F,this);function I(F,a){var I=dY(F,a);if(!I){console.log("TST: Body width smaller than options.minWidth. Init is delayed.");d(document).scroll(function(F,a){return function(I){var e=dY(F,a);if(e){d(this).unbind(I)}}}(F,a));d(window).resize(function(F,a){return function(I){var e=dY(F,a);if(e){d(this).unbind(I)}}}(F,a))}}function dY(F,a){if(F.initialized===true){return true}if(d("body").width()<F.minWidth){return false}e(F,a);return true}function e(F,a){F.initialized=true;d("head").append(d('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));a.each(function(){var a={};a.sidebar=d(this);a.options=F||{};a.container=d(a.options.containerSelector);if(a.container.length==0){a.container=a.sidebar.parent()}a.sidebar.parents().css("-webkit-transform","none");a.sidebar.css({position:"relative",overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"});a.stickySidebar=a.sidebar.find(".theiaStickySidebar");if(a.stickySidebar.length==0){var I=/(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;a.sidebar.find("script").filter(function(d,F){return F.type.length===0||F.type.match(I)}).remove();a.stickySidebar=d("<div>").addClass("theiaStickySidebar").append(a.sidebar.children());a.sidebar.append(a.stickySidebar)}a.marginTop=parseInt(a.sidebar.css("margin-top"));a.marginBottom=parseInt(a.sidebar.css("margin-bottom"));a.paddingTop=parseInt(a.sidebar.css("padding-top"));a.paddingBottom=parseInt(a.sidebar.css("padding-bottom"));var dY=a.stickySidebar.offset().top;var e=a.stickySidebar.outerHeight();a.stickySidebar.css("padding-top",0);a.stickySidebar.css("padding-bottom",0);dY-=a.stickySidebar.offset().top;e=a.stickySidebar.outerHeight()-e-dY;if(dY==0){a.stickySidebar.css("padding-top",0);a.stickySidebarPaddingTop=0}else{a.stickySidebarPaddingTop=0}if(e==0){a.stickySidebar.css("padding-bottom",0);a.stickySidebarPaddingBottom=0}else{a.stickySidebarPaddingBottom=0}a.previousScrollTop=null;a.fixedScrollTop=0;O();a.onScroll=function(a){if(!a.stickySidebar.is(":visible")){return}if(d("body").width()<a.options.minWidth){O();return}if(a.options.disableOnResponsiveLayouts){var I=a.sidebar.outerWidth(a.sidebar.css("float")=="none");if(I+50>a.container.width()){O();return}}var dY=d(document).scrollTop();var e="static";if(dY>=a.container.offset().top+(a.paddingTop+a.marginTop-a.options.additionalMarginTop)){var X=a.paddingTop+a.marginTop+F.additionalMarginTop;var c=a.paddingBottom+a.marginBottom+F.additionalMarginBottom;var K=a.container.offset().top;var gD=a.container.offset().top+g(a.container);var dK=0+F.additionalMarginTop;var ci;var b=a.stickySidebar.outerHeight()+X+c<d(window).height();if(b){ci=dK+a.stickySidebar.outerHeight()}else{ci=d(window).height()-a.marginBottom-a.paddingBottom-F.additionalMarginBottom}var J=K-dY+a.paddingTop+a.marginTop;var bc=gD-dY-a.paddingBottom-a.marginBottom;var ed=a.stickySidebar.offset().top-dY;var dc=a.previousScrollTop-dY;if(a.stickySidebar.css("position")=="fixed"){if(a.options.sidebarBehavior=="modern"){ed+=dc}}if(a.options.sidebarBehavior=="stick-to-top"){ed=F.additionalMarginTop}if(a.options.sidebarBehavior=="stick-to-bottom"){ed=ci-a.stickySidebar.outerHeight()}if(dc>0){ed=Math.min(ed,dK)}else{ed=Math.max(ed,ci-a.stickySidebar.outerHeight())}ed=Math.max(ed,J);ed=Math.min(ed,bc-a.stickySidebar.outerHeight());var h=a.container.height()==a.stickySidebar.outerHeight();if(!h&&ed==dK){e="fixed"}else if(!h&&ed==ci-a.stickySidebar.outerHeight()){e="fixed"}else if(dY+ed-a.sidebar.offset().top-a.paddingTop<=F.additionalMarginTop){e="static"}else{e="absolute"}}if(e=="fixed"){a.stickySidebar.css({position:"fixed",width:a.sidebar.width(),top:ed,left:a.sidebar.offset().left+parseInt(a.sidebar.css("padding-left"))})}else if(e=="absolute"){var bcd={};if(a.stickySidebar.css("position")!="absolute"){bcd.position="absolute";bcd.top=dY+ed-a.sidebar.offset().top-a.stickySidebarPaddingTop-a.stickySidebarPaddingBottom}bcd.width=a.sidebar.width();bcd.left="";a.stickySidebar.css(bcd)}else if(e=="static"){O()}if(e!="static"){if(a.options.updateSidebarHeight==true){a.sidebar.css({"min-height":a.stickySidebar.outerHeight()+a.stickySidebar.offset().top-a.sidebar.offset().top+a.paddingBottom})}}a.previousScrollTop=dY};a.onScroll(a);d(document).scroll(function(d){return function(){d.onScroll(d)}}(a));d(window).resize(function(d){return function(){d.stickySidebar.css({position:"static"});d.onScroll(d)}}(a));function O(){a.fixedScrollTop=0;a.sidebar.css({"min-height":"0px"});a.stickySidebar.css({position:"static",width:""})}function g(F){var a=F.height();F.children().each(function(){a=Math.max(a,d(this).height())});return a}})}}})(jQuery);$(document).ready(function(){$("#divMain2 #divEditRight").theiaStickySidebar({additionalMarginTop:20,additionalMarginBottom:10})});