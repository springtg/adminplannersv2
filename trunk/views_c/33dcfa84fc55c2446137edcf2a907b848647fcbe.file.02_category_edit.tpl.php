<?php /* Smarty version Smarty-3.1.7, created on 2012-08-09 11:01:40
         compiled from "application\views\admin-planners\category\02_category_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273045023787933f2f7-49060395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33dcfa84fc55c2446137edcf2a907b848647fcbe' => 
    array (
      0 => 'application\\views\\admin-planners\\category\\02_category_edit.tpl',
      1 => 1344502896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273045023787933f2f7-49060395',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_502378793cb2c',
  'variables' => 
  array (
    'configs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_502378793cb2c')) {function content_502378793cb2c($_smarty_tpl) {?><div class="jqx_group">
<!--    <div><h3 class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Information</h3></div>-->
    <div>
        <input type="hidden" id="txt-id" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["id"];?>
"/>
        <table style="width: 100%;pading:0;margin:0;">
            <tr>
                <td style="width: 100px">Name</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-name" class="text-input " style="width: 100%" 
                            value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["name"];?>
"/>
                </td>
            </tr>
            <tr>
                <td >Level</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-level" class="text-input" style="width: 100%"
                            value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["level"];?>
"/>
                </td>
            </tr>
            <tr>
                <td >Status</td>
                <td style='padding-right:2px'>
                    <div style='float: left;' id='jqxCbx_status'></div>
                </td>
            </tr>
            <tr>
                <td>Note</td>
                <td style='padding-right:10px'>
                    <div>
                        <textarea id="txt-note" style="padding:4px;margin:0;width: 100%"><?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["note"];?>
</textarea>
                    </div>
                </td>
            </tr>
            <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["insert"])){?>
            <tr>
                <td>Insert</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["insert"];?>

                </td>
            </tr>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["update"])){?>
            <tr>
                <td>Update</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["update"];?>

                </td>
            </tr>
            <?php }?>

        </table>
    </div>
</div>
<div class="tac">
    <input type="button" value="Save" class="showWindowButton id-save-btn" />
    <input type="button" value="Cancel" class="showWindowButton id-cancel-btn" />
</div>
<script type="text/javascript">
        var CategoryEditFRM = (function () {
            function _addEvents(){
                $("#txt-name").focus();
                $(".id-save-btn").click(function(){
                    <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["lock"])){?>
                        $('#window-notice').jqxWindow('setContent', 
                        "This item have been lock.<br/>Please don't change this item.");
                        $('#window-notice').jqxWindow('open');
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["delete"])){?>
                        $('#window-notice').jqxWindow('setContent', 
                        "This item have been deleted.<br/>Please restore item before edit.");
                        $('#window-notice').jqxWindow('open');
                    <?php }else{ ?>
                        save_category();
                    <?php }?>
                });
                $(".id-cancel-btn").click(function(){
                     $('#window').jqxWindow('close');
                });
            };
            //Adding event listeners
            function _createElements() {
                var theme=CategoryEditFRM.config.theme;
                var source = <?php echo json_encode($_smarty_tpl->tpl_vars['configs']->value["status_list"]);?>
;
                // Create a jqxComboBox
                $("#jqxCbx_status").jqxComboBox({ 
                    selectedIndex: <?php echo $_smarty_tpl->tpl_vars['configs']->value["status_index"];?>
, source: source, 
                    width: '100%', height: '25px', theme: theme });
                //$(".jqx_group").jqxExpander({ showArrow: false, toggleMode: 'none', theme: CategoryEditFRM.config.theme });//jqxExpander({ width: '100%', theme: CategoryEditFRM.config.theme, showArrow: false, toggleMode: 'none' });
                $('.showWindowButton').jqxButton({ theme: theme, height: '25px', width: '100px' });
                
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
                    //Add events
                    _addEvents();
                }
            };
        } ());
        $(document).ready(function () {
            CategoryEditFRM.init();            
        });
</script><?php }} ?>