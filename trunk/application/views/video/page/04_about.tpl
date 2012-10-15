{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner about-pad">
    <div id="left-text">
        <div id="left-ribbon-about"></div>
        <div class="text">
            {{if isset($Data["whoweare"]) and !isset($Data["whoweare"]["Delete"]) and $Data["whoweare"]["Status"]=="Public"}}
            {{$Data["whoweare"]["Content"]}}
            {{else}}
                No data to display.
            {{/if}}
        </div>
    </div>
    <div id="right-text">
        <div id="right-ribbon-about"></div>
        <div class="text">
            {{if isset($Data["service"]) and !isset($Data["service"]["Delete"]) and $Data["service"]["Status"]=="Public"}}
            {{$Data["service"]["Content"]}}
            {{else}}
                No data to display.
            {{/if}}
        </div>
    </div>

    <div class="clear"></div>

</div>
{{include file='../sub/02_4_foot_about.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}