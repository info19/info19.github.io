[all-albums]
[admin-drag][owner]<script type="text/javascript">
$(document).ready(function(){
	Albums.Drag();
});
</script>[/owner][/admin-drag]
<div class="menuNews">
    <li onClick="Page.Go('/albums/{user-id}')" class="activClass">[not-owner]Все фотографии {name}[/not-owner][owner]Все фотографии[/owner]</li>
[owner]<a href="" onClick="Albums.CreatAlbum(); return false;" style="float:right;margin-right: 20px;margin-top: 9px;">Создать альбом</a>[/owner]
    [not-owner]<li onClick="Page.Go('/u{user-id}')">К странице {name}</li>[/not-owner]
   [new-photos] <li onClick="Page.Go('/albums/newphotos')">Новые фотографии со мной (<b>{num}</b>)</li>[/new-photos]
    <div class="clear"></div>
</div>
[/all-albums]


[view]
<input type="hidden" id="all_p_num" value="{all_p_num}" />
<input type="hidden" id="aid" value="{aid}" />
<div class="menuNews">
 <li onClick="Page.Go('/albums/{user-id}')">[not-owner]Все фотографии {name}[/not-owner][owner]Все фотографии[/owner]</li>
 <li onClick="Page.Go('/albums//view/{aid}')" class="activClass">{album-name}</li>
 <li onClick="Page.Go('/albums/view/{aid}/comments/')">Комментарии к альбому</li>
 [owner]<li onClick="Page.Go('/albums/add/{aid}')">Добавить фотографии</li>[/owner]
 [not-owner]<li onClick="Page.Go('/albums/{user-id}')">К странице {name}</li>[/not-owner]
<div class="clear"></div><div style="margin-top:0px;"></div></div>
[/view]


[editphotos]
[admin-drag]<script type="text/javascript">
$(document).ready(function(){
	Photo.Drag();
});
</script>[/admin-drag]
<script type="text/javascript" src="/js/al/albums.view.js"></script>
<input type="hidden" id="all_p_num" value="{all_p_num}" />
<input type="hidden" id="aid" value="{aid}" />
<div class="menuNews">
 <li onClick="Page.Go('/albums/{user-id}')">Все фотографии</li>
 <li onClick="Page.Go('/albums//view/{aid}')">{album-name}</li>
 <li onClick="Page.Go('/albums/view/{aid}/comments/')">Комментарии к альбому</li>
<li onClick="Page.Go('/albums/editphotos/{aid}')" class="activClass">Изменить порядок фотографий</li>
<li onClick="Page.Go('/albums/add/{aid}')">Добавить фотографии</li>
<div class="clear"></div><div style="margin-top:0px;"></div></div>
[/editphotos]


[comments]
<script type="text/javascript" src="/js/al/albums.view.js"></script>
<div class="menuNews">
 <li onClick="Page.Go('/albums/{user-id}')">[not-owner]Все фотографии {name}[/not-owner][owner]Все фотографии[/owner]</li>
[owner]<a href="" onClick="Albums.CreatAlbum(); return false;" style="float:right;margin-right: 20px;margin-top: 9px;"">Создать альбом</a>[/owner]
 <li onClick="Page.Go('/albums/view/{aid}/comments/')" class="activClass">Комментарии к альбому</li>
<li onClick="Page.Go('/u{user-id}')">К странице {name}</li>
</div>
<div class="clear"></div>
[/comments]


[albums-comments]
<script type="text/javascript" src="/js/al/albums.view.js"></script>
<div class="menuNews">
 <li onClick="Page.Go('/albums/{user-id}')">[not-owner]Все фотографии {name}[/not-owner][owner]Все фотографии[/owner]</li>
 <li onClick="Page.Go('/albums/view/{aid}')">{album-name}</li>
 <li onClick="Page.Go('/albums/view/{aid}/comments/')" class="activClass">Комментарии к альбому</li>
[owner]<li onClick="Page.Go('/albums/add/{aid}')">Добавить фотографии</li>[/owner]
[not-owner]<li onClick="Page.Go('/u{user-id}')">К странице {name}</li>[/not-owner]
</div>
<div class="clear"></div><div style="margin-top:8px;"></div>
[/albums-comments]


[all-photos]
<script type="text/javascript" src="/js/al/albums.view.js"></script>
<div class="menuNews">
 <li onClick="Page.Go('/albums/{user-id}')">[not-owner]Все фотографии {name}[/not-owner][owner]Все фотографии[/owner]</li>
 [owner]<li onClick="Page.Go('/albums/view/{aid}')" style="float:right;margin-right: 20px;margin-top: 9px;">Создать альбом</li>[/owner]
 <li onClick="Page.Go('/albums/view/{aid}/comments/')">Комментарии к альбомам</li>
<li onClick="Page.Go('/photos{user-id}')" class="activClass">Обзор фотографий</li>
[not-owner]<li onClick="Page.Go('/u{user-id}')">К странице {name}</li>[/not-owner]
</div>
<div class="clear"></div><div style="margin-top:8px;"></div>
[/all-photos]