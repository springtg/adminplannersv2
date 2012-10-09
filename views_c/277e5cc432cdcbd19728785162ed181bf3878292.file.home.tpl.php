<?php /* Smarty version Smarty-3.1.7, created on 2012-08-02 04:30:49
         compiled from "application\views\daugia\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32176500fb571d17b47-57901354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '277e5cc432cdcbd19728785162ed181bf3878292' => 
    array (
      0 => 'application\\views\\daugia\\home.tpl',
      1 => 1343640669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32176500fb571d17b47-57901354',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_500fb571e1c71',
  'variables' => 
  array (
    'data' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500fb571e1c71')) {function content_500fb571e1c71($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   

 
</head> 
<body>
    <fieldset>
        <legend>Đấu Giá Ngược</legend>
        <form method="post" action="<?php echo base_url();?>
home/init_gosu">
        <table>
            <tr>
                <td>Vật Phẩm Đấu Giá</td>
                <td>
                    <select id="cbx_product" name="cbx_product">
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Giá Đấu</td>
                <td>
                    <input type="text" id="txt_cash" name="txt_cash" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" id="id-btn-cancel" value="Cancel" />
                </td>
                <td>
                    <input type="submit" value="ok"/>
<!--                    <a href="https://id.gosu.vn/auth/authorize?response_type=code&client_id=gosu.865017002bc199d2b2bfe4b3db914213&redirect_uri=http://vvcv.gosu.vn/su-kien/dau-gia-nguoc/">Ok</a>-->
                </td>
            </tr>
        </table>
        </form>
    </fieldset>
</body>
</html>
<?php }} ?>