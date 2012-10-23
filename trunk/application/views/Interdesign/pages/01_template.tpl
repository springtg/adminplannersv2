<!DOCTYPE HTML>
<html lang="en">
<head>
<title>KHUONG - Developer</title>
<meta http-equiv="content-type" content="text/javascript;charset=UTF-8" />
<!--[if IE]>
<style>
    body{font-family: tahoma;font-size: 11px}
</style>
        <script type="text/javascript" src="js/main_ie.js"></script>
<![endif]-->

<script type="text/javascript" src="{{base_url()}}Interdesign/js/main.js"></script>

<link rel="stylesheet" href="{{base_url()}}Interdesign/css/scrolbar.css" type="text/css">
<link rel="stylesheet" href="{{base_url()}}Interdesign/css/style.css" type="text/css">
<link rel="stylesheet" href="{{base_url()}}Interdesign/css/960.css" type="text/css">
<link rel="stylesheet" href="{{base_url()}}Interdesign/css/icon.css" type="text/css">
<link rel="stylesheet" href="{{base_url()}}Interdesign/css/input.css" type="text/css">
<link rel="stylesheet" href="{{base_url()}}Interdesign/css/button.css" type="text/css">
<link rel="shortcut icon" href="{{base_url()}}Interdesign/images/icon.png"/>

<!--<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-twitter/tip-twitter.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-yellow/tip-yellow.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-violet/tip-violet.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-darkgray/tip-darkgray.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-skyblue/tip-skyblue.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-twitter/tip-twitter.css" type="text/css" />
<link rel="stylesheet" href="lib/poshytip-1.1/src/tip-green/tip-green.css" type="text/css" />
<script type="text/javascript" src="lib/poshytip-1.1/src/jquery.poshytip.js"></script>-->

<script type="text/javascript" src="{{base_url()}}Interdesign/js/vadilation.js"></script>
<script type="text/javascript" src="{{base_url()}}Interdesign/js/myscript.js"></script>



<!--[if lt IE 8]>
        <div style=' clear: both; text-align:center; position: relative;z-index:100;'>
                <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
        </div>
<![endif]-->

</head>
<body>
    <div class="spinner"></div>

<!----PAGE--------------------------------------------------------------------->
    <div class="id-main-pages">
<!--------HEAD----------------------------------------------------------------->
        {{include file="../subs/01_head.tpl"}}
<!--======END HEAD===========================================================-->
<!------------Content---------------------------------------------------------->
    <div class="id-page-content">
            {{include file="../subs/02_menu.tpl"}}
            {{include file="../subs/03_splash.tpl"}}
            <div class="id-notice-blank"></div>
            <div class="id-notice hidden">
                Thông báo : Trang web đang trong quá trình phát triển và cập nhật nội dung. 
                Thời gian hoạt động chính thức của trang web sẽ được cập nhật sớm nhất.
            </div>
            <div class="id-pages-list">
                
            </div>
            <article id="content" class="hidden">
                <ul class="jpages">
                    <li class="jpage" id="SPLASH"></li>
                    <li id="HOME" class="jpage">
                        <div class="box w900">
                            // include "Pages/01_home.php"; 
                        </div>
                    </li>
                    <li id="ABOUT" class="jpage">
                        <div class="box">
                            // include "Pages/02_about.php"; 
                        </div>
                    </li>
                    <li id="DEVELOPER" class="jpage">
                        <div class="box">
                            // include "Pages/03_web.php"; 
                        </div>
                    </li>
                    <li id="DESIGN" class="jpage">
                        <div class="box">
                            // include "Pages/04_template.php"; 
                        </div>
                    </li>
                    <li id="GALLERY" class="jpage">
                        <div class="box">
                             //include "Pages/05_gallery.php"; 
                        </div>
                    </li>
                    <li id="EFFECT">
                        <div class="box" class="jpage">
                            // include "Pages/06_effect.php"; 
                        </div>
                    </li>
                    <li id="CONTACT" class="jpage">
                        <div class="box">
                            // include "Pages/07_contact.php"; 
                        </div>
                    </li>
                    <li id="MORE" class="jpage">
                        <div class="box">
                            // include "Pages/08_more.php"; 
                        </div>
                    </li>
                    <li id="PRIVACY" class="jpage">
                        <div class="box">

                        </div>
                    </li>
                    <li id="960_GRIDS" class="jpage">
                        <div class="box w960">
                            // include "Pages/09_960grids.php"; 
                        </div>
                    </li>
                    <li id="COLOR" class="jpage">
                        <div class="box">
                            // include "Pages/10_color.php"; 
                        </div>
                    </li>
                    <li id="NOFUNCTION" class="jpage">
                        <div class="box">
                            // include "Pages/90_NoFunction.php"; 
                        </div>
                    </li>
                    <li id="TBE" class="jpage">
                        <div class="box">
                            <a href="#!/SPLASH" class="close"><span></span></a>
                            <div class="id-content">
                                <? //include "Pages/11_Thumbnail_Proximity_Effect.php"; ?>
                                <span class="thumbnail-s">
                                Trang này sẽ tải hơn 100 hình ảnh các template, thời gian tải có thể mất vài giây đến vài chục giây.<br/>
                                <a href="javascript:$('.thumbnail-s').hide();$('.thumbnail').show();$('#TBE .box .id-content').load('Controller/?kUnit=thumbnail_effect');">
                                Ấn vào đây để tải trang này.</a>
                                Hiệu ứng hay lắm. vì hình nhiều nên có thể gây chậm trình duyệt :D
                                </span>
                                <span class="thumbnail hidden">
                                Đợi em tý, em đang tải từ trang khác, mạng chậm quá huhu.<br/>
                                Nếu sau 10s em tải không được anh ấn vào đây dùm em nhé nhé.
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </article>
                
            
    </div>
<!--======END PAGE===========================================================-->
            
            
    </div>
<!--==END PAGE===============================================================-->

<!--------FOOTER--------------------------------------------------------------->
    {{include file="../subs/04_foot.tpl"}}
<!--======END FOOTER=========================================================-->
<!--<div class="id-loadding-process">
    <span class="id-loadding-pecent">Loadding...</span>
    <span class="id-loadding-page">home page</span>
    <div class="id-loadding-bar">
        <div class="" style=""></div>
    </div>
</div>-->
<script>
$(document).ready(function() {
    $(".close-debug").click(function(){
        $(".id-debug").hide();
    });
//    setTimeout(function () {					
//  		$('#TBE .box').load("Controller/?kUnit=thumbnail_effect");
//		
//
//	}, 5000);
});

</script>
</body>
</html>
