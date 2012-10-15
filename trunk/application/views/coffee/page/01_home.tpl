<!DOCTYPE html>
<html>
    <head>
        <title>Admin Planners!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="{{base_url()}}js/jquery-1.7.2.js"></script>
        <script src="{{base_url()}}js/vadilation.js"></script>
        <script src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>
        <link href="{{base_url()}}syslib/tab/tab_.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/bubble.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/24_grid_960.css" type="text/css" rel="stylesheet"/>
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
<div class="" style=";height: 92px">
    <div class="container container_24" style=";height: 92px">
        <div class="grid_12">
        <div class="grid_2">
            <img src="http://www.gbs.com.tw/images/logo11.png"/>
        </div>
        <div class="grid_6">
            <img src="http://www.gbs.com.tw/images/logo12.png"/>
        </div>
        </div>
        <div class="grid_12">
        </div>
    </div>
</div>
<div class="" style="background: #B39970;height: 40px;border-bottom: 5px solid #AE9063">
    <div class="container container_24 navMenu" style="">
        <div class="grid_3 pr" style="height: 40px">
            <div class="item active">
                Trang chủ
            </div>      
        </div>
        <div class="grid_3 pr" style="height: 40px">
            <div class="item">
                Giới thiệu
            </div>
        </div>
        <div class="grid_3 pr" style="height: 40px">
                <div class="item">
                Sản phẩm
                </div>
            
        </div>
        <div class="grid_4 pr" style="height: 40px">
            <div class="item">
                Hợp tác kinh doanh
            </div>
        </div>
        <div class="grid_3 pr" style="height: 40px">
            <div class="item">
                Liên hệ
            </div>
        </div>
    </div>
</div>            
<div style="height: 6px; background: url(http://dealgiadung.com/deal_css/images/04_menu_shadow.png)">
</div>
<div class="container container_24" style="">

    <div class="grid_24" style="border-left: 1px solid #BEA787;border-right: 1px solid #BEA787;">
        <div class="grid_24 bg" style="min-height: 360px">
            <div class="grid_6">
                a
            </div>
            <div class="grid_18">
                <div style="padding: 20px 20px 60px 20px;">
                    <div class="grid_17" style="background: #ccc">
                    a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="grid_24 bdt">
        a<br/>a<br/>a<br/>a<br/>
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