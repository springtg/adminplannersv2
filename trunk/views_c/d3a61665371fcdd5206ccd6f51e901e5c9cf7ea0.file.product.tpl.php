<?php /* Smarty version Smarty-3.1.7, created on 2012-07-27 05:26:13
         compiled from "application\views\daugia\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85695010f24ce0d364-18966104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a61665371fcdd5206ccd6f51e901e5c9cf7ea0' => 
    array (
      0 => 'application\\views\\daugia\\product.tpl',
      1 => 1343359572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85695010f24ce0d364-18966104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5010f24ce14fe',
  'variables' => 
  array (
    'css_js' => 0,
    'menu' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5010f24ce14fe')) {function content_5010f24ce14fe($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Tools</title>
        <meta http-equiv="content-type" content="text/HTML; charset=UTF-8" />
        <?php echo $_smarty_tpl->tpl_vars['css_js']->value;?>

</head>
<body class="pt0 pl0 pb0 pr0 mt0 ml0 mb0 mr0" style="background: url(<?php echo base_url();?>
images/bg/10.png) center repeat;">
    <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

    <div class="container container_24" style="padding-top: 30px">
        
        
        <div style="
            position: relative;
            display: inline-block;
            border-right: 1px solid #C6C6C6;
            border-left: 1px solid #C6C6C6;
            width: 960px;
            background: #fbfbfb;
        ">
            <div style="display: block" id="niv-content">

                <?php echo $_smarty_tpl->tpl_vars['product']->value;?>


            </div>


        </div>
        <div class="clear">&nbsp;</div>
        <div class="grid_24 tranf10" style="border:1px solid #ccc">
            <h2 class="pl20 pr20 pt12 pb12">
            Foot
            </h2>
        </div>
        <div class="clear">&nbsp;</div>

    </div>
        <div class="hidden" id="id-message-growl"
             style="">
            <div class="dialog-close-button id-detail-dialog-close-button" style="top:0;right: 0;cursor: pointer">
                <div class="dialog-close-x" onclick="hidemsg();"></div>
            </div>
            <div class="id-message-growl-content">Please wait...</div>
        </div>
</body>
</html><?php }} ?>