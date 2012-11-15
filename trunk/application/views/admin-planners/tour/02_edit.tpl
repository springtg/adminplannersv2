<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Tour Information ( Schedule )</a></li>
        <li><a href="#tabs-2">Price List</a></li>
        <li><a href="#tabs-3">Conditions</a></li>
        <li><a href="#tabs-4">Guide</a></li>
    </ul>
    <div id="tabs-1">
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
                <td class="w100 tar red">Type</td>
                <td>
                    <div class="pr">
                        <select id="cbxType" class="classic-select w100pc">
                            <option value="Unknown">[--- Unknown ---]</option>
                            {{if isset($_SESSION["tourtype"])}}
                            {{foreach $_SESSION["tourtype"] as $k=>$v}}
                                <option 
                                    {{if $v["Name"]==$Data["OBJ"]->Type}}selected=1{{/if}}
                                    value="{{$v["Name"]|escape:'html'}}">{{$v["Name"]|escape:'html'}}</option>
                            {{/foreach}}
                            {{/if}}
                        </select>
                        <a href="{{base_url('admin-planners/tour/type')}}" class="pa hover50 icon16 chooseimage more_icon"
                             title="More type"></a>
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
                    <div id="txtContent" style="min-height: 100px;border: 1px solid #ccc">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Content}}{{/if}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div id="tabs-2">
        <table class="w720px">
            <tr>
                <td class="w100 tar red vtat">Price List <br/>[ Max Char is 2000 ] </td>
                <td>
                    <div id="txtPriceList" style="min-height: 100px;border: 1px solid #ccc">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->PriceList}}{{/if}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div id="tabs-3">
        <table class="w720px">
            <tr>
                <td class="w100 tar red vtat">Conditions <br/>[ Max Char is 2000 ] </td>
                <td>
                    <div id="txtConditions" style="min-height: 100px;border: 1px solid #ccc">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Conditions}}{{/if}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div id="tabs-4">
        <pre>In NicEditor.
        " Ctrl + Shift + V " to paste text only.
        " Ctrl + V " to paste html content.
        </pre>
    </div>
</div>

<div class="pt8">
    <button class="gray-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
    <button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>
</div>
<script>
    $(function() {
        addInstance("txtContent");
        addInstance("txtPriceList");
        addInstance("txtConditions");
        $( "#tabs" ).tabs();
    });
</script>