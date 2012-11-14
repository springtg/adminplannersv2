<ul class="sysnav">
    <li><a href="">Home</a></li>
    <li><span>Website</span>
        <ul class="l">
            <li><a href="{{base_url('admin-planners/settings/settings2')}}">Setting</a></li>
            <li><a href="{{base_url('admin-planners/content')}}">Pages Content</a></li>
            
        </ul>
    </li>
    <li><span>Gallery</span>
        <ul class="l">
            <li><a href="{{base_url('admin-planners/video_climb')}}">Video</a></li>
            <li><a href="{{base_url('admin-planners/slider')}}">Slider</a></li>
            <li><a href="{{base_url('admin-planners/gallery')}}">Gallery</a></li>
        </ul>
    </li>
    <li><a href="{{base_url('admin-planners/tour')}}">Tour</a></li>
    <li><a href="{{base_url('admin-planners/personal')}}">Commercial/Personal</a></li>
    <li><a href="{{base_url('admin-planners/product')}}">Products</a>
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
                <li><a href="{{base_url('admin-planners/authority/MyAuthority')}}">My Authority</a></li>
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