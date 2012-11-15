{{if isset($Data["row"])}}

    <div style="padding: 20px">
        <table>
            <tr>
                <td class="w100">Key</td>
                <td colspan="3">
                    <div class="grid_18">
                        <div class="pr10">
                            <input type="hidden" id="txt_id"
                                   value="{{$Data["row"]["ID"]}}"
                                   />
                            <input id="txt_key" type="text"  class="classic-input w100pc"
                                   disabled="1"
                                   value="{{$Data["row"]["Key"]|escape:'html'}}"
                                   />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Name</td>
                <td colspan="3">
                    <div class="grid_18">
                        <div class="pr10">
                            <input id="txt_name" type="text"  class="classic-input w100pc"
                                   value="{{$Data["row"]["Name"]|escape:'html'}}"
                                   />
                        </div>
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
                        <div class="grid_18">
                            <div class="pr10">
                                <input id="txt_link" type="text"  class="classic-input w100pc"
                                       value="{{$Data["row"]["Value"]->link|escape:'html'}}"
                                       />
                            </div>
                        </div> 
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td colspan="3">
                        <div class="grid_18">
                            <div class="pr10">
                                <input id="txt_image" type="text"  class="classic-input w100pc"
                                       value="{{$Data["row"]["Value"]->image|escape:'html'}}"
                                       />
                            </div>
                        </div>
                    </td>
                {{elseif $Data["row"]["Type"]=="html"}}
                <div class="grid_18">
                    <div class="pr2">
                        <div id="txt_value">{{$Data["row"]["Value"]|unescape:html}}</div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#txt_value').redactor({
                            //air: true,
                            //wym: true,
                            airButtons: ['formatting', '|', 'bold', 'italic', 'deleted', '|','unorderedlist','orderedlist','outdent','indent','alignment','|','image','video','link','|','fontcolor','backcolor']
                        });	
                        //addEditorContent("txt_value");
                    });
                </script>
            {{elseif $Data["row"]["Type"]=="string"}}
                <div class="grid_18">
                    <div class="pr10">
                        <input id="txt_value" type="text"  class="classic-input w100pc"
                               value="{{$Data["row"]["Value"]|escape:'html'}}"
                               />
                    </div>
                </div>
            {{else}}
                <div class="grid_18">
                    <div class="pr10">
                        <textarea id="txt_value" style="min-height: 96px" 
                                  class="classic-input Editor w100pc rsv ">{{$Data["row"]["Value"]|escape:'html'}}</textarea>
                    </div>
                </div>
            {{/if}}        
            </td>
            </tr>
        </table>
        <div>
            <button class="gray-button" onclick="Cancel();"><span>Back</span></button>
            <button class="green-button" onclick="Save();"><span>Save</span></button>
        </div>
    </div>
{{else}}
    Item not found
{{/if}}
<div id="frmelfinder" class="hidden" style="font-size: 15px">

    <div id="myelfinder" style="width: 100%;
         min-width: 400px;"></div>

</div>