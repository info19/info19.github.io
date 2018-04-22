[all-friends]
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')" class="activClass">{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" >{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')">{translate=lang_173}</li>
<li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
 [not-owner]<li onClick="Page.Go('/u{user-id}')">{translate=lang_171} {name}</li>[/not-owner]
    <div class="clear"></div>
</div>
[/all-friends]

[request-friends]
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')">{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" >{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')"class="activClass">{translate=lang_173}</li>
     <li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
    <div class="clear"></div>
</div>
[/request-friends]

[online-friends]
<div class="menuNews">
    <li onClick="Page.Go('/friends/{user-id}')" >{translate=lang_168}</li>
    <li onClick="Page.Go('/friends/online/{user-id}')" class="activClass">{translate=lang_169}</li>
    <li onClick="Page.Go('/friends/requests')">{translate=lang_173}</li>
<li onClick="Page.Go('/?go=search&query=&type=1')" style="float:right;">{translate=lang_poiskfr}</li>
 [not-owner]<li onClick="Page.Go('/u{user-id}')">{translate=lang_171} {name}</li>[/not-owner]
    <div class="clear"></div>
</div>
[/online-friends]