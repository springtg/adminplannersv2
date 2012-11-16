<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/Flexigrid/css/flexigrid.css">
<script type="text/javascript" src="{{base_url()}}syslib/Flexigrid/js/flexigrid.js"></script>
<script src="{{base_url()}}syslib/contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
<link href="{{base_url()}}syslib/contextMenu/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/browse.js"></script>
<div style="padding-right: 2px;padding-left: 0px;">
    <div id="frmFlexiGrid">
        <table id="FlexiGrid"></table>
    </div>
    <div id="frmDetail" class="tabdetail hidden">
        Loadding...
    </div>
</div>
<ul id="FlexiGridMenu" class="contextMenu hidden">
    <li class="add"><a href="#add">Add</a></li>
    <li class="edit"><a href="#edit">Edit</a></li>
    <li class="delete"><a href="#delete">Delete</a></li>
    <li class="restore"><a href="#restore">Restore</a></li>
    <li class="status separator more"><a href="#status">Status</a>
        <ul>
            <li class="private"><a href="#private">Private</a></li>
            <li class="public"><a href="#public">Public</a></li>
        </ul>
    </li>
    <li class="quit separator"><a href="#quit">Quit</a></li>
</ul>
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
    var areaContent;
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
            if($("#FlexiGridMenu").length){
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
                rp: 20,
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
                removeEditorContent("txtContent");
            },
            Save:function (){
                var AlbumItems =$("#AlbumItems img").map(function() {
                    return $(this).attr("src");
                });
                if(isrunning)return;
                console.log("Save ↵ Call");
                var ID,ProductName,ProductTitle,ProductImage,Category,Supplier,
                Amount,QuantityPerUnit,UnitPrice,UnitOnOrder,StartDate,EndDate,
                Tag,Feature,Content,Album;                                
                ID = $('#txtID').val();
                ProductName = $('#txtProductName').val();
                ProductTitle = $('#txtTitle').val();
                ProductImage = $('#txtImage').val();
                Category = $('#cbxCategory').val();
                Supplier = $('#txtSupplier').val();
                QuantityPerUnit = $('#txtQuantity').val();
                UnitPrice = $('#txtUnitPrice').val();
                UnitOnOrder = $('#txtUnitOnOrder').val();
                StartDate = $('#txtStartDate').val();
                EndDate = $('#txtEndDate').val();
                Amount = $('#txtAmount').val();
                Tag = $('#txtTag').val();
                Feature = $('#txtFeature').val();
                Content = areaContent.instanceById('txtContent').getContent();//$('#txtContent').getCode();
                Album=new Array();
                for(var i=0;i<AlbumItems.length;i++){
                    Album[i]=AlbumItems[i];
                }
                var url="{{base_url()}}admin-planners/"+ccontroller+"/Save";
                var data={
                    ID              :   ID,
                    ProductName     :   ProductName,
                    ProductTitle    :   ProductTitle,
                    Image           :   ProductImage,
                    Category        :   Category,
                    Supplier        :   Supplier,
                    QuantityPerUnit :   QuantityPerUnit,
                    UnitPrice       :   UnitPrice,
                    UnitOnOrder     :   UnitOnOrder,
                    StartDate       :   StartDate,
                    EndDate         :   EndDate,
                    Amount          :   Amount,
                    Tag             :   Tag,
                    Feature         :   Feature,
                    Content         :   Content,
                    Album           :   Album
                }
                console.log(data);
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
    function DelAlbumItem(obj){
        $(obj).parents("div.AlbumItem").remove();
    }
    function AddAlbumItem(){
        var AlbumItems =$("#AlbumItems");
        var srcImg=$("#txtAddImage").val();
        if(!_FcheckFilled(srcImg)){return}
        var AlbumItem=
        '<div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">\
            <div class="pt1 pb1 pl1 pr1">\
                <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">\
                    Album item\
                </h4>\
                <div class="pa r8 t8">\
                    <span style="cursor: pointer" onclick="DelAlbumItem(this)">Del</span>\
                </div>\
                <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">\
                    <img class="w100pc" src="'+srcImg+'"/>\
                </div>\
            </div>\
        </div>';
        AlbumItems.append(AlbumItem);
    }
    function GenAlbumItemFromContent(){
        var AlbumItems =$("#AlbumItems");
        $("#tdContent .nicEdit-main img").each(function(){
            var srcImg=$(this).attr("src");
            var AlbumItem=
            '<div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">\
                <div class="pt1 pb1 pl1 pr1">\
                    <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">\
                        Album item\
                    </h4>\
                    <div class="pa r8 t8">\
                        <span style="cursor: pointer" onclick="DelAlbumItem(this)">Del</span>\
                    </div>\
                    <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">\
                        <img class="w100pc" src="'+srcImg+'"/>\
                    </div>\
                </div>\
            </div>';
            AlbumItems.append(AlbumItem);
        });
    }
    function getAlias(){
        var url=baseurl+"sys/excution/getAlias";
        var data={
            string:$("#txtProductName").val()
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code>=0){
                    $("#txtAlias").val(result.msg);
                }
            }catch(err){
                
            }
        });
    }
</script>
