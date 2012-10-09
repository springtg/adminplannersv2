<?php /* Smarty version Smarty-3.1.7, created on 2012-10-09 10:02:42
         compiled from "application\views\admin-planners\00_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:683050728d05473e41-64485915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2289a30779cd35e3961f24bb3e04fab626908a86' => 
    array (
      0 => 'application\\views\\admin-planners\\00_template.tpl',
      1 => 1349769593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '683050728d05473e41-64485915',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50728d057dce6',
  'variables' => 
  array (
    'NOTICE' => 0,
    'SCRIPT' => 0,
    'TABS' => 0,
    'JQXGRID' => 0,
    '_SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50728d057dce6')) {function content_50728d057dce6($_smarty_tpl) {?><!DOCTYPE html>
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
    <div class="content" style="">
        <div style="">
            <div class="pets tab4">
                <div class="left">
                    <?php echo $_smarty_tpl->tpl_vars['TABS']->value;?>

                    <div class="bd">
                        <?php if (isset($_smarty_tpl->tpl_vars['JQXGRID']->value)){?>
                            <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"])){?>
                                <?php echo $_smarty_tpl->tpl_vars['JQXGRID']->value;?>

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