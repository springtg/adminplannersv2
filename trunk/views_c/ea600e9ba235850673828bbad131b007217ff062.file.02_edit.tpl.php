<?php /* Smarty version Smarty-3.1.7, created on 2012-10-10 12:28:23
         compiled from "application\views\admin-planners\video\02_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:296435072a8e34ec813-08555980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea600e9ba235850673828bbad131b007217ff062' => 
    array (
      0 => 'application\\views\\admin-planners\\video\\02_edit.tpl',
      1 => 1349864425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296435072a8e34ec813-08555980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5072a8e353310',
  'variables' => 
  array (
    'Data' => 0,
    'Name' => 0,
    'Value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5072a8e353310')) {function content_5072a8e353310($_smarty_tpl) {?>

<table>
    <tr>
        <td class="w100">Youtube link</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Link" type="text"  class="classic-input w100pc"
                       placeholder="Please using YouTube Watch Link"
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Source"];?>
<?php }?>"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100"></td>
        <td colspan="3" style="padding-bottom: 30px" >
            <input type="button" class="classic-button" value="Get Video Infomartion " onclick="getYoutubeInfo();"/>
        </td>
    </tr>
    <tr>
        <td class="w100">Youtube Key</td>

        <td class="w320">
            <div class="pr10">
                <input id="VideoKey" type="text"  class="classic-input w100pc" placeholder=""
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["VideoKey"];?>
<?php }?>"
                       />
            </div>
        </td>
        <td class="pl60 w100">Author</td>
        <td class="w320">
            <div class="pr10">
                <input id="Author" type="text"  class="classic-input w100pc" placeholder=""
                       
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Author"];?>
<?php }?>"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Title</td>
        <td colspan="3">
            <div class="pr10">
                <input type="hidden" id="VideoID" value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["VideoID"];?>
<?php }?>"/>
                <input id="Title" type="text"  class="classic-input w100pc"
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Title"];?>
<?php }?>"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Alias</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Alias" disabled="1" type="text"  class="classic-input w100pc"
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Alias"];?>
<?php }?>"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Category</td>
        <td colspan="3">
            <div class="Categorys">
                <ul class="classic-list w800">
                    <?php  $_smarty_tpl->tpl_vars['Value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Value']->_loop = false;
 $_smarty_tpl->tpl_vars['Name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Data']->value["categorys"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Value']->key => $_smarty_tpl->tpl_vars['Value']->value){
$_smarty_tpl->tpl_vars['Value']->_loop = true;
 $_smarty_tpl->tpl_vars['Name']->value = $_smarty_tpl->tpl_vars['Value']->key;
?>
                        <li>
                            <?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?>
                                <?php if (strpos($_smarty_tpl->tpl_vars['Data']->value["video"]["Category"],(((",").($_smarty_tpl->tpl_vars['Name']->value)).(",")))===false){?>
                                    <input type="checkbox"  value="<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
"/><label><?php echo $_smarty_tpl->tpl_vars['Value']->value;?>
</label>
                                <?php }else{ ?>
                                    <input type="checkbox" checked="1" value="<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
"/><label><?php echo $_smarty_tpl->tpl_vars['Value']->value;?>
</label>
                                <?php }?>
                            <?php }else{ ?>
                                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
"/><label><?php echo $_smarty_tpl->tpl_vars['Value']->value;?>
</label>
                            <?php }?> 
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Thumbs</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Thumbs" type="text"  class="classic-input w100pc" placeholder="Tự động lấy từ video ( YouTube )"
                       value="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Thumbs"];?>
<?php }?>"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Description</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Description" style="min-height: 96px" class="classic-input w100pc rsv"><?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Description"];?>
<?php }?></textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Tag</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Tag" style="min-height: 64px;" class="classic-input w100pc rsv"><?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Tag"];?>
<?php }?></textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Embel</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Embel" style="min-height: 64px;" class="classic-input w100pc rsv"><?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Embel"];?>
<?php }?></textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100"></td>
        <td colspan="3">
            <input type="checkbox"/><label>Preview</label>
            <div style="min-height:  200px;background: #ddd">
                <img class="thumbs" src="<?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?><?php echo $_smarty_tpl->tpl_vars['Data']->value["video"]["Thumbs"];?>
<?php }?>"/>
            </div>
        </td>
    </tr>
</table>

<div>
    <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
    <?php if (isset($_smarty_tpl->tpl_vars['Data']->value["video"])){?>
    <input type="button" class="classic-button" value="Update" onclick="jqxGrid.Save();"/>
    <?php }else{ ?>
    <input type="button" class="classic-button" value="Insert" onclick="jqxGrid.Save();"/>
    <?php }?>
</div>
<?php }} ?>