<div class="shadow_block doc_block" style="margin-left:0px;margin-right:0px;color: #9B9696;height: 42px;" id="doc_block{did}">
<table cellspacing="0" cellpadding="" width="993" style="text-align: left; height: px;font-size: 11px;"> 
<tbody><tr>
<td>

<span class="icon-doc" style="float: left;font-size: 16px;color: #A7A7A7;"></span>
<div id="data_doc{did}">
<a href="/index.php?go=doc&act=download&did={did}" onmouseover="Doc.showDocText({did})" onmouseout="Doc.hideDocText({did})" target="_blank">
<div class="doc_name cursor_pointer" id="edit_doc_name{did}" style="    font-weight: bold;
    color: rgb(33, 87, 139);
    margin-top: 3px;
    height: 15px;
    float: right;
    min-width: 211px;
    margin-left: -211px;
    overflow: hidden;">{name}</div></a> </div>
{view_{format}}
<div id="edit_doc_tab{did}" class="no_display" >
 <input type="text" class="inpst doc_input" value="{name}" maxlength="60" id="edit_val{did}" size="60" style="height: 18px;">
 <div class="clear" style="position: absolute;margin-top: -34px;margin-bottom:35px;margin-left: 278px;">
 <div class="button_div fl_l"><button onclick="Doc.SaveEdit('{did}', 'editLnkDoc{did}')" class="icon-ok-4" style="font-size: 16px;"></button></div>
 <div class="button_div_gray fl_l margin_left"><button onclick="Doc.CloseEdit('{did}', 'editLnkDoc{did}')" class="icon-cancel-5" style="font-size: 16px;"></button></div>
 </div>
</td>
<td style="width: 170px;color: #A7A7A7;">{date}</td>
<td style="width: 180px;color: #A7A7A7;">{format}</td>
<td style="width: 380px;color: #A7A7A7;">{size}</td>
<i class="fl_r cursor_pointer del icon-cancel-3" href="/" onclick="Doc.Del('{did}')" onmouseover="myhtml.title({did}, 'Удалить документ', 'wall_doc_')" id="wall_doc_{did}" style="    margin-top: 4px;"></i><i class="fl_r cursor_pointer edit icon-pencil-1" href="/" onclick="Doc.ShowEdit('{did}', this.id)" id="editLnkDoc{did}" style="    margin-top: 4px;"></i>
<td style=" border-left: none; width: 20px;">
</td>
</tr>
</tbody></table>
 <div class="clear"></div>
</div>