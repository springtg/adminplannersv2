<?php /* Smarty version Smarty-3.1.7, created on 2012-08-11 10:19:35
         compiled from "application\views\quayso_ngaokiem\03_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143285026084d5977f1-67866195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2a1b8eaad339c5572dd0d2cb5e037eb0f5cfee0' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\03_login.tpl',
      1 => 1344673149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143285026084d5977f1-67866195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5026084d6243e',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5026084d6243e')) {function content_5026084d6243e($_smarty_tpl) {?><img src="<?php echo base_url();?>
css_quayso_NK_3-8/images/Quay-số_20.png" width="610" height="330" />

<script type="text/javascript">
        $(document).ready(function () {
            LoginFRM.init();  
            LoginFRM.show();  
        });
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
        <form method="post" onsubmit="LoginFRM.login();return false;">
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
                    <input type="button" value="Cancel" onclick="LoginFRM.close();" class="showWindowButton id-close-btn" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</div><?php }} ?>