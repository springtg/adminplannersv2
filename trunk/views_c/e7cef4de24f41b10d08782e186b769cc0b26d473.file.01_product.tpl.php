<?php /* Smarty version Smarty-3.1.7, created on 2012-07-30 04:46:21
         compiled from "application\views\daugia\admin\01_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289405010f50362abc7-39023663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7cef4de24f41b10d08782e186b769cc0b26d473' => 
    array (
      0 => 'application\\views\\daugia\\admin\\01_product.tpl',
      1 => 1343461822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289405010f50362abc7-39023663',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5010f5036631e',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5010f5036631e')) {function content_5010f5036631e($_smarty_tpl) {?><div style="margin-left: 0px;
    width: 960px;
    display: inline-block;
    min-height: 500px;
    bottom: 0;
    ">
    <div style="display: block;" id="_main-content-page">
        <div class="detail-dialog unH" style="text-align: center;width: 960px;height: auto">
            <div class="dialog-close-button id-detail-dialog-close-button hidden">
                <div class="dialog-close-x"></div>
            </div>
            <div class="detail-dialog-header" style="height: 82px;width: 960px;background: #EEE;">
                <div class="detail-dialog-header" style="width: 100%">
                    <div class="detail-dialog-header-block" style="height: auto;padding: 0 0 0 2px">
                        <div class="title-tag-item-detail" style="width: 940px">
                            <h1 style="line-height: 78px">Product</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-dialog-body" style="width: 960px;height: auto">
                <div class="detail-dialog-tab-bar goog-tab-bar goog-tab-bar-top"
                     
                     style="-webkit-user-select: none; width: 100%" role="tablist" tabindex="0">
                    <a href="#all">
                        <div class="id-detail-dialog-all-tab detail-dialog-tab goog-tab goog-tab-selected" 
                            tabcontent="id-detail-dialog-all-tab-content" aria-selected="true" role="tab" style="-webkit-user-select: none; " id=":fl">
                            <div class="detail-dialog-tab-text-container" style="-webkit-user-select: none; ">
                                <div class="detail-dialog-tab-text" style="-webkit-user-select: none; ">
                                    All
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#public">
                        <div class="id-detail-dialog-public-tab detail-dialog-tab goog-tab" 
                            tabcontent="id-detail-dialog-public-tab-content" role="tab" style="-webkit-user-select: none; " id=":fm">
                            <div class="detail-dialog-tab-text-container" style="-webkit-user-select: none; ">
                                <div class="detail-dialog-tab-text" style="-webkit-user-select: none; ">
                                    Public
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#private">
                        <div class="id-detail-dialog-private-tab detail-dialog-tab goog-tab" 
                            tabcontent="id-detail-dialog-private-tab-content" role="tab" style="-webkit-user-select: none; " id=":fn">
                            <div class="detail-dialog-tab-text-container" style="-webkit-user-select: none; ">
                                <div class="detail-dialog-tab-text" style="-webkit-user-select: none; ">
                                    Private
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#trash">
                        <div class="id-detail-dialog-trash-tab detail-dialog-tab goog-tab" 
                            tabcontent="id-detail-dialog-trash-tab-content" role="tab" style="-webkit-user-select: none; " id=":fo">
                            <div class="detail-dialog-tab-text-container" style="-webkit-user-select: none; ">
                                <div class="detail-dialog-tab-text" style="-webkit-user-select: none; ">
                                    Trash
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="id-detail-dialog-share " style="-webkit-user-select: none; width: 480px">
                        <div class="id-detail-dialog-uninstall-container" style="-webkit-user-select: none; ">
                            <div class="uninstall-control id-detail-dialog-uninstall-control  unselectable hover50" tabindex="0" 
                                 onclick="load_product_detail(null);"
                                 style="-webkit-user-select: none;position: relative;text-indent: 0;background: url(<?php echo base_url();?>
images/icon/addg.png) center no-repeat;">
                            </div>
                        </div>
                        <div class="id-detail-dialog-uninstall-container " style="-webkit-user-select: none; ">
                            <input type="text" id="txt_q" placeholder="Search" 
                                   style="padding: 3px 4px 4px 24px;
                                        background: url(<?php echo base_url();?>
images/icon/16/go_search.png) 4px center no-repeat #fff;
                                        border: 1px solid #CCC;
                                        " 
                                   class="hover50 grid_6"/>
                            
                        </div>
                        
                        <div class="detail-dialog-share-container" style="-webkit-user-select: none; ">
                            
                        </div>
                    </div>
                </div>
                <div class="goog-tab-bar-clear"></div>
                <div class="detail-dialog-tab-pane" style="width: 960px;height: auto">
                    <div class="goog-tab-content ">
                        <div class="detail-dialog-tab-content id-detail-dialog-all-tab-content">
                            <div style="padding: 0" class="id-product-all">
                                loadding...
                            </div>
                        </div>
                        <div class="detail-dialog-tab-content id-detail-dialog-public-tab-content hidden">
                            <div style="padding: 0" class="id-product-public">
                               loadding...
                            </div>
                        </div>
                        <div class="detail-dialog-tab-content id-detail-dialog-private-tab-content hidden">
                            <div style="padding: 0" class="id-product-private">
                                loadding...
                            </div>
                        </div>
                        <div class="detail-dialog-tab-content id-detail-dialog-trash-tab-content hidden">
                            <div style="padding: 0" class="id-product-trash">
                                loadding...
                            </div>
                        </div>
                        <div class="detail-dialog-tab-content id-detail-dialog-detail-tab-content hidden">
                            <div style="padding: 0" class="id-product-detail">
                                loadding...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>
script/product.js"></script><?php }} ?>