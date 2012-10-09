<?php /* Smarty version Smarty-3.1.7, created on 2012-07-28 05:48:46
         compiled from "application\views\admin-planners\01_3_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156685013611e00af95-07732179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb03c583046b57e85eb23a30f04847d3de333a8d' => 
    array (
      0 => 'application\\views\\admin-planners\\01_3_detail.tpl',
      1 => 1343447282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156685013611e00af95-07732179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5013611e0e16f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5013611e0e16f')) {function content_5013611e0e16f($_smarty_tpl) {?><div class="clear"></div>
<div style="height: 40px;width: 100%;text-align: center">
    <h1 class="pt8 pb8 mt0 mb0">
        <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
            Chỉnh Sửa :<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

        <?php }else{ ?>
            Thêm mới
        <?php }?>
    </h1>
</div>
<div class="grid24">
    <div class="pl20 pr20">
        <table style="width:100%;" class="_form">
                    <tr>
                        <td style="">
                            <div class="_input-label">
                                <div class="input">
                                    <input type="text" id="txt_product_detail_name" placeholder="" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
<?php }?>"/>
                                    <input type="hidden" id="txt_product_detail_id" placeholder="" 
                                        value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
<?php }?>"/>
                                    <div class="label"><label>Name</label></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="_input-label" type="select">
                                <div class="input" type="select">
                                    <div class="select">
                                        <select id="cbx_product_detail_game">
                                            <option value="Bóng Đá">Bóng Đá</option>

                                        </select>
                                    </div>
                                    <div class="label"><label>Game</label></div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative">
                            <div class="_input-label">
                                <div class="input">
                                    <input type="text" id="txt_product_detail_start" placeholder="" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->startdate;?>
<?php }?>"/>
                                    <div class="label"><label>Start Date</label></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative">
                            <div class="_input-label">
                                <div class="input">
                                    <input type="text" id="txt_product_detail_end" placeholder="" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->enddate;?>
<?php }?>"/>
                                    <div class="label"><label>End Date</label></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative">
                            <div class="_input-label">
                                <div class="input">
                                    <input type="text" id="txt_product_detail_type" placeholder="" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
<?php }?>"/>
                                    <div class="label"><label>Type</label></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="position: relative">
                            <div class="_input-label" type="select">
                            <div class="input" type="select">
                                <div class="select">
                                    <select id="cbx_product_detail_category">
                                        <option value="HTML5 Template">HTML5 Template</option>
                                        
                                    </select>
                                </div>
                                <div class="label"><label>Category</label></div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="" style="text-align: left">
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value->insert)){?>
                                <span style="color: blue">Thêm lúc : <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->insert;?>
<?php }?></span>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value->update)){?>
                                <br/><span style='color: orange'>Cập nhật lúc : <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->update;?>
<?php }?></span>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value->delete)){?>
                                <br/><span style='color: red'>Xóa lúc : <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?><?php echo $_smarty_tpl->tpl_vars['item']->value->delete;?>
<?php }?></span>
                            <?php }?>
                            
                        </td>
                    </tr>
                </table>
        <span id="warningmsg"></span>
        <div class="mybutton icon tooltip" 
            title="Tải Lại"
            onclick="load_product_detail(<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>'<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
'<?php }else{ ?>null<?php }?>);"
            ><div><img src="<?php echo base_url();?>
images/icon/arrow_refresh1.png"/><span>Tải lại</span></div></div>
        <div class="mybutton icon tooltip<?php if (isset($_smarty_tpl->tpl_vars['item']->value->delete)){?> disable<?php }?>" 
            title="Lưu"
            onclick="<?php if (!isset($_smarty_tpl->tpl_vars['item']->value->delete)){?><?php if (isset($_smarty_tpl->tpl_vars['item']->value->id)){?>update();<?php }else{ ?>save();<?php }?><?php }?>"
            ><div><img src="<?php echo base_url();?>
images/icon/media_floppy_green.png"/><span>Lưu</span></div></div>
        <div class="mybutton icon tooltip" 
            onclick="huy()"
            title="Hủy"
            ><div><img src="<?php echo base_url();?>
images/icon/16/Cancel.png"/><span>Hủy</span></div></div>
        <div class="clear"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
//        $("#txt_product_detail_start,#txt_product_detail_end").datetimepicker({ampm: false,dateFormat: 'yy-mm-dd', });
        
        $('#txt_product_detail_start').datetimepicker({
            ampm: false,dateFormat: 'yy-mm-dd',
            onClose: function(dateText, inst) {
                var endDateTextBox = $('#txt_product_detail_end');
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
                $('#txt_product_detail_end').datetimepicker('option', 'minDate', new Date(start.getTime()));
            }
        });
        $('#txt_product_detail_end').datetimepicker({
            ampm: false,dateFormat: 'yy-mm-dd',
            onClose: function(dateText, inst) {
                var startDateTextBox = $('#txt_product_detail_start');
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
                $('#txt_product_detail_start').datetimepicker('option', 'maxDate', new Date(end.getTime()) );
            }
        });
        
        $("#txt_product_detail_name").focus();
        tinyMCE.init({
                mode : "textareas",
                theme : "advanced",
                editor_selector : "mceEditor",
                editor_deselector : "mceNoEditor",
                theme_advanced_resizing : true,
                theme_advanced_resize_horizontal : false
        });
    });

</script>
<?php }} ?>