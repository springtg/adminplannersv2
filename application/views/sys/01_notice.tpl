<link href="{{base_url()}}syslib/ui/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
<script src="{{base_url()}}syslib/ui/jquery.ui.min.js"></script>

<style>
    .ui-dialog{font-family: tahoma;font-size:  11px }
    .classic-select {
        padding: 2px 2px 2px 4px;
        border: 1px solid #DDD;
        line-height: 16px;
        height: 24px;

        margin: 0;
        font-size: 11px;
    }
    .classic-button{ 
        border-radius: none;
        padding: 2px 20px;
        border: 1px solid #ccc;
        line-height: 16px;
        height: 24px;
        font-size: 11px;
        margin: 0;outline: none;
        background-color: #E8E8E8;
        background-image: -webkit-gradient(linear,0 0,0 100%,from(#FAFAFA),to(#DADADA));
        background-image: -moz-linear-gradient(top,#FAFAFA,#DADADA);
        background-image: -o-linear-gradient(top,#FAFAFA,#DADADA);
    }
    .classic-button:focus,.classic-button:hover{
        background: #ccc;border: 1px solid #aaa;
        background-color: #DADADA;
        background-image: -webkit-gradient(linear,0 0,0 100%,from(#DADADA),to(#FAFAFA));
        background-image: -moz-linear-gradient(top,#DADADA,#FAFAFA);
        background-image: -o-linear-gradient(top,#DADADA,#FAFAFA);
    }
    .classic-button.icon{
        padding: 2px 20px 2px 36px;
    }
    .classic-button:active{background: #ccc;}
    .classic-input{padding: 2px 4px;border: 1px solid #ddd;height: 18px;line-height: 16px;font-size: 11px;}
    .no-close .ui-dialog-titlebar-close {display: none }
    .ui-button.ui-corner-all{-moz-border-radius: 2px/*{cornerRadius}*/;-webkit-border-radius: 2px/*{cornerRadius}*/;border-radius: 2px/*{cornerRadius}*/;}
</style>
<span style="display: none">
    <iframe
        id		= 'integration_asynchronous'
        name	= 'integration_asynchronous'
        style	= "
        width:	0;
        height:	0;
        border: none;
        padding: 0;
        margin: 0
        "
        ></iframe>
    <div id="loadding-dialog" class="uidialog" title="Loadding...">Processing. Please, wait...</div>
    <div id="dialog" class="uidialog" title="Dialog Title">I'm in a dialog</div>
    <div id="error-dialog-message" title="<font color='red'>Error !</font>"></div>
    <div id="notice-dialog-message" title="Notice !"></div>
    <div id="confirm-dialog-message" title="Confirm !"></div>
</span>
<div id="loaddingAjax" style="position: fixed;bottom: 1px;left: 0;right:0;border: 1px solid white;z-index: 9999;display: none;
outline: 1px solid #7A991A;">
    <div class="proccessbar" style="height: 2px;width: 48%;background: red"></div>
</div>
<script>
    var isrunning=false,baseurl="{{base_url()}}";
    function ShowLoadding(){
        $("#loaddingAjax").show();
        $("#loaddingAjax .proccessbar").stop(true).width(0).css({backgroundColor:"green",bottom:1})
            .animate({width:'30%'},200)
            .animate({width:'50%',backgroundColor:"blue"},500)
            .animate({width:'75%',backgroundColor:"orange"},2000)
            .animate({width:'95%',backgroundColor:"red"},5000);
    }
    function HideLoadding(){
        $("#loaddingAjax .proccessbar").stop(true)
        .animate({width:'100%',backgroundColor:"red"},500,function(){$("#loaddingAjax").hide();});
        
        
    }
    //--------------------------------------------------------------------------
    function ConfirmDialogMessage (confirm,title, callback) {
        
        if(typeof(confirm)=="object"){
            this.cdm=confirm;
        }else if(typeof(confirm)=="string"){
            this.cdm=$( "#confirm-dialog-message" );
            //this.cdm.dialog( "destroy" );
            this.cdm.html( confirm );
        }
        this.cdm.dialog({
            autoOpen            : false,
            resizable   : false,
            //height      :140,
            width      :'auto',
            modal       : true,
            //hide        : "explode",
            title: title==undefined?"Confirm Dialog?":title
            ,buttons: {
                Ok: function() {
                    //$( this ).dialog( "close" );
                    if (callback && typeof(callback) === "function") { 
                        try{
                            callback();           
                        }catch(e){

                        }
                    }
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
        this.Show = function() {
            this.cdm.dialog( "open" );
        };
        this.Hide = function() {
            this.cdm.dialog( "close" );
        };
    }
    //--------------------------------------------------------------------------
    
    //--------------------------------------------------------------------------
    function NoticeDialogMessage (notice ,title, _callback) {
        //this.callback=_callback;
        if(typeof(notice)=="object"){
            this.ndm=notice;
        }else if(typeof(notice)=="string"){
            this.ndm=$( "#notice-dialog-message" );
            //this.cdm.dialog( "destroy" );
            this.ndm.html( notice );
        }
        
        this.CallBack = function(newcallback) {
            this.ndm.dialog( { close:newcallback } );
        };
        this.Show = function() {
            this.ndm.dialog({
                modal       : true,
                hide        : "explode",
                title: title==undefined?"Notice Message":title,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
                ,close: function(event, ui) { 

                    if (_callback && typeof(_callback) === "function") { 
                        try{
                            _callback();           
                        }catch(e){

                        }
                    } 
                }
            });
        };
        this.Hide = function() {
            this.ndm.dialog( "close" );
        };
    }
    //--------------------------------------------------------------------------
    function CloseConfirmDialogMessage(confirm){
        if(typeof(confirm)=="object"){
            confirm.dialog( "close" );
        }else{
            $( "#confirm-dialog-message" ).dialog( "close" );
        }
    }
    function OpenConfirmDialogMessage(confirm){
        if(typeof(confirm)=="object"){
            confirm.dialog( "open" );
        }else if(typeof(confirm)=="string"){
            $( "#confirm-dialog-message" ).dialog( "open" );
        }
    }
    function ShowConfirmDialogMessage( confirm ,title, callback ){
        var obj;
        if(typeof(confirm)=="object"){
            obj=confirm;
        }else if(typeof(confirm)=="string"){
            obj=$( "#confirm-dialog-message" );
            obj.dialog( "destroy" );
            obj.html( confirm );
        }
        
        
        //$( "#confirm-dialog-message" ).attr("title", title );
        //$( "#confirm-dialog-message" ).dialog( 'open' );
        
        obj.dialog({
            //resizable   : false,
            minwidth      :240,
            width      :'auto',
            modal       : true,
            //hide        : "explode",
            title: title==undefined?"Confirm Dialog":title,
            buttons: {
                Ok: function() {
                    //$( this ).dialog( "close" );
                    if (callback && typeof(callback) === "function") { 
                        try{
                            callback();           
                        }catch(e){

                        }
                    }
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });              
                 
    }
    function ShowErrorDialogMessage( error_message , callback ){
        var obj;
        if(typeof(error_message)=="object"){
            obj=error_message;
        }else if(typeof(error_message)=="string"){
            obj=$( "#error-dialog-message" );
            obj.dialog( "destroy" );
            obj.html( error_message );
        }
        
        obj.dialog({
            modal: true,
            //autoOpen            : false,
            minwidth      :240,
            width      :'auto',
            closeOnEscape       : false,
            //hide                : "explode",
            buttons: {
                Ok: function() {
                    $( this ).dialog( "close" );
                }
            },
            close: function(event, ui) { 
                if (callback && typeof(callback) === "function") { 
                    try{
                        callback();           
                    }catch(e){

                    }
                } 
            }
        });              
            
         
    }
    function ShowNoticeDialogMessage( notice_message ,title, callback ){
        var obj;
        if(typeof(notice_message)=="object"){
            obj=notice_message;
        }else if(typeof(notice_message)=="string"){
            obj=$( "#notice-dialog-message" );
            obj.dialog( "destroy" );
            obj.html( notice_message );
        }
        obj.dialog({
            modal: true,
            //autoOpen            : false,
            minwidth      :320,
            resizable: false,
            width      :'auto',
            title: title==undefined?"Notice message !":title,
            closeOnEscape       : false,
            //hide                : "explode",
            buttons: {
                Ok: function() {
                    $( this ).dialog( "close" );
                }
            },
            close: function(event, ui) { 
                if (callback && typeof(callback) === "function") { 
                    try{
                        callback();           
                    }catch(e){

                    }
                } 
            }
        }); 
              
    }
    
    $(document).ready(function() {
    
        
        
    });
</script>