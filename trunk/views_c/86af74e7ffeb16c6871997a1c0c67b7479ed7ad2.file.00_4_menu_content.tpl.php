<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 05:45:26
         compiled from "application\views\admin-planners\00_4_menu_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:892850236c7dcc9c92-88756899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86af74e7ffeb16c6871997a1c0c67b7479ed7ad2' => 
    array (
      0 => 'application\\views\\admin-planners\\00_4_menu_content.tpl',
      1 => 1344915543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '892850236c7dcc9c92-88756899',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50236c7dd3b91',
  'variables' => 
  array (
    '_SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50236c7dd3b91')) {function content_50236c7dd3b91($_smarty_tpl) {?>
<div id="cdtabarea" style="width: 100%;z-index: 10000;height: 30px; position: fixed">
    <div class="container container_24" style="margin: 0 auto;">
        <ul id="cdtoptabs" style="float: left;width: 962px">
            <li class="cdtopn cdselected"><a href="<?php echo site_url('admin-planners/product_');?>
" accesskey="1">Home</a></li>
            <li class="cdtopn cdhzmore "><a href="">Manage</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png" alt="">
                <ul class="cdsectabs">
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/category');?>
">Category</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/product_');?>
">Product</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/news');?>
">New</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/auction');?>
">Auction</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/account');?>
">Account</a></li>
                    <li class="cdsecn"><a href="<?php echo site_url('admin-planners/authority');?>
">Authority</a></li>
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