<?php /* Smarty version Smarty-3.1.7, created on 2012-08-08 08:47:37
         compiled from "application\views\admin-planners\account\03_group_auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59650220b89b915c7-46465023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de09537e6d8d9c30e1be25c1dc99d027f6b72dbd' => 
    array (
      0 => 'application\\views\\admin-planners\\account\\03_group_auth.tpl',
      1 => 1344408429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59650220b89b915c7-46465023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'configs' => 0,
    'au' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50220b89bfda8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50220b89bfda8')) {function content_50220b89bfda8($_smarty_tpl) {?><hr style="height: 0px;border:none;border-top: 1px solid #ccc;padding: 0;margin: 0"/>
<div style="background: #f1f1f1" class="fl">
    <?php if (is_array($_smarty_tpl->tpl_vars['configs']->value["auth_list"])&&count($_smarty_tpl->tpl_vars['configs']->value["auth_list"])>0){?>
    <div><span style="padding-left: 4px">Group Authority</span></div>
    <?php  $_smarty_tpl->tpl_vars['au'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['au']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value["auth_list"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['au']->key => $_smarty_tpl->tpl_vars['au']->value){
$_smarty_tpl->tpl_vars['au']->_loop = true;
?>
    <div style="display: inline-block;float: left">
        <div style="margin-top: 10px;" class='jqx_chb_gr_au'><?php echo $_smarty_tpl->tpl_vars['au']->value->name;?>
</div>
    </div>
    <?php } ?>
    <?php }else{ ?>
        <div><span style="padding-left: 4px">Group is not grant authority.</span></div>
    <?php }?>
<div>
<script>
    
    var Group_Au_FRM = (function () {
            
        //Adding event listeners
        function _createElements() {
            //create group checkbox authority
            <?php if (is_array($_smarty_tpl->tpl_vars['configs']->value["auth_list"])&&count($_smarty_tpl->tpl_vars['configs']->value["auth_list"])>0){?>
            <?php  $_smarty_tpl->tpl_vars['au'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['au']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value["auth_list"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['au']->key => $_smarty_tpl->tpl_vars['au']->value){
$_smarty_tpl->tpl_vars['au']->_loop = true;
?>
            $('.jqx_chb_gr_au').jqxCheckBox({locked :true, checked:true,height: 25,width: '65px', theme: Group_Au_FRM.config.theme });
            <?php } ?>
            <?php }?>            
        };
        //Creating the demo window
        return {
            config: {
                dragArea: null,
                theme: 'classic'
            },
            init: function () {
                //Creating all jqxWindgets except the window
                _createElements();

            }
        };
    } ());
    $(document).ready(function () {
        Group_Au_FRM.init();
    });
</script><?php }} ?>