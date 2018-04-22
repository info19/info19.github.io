[all]<div class="buttonsprofile albumsbuttonsprofile" style="height:10px">
 <div class="activetab"><a href="/notes/{user-id}" onClick="Page.Go(this.href); return false;"><div>[owner]{translate=notes_my}[/owner][not-owner]{translate=lang_326} {name}[/not-owner]</div></a></div>
 [owner]<a href="/notes/add" onClick="Page.Go(this.href); return false;">{translate=lang_323}</a>[/owner]
 [not-owner]<a href="/u{user-id}" onClick="Page.Go(this.href); return false;">{translate=lang_30} {name}</a>[/not-owner]
</div>


<div class="clear"></div><div style="margin-top:10px;"></div>
[/all]
[add]<div class="buttonsprofile albumsbuttonsprofile" style="height:10px">
 <a href="/notes" onClick="Page.Go(this.href); return false;">{translate=notes_my}</a>
 <div class="activetab"><a href="/notes/add" onClick="Page.Go(this.href); return false;"><div>{translate=lang_323}</div></a></div>
</div>
<div class="clear"></div><div class="hralbum" style="margin-top:10px;"></div>
[/add]
[edit]<div class="buttonsprofile albumsbuttonsprofile" style="height:10px">
 <a href="/notes" onClick="Page.Go(this.href); return false;">{translate=notes_my}</a>
 <div class="activetab"><a href="/notes/edit/{note-id}" onClick="Page.Go(this.href); return false;"><div>{translate=note_edit}</div></a></div>
 <a href="/notes/add" onClick="Page.Go(this.href); return false;">{translate=lang_323}</a>
</div>
<div class="clear"></div><div class="hralbum" style="margin-top:10px;"></div>
[/edit]
[view]<div class="buttonsprofile albumsbuttonsprofile" style="height:10px">
 <a href="/notes/{user-id}" onClick="Page.Go(this.href); return false;">[owner]{translate=notes_my}[/owner][not-owner]{translate=lang_326} {name}[/not-owner]</a>
 <div class="activetab"><a href="/notes/view/{note-id}" onClick="Page.Go(this.href); return false;"><div>{translate=notes_view}</div></a></div>
 [not-owner]<a href="/u{user-id}" onClick="Page.Go(this.href); return false;">{translate=lang_30} {name}</a>[/not-owner]
 [owner]<a href="/notes/add" onClick="Page.Go(this.href); return false;">{translate=lang_323}</a>[/owner]
</div>
<div class="clear"></div>
[/view]

<style>
.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    background: #fff;
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 103px !important;
    word-wrap: break-word;
}
</style>