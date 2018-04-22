<script type="text/javascript">
$(document).ready(function(){
	vii_interval = setInterval('im.updateDialogs()', 2000);
	pHate = location.hash.replace('#', '');
	if(pHate)
		im.open(pHate);
});
</script><div class="im_flblock">

<style>
.cont_border_left {
background: none;
box-shadow: none;
}

.head_user {
    padding: 6px 10px;
    transition: background 200ms ease;
    position: relative;
    height: 36px;
    margin-right: -109px;
}


.im_del_dialog {
    width: 11px;
    color: #B8CBDF;
    height: 11px;
    font-size: 17px;
    margin-left: 198px;
    margin-top: -71px;
}

.im_flblock {
    padding: 15px;
    float: left;
    margin: -11px;
    color: #555;
    margin-bottom: -15px;
    overflow-y: auto;
    width: 213px !important;
    border-right: none;
    height: 557px !important;
    border-bottom: none;
    position: relative;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8;
    top: -1px;
    margin-left: -16px;
    background: #fff;
}

#body{}
::-webkit-scrollbar {
width: 5px;
height:37px;
}
::-webkit-scrollbar-track-piece {
-webkit-border-radius: 1px;
}
::-webkit-scrollbar-thumb:vertical {
height: 5px;
background-color: #DAE1E8;
-webkit-border-radius: 100px;
/*border-radius:100px; -moz-border-radius:100px; -webkit-border-radius:100px; -khtml-border-radius: 100px;*/
}
::-webkit-scrollbar-thumb:vertical:active {
height: 5px;
background-color: #BEC8D3;
border-radius:100px;
-webkit-border-radius: 100px;
/*border-radius:100px; -moz-border-radius:100px; -webkit-border-radius:100px; -khtml-border-radius: 100px;*/
}
.content {
    float: left;
    width: 648px;
    margin-top: 8px;
    word-wrap: break-word;
    margin-left: 104px !important;
}
</style>



<div class="clear"></div><span id="updateDialogs"></span>{dialogs}<div class="clear"></div></div><div class="im_head fl_l" id="imViewMsg" style="    position: relative;"><div class="info_center"><div style="padding-top:128px">

<div class="icon-mail-4"></div>

{translate=lang_msgnewd}</div></div></div>