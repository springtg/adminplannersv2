<!DOCTYPE html>
<html>
    <head>
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

                        <td><input type="text" id="txtpassword"  name="txtpassword" class="classic-input"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Đăng nhập" class="classic-button"/></td>
                    </tr>
                </table>

            </form>
        </center>


    </div>
</span>

<div style="min-width: 960px">
    <!--    <div class="head" style="position: absolute;top: 0px;bottom: 0;left: 0;right: 0;background: #000;height: 40px">
            <div class="abc"></div>
            <span onclick="$( '#dialog' ).dialog( 'open' )">Đăng n</span>
            <input type="button" class="classic-button" value="Show Error Dialog Message" onclick="ShowErrorDialogMessage('ghjjadadjadjakdladldkjdkjalkdjladj adljladj adlkjlajd dalknaldj');"/>
            <input type="button" class="classic-button" value="Show Notice Dialog Message" onclick="ShowNoticeDialogMessage('ghjjadadjadjakdladldkjdkjalkdjladj adljladj adlkjlajd dalknaldj');"/>
            <input type="button" class="classic-button" value="Show Confirm Dialog Message" 
                   onclick="ShowConfirmDialogMessage('ghjjadadjadjakdladldkjdkjalkdjladj adljladj adlkjlajd dalknaldj','Đăng nhập',function(){alert(0);});"/>
            <input type="text" class="classic-input"/>
            <input type="button" class="classic-button" value="Đăng Nhập" onclick="login.Show();"/>
        </div>-->
    <div class="content" style="">
        <div style="">
            <div class="pets tab4">
                <div class="left">
                    <div class="hed" style="height: 28px">
                        <div style="padding:4px 12px">
                            Admin Planners
                            →

                        </div>
                    </div>
                    <div class="hd" style="position: relative;">
                        <div style="position: absolute;top: 0;right: 8px">
                            {{if isset($_SESSION["ADP-USER"])}}
                                <b>{{$_SESSION["ADP-USER"]["name"]}}</b>
                                <a href="{{base_url("sys/excution/logout")}}">
                                    Logout
                                </a>
                            {{else}}
                                <a href="javascript:login.Show();">
                                    Login
                                </a>
                            {{/if}}
                        </div>
                        <ul class="tab-nav">
                            {{if isset($Data["tabs"][0])}}
                            {{foreach $Data["tabs"] as $tab}}
                            <li class="hover"><a href="">{{$tab["display"]}}</a></li>
                            {{/foreach}}
                            {{else}}
                                <li class="hover"><a href="">Default</a></li>
                            {{/if}}
                            
                        </ul>
                    </div>
                    <div class="bd">
                        {{if isset($jqxGrid)}}
                            {{if isset($_SESSION["ADP-USER"])}}
                                {{$jqxGrid}}
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
    //            $('.content').slimscroll({
    //            width: '100%',
    //            height: '100%',
    //            railVisible: true,
    //            allowPageScroll: true
    //        });
    //ShowLoadding();
    var login=new ConfirmDialogMessage($('.dialog-login'),'Đăng Nhập',submitToLogin );
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
                    
                    var notice=new NoticeDialogMessage(result.msg,"Thông Báo",function(){ login.Show(); });
                    //notice.SetCallBack=function(){ login.Show(); }
                    notice.Show();
                    //ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage("Thành công",function(){
                        location.reload();
                    });
                }
            }catch(err){
                showUIWindowloginmsg("Lỗi",err.message);
            
                
            }
        });
    }
</script>


</body>
</html>