{{if isset($Data["row"])}}
    
<div style="padding: 20px">
    <table>
        <tr>
            <td class="w100">Key</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input type="hidden" id="txt_id"
                           value="{{$Data["row"]["ID"]}}"
                           />
                    <input id="txt_key" type="text"  class="classic-input w100pc"
                           disabled="1"
                           value="{{$Data["row"]["Key"]|escape:'html'}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Name</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input id="txt_name" type="text"  class="classic-input w100pc"
                           value="{{$Data["row"]["Name"]|escape:'html'}}"
                           />
                </div>

            </td>

        </tr>

        <tr>
            <td class="w100">Value</td>
            <td colspan="3">
                {{if $Data["row"]["Type"]=="objectClassPartner"}}
                </td>
            </tr>
            <tr>
                <td>Link</td>
                <td colspan="3">
                   <div class="pr10 w720">
                        <input id="txt_link" type="text"  class="classic-input w100pc"
                           value="{{$Data["row"]["Value"]->link|escape:'html'}}"
                           />
                    </div> 
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td colspan="3">
                    <div class="pr10 w720">
                        <input id="txt_image" type="text"  class="classic-input w100pc"
                           value="{{$Data["row"]["Value"]->image|escape:'html'}}"
                           />
                    </div>
                </td>
                {{elseif $Data["row"]["Type"]=="html"}}
                    <div class="w720" style="width: 730px">
                        <textarea id="txt_value" style="min-height: 96px" 
                                class="classic-input Editor w100pc rsv ">{{$Data["row"]["Value"]}}</textarea>
                    </div>
                    <script type="text/javascript">
                    $(document).ready(function () {
                        $('#txt_value').redactor({
                            //air: true,
                            //wym: true,
                            airButtons: ['formatting', '|', 'bold', 'italic', 'deleted', '|','unorderedlist','orderedlist','outdent','indent','alignment','|','image','video','link','|','fontcolor','backcolor']
                        });	
                    });
                    </script>
                {{elseif $Data["row"]["Type"]=="string"}}
                    <div class="pr10 w720">
                        <input id="txt_value" type="text"  class="classic-input w100pc"
                           value="{{$Data["row"]["Value"]|escape:'html'}}"
                           />
                    </div>
                {{else}}
                    <div class="pr10 w720">
                        <textarea id="txt_value" style="min-height: 96px" 
                                class="classic-input Editor w100pc rsv ">{{$Data["row"]["Value"]|escape:'html'}}</textarea>
                    </div>
                {{/if}}        
            </td>
        </tr>
    </table>
    <div>
        <input type="button" class="classic-button" value="Back" onclick="FlexiGrid.CancelEdit();"/>
        {{if isset($Data["row"])}}
            <input type="button" class="classic-button" value="Update" onclick="FlexiGrid.Save();"/>
        {{else}}
            <input type="button" class="classic-button" value="Insert" onclick="FlexiGrid.Save();"/>
        {{/if}}
    </div>
</div>
{{else}}
    Item not found
{{/if}}
<div id="frmelfinder" class="hidden" style="font-size: 15px">
    
    <div id="myelfinder" style="width: 100%;
min-width: 400px;"></div>
    
</div>