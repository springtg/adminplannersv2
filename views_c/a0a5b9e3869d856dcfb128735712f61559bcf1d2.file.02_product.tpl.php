<?php /* Smarty version Smarty-3.1.7, created on 2012-08-06 04:27:16
         compiled from "application\views\admin-planners\02_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1776050139aa722f350-52295523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a5b9e3869d856dcfb128735712f61559bcf1d2' => 
    array (
      0 => 'application\\views\\admin-planners\\02_product.tpl',
      1 => 1344220030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1776050139aa722f350-52295523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50139aa7256cb',
  'variables' => 
  array (
    'configs' => 0,
    'contentofview' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50139aa7256cb')) {function content_50139aa7256cb($_smarty_tpl) {?><div style="margin-left: 0px;
    width: 960px;
    display: inline-block;
    min-height: 500px;
    background: #F1F1F1;
    bottom: 0;
    ">
    <div style="display: block;" id="_main-content-page">
        <div class="detail-dialog unH" style="text-align: center;width: auto;height: auto">
            <div class="dialog-close-button id-detail-dialog-close-button hidden">
                <div class="dialog-close-x"></div>
            </div>
            <div class="detail-dialog-header" style="height: 82px;width: 960px;background: #EEE;">
                <div class="detail-dialog-header" style="width: 960px">
                    <div class="detail-dialog-header-block" style="height: auto;padding: 0 0 0 2px">
                        <div class="title-tag-item-detail" style="width: 940px">
                            <h1 style="line-height: 78px"><?php echo $_smarty_tpl->tpl_vars['configs']->value["title"];?>
</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-dialog-body" style="width: auto;height: auto">
                <div class="detail-dialog-tab-pane" style="width: auto;height: auto">
                    <div class="goog-tab-content ">
                        <div class="detail-dialog-tab-content id-detail-dialog-all-tab-content">
                            <div style="padding: 0" class="id-product-all">
                                <?php if (isset($_smarty_tpl->tpl_vars['contentofview']->value)){?>
                                    <?php echo $_smarty_tpl->tpl_vars['contentofview']->value;?>

                                <?php }else{ ?>
                                    Loadding...
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>

<!--<script type="text/javascript" src="<?php echo base_url();?>
script/auction.js"></script>-->
                                
 <?php }} ?>