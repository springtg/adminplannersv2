<?php /* Smarty version Smarty-3.1.7, created on 2012-10-10 04:10:31
         compiled from "application\views\sys\01_notice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7045070489d076447-44977447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd46522a2292035b747c0e18f091e2dd7a457b6dc' => 
    array (
      0 => 'application\\views\\sys\\01_notice.tpl',
      1 => 1349834989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7045070489d076447-44977447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5070489daf6ce',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5070489daf6ce')) {function content_5070489daf6ce($_smarty_tpl) {?><link href="<?php echo base_url();?>
syslib/ui/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url();?>
syslib/ui/jquery.ui.min.js"></script>

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
        border: none
        "
        ></iframe>
    <div id="loadding-dialog" class="uidialog" title="Loadding...">Đang xử lý. Vui lòng đợi một chút...</div>
    <div id="dialog" class="uidialog" title="Dialog Title">I'm in a dialog</div>
    <div id="error-dialog-message" title="Error !"></div>
    <div id="notice-dialog-message" title="Notice !"></div>
    <div id="confirm-dialog-message" title="Confirm !"></div>
</span>
<script>
    var isrunning=false,baseurl="<?php echo base_url();?>
";
    function ShowLoadding(){
        $("#loadding-dialog").dialog({ 
            headerVisible: false ,
            closeOnEscape       : false,
            dialogClass: 'no-close',
            resizable: false,
            height: 60,
            //width: 160,
            open                : function() { $("#loadding-dialog").hide(); }   
        });
    }
    function HideLoadding(){
        $("#loadding-dialog").dialog( "close" );
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
            //resizable   : false,
            //height      :140,
            modal       : true,
            hide        : "explode",
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
        }else if(typeof(confirm)=="string"){
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
            //height      :140,
            modal       : true,
            hide        : "explode",
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
            closeOnEscape       : false,
            hide                : "explode",
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
            title: title==undefined?"Thông báo !":title,
            closeOnEscape       : false,
            hide                : "explode",
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
</script><?php }} ?>