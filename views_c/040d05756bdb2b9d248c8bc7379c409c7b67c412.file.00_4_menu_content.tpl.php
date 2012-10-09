<?php /* Smarty version Smarty-3.1.7, created on 2012-08-15 09:47:44
         compiled from "application\views\quayso_ngaokiem\adbi\00_4_menu_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145815029d01a916a03-69650196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '040d05756bdb2b9d248c8bc7379c409c7b67c412' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\00_4_menu_content.tpl',
      1 => 1345016857,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145815029d01a916a03-69650196',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5029d01a98d6d',
  'variables' => 
  array (
    '_SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5029d01a98d6d')) {function content_5029d01a98d6d($_smarty_tpl) {?>
<div id="cdtabarea" style="width: 100%;z-index: 10000;height: 30px; position: fixed">
    <div class="container container_24" style="margin: 0 auto;">
        <ul id="cdtoptabs" style="float: left;width: 962px">
            <li class="cdtopn cdselected"><a href="<?php echo site_url('quayso_ngaokiem/product');?>
" accesskey="1">Home</a></li>
            <li class="cdtopn cdhzmore "><a href="">Manage</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png" alt="">
                <ul class="cdsectabs">
                    
<!--                    <li class="cdsecn"><a href="<?php echo site_url('quayso_ngaokiem/account');?>
">Account</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('quayso_ngaokiem/authority');?>
">Authority</a></li>-->
                    <li class="cdsecn"><a href="<?php echo site_url('quayso_ngaokiem/product');?>
">Product</a></li>
<!--                    <li class="cdsecn"><a href="<?php echo site_url('quayso_ngaokiem/product/log');?>
">Product log</a></li>-->
                    <li class="cdsecn"><a href="<?php echo site_url('quayso_ngaokiem/product/history');?>
">History</a></li>
                    <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                </ul>
            </li>
            <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["USER"])){?>
            <li class="cdtopn cdhzmore fr"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value["USER"]["name"];?>
</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png" alt="">
                    <ul class="cdsectabs">
                        <li class="cdsecn" ><a href="javascript:LoginFRM.logout();">My Authority</a></li>
                        <li class="cdsecn" ><a href="javascript:LoginFRM.logout();">Logout</a></li>
                        <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                    </ul>
            </li>
            <?php }else{ ?>
            <li class="cdtopn fr"><a href="javascript:LoginFRM._show();">Login</a></li>
            <?php }?>
            <li class="cdclr">&nbsp;</li>
        </ul>
    </div>
</div><?php }} ?>