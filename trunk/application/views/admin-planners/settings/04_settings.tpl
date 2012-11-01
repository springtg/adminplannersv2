<table>
    <tr>
        <td style="width: 240px">
            <ul>
                <li>a</li>
                <li>a</li>
                <li>a</li>
                <li>a</li>
            </ul>
        </td>
        <td>
        
        </td>
    </tr>
    
</table>
<link rel="stylesheet" type="text/css" href="{{base_url()}}Flexigrid/css/flexigrid.css">
<script type="text/javascript" src="{{base_url()}}Flexigrid/js/flexigrid.js"></script>

<table id="flex1" style="display:none"></table>
<script type="text/javascript">

$("#flex1").flexigrid({
	url: '{{base_url()}}admin-planners/settings/FlexiGridData',
	dataType: 'json',
	colModel : [
		{display: '<b>ID</b>'      , name : 'ID'       , width : 40    , sortable : false, align: 'center'},
		{display: 'Key'     , name : 'Key'      , width : 180   , sortable : true, align: 'left'},
		{display: 'Name'    , name : 'Name'     , width : 120   , sortable : true, align: 'left'},
		{display: 'Value'   , name : 'Value'    , width : 130   , sortable : true, align: 'left', hide: true},
		{display: 'Type'    , name : 'Type'     , width : 80    , sortable : true, align: 'right',process: procMe}
		],
        buttons : [
		{name: 'Add', bclass: 'add', onpress : test},
                {name: 'Edit', bclass: 'edit', onpress : test},
		{name: 'Delete', bclass: 'delete', onpress : test},
		{separator: true},
                {name: 'Search', bclass: 'search', onpress : test},
                {name: 'Settings', bclass: 'setting', onpress : test}
		],
	searchitems : [
		{display: 'Name'    , name : 'Name'},
		{display: 'Value'   , name : 'Value', isdefault: true}
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
            alert(data.Value);
        } 
});
//$('#flex1').flexigrid({onRowSelect:function(e,r){alert(r[0].id);}}); 
function procMe( celDiv, id ) {
    $( celDiv ).click( function() {
        //alert( id );
        var json; 
        var tds = $(this).find('td'); 
        json = '{"rowid":"' + $(this).attr('id') + '",'; 
        for (var i = 0; i < p.colModel.length; i++) { 
                json += '"' + p.colModel[i].name + '":"' + $(tds[i]).text() + '"'; 
                if ((i + 1) != p.colModel.length) 
                        json += ','; 
        } 
        json += '}'; 
        data = $.parseJSON(json); 
        alert(this.innerHTML); 
    });
}
function test(com, grid) {
        if (com == 'Delete') {
                confirm('Delete ' + $('.trSelected', grid).length + ' items?')
        } else if (com == 'Add') {
                alert('Add New Item');
        } else if (com == 'Edit') {
            var items = $('.trSelected');
            if(items.length==1){
                items=items[0].id.substr(3);
                ShowNoticeDialogMessage("Bạn muốn chỉnh sửa thông tin dòng "+items);
            }else{
                ShowNoticeDialogMessage("Hãy chọn một(chỉ một) dòng cần sửa.");
            }
                
        }
}
//This function adds paramaters to the post of flexigrid. You can add a verification as well by return to false if you don't want flexigrid to submit			
function addFormData(){
	//passing a form object to serializeArray will get the valid data from all the objects, but, if the you pass a non-form object, you have to specify the input elements that the data will come from
	var dt = $('#sform').serializeArray();
	$("#flex1").flexOptions({params: dt});
	return true;
}
	
$('#sform').submit(function (){
	$('#flex1').flexOptions({newp: 1}).flexReload();
	return false;
});
</script>
