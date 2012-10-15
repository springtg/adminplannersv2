
<div style="padding: 20px">
    <table>
        <tr>
            <td class="w100">Title</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input type="hidden" id="ID"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["ID"]}}{{/if}}"
                           />
                    <input id="Title" type="text"  class="classic-input w100pc"
                           {{if $Data["OBJ"]["Lock"]==1}}
                               disabled="1"
                           {{/if}}
                           placeholder=""
                           onblur="getAlias();"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Title"]|escape:'html'}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Alias</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input id="Alias" type="text"  class="classic-input w100pc"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Alias"]}}{{/if}}"
                           {{if $Data["OBJ"]["Lock"]==1}}
                               disabled="1"
                           {{/if}}
                           />
                </div>

            </td>

        </tr>

        <tr>
            <td class="w100">Thumb</td>
            <td colspan="3">
                <div class="pr10 pr w720">
                    <input id="Thumb" type="text"  class="classic-input w100pc" placeholder=""
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Thumb"]}}{{/if}}"
                           />
                    <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                         onclick="BrowseServer( 'Images:/', 'Thumb' );"
                         >
                    </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Content</td>
            <td colspan="3">
                <div class="" style="width: 728px">
                    <textarea id="Content" style="min-height: 96px" class="classic-input mceEditor w100pc rsv ">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Content"]}}{{/if}}</textarea>
                </div>
            </td>
        </tr>
        {{if isset($Data["OBJ"])}}
            <tr>
                <td class="w100"></td>
                <td colspan="3">
                    Insert : {{$Data["OBJ"]["Insert"]}}<br/>
                    Update : {{$Data["OBJ"]["Update"]}}<br/>
                    Log :<br/>
                    <pre>{{$Data["OBJ"]["Log"]}}</pre>
                </td>
            </tr>
        {{/if}}
    </table>
    <div>
        <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
        {{if isset($Data["OBJ"])}}
            <input type="button" class="classic-button" value="Update" onclick="jqxGrid.Save();"/>
        {{else}}
            <input type="button" class="classic-button" value="Insert" onclick="jqxGrid.Save();"/>
        {{/if}}
    </div>
    <script>
        $(document).ready(function () {
            addEditorContent();
        });
    
    </script>
</div>

