<?php /* Smarty version Smarty-3.1.7, created on 2012-10-08 16:07:10
         compiled from "application\views\sys\00_demo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235455070489dbbb5f2-93006715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1cedae61193454f963edf57c84350b30ef7afbd' => 
    array (
      0 => 'application\\views\\sys\\00_demo.tpl',
      1 => 1349683623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235455070489dbbb5f2-93006715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5070489dc3bd0',
  'variables' => 
  array (
    'NOTICE' => 0,
    'SCRIPT' => 0,
    '_SESSION' => 0,
    'jqxGrid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5070489dc3bd0')) {function content_5070489dc3bd0($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="<?php echo base_url();?>
js/jquery-1.7.2.js"></script>
        <script src="<?php echo base_url();?>
js/vadilation.js"></script>
        <script src="<?php echo base_url();?>
syslib/slimScroll/slimScroll.js"></script>
        <link href="<?php echo base_url();?>
syslib/tab/tab.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>
syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="overflow-y: scroll;">
    <?php if (isset($_smarty_tpl->tpl_vars['NOTICE']->value)){?><?php echo $_smarty_tpl->tpl_vars['NOTICE']->value;?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['SCRIPT']->value)){?><?php echo $_smarty_tpl->tpl_vars['SCRIPT']->value;?>
<?php }?>

<span style="display: none">
    <div title="Đăng nhập" class="dialog-login" style="position: relative">
        <center>
            <form method="post" action="<?php echo base_url('sys/excution/nothing');?>
" onsubmit="submitToLogin();" target="integration_asynchronous" 
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
                            <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"])){?>
                                <b><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"]["name"];?>
</b>
                                <a href="<?php echo base_url("sys/excution/logout");?>
">
                                    Logout
                                </a>
                            <?php }else{ ?>
                                <a href="javascript:login.Show();">
                                    Login
                                </a>
                            <?php }?>
                        </div>
                        <ul class="tab-nav">
                            <li id="b1" class="hover"><a href="">Vật Phẩm</a></li>
                            <li id="b2" ><a href="">Lịch Sử Quay Số</a></li>
                            <li id="b3" ><a href="">Log Vật Phẩm</a></li>

                        </ul>
                    </div>
                    <div class="bd">
                        <?php if (isset($_smarty_tpl->tpl_vars['jqxGrid']->value)){?>
                            <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"])){?>
                                <?php echo $_smarty_tpl->tpl_vars['jqxGrid']->value;?>

                            <?php }else{ ?>
                                <div style="padding: 40px;font-weight: bold;color: red">
                                    Bạn chưa đăng nhập.
                                </div>
                            <?php }?>
                        <?php }else{ ?>
                            <div style="padding: 40px;font-weight: bold;color: red">
                                Không tìm thấy nội dung hiện thị.
                            </div>
                        <?php }?>
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
</html><?php }} ?>