function organ_groupby(country,groupby){
    $(".id-organ-sub-content").load("../Controller/?nivhtml=organgroupby&id="+country+"&groupby="+groupby);
}
function game_groupby(country,groupby){
    $(".id-game-sub-content").load("../Controller/?nivhtml=gamegroupby&id="+country+"&groupby="+groupby);
}
function organ_all_groupby(type,groupby){
    if(type==""){
        $(".id-organization-all").load("../Controller/?nivhtml=organ&groupby="+groupby);
    }else if(type=="Studio"){
        $(".id-organization-dev").load("../Controller/?nivhtml=organ&groupby="+groupby+"&type="+type);
    }else if(type=="Publisher"){
        $(".id-organization-pub").load("../Controller/?nivhtml=organ&groupby="+groupby+"&type="+type);
    }else if(type=="Payment"){
        $(".id-organization-pub").load("../Controller/?nivhtml=organ&groupby="+groupby+"&type="+type);
    }
    
}
function showorgan(id){
    $.blockUI({ 
        message: $('#id-pupup-content'), 
        css: { margin:'-240px 0 0 -360px',width:'720px',height:'480px',top:'50%',left:'50%',border: '1px solid #ccc' } 
    });
    $("#id-pupup-content>span").load("../Controller/?nivhtml=organdetail&id="+id)
}

$(document).ready(function(){
    $(".id-show-acc-box").click(function(){
        $(".id-acc-box").show();
    });
    $(".dialog-close-x").click(function(){
        $.unblockUI();
        return;
    });
});
