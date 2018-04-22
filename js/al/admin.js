var ac = {
    ban_adj: function(id){
	var adj = $('#adj').val();
    $.post('/index.php?go=admin&act=ban_adj&id='+id, {adj: adj}, function(data){Page.Go('/id'+id);});	
	},
    delet: function(id){
    $.post('/index.php?go=admin&act=delete_user&id='+id, function(data){Page.Go('/id'+id);});	
	},
    ava_del: function(id){
    $.post('/index.php?go=admin&act=del_ava&id='+id, function(data){Page.Go('/u'+id);});	
	},
	wall_del: function(rid){
		var rec_num = parseInt($('#wall_rec_num').text())-1;
		if(!rec_num)
			rec_num = '';

		$('#wall_record_'+rid).html(lang_wall_del_ok);
		$('#wall_fast_block_'+rid).remove();
		$('#wall_rec_num').text(rec_num);
		myhtml.title_close(rid);
		$.post('/index.php?go=admin&act=del_wall', {rid: rid});
	},

   active: function(id){
    $.post('/index.php?go=admin&act=adelete_user&id='+id, function(data){Page.Go('/id'+id);});	
	},
    verify: function(id){
    $.post('/index.php?go=adminpanel&act=verify_group&id='+id, function(data){Page.Go('/public'+id);});	
	},
    no_verify: function(id){
    $.post('/index.php?go=adminpanel&act=no_verify&id='+id, function(data){Page.Go('/public'+id);});	
	},

    close: function(id){
    $.post('/index.php?go=adminpanel&act=close&id='+id, function(data){Page.Go('/public'+id);});	
	},

    open: function(id){
    $.post('/index.php?go=adminpanel&act=open&id='+id, function(data){Page.Go('/public'+id);});	
	},

    name: function(id){
    $.post('/index.php?go=admin&act=name&id='+id, function(data){Page.Go('/u'+id);});	
	},

    in: function(id){
    $.post('/index.php?go=adminpanel&act=interes&id='+id, function(data){Page.Go('/public'+id);});	
	},

    ga: function(id){
    $.post('/index.php?go=adminpanel&act=game&id='+id, function(data){Page.Go('/public'+id);});	
	},

  new: function(id){
    viiBox.start();
	$.post('/index.php?go=admin&act=newadmin&id='+id, function(d){
	  viiBox.win('new', d);
	});
  },

    nospe: function(id){
    $.post('/index.php?go=adminpanel&act=nospedbar&id='+id, function(data){Page.Go('/public'+id);});	
	},

ban_pub: function(id){
    $.post('/index.php?go=adminpanel&act=ban_public&id='+id, function(data){Page.Go('/public'+id);});	
	},
no_ban: function(id){
    $.post('/index.php?go=adminpanel&act=aban_public&id='+id, function(data){Page.Go('/public'+id);});	
	},
add_rec: function(id){
$.post('/index.php?go=adminpanel&act=recommendation&id='+id, function(data){Box.Info('msg_info', '���������� � �������������', '���������� ������� ��������� � "�������������"' , 400, 2100);}); 
},

del_rec: function(id){
$.post('/index.php?go=adminpanel&act=no_recommendation&id='+id, function(data){Box.Info('msg_info', '���������� ������� � �������������', '���������� ������� ������� � "�������������"' , 400, 2100);}); 
},


yes_admin: function(id){
$.post('/index.php?go=adminpanel&act=admin_user&id='+id, function(data){Box.Info('msg_info', '������������ �������������', '������������ ������ ������������� �����  ��������' , 400, 2100);}); 
},

yes_agent: function(id){
$.post('/index.php?go=adminpanel&act=agent_yes&id='+id, function(data){Box.Info('msg_info', '������������ ����� ���������', '������������ ������� �������� ������� ���������', 400, 2100);}); 
},
moder: function(id){
$.post('/index.php?go=adminpanel&act=moder_user&id='+id, function(data){Box.Info('msg_info', '������������ ��������� �����', '������������ ������� �������� ����������� �����' , 400, 2100);}); 
},

amoder: function(id){
$.post('/index.php?go=adminpanel&act=amoder_user&id='+id, function(data){Box.Info('msg_info', '������������ ������� ���������', '������������ ������� �������� ������� ����������� �����' , 400, 2100);}); 
},
no_admin: function(id){
$.post('/index.php?go=adminpanel&act=no_admin&id='+id, function(data){Box.Info('msg_info', '������������ ������ �����', '������������ ������� ���� � ���������' , 400, 2100);}); 
},

del_publ: function(id){
$.post('/index.php?go=adminpanel&act=delete_public&id='+id, function(data){Box.Info('msg_info', '���������� �������', '���������� ������� �������. �������� ��������, ���� ������ ������������ ���.' , 450, 2100);}); 
},

  active_public: function(id){
    $.post('/index.php?go=adminpanel&act=adelete_public&id='+id, function(data){Page.Go('/public'+id);});	
	},

ban: function(id){
$.post('/index.php?go=adminpanel&act=ban_user&id='+id, function(data){Box.Info('msg_info', '������������ ������������', '������������ ������� ������������.' , 300, 2100);}); 
},

no_rester: function(id){
$.post('/index.php?go=adminpanel&act=norester&id='+id, function(data){Box.Info('msg_info', '���������� ������� �� �������', '���������� ������� ������� �� ������� ������ �������.' , 400, 2100);}); 
},

yes_rester: function(id){
$.post('/index.php?go=adminpanel&act=rester&id='+id, function(data){Box.Info('msg_info', '���������� ������ � ������� ', '���������� ������� ��������� � ������ ������ �������.' , 400, 2100);}); 
},

    aban: function(id){
    $.post('/index.php?go=adminpanel&act=aban_user&id='+id, function(data){Page.Go('/id'+id);});	
	},

balance10: function(id){
    $.post('/index.php?go=adminpanel&act=balance10&id='+id);	
	$('#ubalance').html("���������� 10 �������");
	},
	balancem10:function(id){
    $.post('/index.php?go=adminpanel&act=balancem10&id='+id);	
	$('#ubalance').html("������ 10 �������");
	},
	blockad:function(id){
	 $.post('/index.php?go=adminpanel&act=blockad&id='+id);	
    $('#ubalance').html("������� ���������");
	$('#group_ad').html('<div class="news_ad" style="font-weight:800;">���������� �������������, � ��������� ��������� �������� ������� �����������.</div>');
    $('#ad_block_button').hide();
	}

}

//PANEL COMM
var panel = {
yes: function(id){
$('#addver_load').show();
		$.post('/index.php?go=panel&act=verify_yes&id='+id, function(){
			$('#addver_but').attr('onClick', 'onClick="panel.no('+id+'); return false');
			$('#text_add_ver').text('�������');
			$('#addver_load').hide();
		});
	},
no: function(id){
$('#addver_load').show();
		$.post('/index.php?go=panel&act=verify_no&id='+id, function(){
			$('#addver_but').attr('onClick', 'onClick="panel.yes('+id+'); return false');
			$('#text_add_ver').text('�����������');
			$('#addver_load').hide();
		});
	},
		deletall:function(){
			$.post('/index.php?go=panel&act=admin&type=1', function(d){
				if(d == 'err_group') {
					Box.Info('err','������','�� �� ������ ��������� ������ ��������');
				}
				if(d == 'ok') {
					Box.Info('err','������ ������','���� ������ "���� ��������" ���� ������� �������');
				}				
			});
		},	



deletallpeople:function(){
			$.post('/index.php?go=panel&act=admin&type=2', function(d){
				if(d == 'err_group') {
					Box.Info('err','������','�� �� ������ ��������� ������ ��������');
				}
				if(d == 'ok') {
					Box.Info('err','������ ������','���� ������ "������������" ���� ������� �������');
				}				
			});
		},
delapps:function(){
			$.post('/index.php?go=panel&act=admin&type=4', function(d){
				if(d == 'err_group') {
					Box.Info('err','������','�� �� ������ ��������� ������ ��������');
				}
				if(d == 'ok') {
					Box.Info('err','������ ������','���� ������ "����������" ���� ������� �������');
				}				
			});
		},	
	del:function(){
			$.post('/index.php?go=panel&act=admin&type=4', function(d){
				if(d == 'err_group') {
					Box.Info('err','������','�� �� ������ ��������� ������ ��������');
				}
				if(d == 'ok') {
					Box.Info('err','������������ ������','������������ ������� ������ �� ���� ��������');
				}				
			});
		},
    delet: function(id){
$.post('/index.php?go=adminpanel&act=delete_user&id='+id);	
	$('#ubalance').html("������������");
        $('#del').html("<font color='red'>������</font>");
        $('#delet').html("<br/><div class='err_red name_errors' align='center'>������������ ������� ������.</div>");
	},
    active: function(id){
    $.post('/index.php?go=adminpanel&act=adelete_user&id='+id);
	$('#ubalance').html("�������");
        $('#del').html("<font color='green'>�������</font>");
        $('#delet').html("<br/><div class='err_yellow name_errors' align='center'>������������ ������� ������������.</div>");
	
	}	
}
var admin = {
	editadmin: function(id,type,typetodelete){
		var pid = $('#pid').val();
		var atype = ['deleteadmin','editadmin','newadmin'];
		var f = "'";
		if(in_array(type, atype)) {
			Page.Loading('start');
			$.post('/index.php?go=admin&act=editadmin&id='+id, {id: id, type: type}, function(data){
				Page.Loading('stop');
				if(type == 'deleteadmin') {
					title = 'Удаление руководителя';
					button_ok = 'Разжаловать руководителя';
					function_ok = 'admin.deleteadmin('+id+','+f+typetodelete+f+')';
				} else if(type == 'editadmin') {
					title = 'Редактирование руководителя';
					button_ok = 'Сохранить';
					function_ok = 'admin.saveadmin('+id+','+f+'saveadmin'+f+')';
				} else if(type == 'newadmin') {
					title = 'Назначение руководителя';
					button_ok = 'Назначить руководителем';
					function_ok = 'admin.saveadmin('+id+','+f+'newadmin'+f+')';
				}
				Box.Show('editadmin', 410, title, data, lang_box_canсel, button_ok, function_ok,'', 0, 0, 0, 0);
			});
		}
	},
	saveadmin: function(id,type){
		var pid = $('#pid').val();
		var level = $('#value_type').val();
		var blockf = $('#blockcontact').val();
		var position = $('#gedit_admbox_position').val();
		$.post('/index.php?go=admin&act=saveadmin&pid='+pid, {id: id, level: level, blockf: blockf, position: position, type: type}, function(data){
			Box.Close('editadmin');
			$('#gedit_user_level'+id).html(convertLevel(parseInt(level)));
			if(type == 'newadmin') {
				$('#gedit_user_level'+id).show();
				Box.Info('msg_info', '<b>Изменения сохранены.</b>', '<span style="font-size:12px;"><b><a href="'+$('#gedit_user_name'+id).attr('href')+'">'+$('#gedit_user_name'+id).html()+'</a></b> назначен одним из администраторов сайта.</span>', 380, 2000);
			}
		});
	},
	deleteadmin: function(id,type){
		var pid = $('#pid').val();
		var blockf = $('#blockcontact').val();
		var position = $('#gedit_admbox_position').val();
		var email = $('#gedit_admbox_email').val();
		var phone = $('#gedit_admbox_phone').val();
		$.post('/index.php?go=admin&act=deleteadmin&pid='+pid, {id: id, blockf: blockf, position: position}, function(data){
			Box.Close('editadmin');
			$('#gedit_user_level'+id).detach();
			if(type != 'onfalldelete') Box.Info('msg_info', '<b>Изменения сохранены.</b>', '<span style="font-size:12px;"><b><a href="'+$('#gedit_user_name'+id).attr('href')+'">'+$('#gedit_user_name'+id).html()+'</a></b> убран из списка администраторов.</span>', 380, 2000);
		});
	}
}
//TASK
var at = '';
var Task = {
	New: function(){
		if($('#title_n').val() != 0){
			if($('#text').val() != 0 || $('#vaLattach_files').val() != 0){
				butloading('task_sending', 70, 'disabled');
				$.post('/index.php?go=task&act=new_send', {title: $('#title_n').val(), text: $('#text').val(), attach_files: $('#vaLattach_files').val()}, function(d){
					Page.Go('/task?act=show&tid='+d);
				});
			} else
				setErrorInputMsg('text');
		} else
			setErrorInputMsg('title_n');
	},
	Page: function(p){
		if($('#load_task_page_lnk').text() == 'Показать больше'){
			textLoad('load_task_page_lnk');
			$.post('/index.php?go=task&tid='+p, {a: '1', page: page}, function(d){
				page++;
				$('#taskPage').append(d);
				$('#load_task_page_lnk').text('Показать больше тем');
				if(!d){
					$('#'+$('.task_bg2:last').attr('id'));
					$('#task_page_lnk').hide();
					$('#load_task_page_lnk').text('');
				}
			});
		}
	},
	SendMsg: function(i){
		if($('#fast_text_1').val() != 0){
			butloading('msg_send', 56, 'disabled');
			$.post('/index.php?go=task&act=add_msg', {tid: i, msg: $('#fast_text_1').val(), answer_id: $('#answer_comm_id1').val()}, function(d){
				updateNum('#msgNumJS', 1);
				langNumric('langMsg', $('#msgNumJS').text(), 'сообщение', 'сообщения', 'сообщений', 'сообщение', 'сообщение');
				$('#msg').append(d);
				$('#fast_text_1').val('').focus();
				butloading('msg_send', 56, 'enabled', 'Отправить');
				$('#answer_comm_for_1').html('');
				$('#answer_comm_id1').val('');
			});
		} else
			setErrorInputMsg('fast_text_1');
	},
	MsgPage: function(f){
		if($('#load_task_msg_lnk').text() == 'Показать предыдущие сообщения'){
			textLoad('load_task_msg_lnk');
			$.post('/index.php?go=task&act=prev_msg', {tid: f, first_id: $('.forum_msg_border2:first').attr('id'), page: page}, function(d){
				page++;
				$('#msgPrev').html(d+$('#msgPrev').html());
				$('#load_task_msg_lnk').text('Показать предыдущие сообщения');
				if(!d){
					$('#load_task_msg_lnk').text('Скрыть сообщения').css('background', '#fff');
					$('#forum_msg_lnk').attr('onClick', 'Task.HidePage('+f+')');
				}
			});
		}
	},
	HidePage: function(f){
		$('#task_msg_lnk').attr('onClick', 'Task.MsgPage('+f+')');
		$('#load_task_msg_lnk').text('Показать предыдущие сообщения').css('background', '#f5f5f5)');
		$('#msgPrev').html('');
		page = 1;
	},
	EditText: function(){
		at = $('#attach').html();
		$('#teckText, #editLnk').hide();
		$('#editTextTab').show();
		$('#editText').focus();
	},
	CloseEdit: function(){
		$('#teckText, #editLnk, #editClose').show();
		$('#editTextTab').hide();
	},
	SaveEdit: function(i){
		$('#editClose').hide();
		butloading('saveedit', 55, 'disabled');
		$.post('/index.php?go=task&act=saveedit', {text: $('#editText').val(), tid: i}, function(d){
			if(!at) at = '';
			$('#teckText').html(d+'<span id="attach">'+at+'</span>');
			Task.CloseEdit();
			butloading('saveedit', 55, 'enabled', 'Сохранить');
		});
	},
	EditTitle: function(){
		settings.privacyClose('msg');
		$('#titleTeck').hide();
		$('#editTitle').show();
		$('#title').focus();
	},
	CloseEditTitle: function(){
		$('#titleTeck').show();
		$('#editTitle').hide();
	},
	SaveEditTitle: function(f){
		if($('#title').val() != 0){
			Task.CloseEditTitle();
			$('#editTitleSaved').text($('#title').val());
			$.post('/index.php?go=task&act=savetitle', {tid: f, title: $('#title').val()});
		} else
			setErrorInputMsg('title');
	},
 senBox: function(qid){
  viiBox.clos('box_Task', 1);
    viiBox.start();
	$.post('/index.php?go=support&act=boxTask&qid='+qid, function(d){
	  viiBox.win('box_Task', d);
	});
  },
	sendSupport: function(id){
		var title = $('#title').val();
		var text = $('#text').val();
			$('#box_loading').show();
			$.post('/index.php?go=support&act=sendTask&qid='+id, {title: title, text: text}, function(data){
                          viiBox.clos('box_Task', 1);

			Box.Info('msg_info', 'Вопрос передан', 'Вопрос успешно передан разработчикам и в скором времени его рассмотрят', 300);
			    
			});
	},
	Fix: function(f){
		settings.privacyClose('msg');
		if($('#fix_text').text() == 'Закрепить задачу'){
			$('#fix_text').text('Не закреплять задачу');
			$('.forum_infos_div').html('<b>Задача закреплена.</b><br />Теперь задача всегда будет выводиться над остальными в списке обсуждений.').fadeIn('fast');
		} else {
			$('#fix_text').text('Закрепить задачу');
			$('.forum_infos_div').html('<b>Задача больше не закреплена.</b><br />Эта задача будет выводиться на своем месте в списке обсуждений.').fadeIn('fast');
		}
		$.post('/index.php?go=task&act=fix', {tid: f});
	},
	Status: function(f){
		settings.privacyClose('msg');
		if($('#status_text').text() == 'Закрыть задачу'){
			$('#status_text').text('Открыть задачу');
			$('.task_infos_div').html('<b>Задача закрыта.</b><br />Участники компании больше не смогут оставлять сообщения в этой задаче.').fadeIn('fast');
			$('.task_addmsgbg').hide();
		} else {
			$('#status_text').text('Закрыть тему');
			$('.task_infos_div').html('<b>Задача открыта.</b><br />Все участники компании смогут оставлять сообщения в этой задаче.').fadeIn('fast');
			$('.task_addmsgbg').show();
		}
		$.post('/index.php?go=task&act=status', {tid: f});
	},
	DelBox: function(f, p){
		settings.privacyClose('msg');
		Box.Show('del_forthe', 350, lang_title_del_photo, '<div style="padding:15px;" id="del_status_text_forum">Вы уверены, что хотите удалить задачу?</div>', lang_box_canсel, lang_box_yes, 'Task.StartDelete('+f+', '+p+')');
	},
	StartDelete: function(f, p){
		$('#box_loading').show();
		ge('box_butt_create').disabled = true;
		$('#del_status_text_task').text('Задача удаляется..');
		$.post('/index.php?go=task&act=del', {tid: f}, function(d){
			Page.Go('/task');
		});
	},
	DelMsg: function(i){
		$('#'+i).html('<span class="color777">Сообщение удалено.</span>');
		updateNum('#msgNumJS');
		langNumric('langMsg', $('#msgNumJS').text(), 'сообщение', 'сообщения', 'сообщений', 'сообщение', 'сообщение');
		$.post('/index.php?go=task&act=delmsg', {mid: i});
	},
	CreateVote: function(f){
		if($('#vote_title').val() !=0){
			if($('#vote_answer_1').val() != 0){
				butloading('savevote', 75, 'disabled', '');
				$.post('/index.php?go=task&act=createvote', {tid: f, vote_title: $('#vote_title').val(), vote_answer_1: $('#vote_answer_1').val(), vote_answer_2: $('#vote_answer_2').val(), vote_answer_3: $('#vote_answer_3').val(), vote_answer_4: $('#vote_answer_4').val(), vote_answer_5: $('#vote_answer_5').val(), vote_answer_6: $('#vote_answer_6').val(), vote_answer_7: $('#vote_answer_7').val(), vote_answer_8: $('#vote_answer_8').val(), vote_answer_9: $('#vote_answer_9').val(), vote_answer_10: $('#vote_answer_10').val()}, function(d){
					Page.Go(location.href);
				});
			} else
			setErrorInputMsg('vote_answer_1');
		} else
			setErrorInputMsg('vote_title');
	},
	RemoveForAttach: function(){
		$('#attach_block_vote').hide();
		$('#vote_title, #vote_answer_1, #vote_answer_2').val('');
		$('#addNewAnswer').html('<a class="cursor_pointer" onClick="Votes.AddInp()">добавить</a>');
		$('#addDelAnswer').html('удалить');
		$('#attatch_vote_title').text('');
		$('#answerNum').val('2');
		for(i = 2; i <= 10; i++)
			$('#div_inp_answr_'+i).remove();
	},
	VoteDelBox: function(f){
		Box.Show('del_forthe', 350, lang_title_del_photo, '<div style="padding:15px;" id="del_status_text_forum">Вы уверены, что хотите удалить опрос?</div>', lang_box_canсel, lang_box_yes, 'Forum.StartVoteDelete('+f+')');
	},
	StartVoteDelete: function(f){
		Box.Close();
		$('#voteblockk').hide();
		$('#votelnk').html('<div class="sett_hover" onClick="settings.privacyClose(\'msg\'); $(\'#attach_block_vote\').slideDown(100); $(\'#vote_title\').focus()">Прикрепить опрос</div>');
		$.post('/index.php?go=task&act=delvote', {tid: f});
	}
}