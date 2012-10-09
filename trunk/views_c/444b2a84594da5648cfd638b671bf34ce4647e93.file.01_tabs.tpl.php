<?php /* Smarty version Smarty-3.1.7, created on 2012-10-08 18:36:02
         compiled from "application\views\admin-planners\tabs\01_tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1324250728f60325d33-69330935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '444b2a84594da5648cfd638b671bf34ce4647e93' => 
    array (
      0 => 'application\\views\\admin-planners\\tabs\\01_tabs.tpl',
      1 => 1349692453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1324250728f60325d33-69330935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50728f605f272',
  'variables' => 
  array (
    'Data' => 0,
    '_SESSION' => 0,
    'tab' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50728f605f272')) {function content_50728f605f272($_smarty_tpl) {?><div class="hed" style="height: 28px">
    <div style="padding:4px 12px">
        Admin Planners
        → <?php echo $_smarty_tpl->tpl_vars['Data']->value["tab_config"]["tabs"][$_smarty_tpl->tpl_vars['Data']->value["tab_config"]["tabindex"]]["display"];?>


    </div>
</div>
<div class="hd" style="position: relative;">
    <div style="position: absolute;top: 0;right: 8px">
        <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"])){?>
            <b><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value["ADP-USER"]["name"];?>
</b>
            <a href="<?php echo base_url("sys/excution/logout");?>
">
                Logout
            </a>
        <?php }else{ ?>
            <a href="javascript:login.Show();">
                Login
            </a>
        <?php }?>
    </div>
    <ul class="tab-nav">
        <?php if (isset($_smarty_tpl->tpl_vars['Data']->value["tab_config"]["tabs"])){?>
            <?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Data']->value["tab_config"]["tabs"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tab']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['Data']->value["tab_config"]["tabindex"]==$_smarty_tpl->tpl_vars['tab']->value["value"]){?>
                    <li class="hover">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tab']->value["link"];?>
"><span>[ - ] </span><?php echo $_smarty_tpl->tpl_vars['tab']->value["display"];?>
<span class="tabdes"></span></a>
                    </li>  
                <?php }else{ ?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tab']->value["link"];?>
"><span>[ - ] </span><?php echo $_smarty_tpl->tpl_vars['tab']->value["display"];?>
</a>
                    </li> 
                <?php }?>

            <?php } ?>
        <?php }else{ ?>
            <li class="hover"><a href="">Default</a></li>
        <?php }?>

    </ul>
</div><?php }} ?>