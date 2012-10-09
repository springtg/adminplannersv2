<?php /* Smarty version Smarty-3.1.7, created on 2012-10-09 01:38:04
         compiled from "application\views\sys\02_script.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2869450705086779986-31862795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b96619793366a31c86c8750a65871aba9d06b1fb' => 
    array (
      0 => 'application\\views\\sys\\02_script.tpl',
      1 => 1349717868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2869450705086779986-31862795',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_507050867c39a',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507050867c39a')) {function content_507050867c39a($_smarty_tpl) {?><script>
    function jqxAjax(surl,sdata,callback){
        isrunning=true;
        ShowLoadding();
        jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                isrunning=false;
                HideLoadding(); 
                try{
                
                    var result=JSON.parse(data);
                    if(result.code==undefined){
                        ShowErrorDialogMessage(data);
                        return;
                    }else if (callback && typeof(callback) === "function") { 
                        try{
                            callback(result);  
                        }catch(e){
                            ShowErrorDialogMessage(e.message);
                        }
                    } 
                }catch(err){
                    ShowErrorDialogMessage("JSON Error:"+err.message+"\nContent: "+data);
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                isrunning=false;
                HideLoadding();
                ShowErrorDialogMessage("<b>Status</b>:"+xhr.status+"\n<b>ThrownError</b>:"+thrownError+"<br/>"+surl);
            
            }
        });
    }
    function htmlAjax(surl,sdata,obj,callback){
        isrunning=true;
        jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                isrunning=false;
                $(obj).html(data);
                if (callback && typeof(callback) === "function") {  
                    callback();  
                } 
            },
            error: function (xhr, ajaxOptions, thrownError){
                isrunning=false;
                ShowErrorDialogMessage("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError+"<br/>"+surl);
            }
        });
    }
    function tab(){
    
    }
    
</script><?php }} ?>