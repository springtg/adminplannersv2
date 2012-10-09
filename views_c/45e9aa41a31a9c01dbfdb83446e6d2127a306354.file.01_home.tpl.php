<?php /* Smarty version Smarty-3.1.7, created on 2012-10-06 11:56:19
         compiled from "application\views\quayso_ngaokiem\01_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3208250247b8479c215-04215657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45e9aa41a31a9c01dbfdb83446e6d2127a306354' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\01_home.tpl',
      1 => 1349495777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3208250247b8479c215-04215657',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50247b847e28f',
  'variables' => 
  array (
    '_SESSION' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50247b847e28f')) {function content_50247b847e28f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ngao Kiếm - Quay Số</title>
        <link href="<?php echo base_url();?>
css_quayso_NK_120925/css/base.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
css_quayso_NK_120925/css/product_level_01.css" />
        <script type="text/javascript" src="<?php echo base_url();?>
js/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>
js/vadilation.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>
js/block/jquery.blockUI.js"></script>
<!--        <script type="text/javascript" src="<?php echo base_url();?>
script/function.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url();?>
lib/nanoscroller/jquery.nanoscroller.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
lib/nanoscroller/nanoscroller.css" />
        <!--<link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.classic.css" type="text/css" />
        <link type="text/css" href="<?php echo base_url();?>
css/adm/adm.css" rel="stylesheet" media="all" title='style' />
        <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqx-all.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url();?>
function/script.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>
function/function.js"></script>


        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
css_quayso_NK_120925/css/menu.css" />


        <script type="text/javascript" src="<?php echo base_url();?>
lib/ui/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"	href="<?php echo base_url();?>
lib/themes/base/jquery.ui.css"/>

        <script type="text/javascript" src="<?php echo base_url();?>
css_quayso_NK_120925/js/ddaccordion.js"></script>
        <script type="text/javascript">
            ddaccordion.init({
                headerclass: "submenuheader", //Shared CSS class name of headers group
                contentclass: "submenu", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: false, //Should contents open by default be animated into view?
                persiststate: true, //persist state of opened contents within browser session?
                toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            })
        </script>


<!--<script type="text/javascript" src="<?php echo base_url();?>
script/quayso_ngaokiem/FormWindowInit.js"></script>-->
    </head>

    <body>
        <span style="display: none">
            <div id="dialog"  title="Dialog Title">I'm in a dialog<br/>

                <input type="text" />
            </div> 
        </span>
        <script>
                $(document).ready(function() {
                    //$("#dialog").dialog({ autoOpen: true,disabled: true   });
                });
        </script>
        <script>var isrunning=false;var base_url="<?php echo base_url();?>
";</script>
        <iframe
            id		= 'integration_asynchronous'
            name	= 'integration_asynchronous'
            style	= "
            width:	0;
            height:	0;
            "
            ></iframe>
        <span style="display: none">
            <div class="uiWindow" style="padding: 8px 0;">
                <div class="uicontent"></div>
                <div style="text-align: center;padding-top: 12px">
                    <input type="button" class="classic-button okbutton" onclick="$.unblockUI();" value="Đồng ý">
                </div>
            </div>
        </span>
        <span style="display: none">
            <div class="uiWindow-showlogin" style="padding: 8px 0;">
                <div class="uicontent"></div>
                <div style="text-align: center;padding-top: 12px">
                    <input type="button" class="classic-button" onclick="Showlogin();" value="Đồng ý">
                </div>
            </div>
        </span>

        <span style="display: none">
            <div class="uiWindow-login" style="padding: 8px 0;">
                <div class="uicontent">
                    <form action="<?php echo base_url("home/nothing");?>
" 
                          onsubmit="submitToLogin();"
                          name="frmlogin" id="frmlogin" 
                          method="post" target="integration_asynchronous">
                        <table style="padding-left: 40px">
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td><input type="text" name="txtusername" id="txtusername" class="classic-input"/></td>
                            </tr>
                            <tr>
                                <td>Mật hhẩu</td>
                                <td><input type="password" name="txtpassword" id="txtpassword" class="classic-input"/></td>
                            </tr>
                        </table>
                        <div style="text-align: center;padding-top: 12px">
                            <input type="submit" class="classic-button"  value="Đồng ý"/>
                            <input type="button" class="classic-button" onclick="$.unblockUI();" value="Hủy"/>
                        </div>
                    </form>
                </div>


            </div>
        </span>
        <style>
            *,#window-login *{font-family:tahoma;font-size:11px}
        </style>

        <div id="container">
            <div id="header">
<!--                <div class="logo"><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/logo.png" width="198" height="188" /></div>-->
                <div class="menu_top"><a href="#">Trang chủ</a> | <a href="#">Đăng ký</a> | <a href="#">Nạp thẻ</a> | <a href="#">Diễn đàn</a></div>
                <div class="slogan"><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/slogan.png" width="503" height="120" /></div>
            </div>
            <div id="content">
                <div id="left">
                    <div class="pt_title"></div>
                    <div class="pt_mid">
                        <div class="glossymenu">
                            <a class="menuitem submenuheader" href="#">Vũ Khí Cam côn Luân</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h1.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Kinh nghiệm dược III</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h2.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">THẺ FQ</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h3.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">PHONG LỆ</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h4.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Thiên Sơn Tiên Lộ III</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h5.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Huyết Linh Đan III</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h6.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Kim Sí Đại Bàng</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h7.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Trứng May Mắn Cam</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h8.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Trứng May Mắn Tím</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h9.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="#">Mảnh Vỡ Vạn Tượng</a>
                            <div class="submenu">
                                <ul>
                                    <li><img src="<?php echo base_url();?>
css_quayso_NK_120925/images/h10.gif" width="212" height="97" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="right">
                    <div class="menu">
                        <a href="<?php echo site_url();?>
"><div class="menu_item1" style="left:0px; top:0px;"></div></a>
                        <a href="<?php echo site_url('phanthuong');?>
"><div class="menu_item2" style="left:152px; top:0px;"></div></a>
                        <a href="<?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["QSNKII-USER"])){?><?php echo site_url('quayso');?>
<?php }else{ ?>javascript:Showlogin();<?php }?>"><div class="menu_item3" style="left:320px; top:0px;"></div></a>
                        <a href="<?php echo site_url('ketqua');?>
"><div class="menu_item4" style="left:490px; top:0px;"></div></a>
                    </div>
                    <div class="quayso">
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value["QSNKII-USER"])){?>
                        <div class="clear"></div>
                        <div style="color:#fff;float:left;width: 650px;text-align: center">
                            Xin chào : <b style="color:#fff;"><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value["QSNKII-USER"]->username;?>
</b> 
                            <a href="<?php echo base_url('home/logout');?>
" style="color:#fff"> Thoát</a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>
<?php }} ?>