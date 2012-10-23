
function showSplash(){
        $(".id-notice").stop(true).animate({opacity:0},400,'swing', function(){ $(this).css({display:'none'}); });
	$("header").stop(true).delay(2000).animate({top:40},800,'easeInOutExpo'); 
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
   $(".id-notice").css({display:'block'}).stop(true).delay(2000).animate({opacity:1},800,'easeOutExpo');
   $("header").stop(true).animate({top:0},800,'easeInOutExpo'); 
   $(".splash").hide(1800);
   $(".menu .nav1").stop(true).animate({top:20},800,'easeInOutExpo').animate({left:0},800,'easeInOutExpo');
   $(".menu .nav2").stop(true).delay(100).animate({top:20},800,'easeInOutExpo').animate({left:88},800,'easeInOutExpo');
   $(".menu .nav3").stop(true).delay(200).animate({top:20},800,'easeInOutExpo').animate({left:176},800,'easeInOutExpo');
   $(".menu .nav4").stop(true).delay(300).animate({top:20},800,'easeInOutExpo').animate({left:264},800,'easeInOutExpo');
   $(".menu .nav5").stop(true).delay(1200).animate({top:20},800,'easeInOutExpo').animate({left:352},800,'easeInOutExpo');
   $(".menu .nav6").stop(true).delay(800).animate({top:20},800,'easeInOutExpo').animate({left:440},800,'easeInOutExpo');
   //$(".menu .nav7").stop(true).delay(900).animate({top:20},800,'easeInOutExpo').animate({left:520},800,'easeInOutExpo');
   
};
function hideSplashQ(){
	
        $(".id-notice").css({display:'block', opacity:1});
	$("header").css({top:0}); 
	$(".splash").hide();
	$(".menu .nav1").css({top:20, left:0}); 
	$(".menu .nav2").css({top:20, left:88}); 
	$(".menu .nav3").css({top:20, left:176}); 
	$(".menu .nav4").css({top:20, left:264}); 
	$(".menu .nav5").css({top:20, left:352}); 
	$(".menu .nav6").css({top:20, left:440}); 
	//$(".menu .nav7").css({top:20, left:528}); 
        
};

