{{if isset($Data["row"])}}
    
<div style="padding: 20px">
    <table>
        <tr>
            <td class="w100">Key</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input type="hidden" id="ID"
                           value="{{if isset($Data["row"])}}{{$Data["row"]["ID"]}}{{/if}}"
                           />
                    <input id="txt_key" type="text"  class="classic-input w100pc"
                           disabled="1"
                           value="{{if isset($Data["row"])}}{{$Data["row"]["Key"]|escape:'html'}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Name</td>
            <td colspan="3">
                <div class="pr10 w720">
                    <input id="txt_name" type="text"  class="classic-input w100pc"
                           value="{{if isset($Data["row"])}}{{$Data["row"]["Name"]}}{{/if}}"
                           />
                </div>

            </td>

        </tr>

        <tr>
            <td class="w100">Value</td>
            <td colspan="3">
                <div class="" style="width: 728px">
                    <textarea id="txt_value" style="min-height: 96px" 
                              class="classic-input Editor w100pc rsv ">{{if isset($Data["row"])}}{{$Data["row"]["Value"]}}{{/if}}</textarea>
                </div>
            </td>
        </tr>
        {{if isset($Data["row"])}}
            <tr>
                <td class="w100"></td>
                <td colspan="3">
                    Log :<br/>
                    <pre>{{$Data["row"]["Log"]}}</pre>
                </td>
            </tr>
        {{/if}}
    </table>
    <div>
        <input type="button" class="classic-button" value="Back" onclick="$( '#frmelfinder' ).dialog({modal: true,minWidth: 700});"/>
        {{if isset($Data["row"])}}
            <input type="button" class="classic-button" value="Update" onclick="alert($('#txt_value').getCode());"/>
        {{else}}
            <input type="button" class="classic-button" value="Insert" onclick="alert($('#txt_value').getCode());"/>
        {{/if}}
    </div>
    {{if $Data["row"]["Type"]=="text"}}
        <script>//addEditorContent("txt_value");</script>
        <script type="text/javascript">
        $(function()
        {
            $('#txt_value').redactor({
                air: true,
                wym: true,
                airButtons: ['formatting', '|', 'bold', 'italic', 'deleted', '|','unorderedlist','orderedlist','outdent','indent','alignment','|','image','video','link','|','fontcolor','backcolor']
            });	
            $('#myelfinder').elfinder({
                url : '{{base_url()}}syslib/elfinder/php/connector.php',
                lang : 'en',
                getFileCallback : function(file) {
                        alert(file);
                }
            })
        });
        </script>
    {{/if}}
</div>
{{else}}
    Item not found
{{/if}}
<div id="frmelfinder" class="hidden" style="font-size: 15px">
    
    <div id="myelfinder" style="width: 100%;
min-width: 400px;"></div>
    
</div>