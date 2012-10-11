<script type="text/javascript" src="{{base_url()}}syslib/tokeninput/jquery.tokeninput.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/tokeninput/token-input.css" type="text/css" />
<link rel="stylesheet" href="{{base_url()}}syslib/tokeninput/token-input-facebook.css" type="text/css" />   
<table class="w320">
    <tr>
        <td class="w100">Youtube Video</td>
        <td colspan="3">
            <div class="">
                <input id="Video" type="text"  class="classic-input w100pc"
                       placeholder="Please using YouTube Watch Link"
                       
                       />
            </div>
            <input type="hidden" id="VideoID" 
                   value="{{if isset($Data["slider"])}}{{$Data["slider"]["VideoID"]}}{{/if}}"/>
        </td>
    </tr>
<!--    <tr>
        <td class="w100"></td>
        <td class="" colspan="3">
            <input type="button" class="classic-button" 
                   value="{{if isset($Data["slider"])}}{{$Data["slider"]["VideoKey"]}}{{/if}}" 
                   onclick="getYoutubeInfo();"/>
        </td>
    </tr>-->
    
    <tr>
        <td class="w100">Title</td>
        <td colspan="3">
            <div class="pr10">
                <input type="hidden" id="ID" value="{{if isset($Data["slider"])}}{{$Data["slider"]["ID"]}}{{/if}}"/>
                <input id="Title" type="text"  class="classic-input w100pc"
                       value="{{if isset($Data["slider"])}}{{$Data["slider"]["Title"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Image</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Image" type="text"  class="classic-input w100pc" 
                       value="{{if isset($Data["slider"])}}{{$Data["slider"]["Image"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Position</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Position" type="text"  class="classic-input w100pc" 
                       value="{{if isset($Data["slider"])}}{{$Data["slider"]["Position"]}}{{/if}}"
                       placeholder="Default is Zero"
                       />
            </div>
        </td>
    </tr>
</table>

<div>
    <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
    {{if isset($Data["slider"])}}
    <input type="button" class="classic-button" value="Update" onclick="jqxGrid.Save();"/>
    {{else}}
    <input type="button" class="classic-button" value="Insert" onclick="jqxGrid.Save();"/>
    {{/if}}
</div>
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
            {{if isset($Data["slider"])}}
            prePopulate: [{
                        VideoID: "{{$Data["slider"]["VideoID"]}}"
                        ,VideoKey: "{{$Data["slider"]["VideoKey"]}}"
                        ,Thumbs:"{{$Data["slider"]["Image"]}}"
                        ,Title:"{{$Data["slider"]["Title"]}}"
            }],
            {{/if}}
            onAdd: function (item) {
                $("#VideoID").val(item.VideoID);
                $("#Title").val(item.Title);
                $("#Image").val(item.Thumbs);
            },
            onDelete: function (item) {
                $("#VideoID").val("");
                $("#Title").val("");
                $("#Image").val("");
            }
        });
    });
</script>
