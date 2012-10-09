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
    
</script>