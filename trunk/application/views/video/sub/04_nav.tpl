<div id="top">
    <div id="cloud"></div>
    
</div>
<div id="sun" 
         {{if intval(date("h"))>=6}}
             style="left: {{(intval(date("h"))-6)*100/12}}%;"
         {{else}}
             style="left: {{(intval(date("h"))+6)*100/12}}%;"
         {{/if}}
         
         ></div>
<div id="navigation">
    <div id="about" class="fade"><a href="{{base_url("about")}}"></a></div>
    <div id="story" class="fade"><a href="{{base_url("stories")}}"></a></div>
    <div id="home">
        <a href="{{base_url("home")}}" style="background: none">
            <img src="http://readtomychild.com.au/css_video/img/logo.png"/>
        </a></div>
    <div id="request" class="fade"><a href="{{base_url("request")}}"></a></div>
    <div id="contact" class="fade"><a href="{{base_url("contact")}}"></a></div>
    <div class="clear"></div>
</div>