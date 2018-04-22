<style>
#bg { position: fixed; top: 0; left: 0; z-index:-1;}
.bgwidth { width: 100%; }
.bgheight { height: 100%; }
.videos_input{
color: #FFFFFF;
padding:7px;
background: rgba(0, 0, 0, 0.49);
}
.pageBg {
  background: none;
}
body, html{background:none}
.inp{
color: #FFFFFF;
background:#537FB0 !important;
  padding: 7px;
  border: 0px;
  margin-top: 10px;
  background: rgba(0, 0, 0, 0.49);
}
</style>

<script>
$(window).load(function() {    
        var theWindow        = $(window),
            $bg              = $("#bg"),
            aspectRatio      = $bg.width() / $bg.height();
        function resizeBg() {
                if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                    $bg
                        .removeClass()
                        .addClass('bgheight');
                } else {
                    $bg
                        .removeClass()
                        .addClass('bgwidth');
                }
        }
        theWindow.resize(function() {
                resizeBg();
        }).trigger("resize");
});
</script>
<img src="{theme}/images/fon.jpg" id="bg" alt="">


<div class="clr" style="padding-top:15px"></div>

  
 <button name="log_in" class="button" style="display:block; margin:0 auto;margin-top:-55px;color: #537FB0;width: 97%;background: #FFF;font-size: 14px;font-weight: bold;" onclick="$('#reg').show('fast');">Зарегистрироваться</button>  
<div style="padding:10px; display:none" id="reg" >
<div style="margin-top:5px">
<div class="logB" style="color:#FFF;">Ваше имя</div>
<input type="text" class="inp" style="    width: 96%;background: rgb(68, 111, 159) !important;margin-bottom:10px" maxlength="30" id="name" />
<div class="logB" style="color:#FFF;">Ваша фамилия</div>
<input type="text" class="inp" style="    width: 96%;background: rgb(68, 111, 159) !important;margin-bottom:10px" maxlength="30" id="lastname" />
</div>
<select id="sex" class="inp sel_reg" style="    width: 96%;background: rgb(57, 99, 145) !important;margin-bottom:10px">
 <option value="0">Выбрать пол</option>
 <option value="1">мужской</option>
 <option value="2">женский</option>
</select>
<div class="err_red no_display frmero" id="err2" style="margin-bottom:0px"></div>
<div class="logB" style="color:#FFF;">Электронный адрес</div>
<input type="text" class="inp" style="    width: 96%;background: rgb(68, 111, 159) !important;margin-bottom:10px" maxlength="30" id="email" />
<div class="logB" style="color:#FFF;">Пароль</div>
<input type="password" class="inp" style="    width: 96%;background: rgb(68, 111, 159) !important;margin-bottom:10px" maxlength="30" id="new_pass" />
<div class="logB" style="color:#FFF;">Еще раз пароль</div>
<input type="password" class="inp" style="    width: 96%;background: rgb(68, 111, 159) !important;margin-bottom:10px" maxlength="30" id="new_pass2" />
<div class="button_div"><button onClick="reg.finish(); return false" class="button">Зарегистрироваться</button></div>
</div>