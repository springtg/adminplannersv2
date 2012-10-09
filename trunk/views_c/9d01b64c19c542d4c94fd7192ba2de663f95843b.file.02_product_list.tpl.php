<?php /* Smarty version Smarty-3.1.7, created on 2012-07-28 03:37:51
         compiled from "application\views\daugia\admin\02_product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1116450124ef1a686c7-39964442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d01b64c19c542d4c94fd7192ba2de663f95843b' => 
    array (
      0 => 'application\\views\\daugia\\admin\\02_product_list.tpl',
      1 => 1343439469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1116450124ef1a686c7-39964442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50124ef1da32d',
  'variables' => 
  array (
    'data' => 0,
    'r' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50124ef1da32d')) {function content_50124ef1da32d($_smarty_tpl) {?><span id="id-config-<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
" class="hidden">
    <?php echo json_encode($_smarty_tpl->tpl_vars['data']->value['config']);?>

</span>
<table class="table-data" style="width: 960px;margin-top: 0px">
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th style="min-width: 180px">
            <img style="float: left;  padding-right: 4px;
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['group']!="Name"){?>
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
                 onclick="product_groupby('<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
','Name');"
                 />
            Name
        </th>
        <th style="min-width: 100px">Status</th>
        <th  style="min-width: 100px">
            <img style="float: left;padding-right: 4px;
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['group']!="Game"){?>
                    opacity: 0.25;cursor: pointer;
                 <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['sort']==''){?>
                        opacity: 0.25;cursor: pointer;
                    <?php }?>
                 <?php }?>
                 " 
                 src="<?php echo base_url();?>
images/icon/stock_group_cells.png"
                 title="Group by Game"
                 onclick="product_groupby('<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
','Game');"
                 />
            Game
        </th>
        <th  style="min-width: 100px">
            <img style="float: left;padding-right: 4px;
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['group']!="Type"){?>
                    opacity: 0.25;cursor: pointer;
                 <?php }else{ ?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['config']['sort']==''){?>
                        opacity: 0.25;cursor: pointer;
                    <?php }?>
                 <?php }?>
                 " 
                 src="<?php echo base_url();?>
images/icon/stock_group_cells.png"
                 title="Group by Type"
                 onclick="product_groupby('<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
','Type');"
                 />
            Type
        </th>
        <th style="min-width: 80px">
            Insert
        </th>
        <th style="min-width: 80px">
            Update
        </th>
        <th style="min-width: 120px">#</th>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['type']!="trash"){?>
    <tr class="id-head-row inew<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
">
        <td colspan="9">
            <div class="new" style=""
                 onclick="show_item('','inew<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
');"
                 >
                ++New
            </div>
            
        </td>
    </tr>
    <?php }?>
    <tr class="id-content-row inew<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
 hidden">
        <td colspan="9">
            <center>đang tải...<br/>
                Nếu trang không tự tải nội dung hãy ấn vào 
                <a class="loadding" href="javascript:show_item('<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
');">đây</a> để tải lại.<br/>
                Hoặc ấn vào <a href="02_Admin_planners.php?Unit=template_detail&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">đây</a> để tải tại tab khác.
            </center>
        </td>
    </tr>

<?php if (empty($_smarty_tpl->tpl_vars['data']->value['product'])){?>
    <tr><td colspan='9' style='text-align:center'>No data to display</td></tr>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['group'] = new Smarty_variable('', null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
        <?php if (strtolower(str_replace(" ",'',$_smarty_tpl->tpl_vars['r']->value->group))!=strtolower(str_replace(" ",'',$_smarty_tpl->tpl_vars['group']->value))){?>
            <?php $_smarty_tpl->tpl_vars['group'] = new Smarty_variable($_smarty_tpl->tpl_vars['r']->value->group, null, 0);?>
            <tr style='background:#D7D7D7'><td colspan='9' ><b><?php echo $_smarty_tpl->tpl_vars['data']->value['group'];?>
 : <?php echo $_smarty_tpl->tpl_vars['r']->value->group;?>
</b></td></tr>
        <?php }?>
    <tr class="id-head-row <?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>

        <?php if ($_smarty_tpl->tpl_vars['r']->value->delete){?>
            cred
        <?php }else{ ?>
            <?php if ($_smarty_tpl->tpl_vars['r']->value->status=="Public"){?>
                cblue
            <?php }?>
            
        <?php }?>"
        >
        <td>&nbsp;</td>
        <td><?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</td>
        <td>
            <?php if (!$_smarty_tpl->tpl_vars['r']->value->delete){?>
            
                <span class="showandhide">
                    <span class="hideifhover">
                    <?php if ($_smarty_tpl->tpl_vars['r']->value->status=="Public"){?>
                        Public
                    <?php }else{ ?>
                        Private
                    <?php }?>
                      
                    </span>
                    <span class="showifhover">
                    <?php if ($_smarty_tpl->tpl_vars['r']->value->status!="Public"){?>
                        <a href="javascript:statusProduct('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
','Public');">Private → Public</a>
                    <?php }else{ ?>
                        <a href="javascript:statusProduct('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
','Private');">Public → Private</a>
                    <?php }?>
                    
                    </span>
                </span>
            <?php }?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['r']->value->game;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['r']->value->type;?>
</td>
        <td title="<?php echo $_smarty_tpl->tpl_vars['r']->value->insert;?>
"><?php if (isset($_smarty_tpl->tpl_vars['r']->value->insert)){?><?php echo date("Y-m-d",strtotime($_smarty_tpl->tpl_vars['r']->value->insert));?>
<?php }?></td>
        <td title="<?php echo $_smarty_tpl->tpl_vars['r']->value->update;?>
"><?php if (isset($_smarty_tpl->tpl_vars['r']->value->update)){?><?php echo date("Y-m-d",strtotime($_smarty_tpl->tpl_vars['r']->value->update));?>
<?php }?></td>
        <td style="padding: 0;margin: 0;vertical-align: middle">
           <?php if ($_smarty_tpl->tpl_vars['data']->value['type']=="trash"){?>
                <div class="icon16 hover50 tooltip" title="Restore"
                     onclick="restoreproduct('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
');"
                     >
                    
                    <img src="<?php echo base_url();?>
images/icon/gtk_undelete.png">
                </div>
                <span style="line-height: 24px">Deleted at <?php echo date("Y-m-d",strtotime($_smarty_tpl->tpl_vars['r']->value->delete));?>
</span>
            <?php }elseif(empty($_smarty_tpl->tpl_vars['r']->value->delete)){?>
                
                <span class="action" style="margin-top: 3px">
                <div class="icon16 hover50 tooltip"
                        title="Delete"
                        onclick="deleteproduct('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
');"
                        >
                    <img src="<?php echo base_url();?>
images/icon/16/edit_delete.png">
                </div>
                <div class="icon16 hover50 tooltip"
                        title="Edit"
                        onclick="show_item('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
');"
                        >
                    <img src="<?php echo base_url();?>
images/icon/16/document_edit.png">
                </div>
                
                </span>
                
            <?php }else{ ?>
                
                        
                    <div class="icon16 hover50 tooltip" title="Restore"
                        onclick="restoreproduct('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
');"
                        >

                        <img src="<?php echo base_url();?>
images/icon/gtk_undelete.png">
                    </div>
                    <span style="line-height: 24px">Deleted at <?php echo $_smarty_tpl->tpl_vars['r']->value->delete;?>
</span>

            <?php }?>
            
                
                
            
        </td>
    </tr>
    <tr class="id-content-row <?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
 hidden">
        <td colspan="9">
            <center>đang tải...<br/>
                Nếu trang không tự tải nội dung hãy ấn vào 
                <a class="loadding" href="javascript:show_item('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
');">đây</a> để tải lại.<br/>
                Hoặc ấn vào <a href="02_Admin_planners.php?Unit=template_detail&id=<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
">đây</a> để tải tại tab khác.
            </center>
        </td>
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