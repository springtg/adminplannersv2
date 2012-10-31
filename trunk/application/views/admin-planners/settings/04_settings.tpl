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
		{display: 'ID'      , name : 'ID'       , width : 40    , sortable : true, align: 'center'},
		{display: 'Key'     , name : 'Key'      , width : 180   , sortable : true, align: 'left'},
		{display: 'Name'    , name : 'Name'     , width : 120   , sortable : true, align: 'left'},
		{display: 'Value'   , name : 'Value'    , width : 130   , sortable : true, align: 'left', hide: true},
		{display: 'Type'    , name : 'Type'     , width : 80    , sortable : true, align: 'right'}
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
	width: 700,
	onSubmit: addFormData,
	height: 200
});

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
