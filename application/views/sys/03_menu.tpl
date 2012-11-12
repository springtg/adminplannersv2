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
    <li><a href="">Website Setting</a></li>
    <li><a href="">Products</a>
        <ul class="l">
            <li><a href="">Home</a></li>
            <li><a href="">Content</a></li>
            <li><a href="">Administrator</a></li>
        </ul>
    </li>
    <li><a href="">Orders</a></li>
    <li><a href="">Report</a></li>
    <li><a href="">Chart</a></li>
    <li><a href="">Class</a></li>
    <li><a href="">Student</a></li>
</ul>
<ul class="sysnav" style="right: 0px">
    {{if isset($_SESSION["ADP-USER"])}}
        <li class="fr"><a href="">User Manage</a></li>
        <li><a href="">Settings</a></li>
        <li><a class="user" href="">{{$_SESSION["ADP-USER"]["Name"]}}</a>
            <ul class="r">
                <li><a href="">My Account</a></li>
                <li><a href="">Authority</a></li>
                <li><a href="">Account Setting</a></li>
                <li><a href="{{base_url("sys/excution/logout")}}">Logout</a></li>
            </ul>
        </li>
    {{else}}
        <li><a href="">Login</a></li>
    {{/if}}
    
</ul>
<script>
//    $('html').click(function(event){
//        console.log('click - body');
//    });
//    $('.sysnav').click(function(event){
//        console.log('click - sysnav');
//        event.stopPropagation();
//    });
//    $('.sysmenu').click(function(event){
//        console.log('click - sysmenu');
//        event.stopPropagation();
//    });
</script>