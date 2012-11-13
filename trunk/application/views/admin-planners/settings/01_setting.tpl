<script src="{{base_url()}}syslib/redactor/redactor.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/redactor/redactor.css">
<script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>
<div class="List">
    {{foreach $Data["settings"] as $s}}
        <div class="grid_12 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
            <div class="pt1 pb1 pl1 pr1">
                <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                    {{$s->Name}}
                </h4>
                <div class="pa r8 t8">
                    {{if $s->Type=="text" or $s->Type=="html" or $s->Type=="array"}}
                    <span class="mr12" style="cursor: pointer" onclick="Expand('{{$s->ID}}')">Expand</span>
                    {{/if}}
                    <span style="cursor: pointer" onclick="Detail('{{$s->ID}}')">Edit</span>
                </div>
                <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                    {{if $s->Type=="text"}}
                        <pre>{{$s->Value|escape:html}}</pre>
                    {{elseif $s->Type=="html"}}

                        {{$s->Value|unescape:html}}

                    {{elseif $s->Type=="array" or $s->Type=="objectClassPartner"}}
                        <pre>{{print_r(json_decode($s->Value),true)}}</pre>
                    {{else}}
                        <div class="lh16">
                            {{$s->Value|escape:html}}
                        </div>
                    {{/if}}
                </div>
            </div>
        </div>
    {{/foreach}}
    <div class="clear"></div>
</div>
<div id="frmDetail" class="Detail hidden">
    <button onclick="Cancel()" class="classic-button"><span>Back</span></button>
</div>
<script type="text/javascript">
    function Detail(ID){
        var List=$(".List");
        var Detail=$(".Detail");
        htmlAjax("{{base_url()}}admin-planners/settings/Edit", { ID : ID}, $(".Detail"))
        List.hide();
        Detail.show();
    }
    function Cancel(){
        var List=$(".List");
        var Detail=$(".Detail");
        removeEditorContent();
        List.show();
        Detail.hide();
    }
    var areaContent;
    function addEditorContent(ElementID){
        if(!areaContent) {
            areaContent = new nicEditor({fullPanel : true}).panelInstance(ElementID,{hasPanel : true});
        }
    }
    function removeEditorContent(ElementID){
        if(areaContent) {
            areaContent.removeInstance(ElementID);
            areaContent = null;
        }
    }
    function Save(){
        if(isrunning)return;
        console.log("Save ↵ Call");
        var ID,Key,Name,Value,link,image,url,data;
                
                
        ID = $('#txt_id').val()
        Key = $('#txt_key').val()
        Name = $('#txt_name').val()
        url="{{base_url()}}admin-planners/settings/Save";
        data={
            ID      :   ID,
            Key     :   Key,
            Name    :   Name
        }
        if($("#txt_link").length){
            data.link=$("#txt_link").val();
        }
        if($("#txt_image").length){
            data.image=$("#txt_image").val();
        }
        if($('#txt_value').length){
            try{
                Value = $('#txt_value').getCode()
            }catch(e){
                Value = $('#txt_value').val()
            }
            data.Value=Value;
        }
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