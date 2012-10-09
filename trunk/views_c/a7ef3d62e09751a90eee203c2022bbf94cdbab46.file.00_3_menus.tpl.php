<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 05:59:52
         compiled from "application\views\quayso_ngaokiem\adbi\00_3_menus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183085029cd38104da2-97603603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ef3d62e09751a90eee203c2022bbf94cdbab46' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\00_3_menus.tpl',
      1 => 1344916632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183085029cd38104da2-97603603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5029cd3810a00',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5029cd3810a00')) {function content_5029cd3810a00($_smarty_tpl) {?><div id="id-menu-cdtabarea">

</div>
<script type="text/javascript">
        
        $(document).ready(function () {
            LoginFRM.reloadMenu();            
            LoginFRM.init();            
        });
        function reload_login_box(){
            
        }
</script>
<div id="window-login" class="hidden">
    <div id="windowHeader-login">
        <div style="position: relative;padding-left: 24px">
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" 
                    src="<?php echo base_url();?>
images/icon/16/login.png" alt="" />
            Login
        </div>
<!--        <span style="line-height: 20px">
            Login
        </span>-->
    </div>
    <div style="overflow: hidden;" id="windowContent-login">
        <form method="post" onsubmit="LoginFRM._login();return false;">
        <table style="width: 100%;padding: 16px 0">
            <tr>
                <td style="width: 120px;padding-left: 12px">User Name</td>
                <td>
                    <input type="text" id="txt-uname-login" class="text-input" style="width: 150px"
                            value=""/>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 12px;">Pass Word</td>
                <td>
                    
                    <input type="password" id="txt-pass-login" class="text-input" style="width: 150px"  
                        value=""/>
                    
                </td>
            </tr>
            <tr>
                <td colspan="2" class="tac" style="text-align: center;padding-top: 8px">
                    <input type="submit" value="Login" onclick="" class="showWindowButton id-login-btn" />
                    <input type="button" value="Cancel" onclick="LoginFRM._close();" class="showWindowButton id-close-btn" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
    <?php }} ?>