/* | 10.11.2013 | */
window.onload=function(){
e=document.getElementsByTagName('div');
for(
var k=0;k<e.length;k++){
if(e[k].className.indexOf('share42init')!=-1){
if(e[k].getAttribute('data-url')!=-1)u=e[k].getAttribute('data-url');
if(e[k].getAttribute('data-title')!=-1)t=e[k].getAttribute('data-title');
if(e[k].getAttribute('data-image')!=-1)i=e[k].getAttribute('data-image');
if(e[k].getAttribute('data-description')!=-1)d=e[k].getAttribute('data-description');
if(e[k].getAttribute('data-path')!=-1)f=e[k].getAttribute('data-path');
if(!f){function path(name){var sc=document.getElementsByTagName('script'),sr=new RegExp('^(.*/|)('+name+')([#?]|$)');
for(var i=0,scL=sc.length;i<scL;i++){var m=String(sc[i].src).match(sr);
if(m){if(m[1].match(/^((https?|file)\:\/{2,}|\w:[\/\\])/))return m[1];if(m[1].indexOf("/")==0)
return m[1];b=document.getElementsByTagName('base');
if(b[0]&&b[0].href)
return b[0].href+m[1];
else return document.location.pathname.match(/(.*[\/\\])/)[0]+m[1];}}
return null;}f=path('share42.js');}if(!u)u=location.href;if(!t)t=document.title;
function desc(){
var meta=document.getElementsByTagName('meta');
for(var m=0;m<meta.length;m++){if(meta[m].name.toLowerCase()=='description'){
return meta[m].content;}}
return'';}
if(!d)d=desc();u=encodeURIComponent(u);t=encodeURIComponent(t);t=t.replace(/\'/g,'%27');i=encodeURIComponent(i);d=encodeURIComponent(d);d=d.replace(/\'/g,'%27');
var fbQuery='u='+u;
if(i!='null'&&i!='')fbQuery='s=100&p[url]='+u+'&p[title]='+t+'&p[summary]='+d+'&p[images][0]='+i;
var vkImage='';
if(i!='null'&&i!='')vkImage='&image='+i;
var s=new Array('"#" data-count="fb" class="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?'+fbQuery+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Facebook"','"#" data-count="odkl" class="odkl" onclick="window.open(\'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl='+u+'&title='+t+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Одноклассники"','"#" data-count="mail" class="mail" onclick="window.open(\'http://connect.mail.ru/share?url='+u+'&title='+t+'&description='+d+'&imageurl='+i+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Моем Мире@Mail.Ru"','"#" data-count="twi" class="twi" onclick="window.open(\'https://twitter.com/intent/tweet?text='+t+'&url='+u+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Twitter"','"#" data-count="vk" class="vk" onclick="window.open(\'http://vk.com/share.php?url='+u+'&title='+t+vkImage+'&description='+d+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться В Контакте"');
var l='';
for(j=0;j<s.length;j++)l+='<a rel="nofollow" style="display:inline-block;vertical-align:bottom;width:24px;height:24px;margin:0 2px 2px 0;padding:0;outline:none;background:url('+f+'soc.png) -'+24*j+'px 0 no-repeat" href='+s[j]+' target="_blank"></a>';e[k].innerHTML='<span id="share42">'+l+'</span>';}};};