
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
                           placeholder=""
                           onblur="getAlias();"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Title"]}}{{/if}}"
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
                <div class="pr10">
                    <textarea id="Content" style="min-height: 96px" class="classic-input mceEditor w100pc rsv ">{{if isset($Data["video"])}}{{$Data["video"]["Description"]}}{{/if}}</textarea>
                </div>
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
    <script>
         $(document).ready(function () {
            CreateEditorElement();
        });
    
    </script>
</div>

