<!DOCTYPE html>
<html>
    <head>
        <title>Admin Planners!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <script src="{{base_url()}}js/jquery-1.7.2.js"></script>
        <script src="{{base_url()}}js/vadilation.js"></script>
        <script src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>
        <script src="{{base_url()}}syslib/block/jquery.blockUI.js"></script>
        <link href="{{base_url()}}syslib/tab/tab.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/sysstyle.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/bubble.css" type="text/css" rel="stylesheet"/>
        <link href="{{base_url()}}syslib/syscss/24_grid_960.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="overflow-y: scroll;">
        {{include file='../sys/01_notice.tpl'}}
        {{include file='../sys/02_script.tpl'}}
        <div class="pa l50pc t50pc grid_10 reprefix-5 mt-160 bshd13" style="margin-top: -120px;border: 1px solid #ccc">
            <div class="pt1 pb1 pl1 pr1">
                <h4 class="pl20 pt11 pb12 pr20 ovfh mt0 mb0 " style="background: #ccc">Đăng nhập</h4>
            </div>
            <form id="frmlogin" name="frmlogin" 
                  onsubmit="login();"
                  target="integration_asynchronous" method="post" 
                  action="{{base_url('sys/excution/nothing')}}">
                <div class="pt20 pb20 pl20 pr20">
                    <div class="grid_3">
                        <label class="classic-lable">User Name</label>
                    </div>
                    <div class="grid_6">
                        <div class="pr16 pb12">
                            <input type="text" id="txtusername" name="txtusername" class="classic-input w100pc"/>
                        </div>
                    </div>
                    <div class="grid_3">
                        <label class="classic-lable">Password</label>
                    </div>
                    <div class="grid_6">
                        <div class="pr16">
                            <input type="password" id="txtpassword" name="txtpassword" class="classic-input w100pc"/>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="pt0 pb20 pl20 pr20 tac">
                    <button type="submit" class="green-button"><span>Login</span></button>
                </div>
                <div class="pt0 pb20 pl20 pr20">
                    <span class="error">
                         
                    </span>
                </div>
                <span class="pa r20 b20"><tt>Your IP {{getIP()}} </tt></span>
            </form>
        </div>
        <script type="text/javascript">
            function login(){
                if(isrunning) return;
    
                if(!_FcheckFilled($("#txtusername").val())){
                    $("#txtusername").focus();
                    return;
                }
                if(!_FcheckFilled($("#txtpassword").val())){
                    $("#txtpassword").focus();
                    return;
                }
                var url = baseurl+"sys/excution/login"
                var data={
                    username : $("#txtusername").val(),
                    password : $("#txtpassword").val()
                }
                isrunning=true;
                jqxAjax(url,data,function(result){
                    isrunning=false;
                    try{
                        if(result.code<0){
                            $(".error").html(result.msg);
                        }else{
                            $(".error").html("Login success. Redirect in 3 second...<br/>Press F5 if your browse dont redirect.");
                            setTimeout(function(){
                                location.reload();
                            },3000);
                        }
                    }catch(e){                                    
                        $(".error").html(e.message);
                    }
                });
            }
            $(document).ready(function() {
                $(".blue-button").click(function(){alert(0);});
                //var p1=new MyPopup('abc');
                //p1.open();
                $('#ngaokiem').dialog({ dialogClass: 'MyPopup' ,minWidth:320,resizable: false});
                $(".MyPopup.ui-dialog").draggable('option',{ handle: "h4" });
            });
            function MyPopup(ElementID,Config){
                this.icon='';
                if(Config && Config.icon){
                    this.icon = '<img style="width: 36px;height: 36px;position: absolute;top: 1px;left: 1px" src="'+Config.icon+'"/>';
                }
                if(Config && Config.fcolor){
                    this.fcolor = Config.fcolor;
                }
                if(Config && Config.scolor){
                    this.scolor = Config.scolor;
                }
                this.width=320;
                if(Config && Config.width){
                    this.width = Config.width;
                }
                
                if(!document.getElementById("MyPopup_"+ElementID)){
                    console.log("new");
                    var divTag = document.createElement("div"); 
                    divTag.style.display="none";
                    divTag.innerHTML =
                    '<div id="MyPopup_'+ElementID+'" style="border: 1px solid #F1D15F;width: '+this.width+'px;display: inline;float: left;position: relative;text-align:left">\
                        <div style="position: relative;padding: 1px">\
                            <h4 style="background: #F1D15F;padding: 11px 20px 12px 40px;margin: 0;overflow: hidden">Đăng nhập!</h4>\
                            '+this.icon+'\
                            <div class="bubble-closebtn" onclick="$.unblockUI();"></div>\
                        </div>\
                        <div class="popContent" style="padding: 20px">\
                        </div>\
                        <div style="padding: 0 20px 0 20px;text-align: center">\
                            <button type="button" onclick="b();" class="orange-button"><span>Login</span></button>\
                        </div>\
                        <div style="padding: 0 20px 20px 20px">\
                            <span class="error">\
                            </span>\
                        </div>\
                    </div>';
                    document.body.appendChild(divTag);
                    $("#"+ElementID).appendTo($("#MyPopup_"+ElementID+" .popContent"));
                }
                var popup=document.getElementById("MyPopup_"+ElementID);
                var w=320;
                this.open=function(){
                    var h=document.getElementById("MyPopup_"+ElementID).offsetHeight;
                    console.log(w);
                    $.blockUI({ 
                        message:popup
                        ,css: { 
                            border: 'none'
                            ,backgroundColor:'#fff'
                            ,width:w
                            ,left:'50%'
                            ,top:'200px'
                            ,margin:'-'+(h/2)+'px 0 0 -'+(w/2)+'px'
                        }
                        ,centerY:true
                        ,centerX:true
                    });
                //$(".blue-button").appendTo($("#ngaokiem .popContent"));
                }
                this.close=function(){
                    $.unblockUI();
                }
            }
        </script>
        <div id="ngaokiem" style="border: 1px solid #F1D15F;width: 320px;display: inline;float: left;padding: 0;margin: 0">
            <div style="position: absolute;padding: 1px;top: 0;left: 0;right: 0;">
                <h4 style="background: #F1D15F;padding: 11px 20px 12px 40px;margin: 0;overflow: hidden">Đăng nhập!</h4>
                <img style="width: 36px;height: 36px;position: absolute;top: 1px;left: 1px" src="http://ngaokiem.net/templates/jv_ngaokiem_v4/images/logo.png"/>
                <div class="bubble-closebtn" onclick="$('#ngaokiem').dialog('close');"></div>
            </div>
            <div class="popContent" style="padding: 20px;margin-top: 36px">
                Sự kiện “ Liên trảm Bá Đao nhận Account Cửu Âm” vừa được phát động 
                ngày hôm qua nhưng đã nhận được rất nhiều sự quan tâm từ quý đạo hữu, 
                và qua đó cũng nhận được nhiều đăng ký tham gia.
            </div>
            <div style="padding: 0 20px 0 20px;text-align: center">
                <button type="button" onclick="b();" class="orange-button"><span>Login</span></button>
            </div>
            <div style="padding: 0 20px 20px 20px">
                <span class="error">
                </span>
            </div>
        </div>
        
        <div id="bd-pu" class="grid_8 mt40 ml40" style="border: 1px solid #74A8DC">
            <div class="pt1 pb1 pl1 pr1 pr">
                <h4 class="pl40 pt11 pb12 pr20 ovfh mt0 mb0 " style="background: #74A8DC">Đăng nhập!</h4>
                <img class="pa t1 l1" style="width: 36px;height: 36px;" src="http://badao.gosu.vn/su-kien/chu-ky/css_chuky_badao/images/logo.png"/>
                <div class="bubble-closebtn"></div>
            </div>
            <div class="pt20 pb20 pl20 pr20">
                Sự kiện “ Liên trảm Bá Đao nhận Account Cửu Âm” vừa được phát động 
                ngày hôm qua nhưng đã nhận được rất nhiều sự quan tâm từ quý đạo hữu, 
                và qua đó cũng nhận được nhiều đăng ký tham gia.
            </div>
            <div class="pt0 pb0 pl20 pr20 tac">
                <button type="submit" class="blue-button"><span>Login</span></button>
            </div>
            <div class="pt0 pb20 pl20 pr20">
                <span class="error">

                </span>
            </div>
        </div>
        <span id="abc">Sự kiện “ Liên trảm Bá Đao nhận Account Cửu Âm” vừa được phát động 
                ngày hôm qua nhưng đã nhận được rất nhiều sự quan tâm từ quý đạo hữu, 
                và qua đó cũng nhận được nhiều đăng ký tham gia.</span>
        <style>
        .MyPopup.ui-dialog{border-radius: 0;padding: 0;margin: 0;border: 0}
        .MyPopup .ui-widget-header{border: none;position: absolute;
right: 0;
padding: 0;
margin: 0;
        background: none
        }
        .MyPopup.ui-dialog .ui-dialog-titlebar-close{top:12px;z-index: 100;display: none}
        </style>
    </body>
</html>