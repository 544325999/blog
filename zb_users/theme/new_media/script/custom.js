//重写了common.js里的同名函数
zbp.plugin.unbind("comment.reply.start","system");zbp.plugin.on("comment.reply.start","neumorphism",function(id){var i=id;$("#inpRevID").val(i);var frm=$('#comt-respond');var cancel=$("#cancel-reply");frm.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");$('#AjaxComment'+i).before(frm);frm.addClass("");cancel.show().click(function(){var temp=$('#temp-frm');$("#inpRevID").val(0);if(!temp.length||!frm.length)return temp.before(frm);temp.remove();$(this).hide();frm.removeClass("");$('.commentlist').before(frm);return false});try{$('#txaArticle').focus()}catch(e){};return false});
//重写GetComments，防止评论框消失
zbp.plugin.on("comment.get","neumorphism",function(logid,page){$('.com-page').html("Waiting...")});zbp.plugin.on("comment.got","neumorphism",function(){UBBFace();$("#cancel-reply").click()});zbp.plugin.on("comment.post.success","neumorphism",function(){$("#cancel-reply").click()});

//快捷回复
$(document).keypress(function(e){var s=$('.button');if(e.ctrlKey&&e.which==13||e.which==10){s.click();document.body.focus();return};if(e.shiftKey&&e.which==13||e.which==10)s.click()});

