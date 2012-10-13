<div>
    <fieldset>
        <legend>Contact detail</legend>
        <div style="padding: 20px">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><b>{{$Data["obj"]["FullName"]}}</b></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><b>{{$Data["obj"]["Email"]}}</b></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><b>{{$Data["obj"]["Phone"]}}</b></td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td><b>{{$Data["obj"]["Subject"]}}</b></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><pre>{{$Data["obj"]["Message"]}}</pre></td>
                </tr>
            </table>
            <input type="button" class="classic-button" value="Back" onclick="jqxGrid.CancelEdit();"/>
        </div>
    </fieldset>

</div>