<?php /* Smarty version Smarty-3.1.7, created on 2012-07-28 11:21:21
         compiled from "application\views\admin-planners\02_2_auction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245745013a720a888e9-80310242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c0c5cc4f56ae86f4baf3169ecc30ecb29f64cc1' => 
    array (
      0 => 'application\\views\\admin-planners\\02_2_auction.tpl',
      1 => 1343467278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245745013a720a888e9-80310242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5013a720a895d',
  'variables' => 
  array (
    'data' => 0,
    'configs' => 0,
    'col' => 0,
    'r' => 0,
    'group' => 0,
    'win' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5013a720a895d')) {function content_5013a720a895d($_smarty_tpl) {?>        
<span id="id-config-<?php echo $_smarty_tpl->tpl_vars['data']->value['config']['type'];?>
" class="hidden">
    <?php echo json_encode($_smarty_tpl->tpl_vars['data']->value['config']);?>

</span>
<table class="table-data" style="width: 960px;margin-top: 0px">
    <tr>
        <th>No.</th>
        <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value['cols']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
        <th style="
            <?php if (isset($_smarty_tpl->tpl_vars['col']->value["minw"])){?>min-width: <?php echo $_smarty_tpl->tpl_vars['col']->value["minw"];?>
px;<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['col']->value["type"]=="number"){?>text-align: right;<?php }?>
            ">
            <?php if (isset($_smarty_tpl->tpl_vars['col']->value["group"])){?>
            <img style="float: left;  padding-right: 4px;
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['group']!=$_smarty_tpl->tpl_vars['col']->value["title"]){?>
                    opacity: 0.25;cursor: pointer;
                 <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['sort']==''){?>
                        opacity: 0.25;cursor: pointer;
                    <?php }?>
                 <?php }?>
                    " 
                 src="<?php echo base_url();?>
images/icon/stock_group_cells.png"
                 title="Group by Name"
                 onclick="product_groupby('<?php echo $_smarty_tpl->tpl_vars['data']->value['config']['type'];?>
','<?php echo $_smarty_tpl->tpl_vars['col']->value["title"];?>
');"
                 />
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['col']->value["title"];?>

        </th>
        <?php } ?>
        <th></th>
    </tr>
    
<?php if (empty($_smarty_tpl->tpl_vars['data']->value['product'])){?>
    <tr><td colspan='<?php echo count($_smarty_tpl->tpl_vars['configs']->value['cols'])+2;?>
' style='text-align:center'>No data to display</td></tr>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['group'] = new Smarty_variable('', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['win'] = new Smarty_variable("0", null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
        <?php if (strtolower(str_replace(" ",'',$_smarty_tpl->tpl_vars['r']->value['group']))!=strtolower(str_replace(" ",'',$_smarty_tpl->tpl_vars['group']->value))){?>
            <?php $_smarty_tpl->tpl_vars['group'] = new Smarty_variable($_smarty_tpl->tpl_vars['r']->value['group'], null, 0);?>
            <tr style='background:#D7D7D7'>
                <td colspan='<?php echo count($_smarty_tpl->tpl_vars['configs']->value['cols'])+2;?>
' >
                    <b><?php echo $_smarty_tpl->tpl_vars['data']->value['config']['group'];?>
 : <?php echo $_smarty_tpl->tpl_vars['r']->value['group'];?>
</b>
                </td>
            </tr>
        <?php }?>
    <tr class="id-head-row <?php echo $_smarty_tpl->tpl_vars['data']->value['config']['type'];?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>

        <?php if ($_smarty_tpl->tpl_vars['win']->value==0&&$_smarty_tpl->tpl_vars['r']->value["sl"]==1){?>
            cblue
            <?php $_smarty_tpl->tpl_vars['win'] = new Smarty_variable("1", null, 0);?>
        <?php }?>
        ">
        <td>&nbsp;</td>
         <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value['cols']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
        
            <?php if ($_smarty_tpl->tpl_vars['col']->value["field"]=="status"){?>
                <?php if (!isset($_smarty_tpl->tpl_vars['r']->value['delete'])){?>
                <td>
                    <span class="showandhide">
                        <span class="hideifhover">
                        <?php if ($_smarty_tpl->tpl_vars['r']->value['status']=="Public"){?>
                            Public
                        <?php }else{ ?>
                            Private
                        <?php }?>
                        </span>
                        <span class="showifhover">
                        <?php if ($_smarty_tpl->tpl_vars['r']->value['status']!="Public"){?>
                            <a href="javascript:statusProduct('<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','Public');">Private → Public</a>
                        <?php }else{ ?>
                            <a href="javascript:statusProduct('<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','Private');">Public → Private</a>
                        <?php }?>
                        </span>
                    </span>
                </td>
                <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['r']->value['status']=="Public"){?>
                        <td>Public</td>
                    <?php }else{ ?>
                        <td>Private</td>
                    <?php }?>
                <?php }?>
            <?php }elseif($_smarty_tpl->tpl_vars['col']->value["type"]=="datetime"){?>
                <td title="<?php echo $_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->tpl_vars['col']->value["field"]];?>
"><?php if (isset($_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->tpl_vars['col']->value["field"]])){?><?php echo date("Y-m-d",strtotime($_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->tpl_vars['col']->value["field"]]));?>
<?php }?></td>
            <?php }elseif($_smarty_tpl->tpl_vars['col']->value["type"]=="number"){?>
                <td style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->tpl_vars['col']->value["field"]];?>
</td>
            <?php }else{ ?>
                <td><?php echo $_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->tpl_vars['col']->value["field"]];?>
</td>
            <?php }?>
            
        
        <?php } ?>
        <td></td>
        
    </tr>
    <?php } ?>
    <?php }?>
</table>

<div class="clear"></div>
<script>
    $('.tooltip').poshytip({
        className: 'tip-yellowsimple',
        hideTimeout:0,
        alignTo: 'target',
        alignX: 'center',
        allowTipHover: false,
        hideAniDuration:0
    });
</script><?php }} ?>