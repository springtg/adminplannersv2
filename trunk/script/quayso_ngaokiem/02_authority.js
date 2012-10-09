/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function save_authority(){
    if(!_FcheckFilled($("#txt-name").val())){$("#txt-name").focus();return;}
    if(!_FcheckFilled($("#txt-keyword").val())){$("#txt-keyword").focus();return;}
    if(!_FcheckFilled($("#txt-value").val())){$("#txt-value").focus();return;}
    var name=$("#txt-name").val();
    var keyword=$("#txt-keyword").val();
    var value=$("#txt-value").val();
    var note=$("#txt-note").val();
    var id=$("#txt-id").val();
    var url=base_url+"admin-planners/authority/authorityeditor/";
    var data={
            id          :   id,
            name        :   name,
            keyword     :   keyword,
            value       :   value,
            note        :   note,
            params:JSON.stringify({
                    name        :   name,
                    keyword     :   keyword,
                    value       :   value,
                    note        :   note
            })
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
            $('#window').jqxWindow('close');
        }
    });
}
function delete_authority(id){
    var url=base_url+"admin-planners/authority/delete_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}
function restore_authority(id){
    var url=base_url+"admin-planners/authority/restore_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}