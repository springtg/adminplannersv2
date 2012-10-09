<?php /* Smarty version Smarty-3.1.7, created on 2012-08-08 08:28:34
         compiled from "application\views\admin-planners\03_2_account_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1192501f709eda2605-82713364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19818c4838db211d4d9cb142a7d3f08a088969be' => 
    array (
      0 => 'application\\views\\admin-planners\\03_2_account_edit.tpl',
      1 => 1344407276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1192501f709eda2605-82713364',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_501f709edcaf4',
  'variables' => 
  array (
    'configs' => 0,
    'au' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501f709edcaf4')) {function content_501f709edcaf4($_smarty_tpl) {?>
<table style="width: 100%">
    <tr>
        <td style="width: 50%">
            <div class="jqx_group">
                <div><h3 class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Information</h3></div>
                <div>
                    <input type="hidden" id="txt-id" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["id"];?>
"/>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 100px">Name</td>
                            <td>
                                <input type="text" id="txt-name" class="text-input " style="width: 150px" 
                                       value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["name"];?>
"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">User Name</td>
                            <td>
                                <input type="text" id="txt-uname" class="text-input" style="width: 150px"
                                       value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["username"];?>
"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Pass Word</td>
                            <td>
                                <div>
                                <input type="text" id="txt-pass" class="text-input" style="width: 150px"  
                                       value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["password"];?>
"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Group</td>
                            <td>
<!--                                <div>
                                    <select style="width: 100px">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>-->
                                <div style='float: left;' id='jqxCbx_group'></div>
                            </td>
                        </tr>
                        <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["insert"])){?>
                        <tr>
                            <td style="width: 100px">Insert</td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["insert"];?>

                            </td>
                        </tr>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["update"])){?>
                        <tr>
                            <td style="width: 100px">Update</td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["update"];?>

                            </td>
                        </tr>
                        <?php }?>

                    </table>
                </div>
            </div>
        </td>
        <td style="vertical-align: top">
            <input type="hidden" id="id-authority-acc" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["authority"];?>
"/>
            <div class="jqx_group id-group-authority">
                <div class=""><h3 class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Authority</h3></div>
                <div>
                    <?php if (is_array($_smarty_tpl->tpl_vars['configs']->value["auth_list"])&&count($_smarty_tpl->tpl_vars['configs']->value["auth_list"])>0){?>
                        <?php  $_smarty_tpl->tpl_vars['au'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['au']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value["auth_list"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['au']->key => $_smarty_tpl->tpl_vars['au']->value){
$_smarty_tpl->tpl_vars['au']->_loop = true;
?>
                        <div style="display: inline-block;float: left">
                            <div style="margin-top: 10px;" class='jqx_chb <?php echo $_smarty_tpl->tpl_vars['au']->value->id;?>
'><span class="value"><?php echo $_smarty_tpl->tpl_vars['au']->value->name;?>
</span></div>
                        </div>
                        <?php } ?>
                    <?php }else{ ?>
                        No data to display.
                    <?php }?>
                    <div class="clear"></div>
                    
                    <span id="id-grp-autho" class="<?php if ($_smarty_tpl->tpl_vars['configs']->value["group_index"]==0){?>hidden<?php }?>">
                        
                    </span>
                </div>
            </div>

        </td>
    </tr>
    <tr>
        <td colspan="2">
<!--            <div class="errormessage pl20 pt8 pb8 pr20"></div>-->
            <input type="button" value="Save" class="showWindowButton id-save-btn" />
            <input type="button" value="Cancel" class="showWindowButton id-cancel-btn" />
        </td>
    </tr>
</table>
<script type="text/javascript">
        var AccountFRM = (function () {
            function _addEvents(){
                $('.jqx_chb').bind('checked', function (event) {
                    var value=$(this).find('span.value').html();
                    var auvals=$("#id-authority-acc").val();
                    auvals=auvals+";"+value+";";
                    $("#id-authority-acc").val(auvals);
                    
                });
                $('.jqx_chb').bind('unchecked', function (event) { 
                    var value=$(this).find('span.value').html();
                    var auvals=$("#id-authority-acc").val();
                    auvals=auvals.replace(";"+value+";","");
                    $("#id-authority-acc").val(auvals);
                }); 
                $(".id-save-btn").click(function(){
                    <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["lock"])){?>
                        $('#window-notice').jqxWindow('setContent', 
                        "This item have been lock.<br/>Please don't change this item.");
                        $('#window-notice').jqxWindow('open');
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["delete"])){?>
                        $('#window-notice').jqxWindow('setContent', 
                        "This item have been deleted.<br/>Please restore item before edit.");
                        $('#window-notice').jqxWindow('open');
                    <?php }else{ ?>
                        save_acc();
                    <?php }?>
                });
                $(".id-cancel-btn").click(function(){
                     $('#window').jqxWindow('close');
                });
            };
            //Adding event listeners
            function _createElements() {
                var theme='classic';
                //cbx
                var source = <?php echo json_encode($_smarty_tpl->tpl_vars['configs']->value["group_list"]);?>
;
                // Create a jqxComboBox
                $("#jqxCbx_group").jqxComboBox({ selectedIndex: <?php echo $_smarty_tpl->tpl_vars['configs']->value["group_index"];?>
, source: source, width: '160px', height: '25px', theme: AccountFRM.config.theme });
                $('#jqxCbx_group').bind('select', function (event) {
                    var args = event.args;
                    var item = $('#jqxCbx_group').jqxComboBox('getItem', args.index);
                    if (item != null) {
                        //$('#Events').jqxPanel('prepend', '<div style="margin-top: 5px;">Selected: ' + item.label + '</div>');
                        if(item.label=="None"){
                            $("#id-grp-autho").hide();
                        }else{
                            $("#id-grp-autho").show();
                            $("#id-grp-autho").load('<?php echo base_url();?>
admin-planners/account/Group_Authority/'+item.label);
                        }
                    }
                });
                //create group checkbox authority
                <?php if (is_array($_smarty_tpl->tpl_vars['configs']->value["auth_list"])&&count($_smarty_tpl->tpl_vars['configs']->value["auth_list"])>0){?>
                <?php  $_smarty_tpl->tpl_vars['au'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['au']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configs']->value["auth_list"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['au']->key => $_smarty_tpl->tpl_vars['au']->value){
$_smarty_tpl->tpl_vars['au']->_loop = true;
?>
                    
                $('.jqx_chb.<?php echo $_smarty_tpl->tpl_vars['au']->value->id;?>
').jqxCheckBox({ checked: <?php if (strrpos($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["authority"],((";").($_smarty_tpl->tpl_vars['au']->value->name)).(";"))===false){?>false<?php }else{ ?>true<?php }?>,height: 25,width: '65px', theme: AccountFRM.config.theme });
                <?php } ?>
                <?php }?>
                $(".jqx_group").jqxExpander({ showArrow: false, toggleMode: 'none', theme: AccountFRM.config.theme });//jqxExpander({ width: '100%', theme: AccountFRM.config.theme, showArrow: false, toggleMode: 'none' });
                $('.showWindowButton').jqxButton({ theme: AccountFRM.config.theme, height: '25px', width: '100px' });
                
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
            AccountFRM.init();
            <?php if (isset($_smarty_tpl->tpl_vars['configs']->value["accountobj"]["group"])){?>$("#id-grp-autho").load('<?php echo base_url();?>
admin-planners/account/Group_Authority/<?php echo $_smarty_tpl->tpl_vars['configs']->value["accountobj"]["group"];?>
');<?php }?>
        });
</script><?php }} ?>