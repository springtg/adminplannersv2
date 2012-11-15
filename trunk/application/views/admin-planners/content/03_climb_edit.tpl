
        <input type="hidden" name="txtID" id="txtID" value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ID|escape:'html'}}{{/if}}"/>
        <table class="w720px">
            <tr>
                <td class="w100 tar red">Title</td>
                <td>
                    <div class="pr10">
                        <input id="txtTitle" name="txtTitle" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Title|escape:'html'}}{{/if}}"
                               onblur="getAlias()"
                               />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Alias</td>
                <td>
                    <div class="pr10">
                        <input id="txtAlias" name="txtAlias" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Alias|escape:'html'}}{{/if}}"
                               />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Thumb</td>
                <td>
                    <div class="pr10 pr">
                        <input id="txtThumb" name="txtThumb" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Thumb|escape:'html'}}{{/if}}"
                               />
                        <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                             onclick="BrowseServer( 'Images:/', 'txtThumb' );"
                             title="Choose image from my host"
                             >
                        </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar vtat red"><label class="lh24 red">Content</label></td>
                <td id="tdContent">
                    <div id="txtContent" style="min-height: 100px">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Content}}{{/if}}</div>
                </td>
            </tr>
        </table>
    
<div class="pt8">
    <button class="gray-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
    <button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>
</div>
<script>
    $(function() {
        addEditorContent("txtContent");
    });
</script>