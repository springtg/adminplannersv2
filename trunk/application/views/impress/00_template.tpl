<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Mr. Khương</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link href="http://y2graphic.com/templates/v2/favicon.ico" rel="shortcut icon" type="image/x-icon" />
            <link href="{{base_url()}}Interdesign/im/css/css.css" rel="stylesheet"/>
            <link href="{{base_url()}}syslib/syscss/sysstyle.css" rel="stylesheet"/>
            <link href="{{base_url()}}Interdesign/im/css/basic-animations.min.css" rel="stylesheet"/>
            
            <script src="{{base_url()}}Interdesign/im/js/jquery-1.7.1.min.js"></script>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&amp;subset&#61;latin,vietnamese' rel='stylesheet' type='text/css'/>
            <script src="{{base_url()}}Interdesign/im/js/jmpress.js"></script>
            <script src="{{base_url()}}Interdesign/im/js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>

<!--            <link rel="stylesheet" href="{{base_url()}}syslib/jwysiwyg/jwysiwyg/jwysiwyg/jquery.wysiwyg.css" type="text/css"/>
            <script type="text/javascript" src="{{base_url()}}syslib/jwysiwyg/jwysiwyg/jwysiwyg/jquery.wysiwyg.js"></script>
            -->
<!--            <link href='{{base_url()}}syslib/redactor/redactor.css' rel='stylesheet' type='text/css'/>
            <script src="{{base_url()}}syslib/redactor/redactor.js"></script>-->
    </head>

    <body>
        <a id="prev" href="#"></a>
        <a id="next" href="#"></a>
        {{include file="../sys/01_notice.tpl"}}
        {{include file="../sys/02_script.tpl"}}
        {{include file="../impress/subs/01_menu.tpl"}}
        {{include file="../impress/subs/02_splash.tpl"}}
        <div id="impress">
            <div id="contact" class="step" >
                <div class="page">
                    <h2 data-jmpress="warp-right after 1500ms step" class="p12">Contact us</h2>
                    <div class="content">
                        <iframe style="border: none;width: 520px;height: 398px"
                                src="http://localhost/AdminPlanners2.0/ku/page/contact"></iframe>	
                    </div>

                </div>
            </div>
            <div id="home" class="step" data-x="1500" data-y="-750" data-z="-1000" data-rotate="270">

            </div>

            <div id="about" class="step" data-x="-1500" data-rotate="300">
                <div class="page">
                    <h2 data-jmpress="warp-right after 1500ms step" class="pl12" style="padding: 12px">CHUYÊN THIẾT KẾ WEBSITE GIỚI THIỆU CÔNG TY, WEBSITE CÁ NHÂN.</h2>
                    <div class="content">
                        {{include file="../impress/pages/02_about.tpl"}}
                    </div>
                </div>		
            </div>

            <div id="developer" class="step" data-y="-1000">
                <div class="page">
<!--                    <h2 data-jmpress="warp-right after 1500ms step" class="pl12" style="padding: 12px">CHUYÊN THIẾT KẾ WEBSITE GIỚI THIỆU CÔNG TY, WEBSITE CÁ NHÂN.</h2>-->
                    <div class="content">
                        {{include file="../impress/pages/03_developer.tpl"}}
                    </div>
                </div>	
            </div>
                    
            {{$type=mt_rand(0,4)}}
            {{$type1=mt_rand(0,4)}}
            {{$type2=mt_rand(0,4)}}
            <div id="template" btype="{{$type}}-{{$type1}}-{{$type2}}" bstart="0" class="step" data-x="7500" data-scale='4'>
                <div class="page">
                    <h2 class="p12">
                        Templates
                    </h2>
                    <div class="content">Loadding...</div>
                </div>	
            </div>
            
            {{$page=1}}
            {{$foo=$Data["item-in-page"][$type]+$Data["item-in-page"][$type1]+$Data["item-in-page"][$type2]}}
            {{while $foo < $Data["num"]}}
                {{$type=mt_rand(0,4)}}
                {{$type1=mt_rand(0,4)}}
                {{$type2=mt_rand(0,4)}}
                <div id="template-page-{{$page}}" btype="{{$type}}-{{$type1}}-{{$type2}}" bstart="{{$foo}}" class="step" data-x="{{mt_rand(-100,100)*100}}" data-y="{{mt_rand(-100,100)*100}}" data-z="{{$page*1200-10000}}" data-rotate="{{mt_rand(1,360)}}" data-scale='4'>
                    <div class="page">
                        <h2 class="p12">Templates</h2>
                        <tt class="prev">Prev</tt>
                        <tt class="next">Next</tt>
                        <div class="content">Loadding...</div>

                    </div>	
                </div>
                {{$foo=$foo+$Data["item-in-page"][$type]+$Data["item-in-page"][$type1]+$Data["item-in-page"][$type2]}}
                {{$page=$page+1}}
            {{/while}}
            
            <div id="effect" class="step" data-x="4200" data-y='1600' data-rotate="500">
                <div class="page">
                    <h2 data-jmpress="warp-right after 1500ms step" class="pl12" 
                        style="padding: 12px">Đặc điểm nổi bật.</h2>
                    <div class="content">
                        {{include file="../impress/pages/05_effect.tpl"}}
                    </div>
                </div>		
            </div>

        </div>
        <script type="text/javascript">
            if (typeof String.prototype.startsWith != 'function') {
                // see below for better implementation!
                String.prototype.startsWith = function (str){
                    return this.indexOf(str) == 0;
                };
            }
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
                });
                // Next slide
                $('.next,#next').click(function(){
                        $('#impress').jmpress('next');
                });

                // Prev slide
                $('.prev,#prev').click(function(){
                        $('#impress').jmpress('prev');
                })
            })(jQuery)
            var areaContent;
            function addEditorContent(){
                
                if(!areaContent) {
                    areaContent = new nicEditor({
                        buttonList : ['save','bold','italic','underline','left','center','right','justify','ol','ul','indent','outdent','subscript','superscript']
                    }).panelInstance('Content');
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
                    if(currentSlide.startsWith("template")){
                        var type=$("#"+currentSlide).attr("btype");
                        var start=$("#"+currentSlide).attr("bstart");
                        if($("#"+currentSlide+" .content").html()=="Loadding..."){
                            $("#"+currentSlide+" .content").load("{{base_url('ku/page')}}/template/"+type+"/"+start)
                        }
                    }else{
                        $("#menu li.navactive").removeClass("navactive");
                        $("#menu li.nav"+currentSlide).addClass("navactive");
                        if($("#"+currentSlide+" .content").html()=="Loadding..."){
                            $("#"+currentSlide+" .content").load("{{base_url('ku/page')}}/"+currentSlide);
                        }
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
