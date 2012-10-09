<?php /* Smarty version Smarty-3.1.7, created on 2012-10-06 12:01:11
         compiled from "application\views\quayso_ngaokiem\02_quayso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1581250247c8ab2b624-79675698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '374cdc6f7218bd0f0285121c68ebcef80115e31a' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\02_quayso.tpl',
      1 => 1349496068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1581250247c8ab2b624-79675698',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50247c8aba2a6',
  'variables' => 
  array (
    'params' => 0,
    'sv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50247c8aba2a6')) {function content_50247c8aba2a6($_smarty_tpl) {?><script>
    $(document).ready(function(){
        $(".id-list-server-select").change(function(){
            $(".id-list-charactor").html("Đang tải danh sách nhân vật...");
            htmlAjax(base_url+"quayso/getcharactors/"+$(this).val(),{},".id-list-charactor");
        });
    });
function checksvnv(){
    var startDate = new Date(2012, 08, 31);//.getTime();
    var endDate = new Date(2012, '<?php echo date("m");?>
', '<?php echo date("d");?>
');//.getTime();
    startDate=startDate.getTime();
    endDate=endDate.getTime();
    //if (startDate > endDate){ alert("Sự Kiện Chưa Bắt Đầu.");return; }
    
    if($(".id-list-charactor-select").legnth<0 || $(".id-list-server-select").val()==-1 || $(".id-list-charactor-select").val()==-1)
        showUIWindow("Thông báo","Vui lòng chọn nhân vật.");
    else{
        $('.id-hidden').show();
        $('.id-sv-nv').hide();
        jqxAjax(base_url+"quayso/setsvnv/",
            {   
                "server"      :$(".id-list-server-select").val(),
                "servername"      :$(".id-list-server-select option:selected").text(),
                "charactor"   :$(".id-list-charactor-select").val()
            }
        );
    }
}
</script>
<?php if (isset($_smarty_tpl->tpl_vars['params']->value["acc"])){?>
<div style="text-align: center" class="id-sv-nv">
<?php if (1==2){?>
<div style="color: #fff;height: 350px;">Chương trình quay số đã kết thúc.</div>
<?php }else{ ?>
    <table width="600px" border="0" cellspacing="0" cellpadding="0" style="padding-top: 60px">
    <tr>
        <td style="padding-left: 100px;color:#fff;">Chọn Server</td>
        <td class="right_content_td id-list-server" style="text-align: left">
            <select class="right_content_select id-list-server-select">
                <option value="-1"> --- Chọn Server --- </option>
                <?php  $_smarty_tpl->tpl_vars['sv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['params']->value["server"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sv']->key => $_smarty_tpl->tpl_vars['sv']->value){
$_smarty_tpl->tpl_vars['sv']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['sv']->value["server"];?>
"><?php echo $_smarty_tpl->tpl_vars['sv']->value["name"];?>
</option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 100px;color:#fff">Chọn nhân vật</td>
        <td class="right_content_td id-list-charactor" style="width: 64%;text-align: left;color:#fff">
            <select class="right_content_select id-list-charactor-select">
                <option value="-1"> ---  Chọn tên nhân vật --- </option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="" class="right_content_td" style="text-align: left">
            <a href="javascript:checksvnv();" class="but1"></a>
        </td>
    </tr>
</table>
</div>
<p align="center"  class="id-hidden" style="display: none">



    <object id="FlashID" 
            classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="600" height="320">
        <param name="movie" value="610_330_QuaySoNKfla.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="wmode" value="transparent" />
        <param name="swfversion" value="11.0.0.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="<?php echo base_url();?>
Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="<?php echo base_url();?>
610_330_QuaySoNKfla.swf" 
                width="600" height="320">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="wmode" value="transparent" />
            <param name="swfversion" value="11.0.0.0" />
            <param name="expressinstall" value="<?php echo base_url();?>
Scripts/expressInstall.swf" />
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p>
                    <a href="http://www.adobe.com/go/getflashplayer">
                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 
                             alt="Get Adobe Flash player" width="112" height="33" />
                    </a>
                </p>
            </div>
            <!--[if !IE]>-->
        </object>
            <!--<![endif]-->
    </object>
</p>
<div style="color:#fff">Số lần quay <?php echo $_smarty_tpl->tpl_vars['params']->value["acc"]->activeamount;?>
/<?php echo $_smarty_tpl->tpl_vars['params']->value["acc"]->totalamount;?>
</div>
<?php }?>
<?php }else{ ?>
<img src="<?php echo base_url();?>
css_quayso_NK_3-8/images/Quay-so_20.png" width="610" height="330" />
<?php }?><?php }} ?>