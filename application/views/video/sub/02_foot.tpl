<script>
    function Subscribe(){
        
            if(isrunning)return;
            var Subscribers     =   $("#Subscribers"  ).val();
            isrunning=true;
        
            var url=baseurl+"video/home/Subscribe";
            var data={
                
                    Subscribers:Subscribers
                
            };
            jqxAjax(url,data,function(result){
                isrunning=false;
                try{
                    if(result.code<0){
                        ShowNoticeDialogMessage(result.msg);
                        
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                        $("#Subscribers"  ).val("")
                    }
                }catch(err){
                    ShowErrorDialogMessage(err);
                }
            });
        
    }
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35389725-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </body>
</html>