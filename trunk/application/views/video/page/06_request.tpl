{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner request-pad">
    <div id="big-title-request"><p>please fill this form to complete the request</p></div>
    <div style="margin-bottom:20px;">
        {{if isset($Data["request"]) and !isset($Data["request"]["Delete"]) and $Data["request"]["Status"]=="Public"}}
            {{$Data["request"]["Content"]}}
        {{else}}
            No data to display.
        {{/if}}
    </div>
    <div class="error hidden">There is an error with your information. Please check again!</div>
    <div class="success hidden">Your request was successful! Thank you very much!</div>
    <form>
        <div id="left-content">
            <div><label>Story Title <span class="red">(*)</span>
                </label><input type="text" id="Title" class="request-text" /></div>
            <div><label>Story Author <span class="red">(*)</span></label>
                <input type="text" id="Author" class="request-text" /></div>
            <div class="required-field">+ Required fields are marked <span class="red">(*)</span>.</div>
        </div>

        <div id="right-content">
            <div><label>Full Name <span class="red">(*)</span></label>
                <input type="text" id="FullName" class="request-text" /></div>
            <div><label>Email <span class="red">(*)</span></label>
                <input id="Email" type="text" class="request-text" /></div>
            <div id="request-button" onclick="_request();"><a href="javascript:"></a></div>
        </div>

    </form>
    <script>
    function _request(){
            if(isrunning)return;
            var Title     =   $("#Title"  ).val();
            var Author       =   $("#Author"  ).val();
            var FullName       =   $("#FullName"      ).val();
            var Email    =   $("#Email"     ).val();
            isrunning=true;
        
            var url=baseurl+"video/contact/Request";
            var data={
                Params:{
                    Title:Title,
                    Author:Author,
                    FullName:FullName,
                    Email:Email
                }
            };
            jqxAjax(url,data,function(result){
                isrunning=false;
                try{
                    if(result.code<0){
                        //ShowNoticeDialogMessage(result.msg);
                        $("div.error").show();
                        setTimeout(function(){$("div.error").hide();},5000);
                    }else{
                        $("div.success").show();
                        setTimeout(function(){$("div.success").hide();},5000);
                        $("#Title"  ).val("");
                        $("#Author"  ).val("");
                        $("#FullName"      ).val("");
                        $("#Email"     ).val("");
//                        ShowNoticeDialogMessage(result.msg,"Notice Message",function(){
//                            jqxGrid.CancelEdit();
//                            jqxGrid.Refresh();
//                        });
//                        
                    }
                }catch(err){
                    ShowErrorDialogMessage(err);
                }
            });
        }
</script>
    <div class="clear"></div>
</div>
{{include file='../sub/02_6_foot_request.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}