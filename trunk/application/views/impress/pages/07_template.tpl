{{$foo=0}}
{{foreach $Data["box_arr"] as $box}}
    {{foreach $Data["jboxs"][$box] as $qbox}}
        {{if isset($Data["Templates"][$foo])}}
            <div class="{{$qbox}} id-template-box">
                <div class="jimg">
                    <img src="{{$Data["Templates"][$foo]->image}}">
                </div>
                <div class="jtit">

                    <h4>
                        <a href="">{{$Data["Templates"][$foo]->name}}</a>
                    </h4>
                    <div style="padding: 0px 20px 12px 20px;">
                        <div class="rsw-starred"></div><div class="rsw-starred"></div><div class="rsw-starred"></div><div class="rsw-starred"></div><div class="rsw-starred"></div>                    </div>
                    <div style="padding: 4px 4px 0 4px;">
                        Type : {{$Data["Templates"][$foo]->type}}<br/>
                        Code : {{$Data["Templates"][$foo]->code}}<br/>
                        {{$Data["Templates"][$foo]->name}}                        
                    </div>
                    <div class="jaction">
                        <div class="icon16 hover50 tooltip" title="Xem demo mẫu website tại tab mới.">
                            <a href="{{$Data["Templates"][$foo]->url}}" target="_blank"><img src="{{base_url()}}images/icon/16/home_1.png"></a>
                        </div>
                    </div>
                </div>
            </div>
                
        {{/if}}
        {{$foo=$foo+1}}
    {{/foreach}}
{{/foreach}}