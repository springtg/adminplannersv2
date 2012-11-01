<<<<<<< .mine
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
                <a href="{{$Data["VideoPre"]}}" class="video-pani-previous"></a>
                <a href="{{$Data["VideoNex"]}}" class="video-pani-next"></a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="video-info">
            <div id="video-screen">
                <iframe width="640" height="390" src="http://www.youtube.com/embed/{{$Data["Video"]["VideoKey"]}}?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="video-detail">
                <div class="title">Author</div>
                <div class="author">{{$Data["Video"]["Author"]}}</div>
                <div class="title">Released date</div>
                <div class="text"><p>{{{{date("Y-F-D",strtotime($Data["Video"]["Insert"]))}}}}</p></div>
                <div class="title">SHORT DESCRIPTION: </div>
                <div class="text"><p>{{$Data["Video"]["Description"]}}</p></div>

                <div class="share">
                    <div class="fbshare" style="width: 100%">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_preferred_1"></a>
                            <a class="addthis_button_preferred_2"></a>
                            <a class="addthis_button_preferred_3"></a>
                            <a class="addthis_button_preferred_4"></a>
                            <a class="addthis_button_compact"></a>
                            <a class="addthis_counter addthis_bubble_style"></a>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-507e59f60076f0ca"></script>
                        <!-- AddThis Button END -->


                    </div>
                    <!--                    <div class="twittershare">
                                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://readtomychild.com.au/stories-detail/{{$Data["Video"]["Alias"]}}">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                        </div>-->
                </div>
                <!--                <div><a class="record-button" href="javascript:recordding();"></a></div>-->
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script>
    function recordding(){
        ShowNoticeDialogMessage("We are working on this function. Reall sorry for this inconvenience.")
    }
    </script>
    <div id="related-video">
        <div id="related-video-title">
            <div class="title">Related Stories</div>
            <div class="view-more"><a href="{{base_url("stories")}}">View all >></a></div>
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
=======
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
                <a href="{{$Data["VideoPre"]}}" class="video-pani-previous"></a>
                <a href="{{$Data["VideoNex"]}}" class="video-pani-next"></a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="video-info">
            <div id="video-screen">
                <iframe width="640" height="390" src="http://www.youtube.com/embed/{{$Data["Video"]["VideoKey"]}}?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="video-detail">
                <div class="title">Author</div>
                <div class="author">{{$Data["Video"]["Author"]}}</div>
                <div class="title">Released date</div>
                <div class="text"><p>{{{{date("Y-F-D",strtotime($Data["Video"]["Insert"]))}}}}</p></div>
                <div class="title">SHORT DESCRIPTION: </div>
                <div class="text"><p>{{$Data["Video"]["Description"]}}</p></div>

                <div class="share">
                    <div class="fbshare" style="width: 100%">
                        <!-- AddThis Button BEGIN --> 
                        <div class="addthis_toolbox addthis_default_style "> 
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> 
                            <a class="addthis_button_tweet"></a> 
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> 
                            <a class="addthis_counter addthis_pill_style"></a> 
                        </div> 
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e5a517830ae061f"></script> 
                        <!-- AddThis Button END -->


                    </div>
                    <!--                    <div class="twittershare">
                                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://readtomychild.com.au/stories-detail/{{$Data["Video"]["Alias"]}}">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                        </div>-->
                </div>
<!--                <div><a class="record-button" href="javascript:recordding();"></a></div>-->
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script>
    function recordding(){
        ShowNoticeDialogMessage("We are working on this function. Reall sorry for this inconvenience.")
    }
    </script>
    <div id="related-video">
        <div id="related-video-title">
            <div class="title">Related Stories</div>
            <div class="view-more"><a href="{{base_url("stories")}}">View all >></a></div>
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
>>>>>>> .r22
{{include file='../sub/02_foot.tpl'}}