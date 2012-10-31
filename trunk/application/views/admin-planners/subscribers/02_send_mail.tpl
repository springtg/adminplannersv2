<script type="text/javascript" src="{{base_url()}}syslib/tokeninput/jquery.tokeninput.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/tokeninput/token-input.css" type="text/css" />
<link rel="stylesheet" href="{{base_url()}}syslib/tokeninput/token-input-facebook.css" type="text/css" />   

<table style="width: 100%">
    <tr><td style="width: 320px;vertical-align: top">
            <div><b>Choose subscribers that you want send the message. </b></div>
{{$numinpage=50}}
{{for $foo=0 to count($Data["subscribers"])-1 step $numinpage}}
<span class="thread t{{{{$foo/$numinpage+1}}}}" {{if $foo>0}}style="display: none"{{/if}}>
    <table>
    {{for $fi=0 to  $numinpage-1}}
    
    {{if isset($Data["subscribers"][$foo+$fi])}}
        <tr>
        <td>
                Khách Hàng : {{$Data["subscribers"][$foo+$fi]->CustomerName}}
        </td>
        <td>
                Email : {{$Data["subscribers"][$foo+$fi]->Email}}
        </td>
        <td>
            <span class="status">
                <input value="{{$Data["subscribers"][$foo+$fi]->Email}}" class="chkStaffBonus" type="checkbox" checked="1"/>
            </span>
        </td>
        </tr>    
    {{/if}}
    
    {{/for}}
    </table>
</span>
{{/for}}
<div class="threadpage">
    {{for $foo=0 to count($Data["subscribers"])-1 step $numinpage}}
    <span class="t{{$foo/$numinpage+1}} {{if $foo==0}}fwb{{/if}}" style="cursor: pointer;color: blue;" 
          onclick="threadshow({{$foo/$numinpage+1}});"><tt>{{$foo/$numinpage+1}}</tt></span>
    {{/for}}
</div>
        </td>
    
        <td style="vertical-align: top">
            <div><b>Step 0 : Title of New Letter</b></div>
            <div class="pr10"><input type="text" class="classic-input w100pc" id="txt_title"/></div>
            <div><b>Step 1 : Choose the video</b></div>
            <div> 
                <input id="Video" type="text"  class="classic-input w100pc"
                           placeholder="Please using YouTube Watch Link"
                           />
            </div>
            <div><b>Step 2 : Newsletter Preview</b></div>
            <div class="newsletter">
            Please choose the video.
            </div>
            <div><b>Step 3 : Sends</b></div>
            <input  type="button" class="classic-button sends" value="Sends" onclick="threadsend(1);"/> 
            
            
        </td>
    </tr>
</table>
<style>
    tt{ padding: 1px 3px;margin: 0 2px;background-color: #DEEAC9;border: 1px solid #CAD5B7; font-family: tahoma}
    .fwb tt{font-weight: bold}
    .token-item{position: relative;height: 40px;width: 480px}
    .token-item img{height: 40px; width: 60px; position: absolute;top: 0;left: 0}
    .token-item div{height: 40px; position: absolute;top: 0;left: 68px;overflow: hidden;font-size: 11px;font-weight: normal;}
    .token-item div h5{padding: 0;margin: 0;font-size: 11px;font-weight: bold;height: 16px;overflow: hidden;font-family: tahoma;}
    .token-item div p{padding: 0;margin: 0;font-size: 11px;font-weight: normal;overflow: hidden;;font-family: tahoma;}
    ul.token-input-list-facebook li input{margin: 0px 0;}
    div.token-input-dropdown-facebook ul li.token-input-selected-dropdown-item-facebook{background: #C0E6E5;color:#000}
    /*    .token-input-dropdown-facebook ul{width: 300px}*/
</style>
<script>
    $(document).ready(function () {
        $("#Video").tokenInput("{{base_url()}}admin-planners/video/tokenProduct", {
            resultsFormatter: function(item){ return "<li><div class='token-item'><img src='"+item.Thumbs+"'/><div><h5>"+ item.VideoKey +"<h5><p>"+ item.Title +"</p></div></div></li>" },
            tokenFormatter: function(item) { return "<li>" + item.VideoKey + "</li>" },
            searchDelay: 1000,
            propertyToSearch: "VideoID",
            hintText:"enter to search video",
            minChars: 1,
            theme: "facebook",
            tokenLimit: 1,
            onAdd: function (item) {
                $(".newsletter").html("Please choose the video.");
                jqxAjax(
                    "{{base_url('admin-planners/sendmail/getMailcontent')}}"
                    ,{ID:item.VideoID}
                    ,function(result){
                        isrunning=false;
                        if(result.code>=0){
                            $(".newsletter").html(result.htmlcontent);
                        }else{
                            ShowNoticeDialogMessage(result.msg);
                        }
                });
                
            },
            onDelete: function (item) {
                $(".newsletter").html("Please choose the video.");
            }
        });
    });
    function threadshow(index){
        $(".thread").hide();
        $(".thread.t"+index).show();
        $(".threadpage span.fwb").removeClass("fwb");
        $(".threadpage span.t"+index).addClass("fwb");
    }
    function threadsend(threadindex){
        threadshow(threadindex);
        var str="";
        chkStaffBonus=$(".thread.t"+threadindex+" .chkStaffBonus");
        for(i=0;i<chkStaffBonus.length;i++)
        {
            //var chkbox = document.getElementById(chkStaffBonus[i]);
            if(chkStaffBonus[i].checked)
            {
                str+=chkStaffBonus[i].value+",";
            }
        }
        if(str!=""){
            if(!_FcheckFilled($("#txt_title").val())){ $("#txt_title").focus();return; }
            var Video=$('#Video').tokenInput("get");
            if(Video.length==0){
                ShowNoticeDialogMessage('Please choose the video!');
                return;
            }
            var surl="{{base_url("admin-planners/sendmail/ThreadSendMail")}}";
            var sdata={
                title:$("#txt_title").val(),
                ID:Video[0].VideoID,
                listEmail: str
            };
            jqxAjax(surl,sdata,function(result){
                if(result.code>=0){
                    ShowNoticeDialogMessage("New Letter have been send. <br/>Next Thread will start in 5 second."); 
                    $(".thread.t"+threadindex+" .chkStaffBonus").replaceWith('ok');
                    if($(".thread.t"+(threadindex+1)).length>0){
                        setTimeout(function(){ threadsend(threadindex+1); },5000);
                    }else{
                        ShowNoticeDialogMessage('Finished.<br/> click <a href="javascript:$.unblockUI();">here</a> to close.');
                    }
                }else{
                    ShowNoticeDialogMessage(result.msg);
                }
            });
            
        }else{
            if($(".thread.t"+(threadindex+1)).length>0){
                setTimeout(function(){ threadsend(threadindex+1); },5000);
            }else{
                ShowNoticeDialogMessage('Finished.<br/> click <a href="javascript:$.unblockUI();">here</a> to close.');
            }
        }
        
    }
</script>
