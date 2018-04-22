var uagent = navigator.userAgent.toLowerCase();
var is_safari = ((uagent.indexOf('safari') != -1) || (navigator.vendor == "Apple Computer, Inc."));
var is_ie = ((uagent.indexOf('msie') != -1) && (!is_opera) && (!is_safari) && (!is_webtv));
var is_ie4 = ((is_ie) && (uagent.indexOf("msie 4.") != -1));
var is_moz = (navigator.product == 'Gecko');
var is_ns = ((uagent.indexOf('compatible') == -1) && (uagent.indexOf('mozilla') != -1) && (!is_opera) && (!is_webtv) && (!is_safari));
var is_ns4 = ((is_ns) && (parseInt(navigator.appVersion) == 4));
var is_opera = (uagent.indexOf('opera') != -1);
var is_kon = (uagent.indexOf('konqueror') != -1);
var is_webtv = (uagent.indexOf('webtv') != -1);
var is_win = ((uagent.indexOf("win") != -1) || (uagent.indexOf("16bit") != -1));
var is_mac = ((uagent.indexOf("mac") != -1) || (navigator.vendor == "Apple Computer, Inc."));
var is_chrome = (uagent.match(/Chrome\/\w+\.\w+/i)); if(is_chrome == 'null' || !is_chrome || is_chrome == 0) is_chrome = '';
var ua_vers = parseInt(navigator.appVersion);
var req_href = location.href;
var vii_interval = false;
var vii_interval_im = false;
var scrollTopForFirefox = 0;
var url_next_id = 1;
var cur = {};




function cancelEvent(event) {
  	event = (event || window.event);
  	if (!event) return false;
  	while (event.originalEvent)  event = event.originalEvent;
  	if (event.preventDefault) event.preventDefault();
  	if (event.stopPropagation) event.stopPropagation();
  	event.cancelBubble = true;
  	event.returnValue = false;
  	return false;
}

function playAudio(){
	var args = arguments;
	//stManager.add(['al/player.js', 'al/player.css'], function(){
		audio_player.prepare.apply(null, args);
	//});
}

$(document).ready(function(){
	var mw = ($('html, body').width()-800)/2;
	if($('.autowr').css('padding-left', mw+'px').css('padding-right', mw+'px')){
		$('body').show();
		history.pushState({link:location.href}, '', location.href);
	}
	$('.update_code').click(function(){
		var rndval = new Date().getTime(); 
		$('#sec_code').html('<img src="/antibot/antibot.php?rndval=' + rndval + '" alt="" title="Показать другой код" width="120" height="50" />');
		return false;
	});
	$(window).scroll(function(){
		if($(document).scrollTop() > ($(window).height()/2))
			$('.scroll_fix_bg').fadeIn(200); 
		else 
			$('.scroll_fix_bg').fadeOut(200); 
	});
});

if(CheckRequestPhoto(req_href)){
	$(document).ready(function(){
		Photo.Show(req_href);
	});
}

if(CheckRequestVideo(req_href)){
	$(document).ready(function(){
		var video_id = req_href.split('_');
		var section = req_href.split('sec=');
		var fuser = req_href.split('wall/fuser=');

		if(fuser[1])
			var close_link = '/u'+fuser[1];
		else
			var close_link = '';
		
		if(section[1]){
			var xSection = section[1].split('/');

			if(xSection[0] == 'news')
				var close_link = 'news';

			if(xSection[0] == 'msg'){
				var msg_id = xSection[1].split('id=');
				var close_link = '/messages/show/'+msg_id[1];
			}
		}
		
		videos.show(video_id[1], req_href, close_link);
	});
}

//AJAX PAGES
window.onload = function(){ 
	window.setTimeout(
		function(){ 
			window.addEventListener(
				"popstate",  
				function(e){
					e.preventDefault(); 

					if(CheckRequestPhoto(e.state.link))
						Photo.Prev(e.state.link);
					else if(CheckRequestVideo(e.state.link))
						videos.prev(e.state.link);
					else
						Page.Prev(e.state.link);
				},  
			false); 
		}, 
	1); 
}
function CheckRequestPhoto(request){
	var pattern = new RegExp(/photo[0-9]/i);
 	return pattern.test(request);
}
function CheckRequestVideo(request){
	var pattern = new RegExp(/video[0-9]/i);
 	return pattern.test(request);
}
function onBodyResize(){
	var mw = ($('html, body').width()-800)/2;
	$('.autowr').css('padding-left', mw+'px').css('padding-right', mw+'px');
}
var Page = {
	Loading: function(f){
		var top_pad = $(window).height()/2-50;
		if(f == 'start'){
			$('#loading').remove();
			$('html, body').append('<div id="loading" style="margin-top:'+top_pad+'px"><div class="loadstyle"></div></div>');
			$('#loading').show();
		}
		if(f == 'stop'){
			$('#loading').remove();
		}
	},
	Go: function(h){
		hh = (location.href).replace('http://'+location.host+'/', '');
		
		if(hh == 'widget_public_create' || hh == 'my_stats' || ((hh).substring(0, 5)) == 'stats'){
		  window.location.href = h;
		  return false;
		}
		
		history.pushState({link:h}, null, h);
		$('.js_titleRemove, .vii_box').remove();
		
		clearInterval(vii_interval);
		clearInterval(vii_interval_im);

		Page.Loading('start');
		$('#page').load(h, {ajax: 'yes'}, function(data){
			Page.Loading('stop');
			$('html, body').scrollTop(0);
			
			$('.ladybug_ant').imgAreaSelect({remove: true});
			
			//Чистим стили AuroResizeWall
			$('#addStyleClass').remove();
			
			//Удаляем кеш фоток, видео, модальных окон
			$('.photo_view, .box_pos, .box_info, .video_view').remove();
			
			//Возвращаем scroll
			$('html, body').css('overflow-y', 'auto');
			
			//Возвращаем дизайн плеера
			if($('.staticPlbg').length){ $('.staticPlbg').css('margin-top', '-500px'); player.reestablish(); }

		}).css('min-height', '0px');
	},
	Prev: function(h){
		clearInterval(vii_interval);
		clearInterval(vii_interval_im);
		
		$('.vii_box').remove();
		
		Page.Loading('start');
		$('#page').load(h, {ajax: 'yes'}, function(data){
			Page.Loading('stop');

			$('html, body').scrollTop(0);
			
			//Чистим стили AuroResizeWall
			$('#addStyleClass').remove();
			
			$('.ladybug_ant').imgAreaSelect({remove: true});
			
			//Удаляем кеш фоток, видео, модальных окон
			$('.photo_view, .box_pos, .box_info, .video_view').remove();
			
			//Возвращаем scroll
			$('html, body').css('overflow-y', 'auto');
			
			//Возвращаем дизайн плеера
			if($('.staticPlbg').length){ $('.staticPlbg').css('margin-top', '-500px'); player.reestablish(); }

		}).css('min-height', '0px');		
	}
}
//PROFILE FUNC
var Profile = {
	miniature: function(){
		Page.Loading('start');
		$.post('/index.php?go=editprofile&act=miniature', function(d){
			Page.Loading('stop');
			if(d == 1) 
				addAllErr('Вы пока что не загрузили фотографию.');
			else {
				if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
				$('html, body').css('overflow-y', 'hidden');
				if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
				$('body').append('<div id="newbox_miniature">'+d+'</div>');
			}
			$(window).keydown(function(event){
				if(event.keyCode == 27) Profile.miniatureClose();
			});
		});
	},
	preview: function(img, selection){
		if(!selection.width || !selection.height) return;
		var scaleX = 100 / selection.width;
		var scaleY = 100 / selection.height;
		var scaleX50 = 50 / selection.width;
		var scaleY50 = 50 / selection.height;
		$('#miniature_crop_100 img').css({
			width: Math.round(scaleX * $('#miniature_crop').width()),
			height: Math.round(scaleY * $('#miniature_crop').height()),
			marginLeft: -Math.round(scaleX * selection.x1),
			marginTop: -Math.round(scaleY * selection.y1)
		});
		$('#miniature_crop_50 img').css({
			width: Math.round(scaleX50 * $('#miniature_crop').width()),
			height: Math.round(scaleY50 * $('#miniature_crop').height()),
			marginLeft: -Math.round(scaleX50 * selection.x1),
			marginTop: -Math.round(scaleY50 * selection.y1)
		});
	},
	miniatureSave: function(){
		var i_left = $('#mi_left').val();
		var i_top = $('#mi_top').val();
		var i_width = $('#mi_width').val();
		var i_height = $('#mi_height').val();
		butloading('miniatureSave', '111', 'disabled', '');
		$.post('/index.php?go=editprofile&act=miniature_save', {i_left: i_left, i_top: i_top, i_width: i_width, i_height: i_height}, function(d){
			if(d == 'err') addAllErr('Ошибка');
			else window.location.href = '/u'+d;
			butloading('miniatureSave', '111', 'enabled', 'Сохранить изменения');
		});
	},
	miniatureClose: function(){
		$('#miniature_crop').imgAreaSelect({remove: true});
		$('#newbox_miniature').remove();
		$('html, body').css('overflow-y', 'auto');
	},
	LoadCity: function(id){
		$('#load_mini').show();
		if(id > 0){
			$('#city').slideDown();
			$('#select_city').load('/index.php?go=loadcity', {country: id});
		} else {
			$('#city').slideUp();
			$('#load_mini').hide();
		}
	},
	//MAIN PHOTOS
	LoadPhoto: function(){
		Page.Loading('start');
		$.get('/index.php?go=editprofile&act=load_photo', function(data){
			Box.Show('photo', 400, lang_title_load_photo, data, lang_box_canсel);
			Page.Loading('stop');
		});
	},
	DelPhoto: function(){
		Box.Show('del_photo', 400, lang_title_del_photo, '<div style="padding:15px;">'+lang_del_photo+'</div>', lang_box_canсel, lang_box_yes, 'Profile.StartDelPhoto(); return false;');
	},
	StartDelPhoto: function(){
		$('#box_loading').show();
		$.get('/index.php?go=editprofile&act=del_photo', function(){
			$('#ava').html('<img src="/templates/Default/images/no_ava.gif" alt="" />');
			$('#del_pho_but').hide();
			Box.Close('del_photo');
			Page.Loading('stop');
		});
	},
	MoreInfo: function(){
		$('#moreInfo').show();
		$('#moreInfoText').text('Скрыть подробную информацию');
		$('#moreInfoLnk').attr('onClick', 'Profile.HideInfo()');
	},
	HideInfo: function(){
		$('#moreInfo').hide();
		$('#moreInfoText').text('Показать подробную информацию');
		$('#moreInfoLnk').attr('onClick', 'Profile.MoreInfo()');
	}
}

//VII BOX
var viiBox = {
	start: function(){
		Page.Loading('start');
	},
	stop: function(){
		Page.Loading('stop');
	},
	win: function(i, d, o, h){
		viiBox.stop();
		if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
		$('html, body').css('overflow-y', 'hidden');
		if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
		$('body').append('<div class="vii_box" id="newbox_miniature'+i+'">'+d+'</div>');
		$(window).keydown(function(event){
			if(event.keyCode == 27) 
				viiBox.clos(i, o, h);
		});
	},
	clos: function(i, o, h){
		$('#newbox_miniature'+i).remove();
		if(o) $('html, body').css('overflow-y', 'auto');
		if(h) history.pushState({link:h}, null, h);
	}
}

//MODAL BOX
var Box = {
	objToStr: function(obj){
		var res = [];
		for(var i in obj) res.push(i + '=' + obj[i]);
		return res.join('&');
	},
	Open: function(opts){
		if(!opts) opts = {};
		if(opts.page){
			Box.Page(
				opts.url,
				opts.data ? Box.objToStr(opts.data) : '',
				opts.name ? opts.name : 'box',
				opts.width ? opts.width : 600,
				opts.title,
				opts.cancel_text ? opts.cancel_text : lang_msg_close,
				opts.func_text ? opts.func_text : '',
				opts.func ? opts.func : '',
				opts.height ? opts.height : 0,
				opts.overflow ? opts.overflow : 0,
				opts.bg_show ? opts.bg_show : 0,
				opts.bg_show_bottom ? opts.bg_show_bottom : 0,
				opts.input_focus ? opts.input_focus : 0,
				opts.cache ? opts.cache : 0,
				opts.cb ? opts.cb : null
			);
		}else{
			Box.Show(
				opts.name ? opts.name : 'box',
				opts.width ? opts.width : 600,
				opts.title,
				opts.content,
				opts.close_text ? opts.close_text : lang_msg_close,
				opts.func_text ? opts.func_text : '',
				opts.func ? opts.func : '',
				opts.height ? opts.height : 0,
				opts.overflow ? opts.overflow : 0,
				opts.bg_show ? opts.bg_show : 0,
				opts.bg_show_bottom ? opts.bg_show_bottom : 0,
				opts.cache ? opts.cache : 0,
				opts.cb ? opts.cb : null
			);
		}
	},
	Page: function(url, data, name, width, title, cancel_text, func_text, func, height, overflow, bg_show, bg_show_bottom, input_focus, cache){
	
		//url - ссылка которую будем загружать
		//data - POST данные
		//name - id окна
		//width - ширина окна
		//title - заголовк окна
		//content - контент окна
		//close_text - текст закрытия
		//func_text - текст который будет выполнять функцию
		//func - функция текста "func_text"
		//height - высота окна
		//overflow - постоянный скролл
		//bg_show - тень внтури окна сверху
		//bg_show_bottom - "1" - с тенью внтури, "0" - без тени внутри
		//input_focus - ИД текстового поля на котором будет фиксация
		//cache - "1" - кешировоть, "0" - не кешировать

		if(cache)
			if(ge('box_'+name)){
				Box.Close(name, cache);
				$('#box_'+name).show();
				$('#box_content_'+name).scrollTop(0);
				if(is_moz && !is_chrome)
					scrollTopForFirefox = $(window).scrollTop();
				
				$('html').css('overflow', 'hidden');

				if(is_moz && !is_chrome)
					$(window).scrollTop(scrollTopForFirefox);
				return false;
			}
		
		Page.Loading('start');
		$.post(url, data, function(html){
			if(!CheckRequestVideo(location.href))
				Box.Close(name, cache);
			Box.Show(name, width, title, html, cancel_text, func_text, func, height, overflow, bg_show, bg_show_bottom, cache);
			Page.Loading('stop');
			if(input_focus)
				$('#'+input_focus).focus();
		});
	},
	Show: function(name, width, title, content, close_text, func_text, func, height, overflow, bg_show, bg_show_bottom, cache){
		
		//name - id окна
		//width - ширина окна
		//title - заголовк окна
		//content - контент окна
		//close_text - текст закрытия
		//func_text - текст который будет выполнять функцию
		//func - функция текста "func_text"
		//height - высота окна
		//overflow - постоянный скролл
		//bg_show - тень внтури окна сверху
		//bg_show_bottom - тень внтури внтури снизу
		//cache - "1" - кешировоть, "0" - не кешировать
		
		if(func_text)
			var func_but = '<div class="button_div fl_r" style="margin-right:10px;" id="box_but"><button onClick="'+func+'" id="box_butt_create">'+func_text+'</button></div>';
		else
			var func_but = '';
			
		var close_but = '<div class="button_div_gray fl_r"><button onClick="Box.Close(\''+name+'\', '+cache+'); return false;">'+close_text+'</button></div>';
		
		var box_loading = '<img id="box_loading" style="display:none;padding-top:8px;padding-left:5px;" src="/templates/Default/images/loading_mini.gif" alt="" />';
		
		if(height)
			var top_pad = ($(window).height()-150-height)/2;
			if(top_pad < 0)
				top_pad = 100;
			
		if(overflow)
			var overflow = 'overflow-y:scroll;';
		else
			var overflow = '';
			
		if(bg_show)
			if(overflow)
				var bg_show = '<div class="bg_show" style="width:'+(width-19)+'px;"></div>';
			else
				var bg_show = '<div class="bg_show" style="width:'+(width-2)+'px;"></div>';
		else
			var bg_show = '';
		
		if(bg_show_bottom)
			if(overflow)
				var bg_show_bottom = '<div class="bg_show_bottom" style="width:'+(width-17)+'px;"></div>';
			else
				var bg_show_bottom = '<div class="bg_show_bottom" style="width:'+(width-2)+'px;"></div>';
		else
			var bg_show_bottom = '';
			
		if(height)
			var sheight = 'height:'+height+'px';
		else
			var sheight = '';

		$('body').append('<div id="modal_box"><div id="box_'+name+'" class="box_pos"><div class="box_bg" style="width:'+width+'px;margin-top:'+top_pad+'px;"><div class="box_title" id="box_title_'+name+'">'+title+'<i class="box_close icon-cancel-3" onClick="Box.Close(\''+name+'\', '+cache+'); return false;"></i></div><div class="box_conetnt" id="box_content_'+name+'" style="'+sheight+';'+overflow+'">'+bg_show+content+'<div class="clear"></div></div>'+bg_show_bottom+'<div class="box_footer"><div id="box_bottom_left_text" class="fl_l">'+box_loading+'</div>'+close_but+func_but+'</div></div></div></div>');
		
		$('#box_'+name).show();

		if(is_moz && !is_chrome)
			scrollTopForFirefox = $(window).scrollTop();
		
		$('html').css('overflow', 'hidden');

		if(is_moz && !is_chrome)
			$(window).scrollTop(scrollTopForFirefox);
		
		$(window).keydown(function(event){
			if(event.keyCode == 27) {
				Box.Close(name, cache);
			} 
		});
	},
	Close: function(name, cache){
	
		if(!cache)
			$('.box_pos').remove();
		else
			$('.box_pos').hide();

		if(CheckRequestVideo(location.href) == false && CheckRequestPhoto(location.href) == false)
			$('html, body').css('overflow-y', 'auto');

                  if(cur.padOpened) Pad.close();
			if(window.Pad&&audio_player.pause) $('#head_audio_lnk').attr('onClick', '');

				audio_player.findTrack();



                 
			
		if(CheckRequestVideo(location.href))
			$('#video_object').show();
			
		if(is_moz && !is_chrome)
			$(window).scrollTop(scrollTopForFirefox);
	},
	GeneralClose: function(){
		$('#modal_box').hide();
	},
	Info: function(bid, title, content, width, tout){
		var top_pad = ($(window).height()-115)/2;
		$('body').append('<div id="'+bid+'" class="box_info"><div class="box_info_margin" style="width: '+width+'px; margin-top: '+top_pad+'px"><b><span>'+title+'</span></b><br /><br />'+content+'</div></div>');
		$(bid).show();
		
		if(!tout)
			var tout = 1400;
		
		setTimeout("Box.InfoClose()", tout);
		
		$(window).keydown(function(event){
			if(event.keyCode == 27) {
				Box.InfoClose();
			} 
		});
	},
	InfoClose: function(){
		$('.box_info').fadeOut();
	}
}
function ge(i){
	return document.getElementById(i);
}
function butloading(i, w, d, t){
	if(d == 'disabled'){
		$('#'+i).html('<div style="width:'+w+'px;text-align:center;"><img src="/templates/Default/images/loading_mini.gif" alt="" /></div>');
		ge(i).disabled = true;
	} else {
		$('#'+i).html(t);
		ge(i).disabled = false;
	}
}

$(document).ready(function(){
	setInterval(function(){
	$("#ads_view").show();
	}, 10000);
	setInterval(function(){
        $.ajax({
            url: "index.php?go=ads&act=ads_view",
            cache: true,
            success: function(html){
                $("#ads_view").html(html);
            }
        });
	}, 10000);
});	function ads_close(){
		$("#ads_view").fadeOut(400);
}

$(document).ready(function(){
 setInterval(function(){
 $("#ads_view1").show();
 }, 17000);
 setInterval(function(){
        $.ajax({
            url: "index.php?go=ads&act=ads_view1",
            cache: true,
            success: function(html){
                $("#ads_view1").html(html);
            }
        });
 }, 17000);
}); function ads_close(){
  $("#ads_view1").fadeOut(400);
}

function textLoad(i){
	$('#'+i).html('<img src="/templates/Default/images/loading_mini.gif" alt="" />').attr('onClick', '').attr('href', '#');
}
function updateNum(i, type){
	if(type)
		$(i).text(parseInt($(i).text())+1);
	else
		$(i).text($(i).text()-1);
}
function setErrorInputMsg(i){
	$("#"+i).css('background', '#ffefef');
	$("#"+i).focus();
	setTimeout("$('#"+i+"').css('background', '#fff').focus()", 700);
}
function addAllErr(text, tim){
	if(!tim)
		var tim = 2500;
		
	$('.privacy_err').remove();
	$('body').append('<div class="privacy_err no_display">'+text+'</div>');
	$('.privacy_err').fadeIn('fast');
	setTimeout("$('.privacy_err').fadeOut('fast')", tim);
}
function langNumric(id, num, text1, text2, text3, text4, text5){
	strlen_num = num.length;
	
	if(num <= 21){
		numres = num;
	} else if(strlen_num == 2){
		parsnum = num.substring(1,2);
		numres = parsnum.replace('0','10');
	} else if(strlen_num == 3){
		parsnum = num.substring(2,3);
		numres = parsnum.replace('0','10');
	} else if(strlen_num == 4){
		parsnum = num.substring(3,4);
		numres = parsnum.replace('0','10');
	} else if(strlen_num == 5){
		parsnum = num.substring(4,5);
		numres = parsnum.replace('0','10');
	}
	
	if(numres <= 0)
		var gram_num_record = text5;
	else if(numres == 1)
		var gram_num_record = text1;
	else if(numres < 5)
		var gram_num_record = text2;
	else if(numres < 21)
		var gram_num_record = text3;
	else if(numres == 21)
		var gram_num_record = text4;
	else
		var gram_num_record = '';
	
	$('#'+id).html(gram_num_record);
}

//LANG
var trsn = {
  box: function(){
    $('.js_titleRemove').remove();
    viiBox.start();
	$.post('/index.php?go=lang', function(d){
	  viiBox.win('vii_lang_box', d);
	});
  }
}

function AntiSpam(act){
  
  Page.Loading('stop');
  
  var max_friends = 4440;
  var max_msg = 446640;
  var max_wall = 5400;
  var max_comm = 24000;
  
  if(act == 'friends'){
    Box.Info('antispam_'+act, 'Информация', 'В день Вы можете отправить не более '+max_friends+' заявок в друзья.', 300, 4000);
  } else if(act == 'messages'){
    Box.Info('antispam_'+act, 'Информация', 'В день Вы можете отправить не более '+max_msg+' сообщений. Если Вы хотите продолжить общение с этим пользователем, то добавьте его в список своих друзей.', 350, 5000);
  } else if(act == 'wall'){
    Box.Info('antispam_'+act, 'Информация', 'В день Вы можете отправить не более '+max_wall+' записей на стену.', 350, 4000);
  } else if(act == 'comm'){
    Box.Info('antispam_'+act, 'Информация', 'В день Вы можете отправить не более '+max_comm+' комментариев.', 350, 4000);
  } else if(act == 'groups'){
    Box.Info('antispam_'+act, 'Информация', 'В день Вы можете создать не более <b>5</b> сообществ.', 350, 3000);
  }
  
}

function delMyPage(){
  Box.Show('del_page', 400, 'Удаление страницы', '<div style="padding:15px;">Вы уверены, что хотите удалить свою страницу ?</div>', lang_box_canсel, 'Да, удалить страницу', 'startDelpage()');
}

lang_wall_attach_smiles	= '<img src="'+uploads_smile_dir+'/1.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/2.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/3.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/4.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/5.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/6.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/7.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/8.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/9.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/10.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/11.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/12.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/13.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/14.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/15.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/1.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/29.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/17.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/18.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/19.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/20.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/21.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/22.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/23.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/24.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/25.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/26.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/27.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/30.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/31.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/32.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/33.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/34.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/35.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/36.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/37.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/38.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/39.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/40.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/41.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/42.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/43.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/44.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/45.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/46.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/47.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/50.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/51.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/52.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/53.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/54.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/55.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/56.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/57.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/58.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/59.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/60.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/61.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/62.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/63.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/64.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/65.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/66.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/67.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/68.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/69.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/70.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/71.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/72.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/73.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/74.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/75.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/76.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/77.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/78.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/79.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/80.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/81.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/82.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/83.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/84.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/85.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/86.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/87.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/88.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/89.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/90.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/91.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/92.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/93.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/94.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/95.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/96.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/97.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/98.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/99.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/100.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/101.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/102.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/103.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/104.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/105.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/106.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/107.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/108.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/109.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/110.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/111.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/112.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/113.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/114.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/115.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/116.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/117.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/118.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/119.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/120.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/121.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/122.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/123.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/124.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/125.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/126.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/127.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/128.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/129.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/130.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/131.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/132.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/133.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/134.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/135.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/136.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/137.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/138.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/139.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/140.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/141.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/142.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/143.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/144.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/145.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/146.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/147.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/148.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/149.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/150.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/151.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/152.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/153.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/154.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/155.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/156.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/157.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/158.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/159.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/160.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/161.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/162.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/163.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/164.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/165.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/166.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/167.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/168.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/169.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/170.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/171.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/172.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/173.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/174.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/175.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/176.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/177.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/178.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/179.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/180.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/181.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/182.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/183.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/184.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/185.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/186.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/187.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/188.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/189.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/190.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/191.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/192.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/193.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/194.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/195.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/196.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/197.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/198.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/199.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/200.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/201.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/202.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/203.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/204.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/205.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/206.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/207.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/300.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/301.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/302.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/303.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/304.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/305.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/306.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/307.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/308.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/309.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/310.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/311.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/312.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/313.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/314.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/315.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/316.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/317.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/318.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/319.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/320.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/321.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/322.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/323.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/324.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/325.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/326.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/327.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/328.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/329.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/330.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/331.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/332.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/333.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/334.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/335.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/336.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/337.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/338.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/339.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/340.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/341.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/342.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/343.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/344.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/345.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/346.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/347.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/348.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/349.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/350.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/351.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" /><img src="'+uploads_smile_dir+'/352.gif" class="wall_attach_smile" onClick="wall.attach_insert(\'smile\', this.src)" />';


function startDelpage(){
  $('#box_loading').fadeIn('fast');
  $('.box_footer .button_div, .box_footer .button_div_gray').fadeOut('fast');
  $.post('/index.php?go=del_my_page', function(){
    window.location.href = '/';
  });
}