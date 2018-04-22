<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<link rel="shortcut icon" href="/templates/findyou/images/fav_find.png">
<link media="screen" href="/templates/findyou/style/style.css" type="text/css" rel="stylesheet">
<meta name="robots" content="noindex,nofollow"><title>{name}</title>
<style>
html, body {
  padding: 0px;
  margin: 0px;
  height: 100%;
  border: none;
}
.iframe {
  border: none;
}
.docs_panel_wrap {
  height: 45px;
}
.docs_panel {
  background: #F1F1F1;
  position: fixed;
  width: 100%;
  height: 45px;
  -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
}
.can_zoom {
  max-width: 100%;
  cursor: -webkit-zoom-in;
  cursor: -moz-zoom-in;
  cursor: -zoom-in;
}
.can_zoom_out {
  min-width: 100%;
  cursor: -webkit-zoom-out;
  cursor: -moz-zoom-out;
  cursor: -zoom-out;
}

.button_div button {
    padding: 7px 15px 8px;
    margin: 0;
    font-size: 12px;
    display: inline-block;
    zoom: 1;
    cursor: pointer;
    white-space: nowrap;
    outline: none;
    font-family: Open Sans,Helvetica Neue,sans-serif;
    vertical-align: top;
    line-height: 14px;
    text-align: center;
    text-decoration: none;
    background: none;
    background-color: #6287ae;
    color: #fff;
    border: 0;
    border-radius: 2px;
    box-sizing: border-box;
}

.button_div button:hover {
    background-color: #678eb4;
    text-decoration: none;
}
.button_div button:active {
    background-color: #5d7fa4;
    padding-top: 8px;
    padding-bottom: 7px;
}
</style>
<script>
function saveDoc() {
  var src = '/index.php?go=doc&act=download&did={did}&dl=1';
 
  location.replace(src);
  return false;
}
function imgZoom(obj) {
  if (obj.className == 'can_zoom') {
    obj.className = 'can_zoom_out';
  } else {
    obj.className = 'can_zoom';
    window.scroll(0, 0);
  }
}
function onload() {
  var iframe = document.getElementById('iframe');
  if (iframe) {
    if(window.innerWidth) {
      var h = window.innerHeight;
    } else {
      var h = document.body.clientHeight;
    }
    iframe.style.height = (h - 45 - 2) +'px';
  }

}
</script>
</head>
<body onkeydown="if (event.keyCode == 83 &amp;&amp; (event.ctrlKey || event.metaKey)) return saveDoc(event);" onload="onload();">
<noindex>
<div class="docs_panel_wrap">
  <div class="docs_panel">
    <div style="padding: 10px 20px;">

    <div class="button_div fl_r" style="margin-top: 0px;float: right;"><button onclick="return saveDoc();">Сохранить документ на диск</button></div>
      <div class="fl_r" style="padding: 6px 10px 0px; color: #888888;"></div>
      <a style="padding-top: 0px; display: block;" class="fl_l" onclick="return saveDoc();"><b style="    font-size: 15px;
    color: #527FAF;
    font-weight: bold;
    cursor: pointer;">{name}</b></a>&nbsp;
    </div>
  </div>
</div><center><img src="{doc}" class="can_zoom" onclick="imgZoom(this);"></center>
</noindex>

</body></html>