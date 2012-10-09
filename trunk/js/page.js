nie.use(["nie.util.bigUrs"],function(){
		var bigUrs = nie.util.bigUrs.create();
		bigUrs.init();
	})
/*��Ƶ���ſ�ʼ*/
var tabv = function(o1,o2,o3,o4,o5,imgURL){
		var num
		var flv
		function flas(i){
			$(o1).removeClass("current");
			$(o1).eq(i).addClass("current");
			if (num != i){
				$(o2).html("");
				flv=$(o1).eq(i).attr("rel");
				$(o2).flash({
					allowscriptaccess:"always",
					wmode:"transparent",
					swf: 'http://res.nie.netease.com/comm/js/nie/util/player.swf',
					flashvars:"movieUrl="+flv+"&videoWidth="+o3+"&videoHeight="+o4+"&volume=0.8&autoPlay="+o5+"&startImg="+imgURL[i]+"&loopTimes=-1&&bufferTime=5",
					width: o3,
					height: o4
				});
				num=i
			}
		}
		flas(0)
		
		$(o1).each(function(i){
			$(this).click(function(){
				flas(i)
			})
		})
	}
		function addFlash(idOrClass,url,width,height,autoPlay,imgURL){
	$(idOrClass).flash({
		  swf: 'http://res.nie.netease.com/comm/js/nie/util/player.swf',
flashvars:"movieUrl="+url+"&videoWidth="+width+"&videoHeight="+height+"&volume=0.8&autoPlay="+autoPlay+"&startImg="+imgURL+"&loopTimes=-1&&bufferTime=5",
		  wmode:"transparent",
		  allowScriptAccess:"always",
		  width: width,
		  height:height
	      });
	}
	function obj_videoList(){tabv("#videoList  a","#video",428,240,false,["http://wh.163.com/images/sp_01_b.jpg","http://wh.163.com/images/sp_02_b.jpg","http://wh.163.com/images/sp_03_b.jpg"]);}
	function obj_video1(){addFlash("#video1","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video2(){addFlash("#video2","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video3(){addFlash("#video3","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video4(){addFlash("#video4","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video5(){addFlash("#video5","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video6(){addFlash("#video6","http://v.nie.netease.com/wh/2012/0515/zhanqi.flv",320,180,false,"http://wh.163.com/images/zqb_320_180.jpg");}
	function obj_video7(){addFlash("#video7","http://v.nie.netease.com/wh/2012/putong/mp/mp_xb.flv",600,338,true,"http://wh.163.com/images/wh_bzs_01.jpg");}
	function obj_video8(){addFlash("#video8","http://v.nie.netease.com/wh/gw/201109/job_2.f4v",800,450,true,"http://wh.163.com/images/wh_bzb_01.jpg");}
	function obj_video9(){addFlash("#video9","http://v.nie.netease.com/wh/2012/putong/mp/mp_qs.flv",600,338,true,"http://wh.163.com/images/wh_bzs_05.jpg");}
	function obj_video10(){addFlash("#video10","http://v.nie.netease.com/wh/2012/gaoqing/mp/mp_7sha.flv",800,450,true,"http://wh.163.com/images/wh_bzb_05.jpg");}
	function obj_video11(){addFlash("#video11","http://v.nie.netease.com/wh/2012/putong/mp/mp_dh.flv",600,338,true,"http://wh.163.com/images/wh_bzs_06.jpg");}
	function obj_video12(){addFlash("#video12","http://v.nie.netease.com/wh/2012/gaoqing/mp/diehua.flv",800,450,true,"http://wh.163.com/images/wh_bzb_06.jpg");}
	function obj_video13(){addFlash("#video13","http://v.nie.netease.com/wh/2012/putong/mp/mp_yy.flv",600,338,true,"http://wh.163.com/images/wh_bzs_02.jpg");}
	function obj_video14(){addFlash("#video14","http://v.nie.netease.com/wh/2012/gaoqing/mp/yingyue.flv",800,450,true,"http://wh.163.com/images/wh_bzb_02.jpg");}
	function obj_video15(){addFlash("#video15","http://v.nie.netease.com/wh/2012/putong/mp/mp_ss.flv",600,338,true,"http://wh.163.com/images/wh_bzs_03.jpg");}
	function obj_video16(){addFlash("#video16","http://v.nie.netease.com/wh/2012/gaoqing/mp/job_5.f4v",800,450,true,"http://wh.163.com/images/wh_bzb_03.jpg");}
	function obj_video17(){addFlash("#video17","http://v.nie.netease.com/wh/2012/putong/mp/mp_sl.flv",600,338,true,"http://wh.163.com/images/wh_bzs_04.jpg");}
	function obj_video18(){addFlash("#video18","http://v.nie.netease.com/wh/2012/gaoqing/mp/shaolin.flv",800,450,true,"http://wh.163.com/images/wh_bzb_04.jpg");}
/*��Ƶ���Ž���*/
nie.use(['ui.popup','ui.tab','ui.lightBox','util.share',"nie.util.share","util.swfobject"], function(){

/*��ҳ����*/
				$('#nav').flash({
				swf:'http://res.nie.netease.com/wh/gw/12v1/index/swf/index-nav.swf',
				width:960,
				height:120,
				allowscriptaccess:"always",
				wmode:'transparent'
			});

/*��ҳ������Ч��*/
				$('#index-l-h').flash({
				swf:'http://res.nie.netease.com/wh/gw/12v1/index/swf/index-l-h.swf',
				width:270,
				height:198,
				allowscriptaccess:"always",
				wmode:'transparent'
			});

/*��ҳ������Ч��*/
				$('#index-r-h').flash({
				swf:'http://res.nie.netease.com/wh/gw/12v1/index/swf/index-r-h.swf',
				width:248,
				height:364,
				allowscriptaccess:"always",
				wmode:'transparent'
			});




	obj_videoList();
/*������*/
	var wins1 =  $('.popup').popup();
	$('#popoup-btn1').click(function(){
		obj_videoList();
		obj_video7();
		wins1.show('#popup1');
	});
	var wins2 =  $('.popup').popup();
	$('#popoup-btn2').click(function(){
		obj_videoList();
		obj_video9();
		wins2.show('#popup2');
	});
	var wins3 =  $('.popup').popup();
	$('#popoup-btn3').click(function(){
		obj_videoList();
		obj_video11();
		wins3.show('#popup3');
	});
	var wins4 =  $('.popup').popup();
	$('#popoup-btn4').click(function(){
		obj_videoList();
		obj_video13();
		wins4.show('#popup4');
	});
	var wins5 =  $('.popup').popup();
	$('#popoup-btn5').click(function(){
		obj_videoList();
		obj_video15();
		wins5.show('#popup5');
	});
	var wins6 =  $('.popup').popup();
	$('#popoup-btn6').click(function(){
		obj_videoList();
		obj_video17();
		wins6.show('#popup6');
	});
	$(".popup-close").click(function(){
	$("#video7").html("");
	$("#video8").html("");
	$("#video9").html("");
	$("#video10").html("");
	$("#video11").html("");
	$("#video12").html("");
	$("#video13").html("");
	$("#video14").html("");
	$("#video15").html("");
	$("#video16").html("");
	$("#video17").html("");
	$("#video18").html("");
		});
/*tab*/	
		$.tab('#tabMenPai .tabs li a','#tabMenPai .tab-con-wrap');
		$.tab('#tabPic .tabs li a','#tabPic .tab-con-wrap');
		$.tab('#tabPicRight .tabs li','#tabPicRight .tab-con-wrap');
		$.tab('#tabNews .tabs li a','#tabNews .tab-con-wrap');
		$.tab('#tabTuijian .tabs li a','#tabTuijian .tab-con-wrap');
		$.tab('#tabXi .tabs1 li a','#tabXi .tab-con-wrap1');
		$.tab('#tabXi1 .tabs1 li a','#tabXi1 .tab-con-wrap1');
		$.tab('#tabXi3 .tabs1 li a','#tabXi3 .tab-con-wrap1');
		$.tab('#tabXi4 .tabs1 li a','#tabXi4 .tab-con-wrap1');
		$.tab('#tabXi5 .tabs1 li a','#tabXi5 .tab-con-wrap1');
		$.tab('#tabXi6 .tabs1 li a','#tabXi6 .tab-con-wrap1');
/*lightBox*/			
		$('#gallery1 a').lightBox();
		$('#gallery2 a').lightBox();
		$('#gallery3 a').lightBox();
		$('#gallery4 a').lightBox();
		$('#gallery5 a').lightBox();	
		$('#gallery1 a').click(function(){
			lBVideoInit();
			});
		$('#gallery2 a').click(function(){
			lBVideoInit();
			});
		$('#gallery3 a').click(function(){
			lBVideoInit();
			});
		$('#gallery4 a').click(function(){
			lBVideoInit();
			});
		$('#gallery5 a').click(function(){
			lBVideoInit();
			});
		function lBVideoInit(){
			obj_videoList();
			obj_video1();
			obj_video2();
			obj_video3();
			obj_video4();
			obj_video5();
			obj_video6();
			}
/*share*/				
		$.share.appendTo("#share",{site:["t163","qzone","tSina","tQQ"]});	
/*nie.util.share*/	
		nie.util.share({
		fat:$(".shareBox"),
		type:1,
        title:"���״��Ͷ����������Ρ���꡷7��11�տ�����ɾ����⣬��һ�ּ������������ſ�ʼ��������ԤԼ����ʸ�����һ������������������ˬ����еĴ̼�ս�������Ѿ�ԤԼ�����룬��������һ����ɣ�"
		});
});
/*ui end*/

/*����tips begin*/
$(".listTips li").each(function(index,li){
			$(li).mouseenter(function(){
				$(this).find('ul').show();
			});
			$(li).mouseleave(function(){
				$(this).find('ul').hide();
			});
		});

/*���� tips end*/
/*���·�ͼƬ����begin*/
function scrillPic(wraper,prev,next,img,speed,or)
	{	
		var wraper = $(wraper);
		var prev = $(prev);
		var next = $(next);
		var img = $(img).find('ul');
		var w = img.find('li').outerWidth(true);
		var s = speed;
		var ad;
		next.click(function()
							{
			img.animate({'margin-left':-w},function()
						{
						img.find('li').eq(0).appendTo(img);
						img.css({'margin-left':0});
						});
						});
		prev.click(function()
							{
								img.find('li:last').prependTo(img);
								img.css({'margin-left':-w});
								img.animate({'margin-left':0});
								});
		if (or == true)
		{
			ad = setInterval(function() { next.click();},s*1000);
			wraper.hover(function(){clearInterval(ad);},function(){ad = setInterval(function() { next.click();},s*1000);});
		}
	}
 scrillPic('.img-scroll1','.prev1','.next1','.img-list1',5,false);// trueΪ�Զ����ţ����Ӵ˲����false��Ĭ�ϲ��Զ�
 scrillPic('.img-scroll2','.prev2','.next2','.img-list2',5,false);// trueΪ�Զ����ţ����Ӵ˲����false��Ĭ�ϲ��Զ�
 scrillPic('.img-scroll3','.prev3','.next3','.img-list3',5,false);// trueΪ�Զ����ţ����Ӵ˲����false��Ĭ�ϲ��Զ�
 scrillPic('.img-scroll4','.prev4','.next4','.img-list4',5,false);// trueΪ�Զ����ţ����Ӵ˲����false��Ĭ�ϲ��Զ�
 scrillPic('.img-scroll5','.prev5','.next5','.img-list5',5,false);// trueΪ�Զ����ţ����Ӵ˲����false��Ĭ�ϲ��Զ�
 /*���Ϸ�ͼƬ���� begin*/
DY_scroll_v('.img-scroll6','.prev6','.next6','.img-list6',3,true);
function DY_scroll_v(wraper,prev,next,img,speed,or)
{ 
var wraper = $(wraper);
var prev = $(prev);
var next = $(next);
var img = $(img).find('ul');
var length = img.find('li').length
var w = img.find('li').outerWidth(true);
var s = speed;
var index=0;
img.find('li').mouseover(function(){
	index=$(this).index();
	$(this).siblings().find("a").removeClass("current");
	$(this).find("a").addClass("current");
	var j=$(this).find("a").attr("rel");
	wraper.prev().find(".con").each(function(){
		if($(this).index()+1==j){$(this).addClass("current").siblings().removeClass("current")}
	});
});
next.click(function(){
	if(index<2){
		img.find('li').eq(index+1).find("a").addClass("current");
		img.find('li').eq(index+1).siblings().find("a").removeClass("current");
		var i=img.find('li').eq(index+1).find("a").attr("rel");
		wraper.prev().find(".con").each(function(){
			if($(this).index()+1==i){
				$(this).addClass("current").siblings().removeClass("current");
			}
		});
		index++;
	}else{
		img.animate({'margin-left':-w},function(){
			img.find('li').eq(0).appendTo(img);
			img.css({'margin-left':0});
			img.find('li').eq(2).find("a").addClass("current");
			img.find('li').eq(2).siblings().find("a").removeClass("current");
			var i=img.find('li').eq(2).find("a").attr("rel");
			wraper.prev().find(".con").each(function(){
				if($(this).index()+1==i){
					$(this).addClass("current").siblings().removeClass("current");
				}
			});
		});
	}
});
prev.click(function(){
	if(index>0){
		img.find('li').eq(index-1).find("a").addClass("current");
		img.find('li').eq(index-1).siblings().find("a").removeClass("current");
		var i=img.find('li').eq(index-1).find("a").attr("rel");
		wraper.prev().find(".con").each(function(){
			if($(this).index()+1==i){
				$(this).addClass("current").siblings().removeClass("current");
			}
		});
		index--;
	}else{
		img.find('li:last').prependTo(img);
		img.css({'margin-left':-w});
		img.animate({'margin-left':0},function(){
			img.find('li').eq(0).find("a").addClass("current");
			img.find('li').eq(0).siblings().find("a").removeClass("current");
			var i=img.find('li').eq(0).find("a").attr("rel");
			wraper.prev().find(".con").each(function(){
				if($(this).index()+1==i){
					$(this).addClass("current").siblings().removeClass("current");
				}
			});
		});
	}
});
if (or == true){
	var ad = setInterval(function(){
		next.click();
	},s*1000);
	wraper.hover(function(){
			clearInterval(ad);
		},function(){
			ad = setInterval(function() {next.click();},s*1000);
	});
}
}
/*���Ϸ�ͼƬ���� end*/
/*���ͼƬ������� begin*/
var imgLength=6;
var showInterval;
var showId;
showInterval=setInterval(function() {
	showId++;
	if(showId==liLength){
		showId=0;
		}
	showLiContent(showId);
	showContentDiv(showId);
	},5000);
$(".syFocusThumb").hover(function(){clearInterval(showInterval);},function(){showInterval=setInterval(function() {
	showId++;
	if(showId==liLength){
		showId=0;
		}
	showLiContent(showId);
	showContentDiv(showId);
	},5000);});
function liContentInit(){
	for(var i=0;i<imgLength;i++){
		$(".switch_btn li").eq(i).removeClass("selected");
	}
	}
function contentDivInit(){
	for(var i=0;i<imgLength;i++){
		$(".contentdiv").eq(i).css("display","none");
		}
	}
function showLiContent(i){
	liContentInit();
	$(".switch_btn li").eq(i).addClass("selected");
	}
function showContentDiv(i){
	contentDivInit();
	$(".contentdiv").eq(i).css("display","block");
	}

function mouseOverImg(){
	for(var i=0;i<imgLength;i++){
		$(".switch_btn li a").eq(i).mouseover(function(){
			clearInterval(showInterval);
			var j=$(this).attr("name");
			showId=j;
			showLiContent(showId);
			showContentDiv(showId);
			});
		$(".contentdiv").eq(i).mouseover(function(){
			clearInterval(showInterval);
			});
		}
	}
var liLength=$(".switch_btn li").length;
var showId=0;
showLiContent(showId);
showContentDiv(showId);
mouseOverImg();
/*��ͨ���嵯����*/
function remAddCurrent(id1,id2,id3,id4,id5){
	$(id1).addClass("current");
	$(id2).removeClass("current");
	$(id3).addClass("current");
	$(id4).removeClass("current");
	$(id5).html("");
	}
function remAddCurrent1(idNav,idCon,FlashId){
	$(idNav).eq(0).mouseover(function(){
		for(var i=0;i<3;i++){
		$(idNav).eq(i).removeClass("current");
		$(idCon).eq(i).removeClass("current");
		}
	$(idNav).eq(0).addClass("current");
		$(idCon).eq(0).addClass("current");
		$(FlashId).html("");
	});
	$(idNav).eq(1).mouseover(function(){
	for(var i=0;i<3;i++){
		$(idNav).eq(i).removeClass("current");
		$(idCon).eq(i).removeClass("current");
		}
	$(idNav).eq(1).addClass("current");
		$(idCon).eq(1).addClass("current");
		$(FlashId).html("");
	});
	$(idNav).eq(2).mouseover(function(){
	for(var i=0;i<3;i++){
		$(idNav).eq(i).removeClass("current");
		$(idCon).eq(i).removeClass("current");
		}
	$(idNav).eq(2).addClass("current");
		$(idCon).eq(2).addClass("current");
	});
	}
function remAddCurrent2(idNav,idCon){
	for(var i=0;i<3;i++){
		$(idNav).eq(i).removeClass("current");
		$(idCon).eq(i).removeClass("current");
		$(idNav).eq(0).addClass("current");
		$(idCon).eq(0).addClass("current");
		}
	}
remAddCurrent1("#SubTab1 .SubTabs li a","#SubTab1 .sub-con-wrap","#video1");
$("#SubTab1 .SubTabs li a").eq(2).mouseover(function(){
	obj_video1();
	});
remAddCurrent1("#SubTab2 .SubTabs li a","#SubTab2 .sub-con-wrap","#video2");
$("#SubTab2 .SubTabs li a").eq(2).mouseover(function(){
	obj_video2();
	});
remAddCurrent1("#SubTab3 .SubTabs li a","#SubTab3 .sub-con-wrap","#video3");
$("#SubTab3 .SubTabs li a").eq(2).mouseover(function(){
	obj_video3();
	});
remAddCurrent1("#SubTab4 .SubTabs li a","#SubTab4 .sub-con-wrap","#video4");
$("#SubTab4 .SubTabs li a").eq(2).mouseover(function(){
	obj_video4();
	});
remAddCurrent1("#SubTab5 .SubTabs li a","#SubTab5 .sub-con-wrap","#video5");
$("#SubTab5 .SubTabs li a").eq(2).mouseover(function(){
	obj_video5();
	});
remAddCurrent1("#SubTab6 .SubTabs li a","#SubTab6 .sub-con-wrap","#video6");
$("#SubTab6 .SubTabs li a").eq(2).mouseover(function(){
	obj_video6();
	});
function videoInit(j){
	var iArray=new Array();
	for(var i=1;i<7; i++){
		if(i==j){
			continue;
			}
		$("#video"+i).html("");
		}
	}
for(var i=0; i<6; i++){
	$("#tabMenPai .tabs li a").eq(i).mouseover(function(){
		tabConInit();
		var k=$(this).index(this)+1;
		videoInit(k);
	});
	}
function tabConInit(){
	remAddCurrent2("#SubTab1 .SubTabs li a","#SubTab1 .sub-con-wrap");	
	remAddCurrent2("#SubTab2 .SubTabs li a","#SubTab2 .sub-con-wrap");	
	remAddCurrent2("#SubTab3 .SubTabs li a","#SubTab3 .sub-con-wrap");	
	remAddCurrent2("#SubTab4 .SubTabs li a","#SubTab4 .sub-con-wrap");	
	remAddCurrent2("#SubTab5 .SubTabs li a","#SubTab5 .sub-con-wrap");	
	remAddCurrent2("#SubTab6 .SubTabs li a","#SubTab6 .sub-con-wrap");	
	}
$("#el_nav7").click(function(){
	remAddCurrent("#el_nav7","#el_nav8","#el_content7","#el_content8","#video8");
	obj_video7();
	});
$("#el_nav8").click(function(){
	remAddCurrent("#el_nav8","#el_nav7","#el_content8","#el_content7","#video7");
	obj_video8();
	});
$("#el_nav9").click(function(){
	remAddCurrent("#el_nav9","#el_nav10","#el_content9","#el_content10","#video10");
	obj_video9();
	});
$("#el_nav10").click(function(){
	remAddCurrent("#el_nav10","#el_nav9","#el_content10","#el_content9","#video9");
	obj_video10();
	});
$("#el_nav11").click(function(){
	remAddCurrent("#el_nav11","#el_nav12","#el_content11","#el_content12","#video12");
	obj_video11();
	});
$("#el_nav12").click(function(){
	remAddCurrent("#el_nav12","#el_nav11","#el_content12","#el_content11","#video11");
	obj_video12();
	});
$("#el_nav13").click(function(){
	remAddCurrent("#el_nav13","#el_nav14","#el_content13","#el_content14","#video14");
	obj_video13();
	});
$("#el_nav14").click(function(){
	remAddCurrent("#el_nav14","#el_nav13","#el_content14","#el_content13","#video13");
	obj_video14();
	});
$("#el_nav15").click(function(){
	remAddCurrent("#el_nav15","#el_nav16","#el_content15","#el_content16","#video16");
	obj_video15();
	});
$("#el_nav16").click(function(){
	remAddCurrent("#el_nav16","#el_nav15","#el_content16","#el_content15","#video15");
	obj_video16();
	});
$("#el_nav17").click(function(){
	remAddCurrent("#el_nav17","#el_nav18","#el_content17","#el_content18","#video18");
	obj_video17();
	});
$("#el_nav18").click(function(){
	remAddCurrent("#el_nav18","#el_nav17","#el_content18","#el_content17","#video17");
	obj_video18();
	});


/*���Ϸ�ͼƬ���� begin*/
var myObj;
var waitTime = 5000;//�ӳ�ʱ��
var spa = 2; //����ͼ���򲹳���ֵ
var w = 0;
var flag = 0;
var leftFlag=null;
var leftFlag1=null;
function getId(e) { return document.getElementById(e); }
function setBorder(e, n) {
	if(n){
		e.style.border="3px solid #ddac6d";
		e.style.width="76px";
		e.style.height="49px";
	} else{
		e.style.border="none";
		e.style.width="82px";
		e.style.height="55px";
		}
}
function setBorderFalse(){
	for(var i=0;i<p.length;i++){
                	setBorder(p[i], false);
				}
	}
getId('goleft').onmouseout = function() {myObj = setInterval(goright2, waitTime);}
getId('goleft').onmouseover = function() {clearInterval(myObj);}
getId('goright').onmouseover = function() { clearInterval(myObj); }
getId('goright').onmouseout = function() { myObj = setInterval(goright2, waitTime); }
getId('goleft').onclick = function() {
	clearInterval(myObj);
 	var divImg = getId("divImg").getElementsByTagName('img');
	var p = getId('showArea').getElementsByTagName('img');	 
	if(leftFlag){
		flag=leftFlag;
		leftFlag=null;
		} else if( leftFlag1){
			flag=leftFlag1;
			leftFlag1=null;
			}
        flag--;
    if (flag >= 2) {
        getId('photos').scrollLeft -= 87;
			
    } else{
		 getId('photos').scrollLeft = 0;
		} 
    if (flag < divImg.length&&flag>-1) {
		setBorderFalse();
        setBorder(p[flag],true);
        SetShowImgAndText(divImg, p);
    } 
}
getId('goright').onclick = function() {
	var divImg = getId("divImg").getElementsByTagName('img');
    goright2();
    clearInterval(myObj);
	leftFlag1=flag-1;
}
    var rHtml = '';
    var p = getId('showArea').getElementsByTagName('img');
    for (var i = 0; i < p.length; i++) {
        w += parseInt(p[i].getAttribute('width')) + spa;
        setBorder(p[i], false);
        p[i].onclick = function() { }
        p[i].style.cursor = 'pointer';
        p[i].onmouseover = function() {
			setBorderFalse();
            setBorder(this, true);
			var string=this.getAttribute("name");
			var hrefNum=string.split("&");
			href=hrefNum[0];
			num=hrefNum[1];
            getId('mainphoto').src = this.getAttribute('rel');
			getId('mainphoto').setAttribute('name', this.getAttribute('name'));
            getId("newPage").href = href;
            clearInterval(myObj);
        }
        p[i].onmouseout = function() {
			setBorderFalse();
            setBorder(this, true);
            myObj = setInterval(goright2, waitTime);
			var string=this.getAttribute("name");
			var hrefNum=string.split("&");
			href=hrefNum[0];
			num=hrefNum[1];
			flag=parseInt(num)+1;
			leftFlag=flag-1;
        }
        rHtml += '<img src="' + p[i].getAttribute('rel') + '" name="' + p[i].getAttribute('name') + '" width="0" height="0" alt="" />';
        rHtml += '<span >' + p[i].getAttribute('alt') + '</span>';
    }
    getId('showArea').style.width = parseInt(w) + 'px';
    var rLoad = document.createElement("div");
    getId('photos').appendChild(rLoad);
    rLoad.id = "divImg";
    rLoad.style.width = "1px";
    rLoad.style.height = "1px";
    rLoad.style.overflow = "hidden";
    rLoad.innerHTML = rHtml;
//���ø���ʾ�Ĵ�ͼ��Сͼ������
function SetShowImgAndText(pDaTu, pXiaoTu) {
    //���ô�ͼ͸��
    /*setBorder(pDaTu[flag], true);*/
    //����Сͼ͸��
    setBorder(pXiaoTu[flag], true);
    //����ͼ
	var string=pXiaoTu[flag].getAttribute("name");
	var hrefNum=string.split("&");
		href=hrefNum[0];
		num=hrefNum[1];
    getId('mainphoto').src = pDaTu[flag].getAttribute('src');
    //��ͼ����
    getId("newPage").href = pDaTu[flag].getAttribute("name");

}
function goright2() {
    var divImg = getId("divImg");
    if (divImg) {
        clearInterval(myObj);
        divImg = divImg.getElementsByTagName('img');
        if (flag >= divImg.length) {
            flag = 0;
        }
        if (flag < 2) {
            getId('photos').scrollLeft = 0;
        }
        if (flag > 2) {
            if (getId('photos').scrollLeft < (divImg.length - 3) * 87)
                getId('photos').scrollLeft += 87;
        }
        else {
            getId('photos').scrollLeft = 0;
        }
        var p = getId('showArea').getElementsByTagName('img');

        if (flag < divImg.length) {
            if (flag > 0) {
               /* setBorder(divImg[flag - 1], false);*/
                setBorder(p[flag - 1], false);
            }
            SetShowImgAndText(divImg, p);

            flag++;
        }
      /*  myObj = setInterval(goright2, 5000);*/
    }
}
myObj = setInterval(goright2, 1000);
/*���Ϸ�ͼƬ���� end*/