<!DOCTYPE html>
<html>
    <head>
        <title>Admin Planners!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="{{base_url()}}js/jquery-1.7.2.js"></script>
        <script src="{{base_url()}}js/vadilation.js"></script>
        <script src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>
        <link href="{{base_url()}}syslib/tab/tab.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
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

<div style="min-width: 960px">
    <div class="content" style="">
        <div style="">
            <div class="pets tab4">
                <div class="left">
                    {{$TABS}}
                    <div class="bd">
                        {{if isset($JQXGRID)}}
                            {{if isset($_SESSION["ADP-USER"])}}
                                {{$JQXGRID}}
                            {{else}}
                                <div style="padding: 40px;font-weight: bold;color: red">
                                    Bạn chưa đăng nhập.
                                </div>
                            {{/if}}
                        {{else}}
                            <div style="padding: 40px;font-weight: bold;color: red">
                                Không tìm thấy nội dung hiện thị.
                            </div>
                        {{/if}}
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
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