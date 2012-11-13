
<div style="padding: 20px">
    <table>
        <tr>
            <td class="w100">Youtube link</td>
            <td colspan="3">
                <div class="pr10">
                    <input id="Link" type="text"  class="classic-input w100pc"
                           placeholder="Please using YouTube Watch Link"
                           value="{{if isset($Data["video"])}}{{$Data["video"]["Source"]|escape:'html'}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Youtube Key</td>
            <td class="w320">
                <input id="VideoKey" type="text"  class="classic-input w320"
                       value="{{if isset($Data["video"])}}{{$Data["video"]["VideoKey"]|escape:'html'}}{{/if}}"
                       />

            </td>
            <td colspan="2" class="">
                <input type="button" class="classic-button" 
                       value="Get Video Infomartion by Youtube Key or Youtube link" 
                       onclick="getYoutubeInfo();"/>
            </td>
        </tr>
        <tr>
            <td class="w100">Title</td>
            <td colspan="3">
                <div class="pr10">
                    <input type="hidden" id="VideoID" value="{{if isset($Data["video"])}}{{$Data["video"]["VideoID"]}}{{/if}}"/>
                    <input id="Title" type="text"  class="classic-input w100pc"
                           onblur="getAlias();"
                           value="{{if isset($Data["video"])}}{{$Data["video"]["Title"]|escape:'html'}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Alias</td>
            <td colspan="3">
                <div class="pr10">
                    <input id="Alias" disabled="1" type="text"  class="classic-input w100pc"
                           style="background: #fff"
                           value="{{if isset($Data["video"])}}{{$Data["video"]["Alias"]}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Thumbs</td>
            <td colspan="3">
                <div class="pr10 pr">
                    <input id="Thumbs" type="text"  class="classic-input w100pc" placeholder="Tự động lấy từ video ( YouTube )"
                           value="{{if isset($Data["video"])}}{{$Data["video"]["Thumbs"]|escape:'html'}}{{/if}}"
                           />
                    <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                         onclick="BrowseServer( 'Images:/', 'Thumbs' );"
                         >
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Description</td>
            <td colspan="3">
                <div class="pr10">
                    <textarea id="Description" style="min-height: 96px" class="classic-input w100pc rsv">{{if isset($Data["video"])}}{{$Data["video"]["Description"]|escape:'html'}}{{/if}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Tag</td>
            <td colspan="3">
                <div class="pr10">
                    <textarea id="Tag" style="min-height: 64px;" class="classic-input w100pc rsv">{{if isset($Data["video"])}}{{$Data["video"]["Tag"]|escape:'html'}}{{/if}}</textarea>
                </div>
            </td>
        </tr>
        {{if isset($Data["video"])}}
            <tr>
                <td class="w100"></td>
                <td colspan="3">
                    Insert : {{$Data["video"]["Insert"]}}<br/>
                    Update : {{$Data["video"]["Update"]}}<br/>
                    Log :<br/>
                    <pre>{{$Data["video"]["Log"]}}</pre>
                </td>
            </tr>
        {{/if}}
    </table>
    <div>
        <input type="button" class="classic-button" value="Back" onclick="FlexiGrid.CancelEdit();"/>
        {{if isset($Data["video"])}}
            <input type="button" class="classic-button" value="Update" onclick="FlexiGrid.Save();"/>
        {{else}}
            <input type="button" class="classic-button" value="Insert" onclick="FlexiGrid.Save();"/>
        {{/if}}
    </div>
</div>

