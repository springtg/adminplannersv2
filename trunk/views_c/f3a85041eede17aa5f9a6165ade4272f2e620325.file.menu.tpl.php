<?php /* Smarty version Smarty-3.1.7, created on 2012-07-26 09:35:31
         compiled from "application\views\daugia\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19699500fb571ce6bd4-31718961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3a85041eede17aa5f9a6165ade4272f2e620325' => 
    array (
      0 => 'application\\views\\daugia\\menu.tpl',
      1 => 1343288098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19699500fb571ce6bd4-31718961',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_500fb571d0d25',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500fb571d0d25')) {function content_500fb571d0d25($_smarty_tpl) {?><div id="cdtabarea" style="width: 100%;z-index: 100;height: 30px; position: fixed">
    <div class="container container_24" style="margin: 0 auto;">
        <ul id="cdtoptabs" style="float: left;">
            <li class="cdtopn cdselected"><a href="?Unit=Home" accesskey="1">Home</a></li>
            <li class="cdtopn cdhzmore "><a href="">Manage</a>
                    <img src="<?php echo base_url();?>
images/menu/more_arrow.png?b=5603%2E4000" alt="">
                    <ul class="cdsectabs">
                            <li class="cdsecn cdhzmore"><a href="">Southeast Asia</a>
                                <img src="<?php echo base_url();?>
images/menu/more_arrow_.png?b=5603%2E4000" alt="">
                                <ul class="cdsectabs">
                                    <li class="cdsecn"><a href="">Brunei</a></li>
                                    <li class="cdsecn"><a href="">Burma</a></li>
                                    <li class="cdsecn"><a href="">Cambodia</a></li>
                                    <li class="cdsecn"><a href="">East Timor</a></li>
                                    <li class="cdsecn"><a href="">Indonesia</a></li>
                                    <li class="cdsecn"><a href="">Laos</a></li>
                                    <li class="cdsecn"><a href="">Malaysia</a></li>
                                    <li class="cdsecn"><a href="">Philippines</a></li>
                                    <li class="cdsecn"><a href="">Singapore</a></li>
                                    <li class="cdsecn"><a href="">Thailand</a></li>
                                    <li class="cdsecn"><a href="">Vietnam</a></li>
                                    <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                                </ul>
                            </li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/templates');?>
">Templates</a></li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/contacts');?>
">Contacts</a></li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/categorys');?>
">Categories</a></li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/news');?>
">News</a></li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/abouts');?>
">About</a></li>
                            <li class="cdsecn"><a href="<?php echo site_url('admin/products');?>
">Product</a></li>

                            <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                    </ul>
            </li>
            <li class="cdtopn"><a href="?Unit=09_admin_planner_settings">Setting</a></li>
            <li class="cdtopn cdhzmore "><a href="?Unit=organization">Setting</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png?b=5603%2E4000" alt="">
                    <ul class="cdsectabs">
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-dev-tab-content" tabactive="id-detail-dialog-dev-tab">
                                <a href="?Unit=organization#dev">Admin Planner Setting</a>
                            </li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-pub-tab-content" tabactive="id-detail-dialog-pub-tab">
                                <a href="?Unit=organization#pub">Publisher</a>
                            </li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-pay-tab-content" tabactive="id-detail-dialog-pay-tab">
                                <a href="?Unit=organization#pay">Payment Gateway</a>
                            </li>
                            <li class="cdsecn"><a href="">Other</a></li>
                            <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                    </ul>
            </li>
        <!--                    <li class="cdtopn"><a href="">Developer</a></li>
            <li class="cdtopn"><a href="">Publisher</a></li>
            <li class="cdtopn"><a href="">Payment Gateway</a></li>-->
            <li class="cdtopn cdhzmore "><a href="?Unit=game">Game</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png?b=5603%2E4000" alt="">
                    <ul class="cdsectabs">
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-online-tab-content" tabactive="id-detail-dialog-online-tab"><a href="?Unit=game#online">Online Game</a></li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-web-tab-content" tabactive="id-detail-dialog-web-tab"><a href="?Unit=game#web">Browser Game</a></li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-social-tab-content" tabactive="id-detail-dialog-social-tab"><a href="?Unit=game#social">Social Game</a></li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-mobile-tab-content" tabactive="id-detail-dialog-mobile-tab"><a href="?Unit=game#mobile">Mobile Game</a></li>
                            <li class="cdsecn nivtab" tabcontent="id-detail-dialog-other-tab-content" tabactive="id-detail-dialog-other-tab"><a href="?Unit=game#other">Other</a></li>
                            <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                    </ul>
            </li>

            <li class="cdtopn cdhzmore fr"><a href="?Unit=game">Administrator</a>
                <img src="<?php echo base_url();?>
images/menu/more_arrow.png?b=5603%2E4000" alt="">
                    <ul class="cdsectabs">
                            <li class="cdsecn" ><a href="#">Logout</a></li>
                            <li class="cdsecn cdsecnlast"><span>&nbsp;</span></li>
                    </ul>
            </li>

            <li class="cdclr">&nbsp;</li>
        </ul>
    </div>
</div><?php }} ?>