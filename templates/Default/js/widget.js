var social_var_url = 'http://studentosi.ru/';//Адрес сайта с слешем

function box_wid_pub_opn_photo(url){
   var elemDiv = document.createElement('div');
   elemDiv.id = "box_wid_p";
   elemDiv.style.cssText = 'position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 999; background: rgba(0, 0, 0, 0.5)';
   document.body.appendChild(elemDiv);
   document.getElementById('box_wid_p').innerHTML = '<div id="wind_wid_pv" style="font-size: 11px;font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;margin: 70px auto 20px; width: 800px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 20px;"><div style="color: #21578B;font-weight: bold;padding-bottom: 10px;padding-top: 10px;">Просмотр фотографии <a style="float:right;font-weight: normal;" onclick="close_box_wid_pub_opn_photo(); return false;" href="" onclick="">Закрыть</a></div><div style="text-align: center;"><img src="'+social_var_url+url+'" alt=""/></div></div>';
}
function close_box_wid_pub_opn_photo(){
   document.getElementById('box_wid_p').remove();
}

function box_wid_pub_opn_video(url){
   var elemDiv = document.createElement('div');
   elemDiv.id = "box_wid_p_v";
   elemDiv.style.cssText = 'position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 999; background: rgba(0, 0, 0, 0.5)';
   document.body.appendChild(elemDiv);
   document.getElementById('box_wid_p_v').innerHTML = '<div id="wind_wid_pv_v" style="font-size: 11px;font-family: tahoma,arial,verdana,sans-serif,Lucida Sans;margin: 70px auto 20px; width: 800px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 20px;"><div style="color: #21578B;font-weight: bold;padding-bottom: 10px;padding-top: 10px;">Просмотр  видеозаписи<a style="float:right;font-weight: normal;" onclick="close_box_wid_pub_opn_video(); return false;" href="" onclick="">Закрыть</a></div><div style="text-align: center;"><iframe src="'+url+'?autoplay=1" allowfullscreen="" frameborder="0" height="577" width="770"></iframe></div></div>';
}
function close_box_wid_pub_opn_video(){
   document.getElementById('box_wid_p_v').remove();
}


function receiveMessage(e) {
	   json_fun_p = JSON.parse(e.data);
       if(json_fun_p.func == 'open_photo'){
		   box_wid_pub_opn_photo(json_fun_p.url);
	   }else if(json_fun_p.func == 'open_video'){
		   box_wid_pub_opn_video(json_fun_p.url);
	   }
}
window.addEventListener('message', receiveMessage);

var CO = {
	public_widget: function(fields, id){
        var json = JSON.parse(fields);
		if(json['color1'] == undefined){
			var color1 = 'FFFFFF';
		}else{
			var color1 = json['color1'];
		}
		if(json['color2'] == undefined){
			var color2 = '2B587A';
		}else{
			var color2 = json['color2'];
		}
		if(json['color3'] == undefined){
			var color3 = '5B7FA6';
		}else{
			var color3 = json['color3'];
		}
		if(json['mode'] == undefined){
			var mode = '0';
		}else{
			var mode = json['mode'];
		}
		if(json['width'] == undefined){
			var width = '220';
		}else{
			var width = json['width'];
		}		
		if(json['height'] == undefined){
			var height = '400';
		}else{
			var height = json['height'];
		}
		if(height < 215) var height = 215;
		if(width < 212) var width = 212;
		var el = document.getElementById(id);
		var url = social_var_url+'index.php?go=pubwidget&public_id='+json['id']+'&color1='+color1+'&color2='+color2+'&color3='+color3+'&width='+width+'&height='+height+'&mode='+mode+'';
		el.innerHTML = '<iframe style="overflow: hidden;" id="'+id+'" scrolling="no" src="'+url+'" frameborder="0" height="'+height+'" width="'+width+'"></iframe>';
      	},
}
