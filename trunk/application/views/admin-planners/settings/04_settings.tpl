<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/Flexigrid/css/flexigrid.css">
<script type="text/javascript" src="{{base_url()}}syslib/Flexigrid/js/flexigrid.js"></script>
<script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>

<script src="{{base_url()}}syslib/redactor/redactor.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/redactor/redactor.css">

<script src="{{base_url()}}syslib/contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
<link href="{{base_url()}}syslib/contextMenu/jquery.contextMenu.css" rel="stylesheet" type="text/css" />


<!--<link rel="stylesheet" type="text/css" media="screen" href="{{base_url()}}syslib/elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="{{base_url()}}syslib/elfinder/css/theme.css">
<script type="text/javascript" src="{{base_url()}}syslib/elfinder/js/elfinder.min.js"></script>
<script type="text/javascript" src="{{base_url()}}syslib/elfinder/js/i18n/elfinder.ru.js"></script>-->

<div style="padding-right: 2px;padding-left: 0px;">
    <div id="frmFlexiGrid">
        <table id="FlexiGrid"></table>
    </div>
    <div id="frmDetail" class="tabdetail hidden">
        Loadding...
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
            $("#FlexiGrid,#gadien").contextMenu({
                    menu: 'FlexiGridMenu'
            },
                    function(action, el, pos) {
                    alert(
                            'Action: ' + action + '\n\n' +
                            'Element ID: ' + $(el).attr('id') + '\n\n' + 
                            'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
                            'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
                            );
            });

        }
        //create jqgrid
        function _createGrid() {
            console.log("FlexiGrid Create ↵ Call");
            $("#FlexiGrid").flexigrid({
                url: '{{base_url()}}admin-planners/settings/FlexiGridData',
                dataType: 'json',
                colModel : [
                    {display: '<b>ID</b>'   , name : 'ID'       , width : 60    , sortable : false  , align: 'center'  },
                    {display: 'Key'         , name : 'Key'      , width : 100   , sortable : true   , align: 'left'     , hide: true},
                    {display: 'Name'        , name : 'Name'     , width : 120   , sortable : true   , align: 'left'},
                    {display: 'Value'       , name : 'Value'    , width : 180   , sortable : true   , align: 'left'},
                    {display: 'Type'        , name : 'Type'     , width : 80    , sortable : true   , align: 'left',process: procMe}
                ],
                buttons : [
                    {name: 'Add', bclass: 'add', onpress : HandleEvent},
                    {name: 'Edit', bclass: 'edit', onpress : FlexiGrid.Edit},
                    {name: 'Delete', bclass: 'delete', onpress : FlexiGrid.Delete},
                    {separator: true},
                    {name: 'Search', bclass: 'search', onpress : HandleEvent},
                    {name: 'Settings', bclass: 'setting', onpress : HandleEvent}
                ],
                searchitems : [
                    {display: 'All'     , name : 'All'  , isdefault: true},
                    {display: 'Name'    , name : 'Name' },
                    {display: 'Value'   , name : 'Value'}
                ],
                sortname: "Name",
                sortorder: "ASC",
        
                usepager: false,
                title: 'Settings',
                useRp: true,
                rp: 15,
                showTableToggleBtn: true,
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
                    //alert(row.attr("id"));
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
            },
            Refresh:function (){
                console.log("Refresh ↵ Call");
                $("#FlexiGrid").flexReload();
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

//$('#flex1').flexigrid({onRowSelect:function(e,r){alert(r[0].id);}}); 
function procMe( celDiv, id ) {
$( celDiv ).click( function() {
    //alert( id );
    alert(this.innerHTML); 
});
}
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
<div id="gadien" style="width: 60px;height: 6px;border: 1px solid #ccc;background: #fff;padding: 1px;position: relative;">
    <div style="height: 6px;
         background-image:  -webkit-linear-gradient(left, 
         rgb(5,255,55) 10%, 
         rgb(50,50,255) 20%, 
         rgb(247,8,8) 30%,
         rgb(247,8,8) 40%,
         rgb(247,8,8) 50%,
         rgb(247,8,8) 60%,
         rgb(247,8,8) 70%,
         rgb(247,8,8) 80%,
         rgb(247,8,8) 90%,
         rgb(247,8,8) 100%
         )
         ;
         ">
        &nbsp;
        <div style="position: absolute;top: 1px;right: 1px;height: 6px;width: 10%;background: #fff"
    </div>
</div>