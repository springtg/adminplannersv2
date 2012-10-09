<?php /* Smarty version Smarty-3.1.7, created on 2012-08-31 10:31:48
         compiled from "application\views\quayso_ngaokiem\00_window.tpl" */ ?>
<?php /*%%SmartyHeaderCode:251995026145ebceb22-03470441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b7095fece9201785a68efea7c20051415b7b82' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\00_window.tpl',
      1 => 1346401907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251995026145ebceb22-03470441',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5026145ec00c8',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5026145ec00c8')) {function content_5026145ec00c8($_smarty_tpl) {?><script type="text/javascript">
    var notices = (function () {
        //Adding event listeners
        function _addEventListeners() {
            

        };
        //Creating all page elements which are jqxWidgets
        function _createElements() {
            var theme=notices.config.theme;
            
            $('#window-notice').jqxWindow({ 
                autoOpen: false,height: 'auto', width: 400, theme: theme,
                resizable: false, isModal: true, modalOpacity: 0.3
            });
            $('#window-message,#window-error').jqxWindow({ 
                autoOpen: false,height: 'auto', width: 400, theme: theme,
                resizable: false,isModal: true
            });
        };
        //Creating the demo window
        function _createWindow() {
            
        };
        return {
            config: {
                dragArea: null,
                theme: 'classic'
            },
            init: function () {
                //Creating all jqxWindgets except the window
                _createElements();
                //Attaching event listeners
                _addEventListeners();
                //Adding jqxWindow
                _createWindow();
            }
        };
    } ());
    $(document).ready(function () {
    var sw='<div id="window-notice">\
    <div>\
        <div style="position: relative;padding-left: 24px">\
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" \
                    src="<?php echo base_url();?>
images/icon/16/dialog_warning.png" alt="" />\
            Notication\
        </div>\
    </div>\
    <div>Notice Content</div>\
</div>\
<div id="window-message">\
    <div>\
        <div style="position: relative;padding-left: 24px">\
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" \
                    src="<?php echo base_url();?>
images/icon/16/error.png" alt="" />\
            Message\
        </div>\
    </div>\
    <div>Message Content</div>\
</div>\
<div id="window-error">\
    <div>\
        <div style="position: relative;padding-left: 24px">\
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" \
                    src="<?php echo base_url();?>
images/icon/16/img_Error.png" alt="" />\
            Error\
        </div>\
    </div>\
    <div>Error Content</div>\
</div>';
        $("#id-group-win-no").html(sw);
        notices.init();
        DebugFRM.init();
    });

</script>
                            


<script type="text/javascript">
        $(document).ready(function () {
            var strgroup='<div id="window-login" class="hidden">\
    <div id="windowHeader-login">\
        <div style="position: relative;padding-left: 24px">\
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14"\
                    src="<?php echo base_url();?>
images/icon/16/login.png" alt="" />\
            Login\
        </div>\
    </div>\
    <div style="overflow: hidden;" id="windowContent-login">\
        <form method="post" onsubmit="LoginFRM.login();return false;">\
        <table style="width: 100%;padding: 16px 0">\
            <tr>\
                <td style="width: 120px;padding-left: 12px">User Name</td>\
                <td>\
                    <input type="text" id="txt-uname-login" class="text-input" style="width: 150px"\
                            value=""/>\
                </td>\
            </tr>\
            <tr>\
                <td style="padding-left: 12px;">Pass Word</td>\
                <td>\
                    <input type="password" id="txt-pass-login" class="text-input" style="width: 150px"\
                        value=""/>\
                </td>\
            </tr>\
            <tr>\
                <td colspan="2" class="tac" style="text-align: center;padding-top: 8px">\
                    <input type="button" value="Login..." style="display:none" onclick="" class="showWindowButton id-login-btnddd" />\
                    <input type="submit" value="Login" onclick="" class="showWindowButton id-login-btn" />\
                    <input type="button" value="Cancel" onclick="LoginFRM.close();" class="showWindowButton id-close-btn" />\
                </td>\
            </tr>\
        </table>\
        </form>\
    </div>\
</div>\
<div id="window-debug" class="hidden">\
    <div id="windowHeader-debug">\
        <span style="line-height: 20px">\
            Debugs\
        </span>\
    </div>\
    <div style="overflow: hidden;" id="windowContent-debug">\
        <div id="tab-debug">\
                <ul style="margin-left: 4px;">\
                    <li class="id-editer-title"><span>Tài Khoản<span></li>\
                    <li>Nạp thẻ</li>\
                    <li>Doanh thu</li>\
                    <li>Vật Phẩm</li>\
                    <li>Other</li>\
                </ul>\
                <div class="tab0"></div> \
                <div class="tab1"></div>\
                <div class="tab2"></div>\
                <div class="tab3"></div>\
                <div></div>\
            </div>\
    </div>\
</div>';
            //setTimeout(function(){
                $("#id-group-win").html(strgroup);
                LoginFRM.init();
            //},2000);
              
        });
</script>
<span id="id-group-win" style="display: none">
                    </span>
<span id="id-group-win-no" style="display: none">
                    </span><?php }} ?>