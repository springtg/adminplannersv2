<div>
    <fieldset>
        <legend>Contact detail</legend>
        <div style="padding: 20px">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><b>{{$Data["obj"]["FullName"]|escape:'html'}}</b></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><b>{{$Data["obj"]["Email"]|escape:'html'}}</b></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><b>{{$Data["obj"]["Phone"]|escape:'html'}}</b></td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td><b>{{$Data["obj"]["Subject"]|escape:'html'}}</b></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><pre>{{$Data["obj"]["Message"]|escape:'html'}}</pre></td>
                </tr>
            </table>
            <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
        </div>
    </fieldset>

</div>