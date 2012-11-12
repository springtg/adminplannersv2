<div class="hed" style="height: 32px">
    <div style="padding:0px 12px;height: 28px;padding-top: 4px;line-height: 28px">
        Admin Planners
        → {{$Data["tab_config"]["tabs"][$Data["tab_config"]["tabindex"]]["display"]}}

    </div>
</div>
<div class="hd" style="position: relative;">
    <ul class="tab-nav">
        {{if isset($Data["tab_config"]["tabs"])}}
            {{foreach $Data["tab_config"]["tabs"] as $key=>$tab}}
                {{if $Data["tab_config"]["tabindex"]==$key}}
                    <li class="hover tab-{{$key}}">
                        <a href="{{$tab["link"]}}"><span></span>{{$tab["display"]}}<span class="tabdes"></span></a>
                    </li>  
                {{else}}
                    <li class="tab-{{$key}}">
                        <a href="{{$tab["link"]}}"><span></span>{{$tab["display"]}}</a>
                    </li> 
                {{/if}}

            {{/foreach}}
        {{else}}
            <li class="hover"><a href="">Default</a></li>
        {{/if}}

    </ul>
</div>
<script>
    function tab(t){
        $(".tab-nav li.hover").removeClass("hover");
        $(".tab-nav li.tab-"+t).addClass("hover");
    }
</script>