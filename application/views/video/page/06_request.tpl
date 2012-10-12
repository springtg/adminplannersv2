{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner request-pad">
    <div id="big-title-request"><p>please fill this form to complete the request</p></div>
    <div class="error hidden">There is an error with your information. Please check again!</div>
    <div class="success hidden">Your request was successful! Thank you very much!</div>
    <form>
        <div id="left-content">
            <div><label>Story Title <span class="red">(*)</span></label><input type="text" class="request-text" /></div>
            <div><label>Story Author <span class="red">(*)</span></label><input type="text" class="request-text" /></div>
            <div class="required-field">+ Required fields are marked <span class="red">(*)</span>.</div>
        </div>

        <div id="right-content">
            <div><label>Full Name <span class="red">(*)</span></label><input type="text" class="request-text" /></div>
            <div><label>Email <span class="red">(*)</span></label><input type="text" class="request-text" /></div>
            <div id="request-button"><a href=""></a></div>
        </div>

    </form>
    <div class="clear"></div>
</div>
{{include file='../sub/02_6_foot_request.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}