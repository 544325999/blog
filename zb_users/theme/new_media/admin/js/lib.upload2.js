var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','img_editor');
$("body").append(container);
_editor = UE.getEditor('img_editor');
_editor.ready(function () {
	_editor.hide();
	$(".uploadimg strong").click(function(){		
		object = $(this).parent().find('.uplod_img');
		_editor.getDialog("insertimage").open();
		_editor.addListener('beforeInsertImage', function (t, arg) {
			object.attr("value", arg[0].src);
		});
	});
});

$(function(){
	$(".diyname .mj").click(function(){
		$(".mingjia").slideToggle(100);
		$(".chanpin").slideUp(100);
	})
});

$(function(){
	$(".diyname .cp").click(function(){
		$(".chanpin").slideToggle(100);
		$(".mingjia").slideUp(100);
	})
});