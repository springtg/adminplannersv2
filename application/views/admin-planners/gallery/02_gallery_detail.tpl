<div class="List">
    <div class="mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
        <div class="pt1 pb1 pl1 pr1">
            <div class="pr8">
                <input type="text" class="m0 lh24 pl8 w100pc hidden" style="background: #d7d7d7;border: none;" 
                       onblur="HideAlbumInput()" 
                       id="txtAlbumName"
                       value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->AlbumName|escape:'html'}}{{else}}New Album{{/if}}"/>
                <input type="hidden" id="txtID" value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ID}}{{/if}}"/>
            </div>
            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" 
                style="background: #d7d7d7;margin: 0"
                onclick="ShowAlbumInput()"
                id="AlbumName"
                >
                {{if isset($Data["OBJ"])}}{{$Data["OBJ"]->AlbumName|escape:'html'}}{{else}}New Album{{/if}}
            </h4>
            <div class="pa r8 t8">

                <span class="mr12" style="cursor: pointer" onclick="Expand('')">Expand</span>
                <span style="cursor: pointer" onclick="Detail('')">Edit</span>
            </div>
            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                <div class="grid_x" id="AlbumItems">
                    {{if isset($Data["OBJ"])}}
                        {{$images=json_decode($Data["OBJ"]->Images)}}
                        {{foreach $images as $i}}
                            <div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
                                <div class="pt1 pb1 pl1 pr1">
                                    <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                                        Album item
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
<button class="gray-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
<button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>