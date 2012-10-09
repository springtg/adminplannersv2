/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function jqxAjax(surl,sdata,callback){
    var code=-2;
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                try{
                    var result = $.parseJSON(data);
                    if(result.code==1){
                        $('#window-notice').jqxWindow('setContent', result.msg);
                        $('#window-notice').jqxWindow('open');
                        //$('#jqxgrid').jqxGrid('updatebounddata');
                        //$('#window').jqxWindow('close');
                    }else if(result.code==0){
                         
                    }else{
                        $('#window-message').jqxWindow('setContent', 
                            "Error id:"+result.code+"<br/>Error content: "+result.msg);
                        $('#window-message').jqxWindow('open');
                    }
                    if (callback && typeof(callback) === "function") { 
                        try{
                            callback(result.code);  
                        }catch(e){
                            
                        }
                    } 
                    code=result.code;
                }catch(err){
                    $('#window-error').jqxWindow('setContent',"JSON Error:"+err.message+"<br/>Content: "+data);
                    $('#window-error').jqxWindow('open');
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                $('#window-error').jqxWindow('setContent',"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError+"<br/>"+surl);
                $('#window-error').jqxWindow('open');

            }
    });
    return code;
}
function htmlAjax(surl,sdata,obj,callback){
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                $(obj).html(data);
                if (callback && typeof(callback) === "function") {  
                    callback();  
                } 
            },
            error: function (xhr, ajaxOptions, thrownError){
                $('#window-error').jqxWindow('setContent',"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError+"<br/>"+surl);
                $('#window-error').jqxWindow('open');

            }
    });
}

