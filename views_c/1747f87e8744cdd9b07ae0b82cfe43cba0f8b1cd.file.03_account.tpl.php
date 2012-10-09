<?php /* Smarty version Smarty-3.1.7, created on 2012-08-08 08:37:10
         compiled from "application\views\admin-planners\03_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18978501f364938bd12-44338962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1747f87e8744cdd9b07ae0b82cfe43cba0f8b1cd' => 
    array (
      0 => 'application\\views\\admin-planners\\03_account.tpl',
      1 => 1344407798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18978501f364938bd12-44338962',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_501f36493a52e',
  'variables' => 
  array (
    'configs' => 0,
    'contentofview' => 0,
    '_SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501f36493a52e')) {function content_501f36493a52e($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.classic.css" type="text/css" />
<link type="text/css" href="<?php echo base_url();?>
css/adm/adm.css" rel="stylesheet" media="all" title='style' />
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqx-all.js"></script>
<!--    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.selection.js"></script>	
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.filter.js"></script>	
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.sort.js"></script>		
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxdata.js"></script>	
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxlistbox.js"></script>	
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.pager.js"></script>		
<script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxdropdownlist.js"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>
script/admin-planners/00_function.js"></script>
<div style="margin-left: 0px;
    width: 960px;
    display: inline-block;
    min-height: 500px;
    background: #F1F1F1;
    bottom: 0;
    ">
    <div style="display: block;" id="_main-content-page">
        <div class="detail-dialog unH" style="text-align: center;width: auto;height: auto">
            <div class="dialog-close-button id-detail-dialog-close-button hidden">
                <div class="dialog-close-x"></div>
            </div>
            <div class="detail-dialog-header" style="height: 82px;width: 960px;background: #EEE;">
                <div class="detail-dialog-header" style="width: 960px">
                    <div class="detail-dialog-header-block" style="height: auto;padding: 0 0 0 2px">
                        <div class="title-tag-item-detail" style="width: 940px">
                            <h1 style="line-height: 78px"><?php echo $_smarty_tpl->tpl_vars['configs']->value["title"];?>
</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-dialog-body" style="width: auto;height: auto">
                <div class="detail-dialog-tab-pane" style="width: auto;height: auto">
                    <div class="goog-tab-content ">
                        <div class="detail-dialog-tab-content id-detail-dialog-all-tab-content">
                            <div style="padding: 0" class="id-product-all">
                                <?php if (isset($_smarty_tpl->tpl_vars['contentofview']->value)){?>
                                    <?php echo $_smarty_tpl->tpl_vars['contentofview']->value;?>

                                <?php }else{ ?>
                                    Loadding...
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>

 <script type="text/javascript">
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
        notices.init();
    });

</script>
                            
<div id="window-notice">
    <div>
        <div style="position: relative;padding-left: 24px">
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" 
                    src="<?php echo base_url();?>
images/icon/16/dialog_warning.png" alt="" />
            Notication
        </div>
    </div>
    <div>Notice Content</div>
</div>
<div id="window-message">
    <div>
        <div style="position: relative;padding-left: 24px">
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" 
                    src="<?php echo base_url();?>
images/icon/16/error.png" alt="" />
            Message
        </div>
    </div>
    <div>Message Content</div>
</div>
<div id="window-error">
    <div>
        <div style="position: relative;padding-left: 24px">
            <img style="position: absolute;top: 0;left: 0px;" width="14" height="14" 
                    src="<?php echo base_url();?>
images/icon/16/img_Error.png" alt="" />
            Error
        </div>
    </div>
    <div>Error Content</div>
</div>
                                
 <?php echo print_r($_smarty_tpl->tpl_vars['_SESSION']->value);?>
<?php }} ?>