<!DOCTYPE html>
<html>
    <head>
        <title>Goden bell S Cofee!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="{{base_url()}}js/jquery-1.7.2.js"></script>
        <script src="{{base_url()}}js/vadilation.js"></script>
        <script src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>
        <link href="{{base_url()}}syslib/tab/tab_.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/bubble.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/24_grid_960.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}css_coffee/css/style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="overflow-y: scroll;">
    {{if isset($NOTICE)}}{{$NOTICE}}{{/if}}
{{if isset($SCRIPT)}}{{$SCRIPT}}{{/if}}

<span style="display: none">
    <div title="Đăng nhập" class="dialog-login" style="position: relative">
        <center>
            <form method="post" action="{{base_url('sys/excution/nothing')}}" onsubmit="submitToLogin();" target="integration_asynchronous" 
                  name="frmlogin" id="frmlogin">
                <table>
                    <tr>
                        <td>Tên Đăng Nhập</td>

                        <td><input type="text" id="txtusername" name="txtusername" class="classic-input"/></td>
                    </tr>
                    <tr>
                        <td>Mật Khẩu</td>

                        <td><input type="password" id="txtpassword"  name="txtpassword" class="classic-input"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" style="width: 0;height: 0;border: none;padding: 0;margin: 0" />
                        </td>
                    </tr>
                </table>

            </form>
        </center>


    </div>
</span>
<div class="">
    <div class="container container_24 head pr">
        <div class="head-flash">
            <div class="flashContent">
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="960" height="200" id="AppData/Local/Adobe/Flash CS5.5/en_US/Configuration/RECOVER_Untitled-3_20121015090759" align="middle">
                    <param name="movie" value="{{base_url()}}css_coffee/head-first.swf" />
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#333333" />
                    <param name="play" value="true" />
                    <param name="loop" value="true" />
                    <param name="wmode" value="transparent" />
                    <param name="scale" value="showall" />
                    <param name="menu" value="true" />
                    <param name="devicefont" value="false" />
                    <param name="salign" value="" />
                    <param name="allowScriptAccess" value="sameDomain" />
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="{{base_url()}}css_coffee/head-first.swf" width="960" height="200">
                        <param name="movie" value="{{base_url()}}css_coffee/head-first.swf" />
                        <param name="quality" value="high" />
                        <param name="bgcolor" value="#333333" />
                        <param name="play" value="true" />
                        <param name="loop" value="true" />
                        <param name="wmode" value="transparent" />
                        <param name="scale" value="showall" />
                        <param name="menu" value="true" />
                        <param name="devicefont" value="false" />
                        <param name="salign" value="" />
                        <param name="allowScriptAccess" value="sameDomain" />
                        <!--<![endif]-->
                        <a href="http://www.adobe.com/go/getflash">
                            <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                        </a>
                        <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                </object>
            </div>
        </div>
        <a href="{{base_url('coffee')}}">
            <div class="grid_8" style="top: 35px;left: 22px;">
                <div class="grid_2">
                    <img src="http://www.gbs.com.tw/images/logo11.png"/>
                </div>
                <div class="grid_6">
                    <img src="{{base_url()}}css_coffee/logo.png"/>
                </div>
            </div>
        </a>
        <div class="grid_12">
        </div>
        <div class="head-second"></div>
        <div class="head-page"></div>
        <div class="head-third"></div>
        <div class="nav_menu">
            {{include file='../sub/01_nav_.tpl'}}
            <div class="address">
                The Company Name<br/>
                Address : <br/>
                Phone :<br/>
                Email : <br/>
                ...<br/>
            </div>
        </div>
    </div>
</div>
<div class="container container_24" style="">

    <div class="grid_24" style="">
        {{$PAGE}}
    </div>
    <div class="grid_24 foot">
        <div class="foot-flash">
            <object classid="clsid:d27abb6e-ae6d-11cf-96b8-444553540000" width="961" height="200" id="AppData/Local/Adobe/Flash CS5.5/en_US/Configuration/RECOVER_Untitled-3_20121015090759" align="middle">
                <param name="movie" value="{{base_url()}}css_coffee/foot.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#333333" />
                <param name="play" value="true" />
                <param name="loop" value="true" />
                <param name="wmode" value="transparent" />
                <param name="scale" value="showall" />
                <param name="menu" value="true" />
                <param name="devicefont" value="false" />
                <param name="salign" value="" />
                <param name="allowScriptAccess" value="sameDomain" />
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="{{base_url()}}css_coffee/foot.swf" width="961" height="200">
                    <param name="movie" value="{{base_url()}}css_coffee/foot.swf" />
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#333333" />
                    <param name="play" value="true" />
                    <param name="loop" value="true" />
                    <param name="wmode" value="transparent" />
                    <param name="scale" value="showall" />
                    <param name="menu" value="true" />
                    <param name="devicefont" value="false" />
                    <param name="salign" value="" />
                    <param name="allowScriptAccess" value="sameDomain" />
                    <!--<![endif]-->
                    <a href="http://www.adobe.com/go/getflash">
                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                    </a>
                    <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
        </div>
    </div>
    <div class="clear"></div>
</div>


<script>
    var login=new ConfirmDialogMessage($('.dialog-login'),'Login',submitToLogin );
    function submitToLogin(){
        if(isrunning) return;
    
        if(!_FcheckFilled($("#txtusername").val())){
            $("#txtusername").focus();
            return;
        }
        if(!_FcheckFilled($("#txtpassword").val())){
            $("#txtpassword").focus();
            return;
        }
        var url = baseurl+"sys/excution/login"
        var data={
            username : $("#txtusername").val(),
            password : $("#txtpassword").val()
        }
        login.Hide();
        isrunning=true;
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    
                    var notice=new NoticeDialogMessage(result.msg,"Notice Message",function(){ login.Show(); });
                    //notice.SetCallBack=function(){ login.Show(); }
                    notice.Show();
                    //ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage("Login Sussess.! Wellcom to admin planners.","Notice Message",function(){
                        location.reload();
                    });
                }
            }catch(err){
                showUIWindowloginmsg("Error!",err.message);
            
                
            }
        });
    }
</script>


</body>
</html>
