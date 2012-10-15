{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner contact-pad">
    <div id="left-text">
        <div id="left-ribbon-contact"><p>send us a message</p></div>
        <div class="text">
            <form id="contact-form">
                <div>
                    <label>Full Name <span class="red">(*)</span></label>
                    <input id="FullName" type="text" class="contact-text" />
                </div>
                <div>
                    <label>Email <span class="red">(*)</span>
                    </label>
                    <input id="Email" type="text" class="contact-text" /></div>
                <div>
                    <label>Subject <span class="red">(*)</span></label>
                    <input id="Subject" type="text" class="contact-text" />
                </div>
                <div>
                    <label>Message <span class="red">(*)</span></label>
                    <textarea id="Message" class="request-text" rows="5"></textarea>
                </div>
                <div class="required-field left">+ Required fields are marked <span class="red">(*)</span>.</div>
                <div id="send-button" class="right"><a href="javascript:contactus();"></a></div>
                <div class="clear"></div>
            </form>
        </div>
    </div>
    <div id="right-text">
        <div id="right-ribbon-contact"><p>get in touch</p></div>
        <div class="text">
            {{if isset($Data["getintouch"]) and !isset($Data["getintouch"]["Delete"]) and $Data["getintouch"]["Status"]=="Public"}}
            {{$Data["getintouch"]["Content"]}}
            {{else}}
                No data to display.
            {{/if}}
            
        </div>
    </div>

    <div class="clear"></div>

</div>
<script>
    function contactus(){
        var FullName=$("#FullName").val();
        var Email=$("#Email").val();
        var Subject=$("#Subject").val();
        var Message=$("#Message").val();
        var url=baseurl+"contact/contactus";
        var data={
            Params:{
                FullName:FullName,
                Email:Email,
                Subject:Subject,
                Message:Message
            }
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage(result.msg,"Notice Message.",function(){
                        location.reload();
                    });
                }
            }catch(err){
                ShowErrorDialogMessage(err);
            }
        });
        }
</script>
{{include file='../sub/02_5_foot_contact.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}