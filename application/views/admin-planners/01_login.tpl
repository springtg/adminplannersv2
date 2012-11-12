<!DOCTYPE html>
<html>
    <head>
        <title>Admin Planners!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <script src="{{base_url()}}js/jquery-1.7.2.js"></script>
        <script src="{{base_url()}}js/vadilation.js"></script>
        <script src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>
        <link href="{{base_url()}}syslib/tab/tab.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/bubble.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/24_grid_960.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="overflow-y: scroll;">
        {{include file='../sys/01_notice.tpl'}}
        {{include file='../sys/02_script.tpl'}}
        <div class="pa l50pc t50pc grid_10 reprefix-5 mt-160 bshd13" style="margin-top: -120px;border: 1px solid #ccc">
            <div class="pt1 pb1 pl1 pr1">
                <h4 class="pl20 pt11 pb12 pr20 ovfh mt0 mb0 " style="background: #ccc">Đăng nhập</h4>
            </div>
            <form id="frmlogin" name="frmlogin" 
                  onsubmit="login();"
                  target="integration_asynchronous" method="post" 
                  action="{{base_url('sys/excution/nothing')}}">
                <div class="pt20 pb20 pl20 pr20">
                    <div class="grid_3">
                        <label class="classic-lable">User Name</label>
                    </div>
                    <div class="grid_6">
                        <div class="pr16 pb12">
                            <input type="text" id="txtusername" name="txtusername" class="classic-input w100pc"/>
                        </div>
                    </div>
                    <div class="grid_3">
                        <label class="classic-lable">Password</label>
                    </div>
                    <div class="grid_6">
                        <div class="pr16">
                            <input type="password" id="txtpassword" name="txtpassword" class="classic-input w100pc"/>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="pt0 pb20 pl20 pr20 tac">
                    <button type="submit" class="classic-button"><span>Login</span></button>
                </div>
                <div class="pt0 pb20 pl20 pr20">
                    <span class="error">
                         
                    </span>
                </div>
                <span class="pa r20 b20"><tt>Your IP {{getIP()}} </tt></span>
            </form>
        </div>
        <script type="text/javascript">
            function login(){
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
                isrunning=true;
                jqxAjax(url,data,function(result){
                    isrunning=false;
                    try{
                        if(result.code<0){
                            ShowNoticeDialogMessage(result.msg);
                        }else{
                            $(".error").html("Login success. Redirect in 3 second...<br/>Press F5 if your browse dont redirect.");
                            setTimeout(function(){
                                location.reload();
                            },3000);
                        }
                    }catch(e){                                    
                        ShowErrorDialogMessage(e.message);
                    }
                });
            }    
        </script>
    </body>
</html>