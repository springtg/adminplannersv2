{{include file='../sub/01_head.tpl'}}
{{include file='../sub/04_nav.tpl'}}
<div id="container" class="round-corner story-detail-pad">

    <div id="video-panel">
        <div id="video-title">
            <div class="title">{{$Data["Video"]["Title"]}}</div>
            <div class="likefb">
                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://readtomychild.com.au/stories-detail/{{$Data["Video"]["Alias"]}}" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
            </div>
            <div class="video-pani">
                <a href="" class="video-pani-previous"></a>
                <a href="" class="video-pani-next"></a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="video-info">
            <div id="video-screen">
                <iframe width="640" height="390" src="http://www.youtube.com/embed/{{$Data["Video"]["VideoKey"]}}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="video-detail">
                <div class="title">Author</div>
                <div class="author">{{$Data["Video"]["Author"]}}</div>
                <div class="title">Released date</div>
                <div class="text"><p>{{{{date("Y-F-D",strtotime($Data["Video"]["Insert"]))}}}}</p></div>
                <div class="title">SHORT DESCRIPTION: </div>
                <div class="text"><p>{{$Data["Video"]["Description"]}}</p></div>

                <div class="share">
                    <div class="fbshare"><a href=""><img src="{{base_url()}}css_video/img/fbshare.png" /></a></div>
                    <div class="twittershare">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://readtomychild.com.au/stories-detail/{{$Data["Video"]["Alias"]}}">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </div>
                </div>
                <div><a class="record-button" href=""></a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="related-video">
        <div id="related-video-title">
            <div class="title">Related Stories</div>
            <div class="view-more"><a href="stories.html">View all >></a></div>
            <div class="clear"></div>
        </div>

        <div id="video-line">
            {{if isset($Data["Related"][0])}}
                <div class="video first">
                    <a href="{{base_url()}}stories-detail/{{$Data["Related"][0]["Alias"]}}">
                        <span ></span><div><span>{{$Data["Related"][0]["Title"]}}</span></div>
                        <img src="{{$Data["Related"][0]["Thumbs"]}}" width="290" height="163"/>
                    </a>
                </div>
            {{/if}}
            {{if isset($Data["Related"][1])}}
                <div class="video second">
                    <a href="{{base_url()}}stories-detail/{{$Data["Related"][1]["Alias"]}}">
                        <span ></span><div><span>{{$Data["Related"][1]["Title"]}}</span></div>
                        <img src="{{$Data["Related"][1]["Thumbs"]}}" width="290" height="163"/>
                    </a>
                </div>
            {{/if}}
            {{if isset($Data["Related"][2])}}
                <div class="video third">
                    <a href="{{base_url()}}stories-detail/{{$Data["Related"][2]["Alias"]}}">
                        <span ></span><div><span>{{$Data["Related"][2]["Title"]}}</span></div>
                        <img src="{{$Data["Related"][2]["Thumbs"]}}" width="290" height="163"/>
                    </a>
                </div>
            {{/if}}
        </div>

        <div class="clear"></div>
    </div>

</div>
{{include file='../sub/02_3_foot_stories_detail.tpl'}}
{{include file='../sub/03_bottomwave.tpl'}}
{{include file='../sub/02_foot.tpl'}}