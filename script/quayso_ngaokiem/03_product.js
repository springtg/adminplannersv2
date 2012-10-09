/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function save_product(){
    if(!_FcheckFilled($("#txt-name").val())){$("#txt-name").focus();return;}
    if(!_FcheckFilled($("#txt-startdate").val())){$("#txt-startdate").focus();return;}
    if(!_FcheckFilled($("#txt-enddate").val())){$("#txt-enddate").focus();return;}
    
    var item = $("#jqxCbx_status").jqxComboBox('getSelectedItem');
    var status=item.label;
    
    item = $("#jqxCbx_type").jqxComboBox('getSelectedItem');
    var type=item.label;
    
    var startdate=$("#txt-startdate").val();
    var enddate=$("#txt-enddate").val();
    var name=$("#txt-name").val();
    var id=$("#txt-id").val();
    var url=base_url+"admin-planners/product_/product_editor";
    var data={
            id          :   id,
            name        :   name,
            status      :   status,
            type        :   type,
            startdate   :   startdate,
            enddate     :   enddate,
            params:JSON.stringify({
                    name        :   name,
                    status      :   status,
                    type        :   type,
                    startdate   :   startdate,
                    enddate     :   enddate
            })
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
            $('#window').jqxWindow('close');
        }
    });
}
function changeStatus_product(row,status){
    try{
        var id = $('#jqxgrid').jqxGrid('getcellvalue', row, "_id_");
        id = $.parseJSON(id);
    }catch(e){
        return;
    }
    var url=base_url+"admin-planners/product_/product_editor";
    var data={
            id          :   id._id_,
            status      :   status,
            params:JSON.stringify({
                    status      :   status,
                    log         :""
            })
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $("#jqxgrid").jqxGrid('setcellvalue', row, "_status_", status);
            //$('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}
function delete_product(id){
    var url=base_url+"admin-planners/product_/delete_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}
function restore_product(id){
    var url=base_url+"admin-planners/product_/restore_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}