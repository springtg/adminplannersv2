include('js/html5.js');
//----jquery-plagins----

//include('js/jquery-1.6.1.min.js');
include('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
include('js/jquery.easing.1.3.js');
include('js/jquery.animate-colors-min.js');
//----ContentSwitcher----
include('js/switcher.js');
//----google map----
include('js/googleMap.js');
//----contact form----
include('js/cform.js');
//----jScrollPane-----
include('js/jquery.mousewheel.js');
include('js/mwheelIntent.js');
//include('js/jquery.jscrollpane.min.js');
//----Lightbox--
include('js/jquery.prettyPhoto.js');
//----jplayer-sound--
//include('js/jquery.jplayer.min.js');
//----All-Scripts----
include('js/script.js');
include('js/kfunction.js');
//----Include-Function----
function include(url){ 
  document.write('<script type="text/javascript" src="'+ url +'" ></script>'); 
}