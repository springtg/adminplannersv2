<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Hướng dẫn tạo slide ấn tượng bằng impress.js </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link href="http://y2graphic.com/templates/v2/favicon.ico" rel="shortcut icon" type="image/x-icon" />
            <link href="{{base_url()}}Interdesign/im/css/css.css" rel="stylesheet"/>
            <link href="{{base_url()}}syslib/syscss/sysstyle.css" rel="stylesheet"/>
            <script src="{{base_url()}}Interdesign/im/js/jquery-1.7.1.min.js"></script>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&amp;subset&#61;latin,vietnamese' rel='stylesheet' type='text/css'/>
            <script src="{{base_url()}}Interdesign/im/js/jmpress.js"></script>
            <script src="{{base_url()}}Interdesign/im/js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>


    </head>

    <body>
        {{include file="../sys/01_notice.tpl"}}
        {{include file="../sys/02_script.tpl"}}
        {{include file="../impress/subs/01_menu.tpl"}}
        {{include file="../impress/subs/02_splash.tpl"}}
        <div id="impress">
            <div id="home" class="step" >

            </div>

            <div id="about" class="step" data-x="-1500" data-rotate="300">
                <div class="page">
                    <h2 class="pl12" style="padding: 12px">CHUYÊN THIẾT KẾ WEBSITE GIỚI THIỆU CÔNG TY, WEBSITE CÁ NHÂN.</h2>
                    <div class="content">

                        {{include file="../impress/pages/02_about.tpl"}}
                    </div>
                </div>		
            </div>

            <div id="developer" class="step" data-y="-1000">
                <div class="content">
                    <h2>Sony Xperia S</h2>
                    <p>Với màn hình 4,3 inch độ phân giải HD, camera 12 Megapixel và cấu hình vi xử lý lõi kép, Xperia S là smartphone cao cấp nhất của Sony hiện nay. Đây còn là model đầu tiên của Sony sau khi chính thức sở hữu toàn bộ hãng di động Sony Ericsson. Thiết kế chính là một trong những điểm nhấn đặc biệt trên model.</p>
                </div>	
            </div>

            <div id="design" class="step" data-x="7500" data-scale='4'>
                <div class="content">

                    <h2>Samsung Galaxy S III</h2>
                    <p>Ra mắt tại sự kiện diễn ra ở London, Anh vào ngày 4-5, Samsung đã giới thiệu thế hệ thứ ba của dòng smartphone "đinh" của hãng. Hai thế hệ Galaxy S và S2 trước đó của hãng đều được đánh giá là đối thủ nặng ký của Apple iPhone 3GS và iPhone 4. Theo đó, Galaxy S3 cũng sẽ đối mặt trực diện với thế hệ iPhone mới sẽ ra mắt vào đầu tháng 6 tới đây.</p>
                </div>	
            </div>

            <div id="effect" class="step" data-src="{{base_url('ku/home/ab')}}" data-x="4200" data-y='1600' data-rotate="500">
                loadding...	
            </div>
            <div id="contact" class="step" data-x="2000" data-z="1500" data-rotate="170">
                <div class="page">
                    <h2 class="p12">Contact us</h2>
                    <div class="content">Loadding...</div>	
                </div>
            </div>
        </div>
        <script type="text/javascript">
            (function(){
                $('#impress').jmpress();
                
                $('.content').slimscroll({
                    width: '520px',
                    height: '400px',
                    railVisible: true,
                    allowPageScroll: true
                });
            
                $(".step").on("impress:stepenter", function() {
                    //if (console.clear) { console.clear(); }
                    console.log("aa");
                });
            })(jQuery)
            var areaContent;
            function addEditorContent(){
                if(!areaContent) {
                    areaContent = new nicEditor().panelInstance('Content');
                }
            }
            function removeEditorContent(){
                if(areaContent) {
                    areaContent.removeInstance('Content');
                    areaContent = null;
                }
            }
            var previousSlide;
            function handleCurrentSlide() {
                var currentSlide = $('.active').attr('id');

                if (previousSlide !== currentSlide) {
                    $("#menu li.navactive").removeClass("navactive");
                    $("#menu li.nav"+currentSlide).addClass("navactive");
                    if($("#"+currentSlide+" .content").html()=="Loadding..."){
                        $("#"+currentSlide+" .content").load("{{base_url('ku/page/contact')}}"
                        ,function(){addEditorContent();}
                    );
                    }
                    if(currentSlide=="home"){
                        showSplash();
                    }else{
                        hideSplash();
                    }
                    console.log(currentSlide);
                }

                previousSlide = currentSlide;
            }
            setInterval(handleCurrentSlide, 200);
            
            function showSplash(){
                $(".splash").show(1800);
                //$(".menu .nav7").stop(true).animate({left:560},800,'easeInOutExpo').animate({top:450},800,'easeInOutExpo');
                $(".menu .nav6").stop(true).delay(100).animate({left:440},800,'easeInOutExpo').animate({top:348},800,'easeInOutExpo');
                $(".menu .nav5").stop(true).delay(200).animate({left:80},800,'easeInOutExpo').animate({top:384},800,'easeInOutExpo');
                $(".menu .nav4").stop(true).delay(1100).animate({left:432},800,'easeInOutExpo').animate({top:136},800,'easeInOutExpo');
                $(".menu .nav3").stop(true).delay(1200).animate({left:248},800,'easeInOutExpo').animate({top:20},800,'easeInOutExpo');
                $(".menu .nav2").stop(true).delay(1300).animate({left:200},800,'easeInOutExpo').animate({top:212},800,'easeInOutExpo');
                $(".menu .nav1").stop(true).delay(1400).animate({left:20},800,'easeInOutExpo').animate({top:164},800,'easeInOutExpo');
  
            };
            function hideSplash(){  
                $(".splash").hide(1800);
                $(".menu .nav1").stop(true).delay(100).animate(   {top:0},800,'easeInOutExpo').animate({left:0},800,'easeInOutExpo');
                $(".menu .nav2").stop(true).delay(200).animate(  {top:0},800,'easeInOutExpo').animate({left:88},800,'easeInOutExpo');
                $(".menu .nav3").stop(true).delay(300).animate(  {top:0},800,'easeInOutExpo').animate({left:176},800,'easeInOutExpo');
                $(".menu .nav4").stop(true).delay(500).animate(  {top:0},800,'easeInOutExpo').animate({left:264},800,'easeInOutExpo');
                $(".menu .nav5").stop(true).delay(1200).animate( {top:0},800,'easeInOutExpo').animate({left:352},800,'easeInOutExpo');
                $(".menu .nav6").stop(true).delay(800).animate(  {top:0},800,'easeInOutExpo').animate({left:440},800,'easeInOutExpo');
                //$(".menu .nav7").stop(true).delay(900).animate({top:20},800,'easeInOutExpo').animate({left:520},800,'easeInOutExpo');
   
            };
            function hideSplashQ(){
                $(".splash").hide();
                $(".menu .nav1").css({top:0, left:0}); 
                $(".menu .nav2").css({top:0, left:88}); 
                $(".menu .nav3").css({top:0, left:176}); 
                $(".menu .nav4").css({top:0, left:264}); 
                $(".menu .nav5").css({top:0, left:352}); 
                $(".menu .nav6").css({top:0, left:440}); 
                //$(".menu .nav7").css({top:20, left:528}); 
        
            }
        </script>

    </body>
</html>
