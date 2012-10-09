<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 06:00:17
         compiled from "application\views\quayso_ngaokiem\adbi\01_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217355029cd51a875e9-49439473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81c60ae73be75132dfd4302aafe80c7a993f9563' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\01_manage.tpl',
      1 => 1344916632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217355029cd51a875e9-49439473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'styles' => 0,
    'scripts' => 0,
    'menus' => 0,
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5029cd51ac3c4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5029cd51ac3c4')) {function content_5029cd51ac3c4($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Tools</title>
        <meta http-equiv="content-type" content="text/HTML; charset=UTF-8" />
        <?php echo $_smarty_tpl->tpl_vars['styles']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['scripts']->value;?>

</head>
<body class="pt0 pl0 pb0 pr0 mt0 ml0 mb0 mr0" style="background: url(<?php echo base_url();?>
images/bg/10.png) center repeat;">
    <?php echo $_smarty_tpl->tpl_vars['menus']->value;?>

    <div class="container container_24" style="padding-top: 30px">
        
        
        <div style="
            position: relative;
            display: inline-block;
            border-right: 1px solid #C6C6C6;
            border-left: 1px solid #C6C6C6;
            width: 960px;
            background: #F1F1F1;
        ">
            <div style="display: block" id="niv-content">
                <?php echo $_smarty_tpl->tpl_vars['view']->value;?>

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