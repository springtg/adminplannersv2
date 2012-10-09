<?php /* Smarty version Smarty-3.1.7, created on 2012-10-06 12:24:39
         compiled from "application\views\quayso_ngaokiem\05_ketqua.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28922502a27c7c3e1c9-87763971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bfc210ff87ddfb11a367f3284dc607142d204f3' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\05_ketqua.tpl',
      1 => 1349497477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28922502a27c7c3e1c9-87763971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_502a27c7c3ed9',
  'variables' => 
  array (
    'params' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_502a27c7c3ed9')) {function content_502a27c7c3ed9($_smarty_tpl) {?><div style="padding: 8px 9px 8px 20px">
    <div class="smScrollContent1 nano" style="padding: 0;margin: 0">
        <div class="content">
            <div class="" style="padding-right: 18px">
                <h1>Kết quả quay thưởng của bạn</h1>
                
                <p>
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value["kq"])){?>
                    <?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['k']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['params']->value["kq"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
$_smarty_tpl->tpl_vars['k']->_loop = true;
?>
                    Ngày <?php echo $_smarty_tpl->tpl_vars['k']->value["insert"];?>
 - Server <b><?php echo $_smarty_tpl->tpl_vars['k']->value["server"];?>
</b> - Nhân vật <b><?php echo $_smarty_tpl->tpl_vars['k']->value["charactor"];?>
</b>
                    - Bạn đã quay trúng <b><?php echo $_smarty_tpl->tpl_vars['k']->value["productname"];?>
</b>.<br/>
                    <?php } ?>
                    <?php }else{ ?>
                        Bạn chưa đăng nhập.
                        <?php }?>
                </p>

            </div>
        </div>
    </div>
    <div class="clear" style="clear: both"></div>
<!--                <div id="scrollContentText1" class="smScroller1">
            <span class="smScrollUp1"><img src="blank.gif" height="1"></span>
            <span class="smScrollDx1"><img src="images/icon_scroller_product.gif" alt="Kéo Xuống Để Xem" name="scroll" border="0"></span> 	  	
            <span class="smScrollDn1"><img src="blank.gif" height="1"></span>
    </div>-->
</div><?php }} ?>