<?php /* Smarty version Smarty-3.1.7, created on 2012-10-09 01:22:48
         compiled from "application\views\admin-planners\video\02_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:296435072a8e34ec813-08555980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea600e9ba235850673828bbad131b007217ff062' => 
    array (
      0 => 'application\\views\\admin-planners\\video\\02_edit.tpl',
      1 => 1349716624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296435072a8e34ec813-08555980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5072a8e353310',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5072a8e353310')) {function content_5072a8e353310($_smarty_tpl) {?>
    
        <table>
            <tr>
                <td class="w100">Tiêu đề</td>
                <td colspan="3">
                    <div class="pr10">
                        <input id="Title" type="text"  class="classic-input w100pc"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Hình ảnh</td>
                <td colspan="3">
                    <div class="pr10">
                        <input id="Thumbs" type="text"  class="classic-input w100pc" placeholder="Tự động lấy từ video ( YouTube )"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Danh mục</td>
                <td class="w320">
                    <select id="Category" class="classic-select w100pc">
                        <option>Music</option>
                    </select>
                </td>
                <td class="pl60 w100">Nguồn</td>
                <td class="w320">
                    <select id="Source" class="classic-select w100pc">
                        <option>YouTube</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="w100">Danh mục</td>
                <td class="w320">
                    <div class="Categorys">
                    <input type="checkbox" value="Music"/><label>Music</label>
                    <input type="checkbox" value="Funny"/><label>Funny</label>
                    <input type="checkbox" value="Game"/><label>Game</label>
                    </div>
                </td>
                <td class="pl60 w100">Nguồn</td>
                <td class="w320">
                    <div class="pr10">
                        <input type="text"  class="classic-input w100pc"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Ghi chú</td>
                <td class="w320">
                    <div class="pr10">
                        <textarea id="Description" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
                <td class="pl60 w100">Tag</td>
                <td class="w320">
                    <div class="pr10">
                        <textarea id="Tag" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Mã nhúng</td>
                <td colspan="3">
                    <div class="pr10">
                        <textarea id="Embel" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100"></td>
                <td colspan="3">
                    <input type="checkbox"/><label>Xem trước</label>
                    <div style="min-height:  200px;background: #ddd"></div>
                </td>
            </tr>
        </table>

    <div>
        <input type="button" class="classic-button" value="Trở về" onclick="jqxGrid.CancelEditVideo();"/>
        <input type="button" class="classic-button" value="Thêm" onclick="jqxGrid.SaveVideo();"/>
        <input type="button" class="classic-button" value="Cập nhật" onclick="jqxGrid.CancelEditVideo();"/>
    </div>
<?php }} ?>