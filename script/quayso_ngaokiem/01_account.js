/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function save_acc(){
    if(!_FcheckFilled($("#txt-name").val())){$("#txt-name").focus();return;}
    if(!_FcheckFilled($("#txt-uname").val())){$("#txt-uname").focus();return;}
    if(!_FcheckFilled($("#txt-pass").val())){$("#txt-pass").focus();return;}
    var item = $("#jqxCbx_group").jqxComboBox('getSelectedItem');
    var group=item.label;
    var authority=$("#id-authority-acc").val();
    var name=$("#txt-name").val();
    var username=$("#txt-uname").val();
    var password=$("#txt-pass").val();
    var id=$("#txt-id").val();
    var url=base_url+"admin-planners/account/accounteditor/";
    var data={
            id          :   id,
            name        :   name,
            username    :   username,
            password    :   password,
            group       :   group,
            authority   : authority,
            params:JSON.stringify({
                    name        :   name,
                    username    :   username,
                    password    :   password,
                    group       :   group,
                    authority   : authority
            })
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
            $('#window').jqxWindow('close');
        }
    });
}
function delete_account(id){
    var url=base_url+"admin-planners/account/delete_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}
function restore_account(id){
    var url=base_url+"admin-planners/account/restore_";
    var data={
            id          :   id
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}

