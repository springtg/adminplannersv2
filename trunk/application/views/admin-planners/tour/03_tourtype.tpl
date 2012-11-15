<div class="grid_12" >
    {{if isset($_SESSION["tourtype"])}}
    {{foreach $_SESSION["tourtype"] as $k=>$v}}
    <div class="grid_12 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
        <div class="pt1 pb1 pl1 pr1">
            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                Tour type : {{$v["Name"]|escape:'html'}}
            </h4>
            <div class="pa r8 t8">
                <span style="cursor: pointer" onclick="del('{{$v["Name"]}}')">✖</span>
            </div>
            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                <div class="lh16">
                    {{$v["Des"]|escape:'html'}}
                </div>
            </div>
        </div>
    </div>
    {{/foreach}}
    {{/if}}
    <div class="grid_12 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
        <div class="pt1 pb1 pl1 pr1">
            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                Add Tour Type
            </h4>
            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                <div class="lh16">
                    <div class="grid_2 lh24 mt4 pl8" >Name</div>
                    <div class="grid_9 pt4" style="max-height: 200px;overflow-x: auto">
                        <div class="pr10">
                            <input type="text" id="typeName" class="classic-input w100pc"/>
                        </div>
                    </div>
                    <div class="grid_2 lh24 mt4 pl8" >Des</div>
                    <div class="grid_9 pt4" style="max-height: 200px;overflow-x: auto">
                        <div class="pr10">
                            <textarea id="typeDes" class="classic-input w100pc"></textarea>
                        </div>
                    </div>
                    <div class="grid_2 lh24 mt4 pl8" >&nbsp;</div>
                    <div class="grid_9 pt4 pb4" style="max-height: 200px;overflow-x: auto">
                        <button class="green-button" onclick="add()"><span>Add</span></button>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
</div>
<div class="clear"></div>
<script type="text/javascript">
    function del(Name){
        if(isrunning)return;
        console.log("Del tour type ↵ Call");
        var url="{{base_url()}}admin-planners/tour/deltourtype";
        var data={
            Name            :   Name
        }
        console.log(data);
        isrunning=true;
        debugAjax(url,data,function(result){
            isrunning=false;
            if(result.code>=0){
                location.reload();
            }else{
                ShowNoticeDialogMessage(result.msg);
            }
        });
    }
    function add(){
        if(isrunning)return;
        console.log("Add tour type ↵ Call");
        var Name,Des;
        Name = $('#typeName').val();
        Des = $('#typeDes').val();
        var url="{{base_url()}}admin-planners/tour/addtourtype";
        var data={
            Name            :   Name,
            Des             :   Des
        }
        console.log(data);
        isrunning=true;
        debugAjax(url,data,function(result){
            isrunning=false;
            if(result.code>=0){
                location.reload();
            }else{
                ShowNoticeDialogMessage(result.msg);
            }
        });
    }
</script>