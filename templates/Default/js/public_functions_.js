template_dir	= '/templates/Default';
function declOfNum(number, titles)  
{  
    cases = [2, 0, 1, 1, 1, 2];  
    return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
}  
function intval( mixed_var, base ) {
	var tmp;

	if( typeof( mixed_var ) == 'string' ){
		tmp = parseInt(mixed_var);
		if(isNaN(tmp)){
			return 0;
		} else{
			return tmp.toString(base || 10);
		}
	} else if( typeof( mixed_var ) == 'number' ){
		return Math.floor(mixed_var);
	} else{
		return 0;
	}
}

var w = {
	exit: function(){
		var newcnt = config.cnt_sb-1;
		config.cnt_sb = newcnt;
		$("#members_count").html(newcnt+' '+declOfNum(newcnt, ['подписчик', 'подписчика', 'подписчиков']) );
	    if(config.mode == 0){
		if(newcnt < 0 || newcnt == 0){
		 if($("#no_subc").length == 1){
		  $("#no_subc").show(); 
		 }else{
			 $("#body_page_cont").append('<div id="no_subc"><center style="color: rgb(102, 102, 102); margin-top: 40px;">Подписчики отсутствуют</center></div>');
		 }
		}
		}
		var str = $('#community_count_state1').val();
		$('.community_widget_bottom').html('<a id="join_community" onclick="w.login();" class="join_community  color3_bg clear_fix">Подписаться на новости</a>');
		$.post('/index.php?go=groups&act=exit', {id: config.id});
		$('#this_us').animate({'margin-left': -99}, 600);
	},
	login: function(){
		if(config.mode == 0){
		 $("#no_subc").hide(); 
		}
	
		var newcnt = config.cnt_sb+1;
		config.cnt_sb = newcnt;
		$("#members_count").html(newcnt+' '+declOfNum(newcnt, ['подписчик', 'подписчика', 'подписчиков']) );
		$('.community_widget_bottom').html('<a id="join_community" onclick="w.exit();" class="join_community  clear_fix color4_bg color2 community_checked">Отписаться от новостей</a>');
		$.post('/index.php?go=groups&act=login', {id: config.id});
		$('#this_us').animate({'margin-left': 0}, 600);
	},
	open_p: function(){
       window.open('http://'+location.hostname+'/public'+config.id, '_blank');
	},
}
var wall = {
	load: function(){
		var cnt = $("#wall_load_c").val();
		$.get( "/index.php?go=pubwidget&public_id="+config.id+"&wall_load=1&cnt=3", {cnt: cnt}, function( data ) {
		var wall_load_records = JSON.parse(JSON.stringify(data));
		if(wall_load_records.records != null){ 
		  $("#more_wall").remove();
		  if(wall_load_records.last == 0){
		   var btn_l = '<a style="display: block; text-align: center; padding: 5px 6px 7px; background: rgb(227, 233, 239) none repeat scroll 0% 0%; color: rgb(106, 120, 138);" id="more_wall" class="noselect" onclick="wall.load();"><span>Показать следующие</span></a>';
		  }else{
			  var btn_l = '';
		  }
		  $("#page_wall_posts").append(wall_load_records.records+btn_l);
		  $("#wall_load_c").val(parseInt(cnt) + 1);
		 
		}else{
			$("#more_wall").remove();
		}
        });	
	}
}
var Votes = {
	AddInp: function(){
		$('#answerNum').val(parseInt($('#answerNum').val())+1);
		$('#addAnswerInp').append('<div id="div_inp_answr_'+$('#answerNum').val()+'"><div class="texta">&nbsp;</div><input type="text" id="vote_answer_'+$('#answerNum').val()+'" class="inpst vote_answer" maxlength="80" value="" style="width:355px;margin-left:5px" /><div class="mgclr"></div></div>');
		if($('#answerNum').val() == 10) $('#addNewAnswer').html('добавить');
		if($('#answerNum').val() > 2) $('#addDelAnswer').html('<a class="cursor_pointer" onClick="Votes.DelInp()">удалить</a>');
		$('#vote_answer_'+$('#answerNum').val()).focus();
	},
	DelInp: function(id){
		if($('#answerNum').val() > 2){
			$('#answerNum').val(parseInt($('#answerNum').val())-1);
			$('#div_inp_answr_'+$('.vote_answer:last').attr('id').replace('vote_answer_', '')).remove();
			$('#addNewAnswer').html('<a class="cursor_pointer" onClick="Votes.AddInp()">добавить</a>');
		}
		if($('#answerNum').val() == 2) $('#addDelAnswer').html('удалить');
	},
	RemoveForAttach: function(){
		$('#vaLattach_files').val($('#vaLattach_files').val().replace('vote|start||', ''));
		$('.js_titleRemove').remove();
		$('#attach_block_vote').hide();
		$('#vote_title, #vote_answer_1, #vote_answer_2').val('');
		$('#addNewAnswer').html('<a class="cursor_pointer" onClick="Votes.AddInp()">добавить</a>');
		$('#addDelAnswer').html('удалить');
		$('#attatch_vote_title').text('');
		$('#answerNum').val('2');
		for(i = 2; i <= 10; i++)
			$('#div_inp_answr_'+i).remove();
	},
	Send: function(answer_id, vote_id){
		$('#answer_load'+answer_id).append('<img src="'+template_dir+'/images/loading_mini.gif" style="margin-left:5px" />');
		for(i = 0; i <= 10; i++)
			$('#wall_vote_oneanswe'+i).attr('onClick', '');
		$.post('/index.php?go=votes', {vote_id: vote_id, answer_id: answer_id}, function(d){
			$('#result_vote_block'+vote_id).html(d);
		});
	}
}

//AUDIO
var audio = {
	stopAll: function(){
        var id_play_o = $('#play_o').val();
        if(!id_play_o){
            return false;
        }else{
			$(".player"+id_play_o).removeClass("playing");
			document.getElementById('player'+id_play_o).pause();
		}
   },
   play: function(id){
	   if($(".player"+id).hasClass("playing")){
	    $(".player"+id).removeClass("playing");
	    document.getElementById('player'+id).pause();
	   }else{
		audio.stopAll();
		clearInterval(interval_audio);
	    $(".player"+id).addClass("playing");
	    document.getElementById('player'+id).play();
		document.getElementById('player'+id).volume=0.7;
		var interval_audio = setInterval('var id = \''+id+'\'; var proc = document.getElementById(\'player\'+id).currentTime/document.getElementById(\'player\'+id).duration*100; if(proc == 100){clearInterval(interval_audio);$(".player"+id).removeClass("playing");} ', 1000);
		$('#play_o').val(id);
	   }
	   
   }
}
