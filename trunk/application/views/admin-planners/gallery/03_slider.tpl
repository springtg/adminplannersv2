<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/browse.js"></script>

<div class="List">
    <div class="mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
        <div class="pt1 pb1 pl1 pr1">
            <div class="pr8">
                <input type="text" class="m0 lh24 pl8 w100pc hidden" style="background: #d7d7d7;border: none;" 
                       onblur="HideAlbumInput()" 
                       id="txtAlbumName"
                       value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->AlbumName|escape:'html'}}{{else}}Slider{{/if}}"/>
                <input type="hidden" id="txtID" value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ID}}{{/if}}"/>
            </div>
            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" 
                style="background: #d7d7d7;margin: 0"
                onclick="ShowAlbumInput()"
                id="AlbumName" >{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->AlbumName|escape:'html'}}{{else}}Slider{{/if}}</h4>
            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                <div class="grid_x" id="AlbumItems">
                    {{if isset($Data["OBJ"])}}
                        {{$images=json_decode($Data["OBJ"]->Images)}}
                        {{foreach $images as $i}}
                            <div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
                                <div class="pt1 pb1 pl1 pr1">
                                    <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                                        Slider img
                                    </h4>
                                    <div class="pa r8 t8">
                                        <span style="cursor: pointer" onclick="DelAlbumItem(this)">✖</span>
                                    </div>
                                    <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                                        <img class="w100pc" src="{{$i}}"/>

                                    </div>
                                </div>
                            </div>
                        {{/foreach}}
                    {{/if}}
                </div>
            </div>
            <div class="grid_x pt12 pb12 mt12" style="border-top:1px dotted #ccc">
                <div class="grid_3"><label class="lh24">Album item</label></div>
                <div class="grid_10 pr32">
                    <div class="pr10 pr">
                        <input id="txtAddImage" class="classic-input w100pc"/>
                        <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                             onclick="BrowseServer( 'Images:/', 'txtAddImage' );"
                             title="Choose image from my host"
                             >
                        </div>
                    </div>
                </div>
                <div class="grid_4">
                    <button class="classic-button" onclick="AddAlbumItem()"><span>Add</span></button>
                </div>

            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<button class="green-button" onclick="Save();"><span>Save</span></button>
<script type="text/javascript">
    function AddAlbumItem(){
        var AlbumItems =$("#AlbumItems");
        var srcImg=$("#txtAddImage").val();
        if(!_FcheckFilled(srcImg)){return}
        var AlbumItem=
            '<div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">\
            <div class="pt1 pb1 pl1 pr1">\
                <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">\
                    Album item\
                </h4>\
                <div class="pa r8 t8">\
                    <span style="cursor: pointer" onclick="DelAlbumItem(this)">Del</span>\
                </div>\
                <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">\
                    <img class="w100pc" src="'+srcImg+'"/>\
                </div>\
            </div>\
        </div>';
        AlbumItems.append(AlbumItem);
        $("#txtAddImage").val("")
    }
    function DelAlbumItem(obj){
        $(obj).parents("div.AlbumItem").remove();
    }
    
    function ShowAlbumInput(){
        $("#txtAlbumName").show();
        $("#AlbumName").hide();
        $("#txtAlbumName").focus();
    }
    function HideAlbumInput(){
        $("#txtAlbumName").hide();
        $("#AlbumName").show();
        if($("#txtAlbumName").val()==""){
            $("#txtAlbumName").val("New Album");
            $("#AlbumName").text("New Album");
        }else{
            $("#AlbumName").text($("#txtAlbumName").val());
        }
    }
    function Save (){
        var AlbumItems =$("#AlbumItems img").map(function() {
            return $(this).attr("src");
        });
        if(isrunning)return;
        console.log("Save ↵ Call");
        var ID,AlbumName,Album;                                
        ID = $('#txtID').val();
        AlbumName = $('#txtAlbumName').val();
        Album=new Array();
        for(var i=0;i<AlbumItems.length;i++){
            Album[i]=AlbumItems[i];
        }
        var url="{{base_url()}}admin-planners/gallery/Save";
        var data={
            ID              :   ID,
            AlbumName       :   AlbumName,
            Album           :   Album
        }
        console.log(data);
        isrunning=true;
        debugAjax(url,data,function(result){
            isrunning=false;
            if(result.code>=0){
                ShowNoticeDialogMessage(result.msg);
            }else{
                ShowNoticeDialogMessage(result.msg);
            }
        });
    }
</script>