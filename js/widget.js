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
		var url = 'http://mixlife.ga/index.php?go=pubwidget&public_id='+json['id']+'&color1='+color1+'&color2='+color2+'&color3='+color3+'&width='+width+'&height='+height+'&mode='+mode+'';
		el.innerHTML = '<iframe style="overflow: hidden; height:29%;" id="'+id+'" scrolling="no" src="'+url+'" frameborder="0" height="'+height+'" width="'+width+'"></iframe>';
      	},
}