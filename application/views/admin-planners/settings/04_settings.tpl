<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/Flexigrid/css/flexigrid.css">
<script type="text/javascript" src="{{base_url()}}syslib/Flexigrid/js/flexigrid.js"></script>
<script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>

<script src="{{base_url()}}syslib/redactor/redactor.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{base_url()}}syslib/redactor/redactor.css">

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" media="screen" href="{{base_url()}}syslib/elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="{{base_url()}}syslib/elfinder/css/theme.css">

<!-- elFinder JS (REQUIRED) -->
<script type="text/javascript" src="{{base_url()}}syslib/elfinder/js/elfinder.min.js"></script>

<!-- elFinder translation (OPTIONAL) -->
<script type="text/javascript" src="{{base_url()}}syslib/elfinder/js/i18n/elfinder.ru.js"></script>

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
        };
        function _createElements() {
        };
        function _addEventListeners() {
        };
        //create jqgrid
        function _createGrid() {
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
            },
            Setting: function () {
            },
            Refresh:function (){
            },
            Delete:function (ID){
            },
            Restore:function (ID){
            },
            Edit:function (ID){
            },
            CancelEdit:function (){
            },
            Save:function (){
            },
            ChangeStatus:function (ID,Status){
            }
        };
    } ());
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
                {name: 'Edit', bclass: 'edit', onpress : HandleEvent},
		{name: 'Delete', bclass: 'delete', onpress : HandleEvent},
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
        
	usepager: true,
	title: 'Settings',
	useRp: true,
	rp: 15,
	showTableToggleBtn: true,
	width: 480,
	onSubmit: addFormData,
	height: 200,
        singleSelect: true,
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
   
</script>
