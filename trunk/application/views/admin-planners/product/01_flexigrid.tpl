<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/Flexigrid/css/flexigrid.css">
<script type="text/javascript" src="{{base_url()}}syslib/Flexigrid/js/flexigrid.js"></script>
<script src="{{base_url()}}syslib/contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
<link href="{{base_url()}}syslib/contextMenu/jquery.contextMenu.css" rel="stylesheet" type="text/css" />

<div style="padding-right: 2px;padding-left: 0px;">
    <div id="frmFlexiGrid">
        <table id="FlexiGrid"></table>
    </div>
    <div id="frmDetail" class="tabdetail hidden">
        Loadding...
    </div>
</div>
<div class="frmsetting hidden" style="width: 480px">
    <div class="grid_12">
        <div class="grid_6" >
            <div class="columnsSetings mr4 ml-1" style="border: 1px solid #ccc">
                <div class="lh20 fwb pl12" style="background: #ddd">Tùy chỉnh hiện thị cột</div>
                <div class="pt4" style="max-height: 200px;overflow-x: auto">
                    {{for $col=0 to count($Data["flexigrid_settings"]["colModel"])-1}}
                    <div class="grid_x pb4 ml4 checkbox {{if !$Data["flexigrid_settings"]["colModel"][$col]["hide"]}}cked{{/if}}" value="{{$col}}" col="{{$Data["flexigrid_settings"]["colModel"][$col]["name"]}}">
                        <div class="grid_x w16px mr4 ic" style="height: 16px;"></div>
                        <div class="grid_4 lh16 label">{{$Data["flexigrid_settings"]["colModel"][$col]["display"]}}</div>
                    </div>
                    {{/for}}
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="grid_6" >
            <div class="displaySetings ml4 mr-1" style="border: 1px solid #ccc">
                <div class="lh20 fwb pl12 mb4" style="background: #ddd">Tùy chỉnh hiện thị dữ liệu</div>
                <div class="grid_x pb4 ml4 radio {{if $_SESSION["JQX-DEL-PRO"]==1}}cked{{/if}}" value="1">
                    <div class="grid_x w14px mr12 ic" style="height: 14px;"></div>
                    <div class="grid_5 lh16 label">Hiện tất cả dữ liệu</div>
                </div>
                <div class="grid_x pb4 ml4 radio {{if $_SESSION["JQX-DEL-PRO"]==0}}cked{{/if}}" value="0">
                    <div class="grid_x w14px mr12 ic " style="height: 14px;"></div>
                    <div class="grid_5 lh16 label">Ẩn dữ liệu đã xóa</div>
                </div>
                <div class="grid_x pb4 ml4 radio {{if $_SESSION["JQX-DEL-PRO"]==-1}}cked{{/if}}" value="-1">
                    <div class="grid_x w14px mr12 ic" style="height: 14px;"></div>
                    <div class="grid_5 lh16 label">Chỉ hiện dữ liệu đã xóa</div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var FlexiGrid=(function () {
        //Creating the demo window
        var ccontroller="product";
        function _createWindows() {
            console.log("createWindows ↵ Call");
        };
        function _createElements() {
            console.log("createElements ↵ Call");
        };
        function _addEventListeners() {
            console.log("addEventListeners ↵ Call");
            $(window).resize(function(e){ 
                $(".flexigrid").width($("#frmFlexiGrid").width());    
            }); 
            $(".columnsSetings .checkbox").click(function(){
                try{
                    var value=$(this).attr("value");
                    var col=$(this).attr("col");
                    if ($(this).hasClass('cked')) {
                        console.log("Hide column:"+col+" ↵ Call");
                        //$('#FlexiGrid').hideColumn(value);
                        $("#FlexiGrid").flexToggleCol(value,false);//.flexReload();
                        FlexiGrid.DisplayColumnChange(col,1);
                    }else{
                        console.log("Show column:"+col+" ↵ Call");
                        $("#FlexiGrid").flexToggleCol(value,true);//.flexReload();
                        FlexiGrid.DisplayColumnChange(col,0);
                    }
                }catch(e){console.log("Change Display Setting:\nError"+e.message+" ↵ Call");}
                chkb(this);
            });
            $(".displaySetings .radio").click(function(){
                try{
                    var value=$(this).attr("value");
                    console.log("Change Display Setting:"+value+" ↵ Call");
                    FlexiGrid.DisplayChange(value);
                    
                }catch(e){console.log("Change Display Setting:\nError"+e.message+" ↵ Call");}
                rdbck(this);
            });
        };
        //contextMenu
        function _contextMenu(){
            $("#FlexiGrid").contextMenu({
                menu: 'FlexiGridMenu'
            },
            function(action, el, pos) {
                var items = $('.trSelected');
                var ID,url,data;
                if(items.length==1){
                    ID = items[0].id.substr(3);
                    switch(action){
                        case "add":
                            console.log("Content menu : Add\tID:"+ID+" ↵ Call");
                            FlexiGrid.Add();
                            break;
                        case "edit":
                            console.log("Content menu : Edit\tID:"+ID+" ↵ Call");
                            FlexiGrid.Edit(ID);
                            break;
                        case "delete":
                            console.log("Content menu : Delete\tID:"+ID+" ↵ Call");
                            FlexiGrid.Delete(ID);
                            break;
                        case "restore":
                            console.log("Content menu : Restore\tID:"+ID+" ↵ Call");
                            FlexiGrid.Restore(ID);
                            break;
                        case "public":
                            console.log("Content menu : Public\tID:"+ID+" ↵ Call");
                            FlexiGrid.ChangeStatus(ID,"Public");
                            break;
                        case "private":
                            console.log("Content menu : Private\tID:"+ID+" ↵ Call");
                            FlexiGrid.ChangeStatus(ID,"Private");
                            break;
                    }
                }else{
                    ShowNoticeDialogMessage("Không hỗ trợ contact menu với nhiều item được chọn.<br/>Vui lòng chỉ chọn 1 item.");
                }
            });

        }
        //create jqgrid
        function _createGrid() {
            console.log("FlexiGrid Create ↵ Call");
            //http://code.google.com/p/flexigrid/source/browse/trunk/flexigrid.js?r=2
            $("#FlexiGrid").flexigrid({
                url: '{{base_url()}}admin-planners/'+ccontroller+'/FlexiGridData',
                dataType: 'json',
                colModel : {{json_encode($Data["flexigrid_settings"]["colModel"])}},
                buttons : [
                    {name: 'Add'        , bclass: 'add'     , onpress : FlexiGrid.FlexiGridAdd},
                    {name: 'Edit'       , bclass: 'edit'    , onpress : FlexiGrid.FlexiGridEdit},
                    {name: 'Delete'     , bclass: 'delete'  , onpress : FlexiGrid.FlexiGridDelete},
                    {separator: true},
                    {name: 'Search'     , bclass: 'search'  , onpress : FlexiGrid.Filter },
                    {name: 'Settings'   , bclass: 'setting' , onpress : FlexiGrid.Setting}
                ],
                searchitems : {{json_encode($Data["flexigrid_settings"]["filterModel"])}},
                nomsg: 'No data to display',
                usepager: true,
                title: 'Product',
                useRp: true,
                rp: 15,
                showTableToggleBtn: true,
                showToggleBtn: false,
                width: $("#frmFlexiGrid").width(),//960,
                procmsg: 'Processing, please wait ...',
                onSubmit: addFormData,
                height: 400,
                singleSelect: true,
                onSuccess:function(){
                    _contextMenu();
                },
                onRowSelect: function (row, data) { 
                    $('#FlexiGridMenu').enableContextMenuItems();
                    $('#FlexiGridMenu').showContextMenuItems();
                    if(data.Lock==1){ $('#FlexiGridMenu').disableContextMenuItems('#edit,#delete,#restore,#status,#public,#private'); }
                    else{ 
                        try{
                            if(data.Delete.trim()!=""){ $('#FlexiGridMenu').hideContextMenuItems('#delete,#status') }
                            else if(data.Delete.trim()==""){ $('#FlexiGridMenu').hideContextMenuItems('#restore') }
                        }catch(e){ }
                        try{
                            if(data.Status.trim()=="Public"){ $('#FlexiGridMenu').disableContextMenuItems('#public') }
                            else if(data.Status.trim()=="Private"){ $('#FlexiGridMenu').disableContextMenuItems('#private') }
                        }catch(e){ }
                    }
                } 
            });
        };
        return {
            config: {
                dragArea: null,
                theme: 'classic'
            },
            init: function () {
                //Creating all jqxWindgets except the window
                _createElements();
                //Adding jqxWindow
                _createWindows();
                //Adding jqxGrid
                _createGrid();
                //Attaching event listeners
                _addEventListeners();
                //addContextMenu
                //_contextMenu();
            },
            Setting: function () {
                console.log("Setting ↵ Call");
                ShowNoticeDialogMessage($(".frmsetting"), "Tùy Chỉnh");
            },
            Refresh:function (){
                console.log("Refresh ↵ Call");
                $("#FlexiGrid").flexReload();
            },
            Filter:function (){
                console.log("Filter ↵ Call");
                $('.pSearch').click();
            },
            Delete:function (ID){
                if(isrunning)return;
                console.log("Delete:"+ID+" ↵ Call");
                ShowConfirmDialogMessage("Bạn muốn xóa dòng đang chọn?","Delete selected items?",function(){
                    var url,data;
                    url="{{base_url()}}admin-planners/"+ccontroller+"/Delete";
                    data={
                        ID      :   ID
                    }
                    isrunning=true;
                    CloseConfirmDialogMessage();
                    debugAjax(url,data,function(result){
                        isrunning=false;
                        if(result.code>=0){
                            FlexiGrid.Refresh();
                        }else{
                            ShowNoticeDialogMessage(result.msg);
                        }
                    });
                });
            },
            Restore:function (ID){
                if(isrunning)return;
                console.log("Restore:"+ID+" ↵ Call");
                ShowConfirmDialogMessage("Bạn muốn khôi phục dòng đang chọn?","Restore selected items?",function(){
                    var url,data;
                    url="{{base_url()}}admin-planners/"+ccontroller+"/Restore";
                    data={
                        ID      :   ID
                    }
                    isrunning=true;
                    CloseConfirmDialogMessage();
                    debugAjax(url,data,function(result){
                        isrunning=false;
                        if(result.code>=0){
                            FlexiGrid.Refresh();
                        }else{
                            ShowNoticeDialogMessage(result.msg);
                        }
                    });
                });
            },
            Add:function(){
                console.log("Add ↵ Call");
                if(isrunning)return;
                FlexiGrid.ShowDetail();
                htmlAjax("{{base_url()}}admin-planners/"+ccontroller+"/Edit", { }, $("#frmDetail"));
                tab("edit");
            },
            HideDetail:function(){
                //console.log("HideDetail ↵ Call");
                $("#frmFlexiGrid").show();
                $("#frmDetail").hide();
            },
            ShowDetail:function(){
                //console.log("ShowDetail ↵ Call");
                $("#frmFlexiGrid").hide();
                $("#frmDetail").show();
            },
            FlexiGridAdd:function(){
                //console.log("FlexiGridAdd ↵ Call");
                FlexiGrid.Add();
            },
            FlexiGridEdit:function(com,grid){
                console.log("FlexiGridEdit ↵ Call");
                var items = $('.trSelected');
                if(items.length==1){
                    ID = items[0].id.substr(3);
                    FlexiGrid.Edit(ID);
                }else{
                    ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần xóa.");
                }
            },
            FlexiGridDelete:function(com,grid){
                console.log("FlexiGridDelete ↵ Call");
                var items = $('.trSelected');
                if(items.length==1){
                    ID = items[0].id.substr(3);
                    FlexiGrid.Delete(ID);
                }else{
                    ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần xóa.");
                }
            },
            Edit:function (ID){
                if(isrunning)return;
                console.log("Edit:"+ID+" ↵ Call");
                FlexiGrid.ShowDetail();
                htmlAjax("{{base_url()}}admin-planners/"+ccontroller+"/Edit", { ID : ID}, $("#frmDetail"));
                tab("edit");
            },
            CancelEdit:function (){
                console.log("CancelEdit ↵ Call");
                FlexiGrid.HideDetail();
                tab(ccontroller);
            },
            Save:function (){
                if(isrunning)return;
                console.log("Save ↵ Call");
                var ID,Key,Name,Value,link,image,url,data;                                
                ID = $('#txt_id').val()
                Key = $('#txt_key').val()
                Name = $('#txt_name').val()
                url="{{base_url()}}admin-planners/"+ccontroller+"/Save";
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
                        FlexiGrid.CancelEdit();
                        FlexiGrid.Refresh();
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                    }
                });
            },
            ChangeStatus:function (ID,Status){
                console.log("ChangeStatus:\nID:"+ID+"\tStatus:"+Status+" ↵ Call");
                var url,data;
                url="{{base_url()}}admin-planners/"+ccontroller+"/ChangeStatus";
                data={
                    ID      :   ID,
                    Status  :   Status
                }
                isrunning=true;
                debugAjax(url,data,function(result){
                    isrunning=false;
                    if(result.code>=0){
                        FlexiGrid.Refresh();
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                    }
                });
            },
            DisplayChange:function(v){
                if(isrunning)return;
                isrunning=true;
                var url=baseurl+"admin-planners/"+ccontroller+"/ChangeDeleteDisplay/";
                var data={
                    showDelete  :   v
                };
                jqxAjax(url,data,function(result){
                    isrunning=false;
                    if(result.code>=0){
                        FlexiGrid.Refresh();
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                    }
                });
            },
            DisplayColumnChange:function(col,hide){
                if(isrunning)return;
                isrunning=true;
                var url=baseurl+"admin-planners/"+ccontroller+"/ChangeColumnDisplay/";
                var data={
                    col:col,
                    hide  :   hide
                };
                jqxAjax(url,data,function(result){
                    isrunning=false;
                    if(result.code>=0){
                        FlexiGrid.Refresh();
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                    }
                });
            }
        };
    } ());
    //This function adds paramaters to the post of flexigrid. You can add a verification as well by return to false if you don't want flexigrid to submit			
    function addFormData(){
        //passing a form object to serializeArray will get the valid data from all the objects, but, if the you pass a non-form object, you have to specify the input elements that the data will come from
        var dt = $('#sform').serializeArray();
        $("#FlexiGrid").flexOptions({params: dt});
        return true;
    }
	
    $('#sform').submit(function (){
        $('#FlexiGrid').flexOptions({newp: 1}).flexReload();
        return false;
    });
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
    function UpdateItem(){
    
    }

    $(document).ready(function () {
        FlexiGrid.init();
    
    });
  
</script>
