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
    <div class="syshead">
        {{include file='../sys/03_menu.tpl'}}
    </div>
    <div class="content" style="">
        <div style="">
            <div class="pets tab4">
                <div class="left">
                    {{include file="../admin-planners/tabs/01_tabs.tpl"}}
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
    <div>
        <div class="pr" style="width: 50%;display: inline-block;float: left">
            <div class="pl20 pr20 pt12 pb12">
                <b>Admin Planners 2.0</b><br/>
                <span style="font-weight: normal">Được xây dựng và phát triển bởi <a href="javascript:$('.about-box').show();"><b>Mr. Khuong</b></a></span>
            </div>
            <div class="jfk-bubble jfk-bubble-promo grayc about-box hidden" 
                 style="visibility: visible; left: 100px;bottom: 36px; opacity: 1; position: absolute">
                <div class="jfk-bubble-closebtn giftnotice btn" onclick="$('.about-box').hide();" style=""></div>
                <div class="jfk-bubble-content-id">
                    <div class="promo-content" style="width: 200px; ">
                        <b>Mr. Khuong</b><br/>
                        Khương Xuân Trường <sup>[Name]</sup><br/>
                        khuongxuantruong@gmail.com <sup>[Email]</sup><br/>
                        khuongxuantruong <sup>[Skype]</sup><br/>
                        0985 747 240 <sup>[Phone]</sup>
                    </div>
                </div>
                <div class="jfk-bubble-arrow-id jfk-bubble-arrow jfk-bubble-arrowdown" style="left: 114px">
                    <div class="jfk-bubble-arrowimplbefore"></div>
                    <div class="jfk-bubble-arrowimplafter"></div>
                </div>
            </div>
        </div>
        <div style="width: 50%;display: inline-block;float: left;text-align: right">
            <div class="pl20 pr20 pt12 pb12">
                Được tích hợp các control  <br/> 
                Bộ control <a href="http://www.jqwidgets.com" target="_blank"><b>jqxWidget</b></a>  
                Editer -    <a href="http://www.tinymce.com/" target="_blank"><b>tinyMCE</b></a> , 
                File Manage - <a href="http://ckfinder.com/" target="_blank"><b>CKFinder</b></a>.
            </div>
        </div>
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