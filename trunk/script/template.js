$(document).ready(function(){

    $(".id-organization-all").load("Controller?nivhtml=template");
    $(".id-organization-public").load("Controller?nivhtml=template&type=public");
    $(".id-organization-private").load("Controller?nivhtml=template&type=private");
    $(".id-organization-trash").load("Controller?nivhtml=template&type=trash");
    if(window.location.href.indexOf("#")>0){
        var parm = window.location.href.replace(/^.*#/, '');
        $(".goog-tab-selected").removeClass("goog-tab-selected");
        $(".id-detail-dialog-"+parm+"-tab").addClass("goog-tab-selected");
        $(".detail-dialog-tab-content").hide();
        $('.'+$(".id-detail-dialog-"+parm+"-tab").attr("tabcontent")).show();
    }
    $(".detail-dialog-tab.goog-tab,.nivtab").click(function(){
        $(".goog-tab-selected").removeClass("goog-tab-selected");
        if($(this).attr("class").indexOf("detail-dialog-tab")>0)
            $(this).addClass("goog-tab-selected");
        else
            $("."+$(this).attr("tabactive")).addClass("goog-tab-selected");
        $(".detail-dialog-tab-content").hide();
        $('.'+$(this).attr("tabcontent")).show();
    });
});

function organ_all_groupby(type,groupby){
    if(type==""){
        $(".id-organization-all").load("Controller/?nivhtml=template&groupby="+groupby);
    }else{
        $(".id-organization-"+type).load("Controller/?nivhtml=template&groupby="+groupby+"&type="+type);
    }
    
}
function show_item(id,type){
    if($("#txt_template_detail_id").val()==id && id!="")return;
    var str_loadding="<center>đang tải...<br/>Nếu trang không tự tải nội dung hãy ấn vào <a class=\"loadding\" href=\"javascript:show_item('"+id+"','"+type+"');\">đây</a> để tải lại.<br/>Hoặc ấn vào <a href=\"02_Admin_planners.php?Unit=template_detail&id="+id+"\">đây</a> để tải tại tab khác.</center>";
    $(".id-content-row.editting td[colspan=8]").html(str_loadding);
    $(".id-head-row.editting").removeClass("editting");
    $(".id-content-row.editting").removeClass("editting");
    $(".id-content-row").hide();
    
    $(".id-head-row."+type+id).addClass("editting");
    $(".id-content-row."+type+id).addClass("editting");
    $(".id-content-row."+type+id).show();
    if($(".id-content-row."+type+id+" td .loadding").length>0)
        $(".id-content-row."+type+id+" td").show().load("Controller/?sUnit=05_template_detail_&id="+id);
    
}
function restoretemplate(id){
    if(!confirm("Bạn muốn khôi phục?")) return;
    var surl="./Controller/";
    var sdata={
            "controller":"TemplateController_",
            "action":"restore",
            "id":id
    };
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    showmsg("Đã khôi phục.",2000);

                    var str="<span class=\"action\">";
                    str+="      <div class=\"icon16 hover50 tooltip\" title=\"Xóa\" onclick=\"deletetemplate('"+id+"');\">";
                    str+="          <img src=\"images/icon/16/edit_delete.png\"/>";
                    str+="      </div>";
                    str+="   </span>";
                    $(".id-head-row.trash"+id).find("td:last-child").html("Đã khôi phục.");
                }else{
                    showerrorbox(null,data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showerrorbox(null,"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError,5000);

            }
    });
}
function deletetemplate(id){
    if(!confirm("Bạn muốn xóa?")) return;
    var surl="./Controller/";
    var sdata={
            "controller":"TemplateController_",
            "action":"delete",
            "id":id
    };
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    showmsg("Đã xóa.",2000);
                    var str="<span style=\"color:red\">Đã xóa</pan>";
                    str+="   <div class=\"icon16 hover50 tooltip\" title=\"Khôi Phục\" onclick=\"restoretemplate('"+id+"');\">";
                    str+="      <img src=\"images/icon/gtk_undelete.png\"/>";
                    str+="   </div>";
                    $(".id-head-row."+id).find("td:last-child").html("Đã xóa.");
                    $(".id-head-row.public"+id).find("td:last-child").html("Đã xóa.");
                    $(".id-head-row.private"+id).find("td:last-child").html("Đã xóa.");

                }else{
                    showerrorbox(null,data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showerrorbox(null,"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError,5000);

            }
    });
}
function statusNew(id,status){
    var surl="./Controller/";
    
    var sdata={
            "controller":"TemplateController",
            "action":"changestatus",
            "id":id,
            "status":status
            
    };
    showmsg("Please wait...");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=09_New";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    showmsg(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}