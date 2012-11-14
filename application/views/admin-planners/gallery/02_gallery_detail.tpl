<div class="List">
        <div class="mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
            <div class="pt1 pb1 pl1 pr1">
                <div class="pr8">
                    <input type="text" class="m0 lh24 pl8 w100pc hidden" style="background: #d7d7d7;border: none;" 
                           onblur="HideAlbumInput()" 
                           id="txtAlbumName"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->AlbumName|escape:'html'}}{{else}}New Album{{/if}}"/>
                    <input type="hidden" id="txtID" value=""/>
                </div>
                <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0"
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
                    <span id="thumbnails">
                    </span>
                    <div class="grid_x mb4 mt4 ml4 mr4" style="border: 1px dotted #ddd;cursor: pointer"
                         onclick="BrowseServer( 'Images:/')"
                         >
                        <div class="pt1 pb1 pl1 pr1">
                            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #f1f1f1;margin: 0">
                                Add Image
                            </h4>
                            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                                <img style="display: block;margin: 0 auto" src="{{base_url("syslib/sysimages/16/picture.png")}}"/>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="clear"></div>
</div>
<button class="green-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
<button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>