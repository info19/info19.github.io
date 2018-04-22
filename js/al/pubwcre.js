var Widgets = {
	param_set: function(field, val, mode){
			var conf = {
				min_w: 212,
				min_h: 280,
				max_w: 760,
				max_h: 700
			}
		
		if(mode){
			var color3 = $('#color3').val();
			var color2 = $('#color2').val();
			var color1 = $('#color1').val();
			var h = $('#widget_height').val();
			var w = $('#widget_width').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
		}
		var w, h;
		
		if(field == 'width'){
			var w = val;
			var h = $('#widget_height').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
			var color3 = $('#color3').val();
			var color2 = $('#color2').val();
			var color1 = $('#color1').val();
		}else if(field == 'height'){
			var h = val;
			var w = $('#widget_width').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
			var color3 = $('#color3').val();
			var color2 = $('#color2').val();
			var color1 = $('#color1').val();
		}else if(field == 'color1'){
            var color1 = val;
			var color2 = $('#color2').val();
			var color3 = $('#color3').val();
			var w = $('#widget_width').val();
			var h = $('#widget_height').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
		}else if(field == 'color2'){
            var color2 = val;
			var color3 = $('#color3').val();
			var color1 = $('#color1').val();
			var w = $('#widget_width').val();
			var h = $('#widget_height').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
		}else if(field == 'color3'){
            var color3 = val;
			var color2 = $('#color2').val();
			var color1 = $('#color1').val();
			var w = $('#widget_width').val();
			var h = $('#widget_height').val();
			var url = $('#urlp').val();
			var mode1 = $('input[name=mode]:checked').val();	
		}else if(field == 'url'){
			var url = val;
            var color3 = $('#color3').val();
			var color2 = $('#color2').val();
			var color1 = $('#color1').val();
			var w = $('#widget_width').val();
			var h = $('#widget_height').val();
			var mode1 = $('input[name=mode]:checked').val();	
		}
		
		var w = Math.max(conf.min_w, w);
		if(conf.max_w > 0) var w = Math.min(conf.max_w, w);
		var h = Math.max(conf.min_h, h);
		if(conf.max_h > 0) var h = Math.min(conf.max_h, h);
		
				var cod = { 
              id: url,
              color1: color1,  
              color2: color2,
			  color3: color3,
			  width: w,
			  height: h,
			  mode: mode1
        }
		var encoded = JSON.stringify(cod);
		var code = "<script type=\"text/javascript\" src=\"//studentosi.ru/js/widget.js\"></script>\n\n<!-- CO Widget -->\n<div id=\"co_group\"></div>\n<script type=\"text/javascript\">\nCO.public_widget('"+encoded+"', \'co_group\');\n</script>";
		$('#code').text(code);

		var url = 'http://studentosi.ru/index.php?go=pubwidget&public_id='+url+'&color1='+color1+'&color2='+color2+'&color3='+color3+'&width='+w+'&height='+h+'&mode='+mode1+'';
		$('#widget_preview_frame').attr('src', url).css({width: w+'px', height: h+'px'});
	},
}