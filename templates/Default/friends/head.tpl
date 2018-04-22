[all-friends]
<div class="bgprof" style="
    height: 27px;
    margin-left: -23px;
    margin-top: -12px;
">
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')" class="activClass">{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" >{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')">{translate=lang_173}</li>
<li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
 [not-owner]<li onClick="Page.Go('/u{user-id}')">{translate=lang_171} {name}</li>[/not-owner]
    <div class="clear"></div>
</div>
</div>
[/all-friends]

[request-friends]
<div class="bgprof" style="
    height: 27px;
    margin-left: -23px;
    margin-top: -12px;
">
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')">{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" >{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')"class="activClass">{translate=lang_173}</li>
     <li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
    <div class="clear"></div>
</div>
</div>
[/request-friends]

[online-friends]
<div class="bgprof" style="
    height: 27px;
    margin-left: -23px;
    margin-top: -12px;
">
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')" >{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" class="activClass">{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')">{translate=lang_173}</li>
<li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
 [not-owner]<li onClick="Page.Go('/u{user-id}')">{translate=lang_171} {name}</li>[/not-owner]
    <div class="clear"></div>
</div>
</div>
[/online-friends]

<style>
.speedbar{    background: #FFF;
    padding: 13px;
    margin-left: 190px;
    color: #567CA4;
    display: none !important;
    background: none;
    font-size: 13px !important;
    border-radius: 0px !important;
    font-weight: 500 !important;
    width: 791px;
    padding: 14px;
    box-shadow: none;}
	
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    margin-left: 110px !important;
    word-wrap: break-word;
}

.cont_border_left {
    border-radius: 2px;
    margin-top: 0px;
    box-shadow: none !important;
    background: none !important;
}
</style>