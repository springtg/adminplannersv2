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
            <div class="mr4 ml-1" style="border: 1px solid #ccc">
                <div class="lh20 fwb pl12 mb4" style="background: #ddd">Tùy chỉnh hiện thị cột</div>
                <div class="grid_x pb4 ml4 checkbox" onclick="chkb(this);">
                    <div class="grid_x w16px mr12 ic" style="height: 16px;"></div>
                    <div class="grid_5 lh16 label">Name</div>
                </div>
                <div class="grid_x pb4 ml4 checkbox cked" onclick="chkb(this);">
                    <div class="grid_x w16px mr12 ic " style="height: 16px;"></div>
                    <div class="grid_5 lh16 label">Keyword</div>
                </div>
                <div class="grid_x pb4 ml4 checkbox" onclick="chkb(this);">
                    <div class="grid_x w16px mr12 ic" style="height: 16px;"></div>
                    <div class="grid_5 lh16 label">Note</div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="grid_6" >
            <div class="ml4 mr-1" style="border: 1px solid #ccc">
                <div class="lh20 fwb pl12 mb4" style="background: #ddd">Tùy chỉnh hiện thị dữ liệu</div>
                <div class="grid_x pb4 ml4 radio" onclick="rdbck(this)">
                    <div class="grid_x w14px mr12 ic" style="height: 14px;"></div>
                    <div class="grid_5 lh16 label">Hiện tất cả dữ liệu</div>
                </div>
                <div class="grid_x pb4 ml4 radio cked" onclick="rdbck(this)">
                    <div class="grid_x w14px mr12 ic " style="height: 14px;"></div>
                    <div class="grid_5 lh16 label">Ẩn dữ liệu đã xóa</div>
                </div>
                <div class="grid_x pb4 ml4 radio" onclick="rdbck(this)">
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
        function _createWindows() {
            console.log("createWindows ↵ Call");
        };
        function _createElements() {
            console.log("createElements ↵ Call");
        };
        function _addEventListeners() {
            console.log("addEventListeners ↵ Call");
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
                    }
                    alert(
                        'Action: ' + action + '\n\n' +
                        'Element ID: ' + $(el).attr('id') + '\n\n' + 
                        'FlexiGrid Row ID: ' + ID + '\n\n' +
                        'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
                        'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
                    );
            });

        }
        //create jqgrid
        function _createGrid() {
            console.log("FlexiGrid Create ↵ Call");
            //http://code.google.com/p/flexigrid/source/browse/trunk/flexigrid.js?r=2
            $("#FlexiGrid").flexigrid({
                url: '{{base_url()}}admin-planners/authority/FlexiGridData',
                dataType: 'json',
                colModel : [
                    {display: 'ID'          , name : 'ID'       , width : 60    , sortable : false  , align: 'center'  },
                    {display: 'Name'        , name : 'Name'     , width : 100   , sortable : true   , align: 'left'     },
                    {display: 'Keyword'     , name : 'Keyword'  , width : 100   , sortable : true   , align: 'left'},
                    {display: 'Value'       , name : 'Value'    , width : 60    , sortable : true   , align: 'left'},
                    {display: 'Note'        , name : 'Note'     , width : 180   , sortable : true   , align: 'left'},
                    {display: 'Insert'      , name : 'Insert'   , width : 80    , sortable : true  , align: 'right'  },
                    {display: 'Update'      , name : 'Update'   , width : 80    , sortable : true  , align: 'right'  , hide: true},
                    {display: 'Delete'      , name : 'Delete'   , width : 80    , sortable : true  , align: 'right'  , hide: false},
                    {display: 'Lock'        , name : 'Lock'   , width : 80    , sortable : true  , align: 'right'  , hide: false}
                ],
                buttons : [
                    {name: 'Add'        , bclass: 'add'     , onpress : HandleEvent},
                    {name: 'Edit'       , bclass: 'edit'    , onpress : FlexiGrid.Edit},
                    {name: 'Delete'     , bclass: 'delete'  , onpress : FlexiGrid.Delete},
                    {separator: true},
                    {name: 'Search'     , bclass: 'search'  , onpress : FlexiGrid.Filter },
                    {name: 'Settings'   , bclass: 'setting' , onpress : FlexiGrid.Setting}
                ],
                searchitems : [
                    {display: 'All'     , name : 'All'  , isdefault: true},
                    {display: 'Name'    , name : 'Name' },
                    {display: 'Keyword'   , name : 'Keyword'},
                    {display: 'Note'   , name : 'Note'}
                ],
                sortname: "Name",
                sortorder: "ASC",
                nomsg: 'No data to display',
                usepager: true,
                title: 'Authority',
                useRp: true,
                rp: 15,
                showTableToggleBtn: true,
                showToggleBtn: false,
                width: 480,
                onSubmit: addFormData,
                height: 200,
                singleSelect: true,
                onSuccess:function(){
                    _contextMenu();
                },
                onRowSelect: function (row, data) { 
                    if (data == null) { 
                        selectedRow = null; 
                        selectedRowData = null;
                
                        //$('#btnEditBudget').attr('disabled', 'disabled'); 
                    } 
                    else { 
                        selectedRow = row; 
                        selectedRowData = data; 
                        //$('#btnEditBudget').removeAttr('disabled'); 
                    }
                    $('#FlexiGridMenu').enableContextMenuItems();
                    if(data.Lock==1){ $('#FlexiGridMenu').disableContextMenuItems('#edit,#delete,#restore'); }
                    else if(data.Delete.trim()!=""){ $('#FlexiGridMenu').disableContextMenuItems('#delete') }
                    else if(data.Delete.trim()==""){ $('#FlexiGridMenu').disableContextMenuItems('#restore') }
                    $('#FlexiGridMenu').disableContextMenuItems('#cut,#copy,#paste');
                    //alert(data.Value);
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
                ShowConfirmDialogMessage($(".frmsetting"), "Tùy Chỉnh");
            },
            Refresh:function (){
                console.log("Refresh ↵ Call");
                $("#FlexiGrid").flexReload();
            },
            Filter:function (){
                console.log("Filter ↵ Call");
                $('.pSearch').click();
            },
            Delete:function (com, grid){
                console.log("Delete ↵ Call");
                var items = $('.trSelected');
                if(items.length==1){
                    ShowConfirmDialogMessage("Bạn muốn xóa dòng đang chọn?","Delete selected items?",function(){
                        var ID,url,data;
                        ID = items[0].id.substr(3);
                        url="{{base_url()}}admin-planners/settings/Delete";
                        data={
                            ID      :   ID
                        }
                        isrunning=true;
                        debugAjax(url,data,function(result){
                            isrunning=false;
                            if(result.code>=0){
                                CloseConfirmDialogMessage();
                                FlexiGrid.Refresh();
                            }else{
                                ShowNoticeDialogMessage(result.msg);
                            }
                        });
                    });
                }else{
                    ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần xóa.");
                }
            },
            Restore:function (ID){
                
                console.log("Restore ↵ Call");
            },
            Add:function(){},
            Edit:function (com, grid){
                console.log("Edit ↵ Call");
                var items = $('.trSelected');
                if(items.length==1){
                    items=items[0].id.substr(3);
                    removeEditorContent("txt_value");
                    htmlAjax("{{base_url()}}admin-planners/settings/Edit", { ID : items}, $("#frmDetail"))
                    $("#frmFlexiGrid").hide();
                    $("#frmDetail").show();

                }else{
                    ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần sửa.");
                }
            },
            CancelEdit:function (){
                console.log("CancelEdit ↵ Call");
                $("#frmFlexiGrid").show();
                $("#frmDetail").hide();
            },
            Save:function (){
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
                        FlexiGrid.CancelEdit();
                        FlexiGrid.Refresh();
                    }else{
                        ShowNoticeDialogMessage(result.msg);
                    }
                });
            },
            ChangeStatus:function (ID,Status){
                console.log("ChangeStatus ↵ Call");
            }
    };
} ());

function HandleEvent(com, grid) {
if (com == 'Delete') {
    var items = $('.trSelected');
    if(items.length==1){
        items=items[0].id.substr(3);
        ShowNoticeDialogMessage("Bạn muốn xóa dòng đang chọn? ");
    }else{
        ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần xóa.");
    }
} else if (com == 'Add') {
            
} else if (com == 'Edit') {
    var items = $('.trSelected');
    if(items.length==1){
        items=items[0].id.substr(3);
        removeEditorContent("txt_value");
        htmlAjax("{{base_url()}}admin-planners/settings/Edit", { ID : items}, $("#frmDetail"))
        $("#frmFlexiGrid").hide();
        $("#frmDetail").show();
                
    }else{
        ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần sửa.");
    }
                
}
}
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
