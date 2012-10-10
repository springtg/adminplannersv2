

<table>
    <tr>
        <td class="w100">Youtube link</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Link" type="text"  class="classic-input w100pc"
                       value="{{if isset($Data["video"])}}{{$Data["video"]["Source"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100"></td>
        <td colspan="3" style="padding-bottom: 30px" >
            <input type="button" class="classic-button" value="Get Video Infomartion " onclick="getYoutubeInfo();"/>
        </td>
    </tr>
    <tr>
        <td class="w100">Youtube Key</td>

        <td class="w320">
            <div class="pr10">
                <input id="VideoKey" type="text"  class="classic-input w100pc" placeholder=""
                       value="{{if isset($Data["video"])}}{{$Data["video"]["VideoKey"]}}{{/if}}"
                       />
            </div>
        </td>
        <td class="pl60 w100">Author</td>
        <td class="w320">
            <div class="pr10">
                <input id="Author" type="text"  class="classic-input w100pc" placeholder=""
                       
                       value="{{if isset($Data["video"])}}{{$Data["video"]["Author"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Title</td>
        <td colspan="3">
            <div class="pr10">
                <input type="hidden" id="VideoID" value="{{if isset($Data["video"])}}{{$Data["video"]["VideoID"]}}{{/if}}"/>
                <input id="Title" type="text"  class="classic-input w100pc"
                       value="{{if isset($Data["video"])}}{{$Data["video"]["Title"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Alias</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Alias" disabled="1" type="text"  class="classic-input w100pc"
                       value="{{if isset($Data["video"])}}{{$Data["video"]["Alias"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Category</td>
        <td colspan="3">
            <div class="Categorys">
                <ul class="classic-list w800">
                    {{foreach $Data["categorys"] as $Name=>$Value}}
                        <li>
                            {{if isset($Data["video"])}}
                                {{if $Data["video"]["Category"]|strpos:(","|cat:$Name|cat:",") === false}}
                                    <input type="checkbox"  value="{{$Name}}"/><label>{{$Value}}</label>
                                {{else}}
                                    <input type="checkbox" checked="1" value="{{$Name}}"/><label>{{$Value}}</label>
                                {{/if}}
                            {{else}}
                                <input type="checkbox" value="{{$Name}}"/><label>{{$Value}}</label>
                            {{/if}} 
                        </li>
                    {{/foreach}}
                </ul>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Thumbs</td>
        <td colspan="3">
            <div class="pr10">
                <input id="Thumbs" type="text"  class="classic-input w100pc" placeholder="Tự động lấy từ video ( YouTube )"
                       value="{{if isset($Data["video"])}}{{$Data["video"]["Thumbs"]}}{{/if}}"
                       />
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Description</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Description" class="classic-input w100pc rsv">{{if isset($Data["video"])}}{{$Data["video"]["Description"]}}{{/if}}</textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Tag</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Tag" class="classic-input w100pc rsv">{{if isset($Data["video"])}}{{$Data["video"]["Tag"]}}{{/if}}</textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100">Embel</td>
        <td colspan="3">
            <div class="pr10">
                <textarea id="Embel" class="classic-input w100pc rsv">{{if isset($Data["video"])}}{{$Data["video"]["Embel"]}}{{/if}}</textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td class="w100"></td>
        <td colspan="3">
            <input type="checkbox"/><label>Preview</label>
            <div style="min-height:  200px;background: #ddd"></div>
        </td>
    </tr>
</table>

<div>
    <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
    {{if isset($Data["video"])}}
    <input type="button" class="classic-button" value="Update" onclick="jqxGrid.Save();"/>
    {{else}}
    <input type="button" class="classic-button" value="Insert" onclick="jqxGrid.Save();"/>
    {{/if}}
</div>