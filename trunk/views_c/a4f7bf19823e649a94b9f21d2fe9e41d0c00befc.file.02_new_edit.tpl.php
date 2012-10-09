<?php /* Smarty version Smarty-3.1.7, created on 2012-08-10 04:34:17
         compiled from "application\views\admin-planners\new\02_new_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2939550238a3a946056-17365988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4f7bf19823e649a94b9f21d2fe9e41d0c00befc' => 
    array (
      0 => 'application\\views\\admin-planners\\new\\02_new_edit.tpl',
      1 => 1344566055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2939550238a3a946056-17365988',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50238a3a946d9',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50238a3a946d9')) {function content_50238a3a946d9($_smarty_tpl) {?><table style="width:100%;padding-right: 2px;" class="_form">
    <tbody><tr>
        <td style="">
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_name" placeholder="" value="">
                    <input type="hidden" id="txt_template_detail_id" placeholder="" value="">
                    <div class="label"><label>Name</label></div>
                </div>
            </div>
        </td>
        <td class="space"></td>
        <td>
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_title" placeholder="" value="">
                    <div class="label"><label>Tiêu đề</label></div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td style="position: relative">
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_image" placeholder="" value="">
                    <div class="label"><label>Hình ảnh</label></div>
                </div>
            </div>
            <div class="icon16 hover50 tooltip" style="position: absolute;top:12px;right:8px;cursor: pointer" 
                 onclick="BrowseServer( 'Images:/', 'txt_template_detail_image' );" title="Chọn hình ảnh">
                <img src="<?php echo base_url();?>
images/icon/16/folder_explore.png">
            </div>
        </td>
        <td class="space"></td>
        <td style="position: relative">
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_image1x" placeholder="" value="">
                    <div class="label"><label>Hình 1X</label></div>
                </div>
            </div>
            <div class="icon16 hover50 tooltip" style="position: absolute;top:12px;right:8px;cursor: pointer" 
                 onclick="BrowseServer( 'Images:/', 'txt_template_detail_image1x' );" title="Chọn hình ảnh">
                <img src="<?php echo base_url();?>
images/icon/16/folder_explore.png">
            </div>
        </td>
    </tr>
    <tr>
        <td style="position: relative">
            <div class="_input-label">
                <div class="input">

                    <input type="text" id="txt_template_detail_image2x" placeholder="" value="">
                    <div class="label"><label>Hình 2X</label></div>
                </div>
            </div>
            <div class="icon16 hover50 tooltip" style="position: absolute;top:12px;right: 8px;cursor: pointer" 
                 onclick="BrowseServer( 'Images:/', 'txt_template_detail_image2x' );" title="Chọn hình ảnh">
                <img src="<?php echo base_url();?>
images/icon/16/folder_explore.png">
            </div>
        </td>
        <td class="space"></td>
        <td style="position: relative">
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_image3x" placeholder="" value="">
                    <div class="label"><label>Hình 3X</label></div>
                </div>
                <div class="icon16 hover50 tooltip" style="position: absolute;top:12px;right:8px;cursor: pointer" 
                     onclick="BrowseServer( 'Images:/', 'txt_template_detail_image3x' );" title="Chọn hình ảnh">
                    <img src="<?php echo base_url();?>
images/icon/16/folder_explore.png">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td style="position: relative">
            <div class="_input-label">
                <div class="input">
                    <input type="text" id="txt_template_detail_homepage" placeholder="" value="">
                    <div class="label"><label>Home Page</label></div>
                </div>
            </div>
        </td>
        <td class="space"></td>
        <td style="position: relative">
            <div class="_input-label" type="select">
            <div class="input" type="select">
                <div class="select">
                    <select id="cbx_template_detail_category">
                        <option value="HTML5 Template">HTML5 Template</option>

                    </select>
                </div>
                <div class="label"><label>Category</label></div>
            </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="input-full">
                <div class="label"><label>Nội dung ngắn gọn</label></div>
            </div>
            <div style="padding:27px 10px 0 0;">
                <textarea class="_s _w100" id="txt_template_detail_brief" rows="3" cols="103" 
                          style="width: 100%;height: 100px;padding-left: 8px"></textarea>
            </div>

        </td>
    </tr>
    <tr>
        <td colspan="3">


            <div class="input-full">
                <div class="label"><label>Nội dung</label></div>
            </div>
            <div style="padding:27px 10px 0 0;" id="editor_content">
                <textarea class="_s _w100 mceEditor" id="txt_template_detail_des" rows="3" cols="103" 
                          style="width: 100%; height: 200px;padding-left: 8px" aria-hidden="true"></textarea>
            </div>
                
        </td>
    </tr>
    <tr>
        <td colspan="3" style="">
            <span style="color: blue">Thêm lúc : </span>
        </td>
    </tr>
</tbody>
</table>
<div style="position: absolute;left: 50%;bottom: 8px;width: 160px;margin-left: -80px;" 
        class="hover50 tac">
    <div style="">
    <div id='jqxWidget-groupbutton'>
        <button style="padding:4px 16px;" id="Left">
            Save</button>
        <button style="padding:4px 16px;" id="Center">
            Cancel</button>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var theme = 'classic';
        // Create jqxButton widgets.
        $("#jqxWidget-groupbutton").jqxButtonGroup({ theme: theme, mode: 'default' });
        $("#jqxWidget-groupbutton").bind('buttonclick', function (event) {
            var clickedButton = event.args.button;
            alert("Clicked: " + clickedButton[0].id);
        });
    });
</script>
<?php }} ?>