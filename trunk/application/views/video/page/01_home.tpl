{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner home-pad">
    {{if isset($Data["Sliders"])}}
        
    <div id="slider-panel">
        <div id="slider" class="slideshow">
            {{foreach $Data["Sliders"] as $slider}}
            <a href="{{$slider["Alias"]}}">
                <img src="{{$slider["Image"]}}"
                     width="900" height="360"
                     />
            </a>
            {{/foreach}}
        </div>
        <div id="arrow-pre"></div>
        <div id="arrow-nex"></div>
    </div>
{{/if}}
    <div id="big-title-home"><p>it's story time! let's read it together</p></div>
    <div id="advertising">
        <div class="box left round-corner fade"><a href="stories.html"><img src="{{base_url()}}css_video/advertising/advertising-box-1.png" /></a></div>
        <div class="box right round-corner fade"><a href="request.html"><img src="{{base_url()}}css_video/advertising/advertising-box-2.png" /></a></div>
        <div class="clear"></div>
    </div>
        
</div>
{{include file='../sub/02_1_foot_home.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}

