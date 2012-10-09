<?php /* Smarty version Smarty-3.1.7, created on 2012-08-09 05:13:49
         compiled from "application\views\admin-planners\authority\02_authority_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128785021d6b3b60609-32388336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0a04ff7d078c9ad8305ac5bd3b49d9847c4a84d' => 
    array (
      0 => 'application\\views\\admin-planners\\authority\\02_authority_edit.tpl',
      1 => 1344482015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128785021d6b3b60609-32388336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5021d6b3bd87d',
  'variables' => 
  array (
    'configs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5021d6b3bd87d')) {function content_5021d6b3bd87d($_smarty_tpl) {?><div class="jqx_group">
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
                <td >Keyword</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-keyword" class="text-input" style="width: 100%"
                            value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["keyword"];?>
"/>
                </td>
            </tr>
            <tr>
                <td >Value</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-value" class="text-input" style="width: 100%"
                            value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["value"];?>
"/>
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
        var AuthorityEditFRM = (function () {
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
                        save_authority();
                    <?php }?>
                });
                $(".id-cancel-btn").click(function(){
                     $('#window').jqxWindow('close');
                });
            };
            //Adding event listeners
            function _createElements() {
                var theme=AuthorityEditFRM.config.theme;
                
                //$(".jqx_group").jqxExpander({ showArrow: false, toggleMode: 'none', theme: AuthorityEditFRM.config.theme });//jqxExpander({ width: '100%', theme: AuthorityEditFRM.config.theme, showArrow: false, toggleMode: 'none' });
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
            AuthorityEditFRM.init();            
        });
</script><?php }} ?>