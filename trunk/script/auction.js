var base_url="http://localhost/ngaokiem_t7/";
var table="product";
$(document).ready(function(){
    
    product_reload("all");
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
    $("#txt_q").keypress(function(event) {
        if ( event.which == 13 ) {
            product_reload("all");
            
        }
    });
});

function product_reload(type){
    var groupby,sdata;
    if($("#id-config-"+type).length){
        $config=JSON.parse($("#id-config-"+type).html());
        var groupby=$config.group;
        var sdata={
                "config":JSON.stringify($config),
                "q":$("#txt_q").val()
        };
    }else{
        groupby="none";
        sdata={
                
        };
    }
    var surl=base_url+"admin-planners/product/getlist/";
    //$(".id-product-"+type).load(surl);
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                $(".id-product-"+type).html(data);
            },
            error: function (xhr, ajaxOptions, thrownError){
                showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}
function product_groupby(type,groupby){
    $config=JSON.parse($("#id-config-"+type).html());
    if($config.group!=groupby){
        $config.group=groupby;
        $config.sort="DESC";
    }else{
        if($config.sort=="DESC")
            $config.sort="ASC";
        else if ($config.sort=="ASC"){
            $config.sort="";
            $config.group='none';
        }else
            $config.sort="DESC";
    }
    $("#id-config-"+type).html((JSON.stringify($config)));
    product_reload(type);
}

