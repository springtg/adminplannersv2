<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 05:45:25
         compiled from "application\views\admin-planners\00_3_menus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215795013491b501b43-62525208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '853247a78ec546d04dfb2f147914f0fd44f89588' => 
    array (
      0 => 'application\\views\\admin-planners\\00_3_menus.tpl',
      1 => 1344915543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215795013491b501b43-62525208',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5013491b525a6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5013491b525a6')) {function content_5013491b525a6($_smarty_tpl) {?><div id="id-menu-cdtabarea">

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