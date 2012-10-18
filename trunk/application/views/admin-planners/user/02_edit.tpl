
<div style="padding: 20px">
    <table>
        <tr>
            <td class="w100">User Name</td>
            <td colspan="3">
                <div class="pr10 w320">
                    <input type="hidden" id="ID"
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["ID"]}}{{/if}}"
                           />
                    <input id="Title" type="text"  class="classic-input w100pc"
                           placeholder=""
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["UserName"]|escape:'html'}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Full Name</td>
            <td colspan="3">
                <div class="pr10 pr w320">
                    <input id="Thumb" type="text"  class="classic-input w100pc" placeholder=""
                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]["Name"]}}{{/if}}"
                           />
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Aurhority</td>
            <td colspan="3">
                <div class="pr w320">
                    
                </div>
            </td>
        </tr>
        <tr>
            <td class="w100">Group</td>
            <td colspan="3">
                <div class="pr ">
                    <select class="classic-select w100pc">
                        <option>[---Group---]</option>
                    </select>
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

