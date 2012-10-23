function loadmore(id){
    $("#page_MORE").html("Loadding...");
    $("#page_MORE").load("./Controller/?AUnit=more&id="+id);
}
function kendInit(){
    iEasyInit();
    tooltipInit();
    homehoverInit();
}
function kloadotherpage(){
    $(".id-loadding-pecent").html("85%...");
    $(".id-loadding-page").html("Contact page");
    $(".id-loadding-bar div").stop().animate({width:"85%"},500);
    $("#CONTACT .box").load("Controller/?kUnit=contact",function(){
        $(".id-loadding-pecent").html("100%...");
        $(".id-loadding-page").html("Other page");
        $(".id-loadding-bar div").stop().animate({width:"100%"},500,function(){
            $(".id-loadding-process").hide();
        });
        kendInit();
        $('.spinner').fadeOut();
    });
}
function kloadeffectpage(){
    $(".id-loadding-pecent").html("72%...");
    $(".id-loadding-page").html("Effect page");
    $(".id-loadding-bar div").stop().animate({width:"72%"},500);
    $("#EFFECT .box").load("Controller/?kUnit=effect",function(){
        //setTimeout(kloadotherpage,500);
    });
}
function kloadphotopage(){
    $(".id-loadding-pecent").html("60%...");
    $(".id-loadding-page").html("Gallery page");
    $(".id-loadding-bar div").stop().animate({width:"60%"},500);
    $("#GALLERY .box").load("Controller/?kUnit=gallery",function(){
        //setTimeout(kloadeffectpage,500);
    });
}
function kloadtemplatepage(){
    $(".id-loadding-pecent").html("48%...");
    $(".id-loadding-page").html("Template page");
    $(".id-loadding-bar div").stop().animate({width:"48%"},500);
    $("#DESIGN .box").load("Controller/?kUnit=template",function(){
        //setTimeout(kloadphotopage,500);
    });
}
function kloadwebpage(){
    $(".id-loadding-pecent").html("36%...");
    $(".id-loadding-page").html("Developer page");
    $(".id-loadding-bar div").stop().animate({width:"36%"},500);
    $("#DEVELOPER .box").load("Controller/?kUnit=web",function(){
        //setTimeout(kloadtemplatepage,500);
    });
}
function kloadaboutpage(){
    $(".id-loadding-pecent").html("24%...");
    $(".id-loadding-page").html("About page");
    $(".id-loadding-bar div").stop().animate({width:"24%"},500);
    $("#ABOUT .box").load("Controller/?kUnit=about",function(){
        //setTimeout(kloadwebpage,500);
    });
}
function homehoverInit(){
    
        $(window).scroll(function () {
            var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
            $(".id-debug-content").html("scrollBottom:"+scrollBottom+"<br/>"+$(".id-debug-content").html());
            if ($(this).scrollTop() > 240) {
                $(".id-template-detail").css({position:'fixed',top: 44,marginLeft:233});
            }else{
                $('.id-template-detail').css({position:'relative',top: 'auto',marginLeft:3});
            }
        });
}
function kloadhomepage(){
    $(".id-loadding-pecent").html("12%...");
    $(".id-loadding-page").html("Home page");
    $(".id-loadding-bar div").stop().animate({width:"12%"},500);
    $("#HOME .box").load("Controller/?kUnit=home",function(){
        //home-template title
        homehoverInit();
        //setTimeout(kloadaboutpage,500);
    });
}
function iEasyInit(){
    hoverInit();
    prettyPhotoInit();
    //scrollInit();
    
}
function hoverInit(){
    $('.close').hover(function(){
            $(this).stop().animate({opacity:1},400);							 
    }, function(){
            $(this).stop().animate({opacity:0.5},400);	
    });

    
    
    //--------------------------------------
    $(".icons li").find("a").css({opacity:0.7});
    $(".icons li a").hover(function() {
            $(this).stop().animate({opacity:1}, 400, 'easeOutBack');		    
    },function(){
        $(this).stop().animate({opacity:0.7}, 400, 'easeOutBack' );		   
    });
    ///////// gallery	
    $('.photo1').find('span').css({opacity:0});	
    $('.photo1 > a').hover(function(){
            $(this).find('img').stop().animate({borderColor:'#d60004'},400);							
            $(this).find('span').stop().animate({opacity:0.5},400);								
    }, function(){
            $(this).find('img').stop().animate({borderColor:'#3f3f3f'},400);
            $(this).find('span').stop().animate({opacity:0},400);								
    });	

    ///////// video	
    $('.video1').find('span').css({opacity:0});	
    $('.video1 > a').hover(function(){
            $(this).find('img').stop().animate({borderColor:'#d60004'},400);							
            $(this).find('span').stop().animate({opacity:0.5},400);								
    }, function(){
            $(this).find('img').stop().animate({borderColor:'#3f3f3f'},400);
            $(this).find('span').stop().animate({opacity:0},400);								
    });
    
    $('.splash_1 > a, .splash_2 > a').hover(function(){
            $(this).find('img').stop().animate({opacity:0.8},400);
            $(this).stop().animate({borderColor:'#d60004'},400);
    }, function(){
            $(this).find('img').stop().animate({opacity:1},400);
            $(this).stop().animate({borderColor:'#3f3f3f'},400);
    });	
}
function scrollInit(){
    $(window).scroll(function () {
            if ($(this).scrollTop() > 220) {
                    $('.id-notice').css({position:'fixed',top: 0});
            } else {
                    $('.id-notice').css({position:'relative',top: 'auto'});
            }        
    });
}
function tooltipInit(){
//    $('.tooltip').poshytip({
//        className: 'tip-yellowsimple',
//        hideTimeout:0,
//        alignTo: 'target',
//        alignX: 'center',
//        allowTipHover: false,
//        hideAniDuration:0
//    });
//    $('.ftooltip').poshytip({
//	className: 'tip-yellowsimple',
//	showOn: 'focus',
//	alignTo: 'target',
//	alignX: 'right',
//	alignY: 'center',
//	offsetX: 5
//    });
}
function prettyPhotoInit(){
    $("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_square',social_tools:false,allow_resize: true,default_width: 500,default_height: 344});
}
function iLoaderInit(){
    //content switch	
    $('#content ul li').eq(0).css({'visibility':'hidden'});	
    var content = $('#content');	
    content.tabs({
        show:1,
        preFu:function(_){
    	    _.li.css({display:'none'});
            $('.id-notice').css({display:'none',opacity:0});
        },
        actFu:function(_){  
            var Delay=0;
            if(_.pren==0){Delay=1000;}
		
//            if(_.curr){
//                _.curr.css({display:'block', left:-2000}).stop().delay(Delay+600).animate({left:0},800, 'easeOutExpo');	                
//                //changePages();
//            }   
            if(_.prev){
                _.prev.stop().delay(Delay).animate({left:2000},800, 'easeInExpo', function(){ 
                    _.prev.css({display:'none'}); 
                    if(_.curr){
                        _.curr.css({display:'block', left:-2000}).stop().delay(Delay).animate({left:0},800, 'easeOutExpo');	                
                        //changePages();
                    } 
                });
//                _.prev.hide();
//                _.curr.show();
            }			
			//console.log(_.pren, _.n);			
            if ( (_.n == 0) && (_.pren != -1) ){
                showSplash();
				//console.log('showSplash');
            }
            if ((_.pren == 0) && (_.n>0)){
                hideSplash(); 
				//console.log('hideSplash');
            }
			/*if (_.pren == undefined){
                _.pren = -1;
                hideSplashQ();
            }*/
            if ( (_.pren == undefined) && (_.n >= 1) ){  //if at start loading subpage (_.n >= 0)
                if(_.curr){
                        _.curr.css({display:'block', left:-2000}).stop().delay(Delay).animate({left:0},800, 'easeOutExpo');	                
                        //changePages();
                    } 
                _.pren = -1;
                hideSplashQ();
		//console.log('hideSplashQ');
            }
        }
    });
    
    
    //content switch navs
    var nav = $('.menu');	
    nav.navs({
		useHash:true,
        defHash: '#!/SPLASH',
        hoverIn:function(li){            
			$('> a b',li).stop().animate({opacity:1},400,'swing');
        },
        hoverOut:function(li){            
            $('> a b',li).stop().animate({opacity:0},400,'swing');            
        }
    })    
    .navs(function(n){	
   	    content.tabs(n);
    });
    
    
    var h_cont=728;
    function centre() {
            var h=$(document).height()-0;
            if (h>h_cont) {
                    m_top=~~(h-h_cont)/2+0;
            } else {
                    m_top=0;
            }
            $('.main1').stop().css({paddingTop:m_top});
            $('.bg1').stop().css({height:$('.extra').height()});
    }
    //centre(0);
    setInterval(centre,1);
    //$(window).resize(function(){ centre(400); } 	);
}
