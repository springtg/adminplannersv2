<!--<ul class="sysmenu">
    <li class="active">
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/home_2.png"/></a>
        <div>Home</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/settings1.png"/></a>
        <div>Settings</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/27_edit_text.png"/></a>
        <div>Contents</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/movies.png"/></a>
        <div>Videos</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/insert_image.png"/></a>
        <div>Sliders</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/kolourpaint.png"/></a>
        <div>Images</div>
    </li>
    <li>
        <a href=""><img class="ic " src="{{base_url()}}images/icon/other/contact.png"/></a>
        <div>Contacts</div>
    </li>
    

</ul>-->
<ul class="sysnav">
    <li><a href="">Home</a></li>
    <li><a href="">Content</a>
        <ul class="l">
            <li><a href="">Home</a></li>
            <li><a href="">Content</a></li>
            <li><a href="">Administrator</a></li>
        </ul>
    </li>
    <li><a href="">Administrator</a></li>
</ul>
<ul class="sysnav" style="right: 0px">
    <li class="fr"><a href="">User Manage</a></li>
    <li><a href="">Settings</a></li>
    <li class="user"><a href="">Administrator</a>
        <ul class="r">
            <li><a href="">Home</a></li>
            <li><a href="">Content</a></li>
            <li><a href="">Administrator</a></li>
        </ul>
    </li>
</ul>
<script>
    $('html').click(function(event){
        console.log('click - body');
    });
    $('.sysnav').click(function(event){
        console.log('click - sysnav');
        event.stopPropagation();
    });
    $('.sysmenu').click(function(event){
        console.log('click - sysmenu');
        event.stopPropagation();
    });
</script>