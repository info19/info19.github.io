//Панель разработчика
var karma = {
	transfer: function(d){
    tran = d.split('^');
    if(tran[0] == 1){
	        if(Math.round(tran[8]) > Math.round(tran[4])){
		             var content = '<div style="background-color:#F9F9F9;border-bottom: 2px solid #F1F1F1;height:85px;"><img style="margin:5px;float:left;" src="/uploads/apps/'+tran[1]+'/75_'+tran[6]+'">'+
		             '<div style="color:#505050;font-size:12px;font-weight:bold;height:20px;padding-top:5px;">'+tran[7]+'</div>'+
		             '<div><b>Описание услуги:</b> '+tran[5]+'</div>'+
		             '<div style="margin-top:5px"><b>На Вашем счету:</b> <font style="color:#076607;font-weight:bold;">'+tran[8]+'</font> голосов.</div>'+
		             '</div>'+
		             '<br><img style="margin-left:170px" src="/templates/Default/images/api/pay.png"><br><br>'+
		             '<center></center><br><br>'+
		             '<div class="load_photo_quote" style="margin-left:18px;width:400px;">C Вашего счета будет списано: <b>'+tran[4]+'</b> голосов.</div><br><br>'+
		             '<div style="margin-left:18px;width:420px;"><small>Все приложения создаются сторонними разработчиками. Оплачивая услугу, Вы признаете, что не будете иметь претензий к MyBoxs в связи с любыми последствиями передачи голосов.</small></div><br><br>';
		             Box.Show('karma', 460, 'Оплата услуг', content, lang_box_canсel, 'Оплатить', 'karma.pay(\''+tran[2]+'\',\''+tran[1]+'\',\''+tran[3]+'\',\''+tran[4]+'\'); return false', '400');
		    }else{
			Box.Info('err', 'Ошибка', 'У Вас не хватает голосов, для оплату услуг. <font style="color:#5591DD;"><b>Пополните счет.</b></font>', 350, 4000);
			}
    }
	if(tran[0] == 2){
		             var content = '<div style="padding:10px;" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Приложение: <a href="/app'+tran[1]+'" onclick="Page.Go(this.href); return false;">'+tran[4]+'</a></div></div><div class="clear"></div><div class="wall_show_block_link" style=""><a href="/app'+tran[1]+'" onclick="Page.Go(this.href); return false;"><div style="width:108px;height:80px;float:left;text-align:center"><img src="/uploads/apps/'+tran[1]+'/75_'+tran[3]+'" /></div></a><div style="max-height:50px;overflow:hidden">'+tran[5]+'</div></div></div>';
		             Box.Show('karma', 400, 'Запись на стену', content, lang_box_canсel, 'Отправить', 'karma.wall(\''+tran[1]+'\',\''+tran[2]+'\',\''+tran[3]+'\',\''+tran[4]+'\',\''+tran[5]+'\'); return false', '130');
    }
	if(tran[0] == 3){
	                 if (tran[6] == '1'){var name = 'Игре';}else{var name = 'Приложении';}
		             var content = '<div style="background-color:#F9F9F9;border-bottom: 2px solid #F1F1F1;height:40px;padding:10px;">Мы предлагаем Вам отправить приглашения Вашим друзьям принять участие вместе с Вами в '+name+'</div>'+
					 '<div style="padding:10px;" class="clear"><div class="attach_link_block_ic fl_l" style="margin-top:4px;margin-left:0px"></div><div class="attach_link_block_te"><div class="fl_l">Приложение: <a href="/app'+tran[1]+'" onclick="Page.Go(this.href); return false;">'+tran[4]+'</a></div></div><div class="clear"></div><div class="wall_show_block_link" style=""><a href="/app'+tran[1]+'" onclick="Page.Go(this.href); return false;"><div style="width:108px;height:80px;float:left;text-align:center"><img src="/uploads/apps/'+tran[1]+'/75_'+tran[3]+'" /></div></a><div style="max-height:80px;overflow:hidden">'+tran[5]+'</div></div></div>'+
					 '<div style="padding:20px;"><small>Вы в любой момент можете отклонить данное предложение либо согласится и поделиться с Вашими друзьями.</small></div>';
		             Box.Show('karma', 400, 'Пригласить друзей', content, lang_box_canсel, 'Отправить', 'karma.moment(\''+tran[1]+'\',\''+tran[2]+'\',\''+tran[3]+'\',\''+tran[4]+'\',\''+tran[6]+'\'); return false', '240');
    }
  },
        pay: function(uids, api_id, nump, price){
		     $.post('/index.php?go=sector&act=pay', {uids:uids, api_id:api_id, nump:nump, price:price}, function(data){
             if (data == 'ok'){
			 Box.Close('karma');
			 Box.Info('err', 'OK', 'Платеж произведен удачно', 200, 4000);
			 }else{
			 if (data == 'error'){Box.Info('err', 'Ошибка', 'Платеж не был произведен', 200, 4000);}
		     }
		     });
	},
        wall: function(api_id, uids, img, title, text){
		     $.post('/index.php?go=sector&act=wall', {api_id:api_id, uids:uids, img:img, title:title, text:text}, function(data){
             if (data == 'ok'){
			 Box.Close('karma');
			 Box.Info('err', 'OK', 'Запись была удачно добавлена на стену', 300, 2000);
			 }
		     });
	},
        moment: function(api_id, uids, img, title, text){
		     $.post('/index.php?go=sector&act=wall', {api_id:api_id, uids:uids, img:img, title:title, name:name}, function(data){
             if (data == 'ok'){
			 Box.Close('karma');
			 Box.Info('err', 'OK', 'Вы удачно отправили приглашения Вашим друзьям', 300, 2000);
			 }
		     });
	}
 
}