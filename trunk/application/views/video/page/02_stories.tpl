{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner stories-pad">
    <div id="big-title-stories"><p>click on the story you would like to hear</p></div>
    {{if isset($Data["Videos"])}}
        <div id="video-list">
            <div id="video-line">
                {{if isset($Data["Videos"][0])}}
                    <div class="video first">

                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][0]["Alias"]}}">
                            <span ></span><div><span>{{$Data["Videos"][0]["Title"]}}</span></div>
                            <img src="{{$Data["Videos"][0]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][1])}}
                    <div class="video second">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][1]["Alias"]}}">
                            <span ></span><div><span>{{$Data["Videos"][1]["Title"]}}</span></div>
                            <img src="{{$Data["Videos"][1]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][2])}}
                    <div class="video third">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][2]["Alias"]}}">
                            <span ></span><div><span>{{$Data["Videos"][2]["Title"]}}</span></div>
                            <img src="{{$Data["Videos"][2]["Thumbs"]}}" width="290" height="163"/>
                        </a>
                    </div>  
                {{/if}}
            </div>
            {{if isset($Data["Videos"][3])}}
            <div id="video-line">
                {{if isset($Data["Videos"][3])}}
                    <div class="video first">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][3]["Alias"]}}">
                            <span ></span><div><span>{{$Data["Videos"][3]["Title"]}}</span></div>
                            <img src="{{$Data["Videos"][3]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][4])}}
                    <div class="video second">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][4]["Alias"]}}">
                            <span ></span><div><p>{{$Data["Videos"][4]["Title"]}}</p></div>
                            <img src="{{$Data["Videos"][4]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][5])}}
                    <div class="video third">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][5]["Alias"]}}">
                            <span ></span><div><p>{{$Data["Videos"][5]["Title"]}}</p></div>
                            <img src="{{$Data["Videos"][5]["Thumbs"]}}" width="290" height="163"/>
                        </a>
                    </div>  
                {{/if}}
            </div>
            {{/if}}
            {{if isset($Data["Videos"][6])}}
            <div id="video-line">
                {{if isset($Data["Videos"][6])}}
                    <div class="video first">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][6]["Alias"]}}">
                            <span ></span><div><span>{{$Data["Videos"][6]["Title"]}}</span></div>
                            <img src="{{$Data["Videos"][6]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][7])}}
                    <div class="video second">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][7]["Alias"]}}">
                            <span ></span><div><p>{{$Data["Videos"][7]["Title"]}}</p></div>
                            <img src="{{$Data["Videos"][7]["Thumbs"]}}" width="290" height="163" />
                        </a>
                    </div>
                {{/if}}
                {{if isset($Data["Videos"][8])}}
                    <div class="video third">
                        <a href="{{base_url()}}stories-detail/{{$Data["Videos"][8]["Alias"]}}">
                            <span ></span><div><p>{{$Data["Videos"][8]["Title"]}}</p></div>
                            <img src="{{$Data["Videos"][8]["Thumbs"]}}" width="290" height="163"/>
                        </a>
                    </div>  
                {{/if}}
            </div>
            {{/if}}
            <div class="clear"></div>

        </div>
    {{/if}}
    <div class="clear"></div>
    <!-- Phần thêm vào -->
        <div id="copyright-banner"><img src="http://readtomychild.com.au/css_video/img/copyright-banner.png" alt="copyright" /></div>
    <!-- Phần thêm vào -->
    <div id="page">
        {{if $Data["PageIndex"]>1}}
            <a href="{{base_url()}}video/stories/page/{{$Data["PageIndex"]-1}}" class="page-previous"></a>
        {{/if}}
        {{for $foo=$Data["PageIndex"]-3 to $Data["PageIndex"]-1}}
        {{if $foo>0}}
            <a href="{{base_url()}}video/stories/page/{{$foo}}" class="page-num">{{$foo}}</a> 
        {{/if}}
        {{/for}}
        <a href="" class="page-active">{{$Data["PageIndex"]}}</a>
        {{for $foo=$Data["PageIndex"]+1 to $Data["PageIndex"]+3}}
        {{if $foo<=$Data["Pages"]}}
            <a href="{{base_url()}}video/stories/page/{{$foo}}" class="page-num">{{$foo}}</a> 
        {{/if}}
        {{/for}}
        {{if $Data["PageIndex"]<$Data["Pages"]}}
            <a href="{{base_url()}}video/stories/page/{{$Data["PageIndex"]+1}}" class="page-next"></a>
        {{/if}}

    </div>
    <div class="clear"></div>
</div>
{{include file='../sub/02_2_foot_stories.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}

