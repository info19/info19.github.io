<link media="screen" href="/css/al/album.css" type="text/css" rel="stylesheet" />
<div class="album_block "> <div class="album_item" onmousedown="albums.drag(1407, event)" id="album_1407" onclick="if(!cur.dragstart &amp;&amp; $(event.target).filter('.edit, .del').length == 0) Page.Go('/albums/view/{aid}')" style="left: 511px; top: 5px;"> <div style="position: relative"> <div class="album_settings"> 
[owner]<div class="del icon-cancel-3" onClick="Albums.Delete({aid}, '{hash}'); return false"></div> 
<div class="edit icon-pencil-7" onClick="Albums.EditBox({aid}); return false"></div> [/owner]
</div> 
<div class="dark_bg"></div> 
<div class="description">{name}</div> </div> <img src="{cover}" class="" style="opacity: 1;"> </div></div>