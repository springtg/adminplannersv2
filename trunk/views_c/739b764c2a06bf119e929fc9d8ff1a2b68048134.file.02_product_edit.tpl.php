<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 06:52:33
         compiled from "application\views\admin-planners\product\02_product_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1124750222baf1d0127-62437175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '739b764c2a06bf119e929fc9d8ff1a2b68048134' => 
    array (
      0 => 'application\\views\\admin-planners\\product\\02_product_edit.tpl',
      1 => 1344915543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1124750222baf1d0127-62437175',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50222baf1d0f0',
  'variables' => 
  array (
    'configs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50222baf1d0f0')) {function content_50222baf1d0f0($_smarty_tpl) {?><div class="jqx_group">
<!--    <div><h3 class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Information</h3></div>-->
    <div>
        <input type="hidden" id="txt-id" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["id"];?>
"/>
        <table style="width: 100%;pading:0;margin:0;">
            <tr>
                <td style="width: 100px">Name</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-name" class="text-input " style="width: 150px" 
                            value="<?php echo $_smarty_tpl->tpl_vars['configs']->value["obj"]["name"];?>
"/>
                </td>
            </tr>
            <tr>
                <td >Status</td>
                <td style='padding-right:12px'>
                    <div style='float: left;' id='jqxCbx_status'></div>
                </td>
            </tr>
            <tr>
                <td >Type</td>
                <td style='padding-right:12px'>
                    <div style='float: left;' id='jqxCbx_type'></div>
                </td>
            </tr>
            <tr>
                <td>Start Date</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-startdate" class="text-input" style="width: 150px"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["startdate"])){?><?php echo date("Y-m-d h:i",strtotime($_smarty_tpl->tpl_vars['configs']->value["obj"]["startdate"]));?>
<?php }?>"/>
                </td>
            </tr>
            <tr>
                <td>End Date</td>
                <td style='padding-right:12px'>
                    <input type="text" id="txt-enddate" class="text-input" style="width: 150px"
                            value="<?php if (isset($_smarty_tpl->tpl_vars['configs']->value["obj"]["enddate"])){?><?php echo date("Y-m-d h:i",strtotime($_smarty_tpl->tpl_vars['configs']->value["obj"]["enddate"]));?>
<?php }?>"/>
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
        var ProductEditFRM = (function () {
            function _addEvents(){
                $("#txt-name").focus();
                $('#txt-startdate').datetimepicker({
                    ampm: false,dateFormat: 'yy-mm-dd',
                    onClose: function(dateText, inst) {
                        var endDateTextBox = $('#txt-enddate');
                        if (endDateTextBox.val() != '') {
                            var testStartDate = new Date(dateText);
                            var testEndDate = new Date(endDateTextBox.val());
                            if (testStartDate > testEndDate)
                                endDateTextBox.val(dateText);
                        }
                        else {
                            endDateTextBox.val(dateText);
                        }
                    },
                    onSelect: function (selectedDateTime){
                        var start = $(this).datetimepicker('getDate');
                        $('#txt-enddate').datetimepicker('option', 'minDate', new Date(start.getTime()));
                    }
                });
                $('#txt-enddate').datetimepicker({
                    ampm: false,dateFormat: 'yy-mm-dd',
                    onClose: function(dateText, inst) {
                        var startDateTextBox = $('#txt-startdate');
                        if (startDateTextBox.val() != '') {
                            var testStartDate = new Date(startDateTextBox.val());
                            var testEndDate = new Date(dateText);
                            if (testStartDate > testEndDate)
                                startDateTextBox.val(dateText);
                        }
                        else {
                            startDateTextBox.val(dateText);
                        }
                    },
                    onSelect: function (selectedDateTime){
                        var end = $(this).datetimepicker('getDate');
                        $('#txt-startdate').datetimepicker('option', 'maxDate', new Date(end.getTime()) );
                    }
                });
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
                        save_product();
                    <?php }?>
                });
                $(".id-cancel-btn").click(function(){
                     $('#window').jqxWindow('close');
                });
            };
            //Adding event listeners
            function _createElements() {
                var theme=ProductEditFRM.config.theme;
                var source = <?php echo json_encode($_smarty_tpl->tpl_vars['configs']->value["status_list"]);?>
;
                // Create a jqxComboBox
                $("#jqxCbx_status").jqxComboBox({ 
                    selectedIndex: <?php echo $_smarty_tpl->tpl_vars['configs']->value["status_index"];?>
, source: source, 
                    width: '160px', height: '25px', theme: theme });
                
                source = <?php echo json_encode($_smarty_tpl->tpl_vars['configs']->value["type_list"]);?>
;
                // Create a jqxComboBox
                $("#jqxCbx_type").jqxComboBox({ 
                    selectedIndex: <?php echo $_smarty_tpl->tpl_vars['configs']->value["type_index"];?>
, source: source, 
                    width: '160px', height: '25px', theme: theme });
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
            ProductEditFRM.init();            
        });
</script><?php }} ?>