<script>
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
                    
                    if (callback && typeof(callback) === "function") { 
                        try{
                            callback(result);  
                        }catch(e){
                            ShowErrorDialogMessage(e.message);
                        }
                    } 
                }catch(err){
                    ShowErrorDialogMessage("Sorry. Your request could not be completed.<br/> Please check your input data.");
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                isrunning=false;
                HideLoadding();
                ShowErrorDialogMessage("Sorry. Your request could not be completed.<br/> Please check your input data.");
            
            }
        });
    }
    function debugAjax(surl,sdata,callback){
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
                    
                    if (callback && typeof(callback) === "function") { 
                        try{
                            callback(result);  
                        }catch(e){
                            ShowErrorDialogMessage(e.message);
                        }
                    } 
                }catch(err){
                    ShowErrorDialogMessage("JSON Error:<font color='red'>"+err.message+"</font><br/>Content: <pre>"+data+"</pre>");
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                isrunning=false;
                HideLoadding();
                ShowErrorDialogMessage("<b>Status</b>:<font color='red'>"+xhr.status+"</font><br/><b>ThrownError</b>:"+thrownError+"<br/>"+surl);
            
            }
        });
    }
    function htmlAjax(surl,sdata,obj,callback){
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
                if(typeof(obj)=="object"){
                
                }else if(typeof($(obj))=="object"){
                    obj=$(obj);
                }else{
                    ShowErrorDialogMessage("Sorry. Element not found.");
                }
                obj.html(data);
                if (callback && typeof(callback) === "function") {  
                    callback();  
                } 
            },
            error: function (xhr, ajaxOptions, thrownError){
                isrunning=false;
                HideLoadding(); 
                ShowErrorDialogMessage("Sorry. Your request could not be completed.<br/> Please check your input data.");
            }
        });
    }
    function tab(){
    
    }
    function chkb(chk){
        $(chk).toggleClass("cked");
    }
    function rdbck(rdb){
        if($(rdb).attr("group"))
            $(".radio.cked[group='"+$(rdb).attr("group")+"']").removeClass("cked");
        else
            $(".radio.cked").removeClass("cked");
        $(rdb).addClass("cked");
            
    }
</script>