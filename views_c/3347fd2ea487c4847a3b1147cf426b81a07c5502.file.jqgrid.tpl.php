<?php /* Smarty version Smarty-3.1.7, created on 2012-07-25 10:03:32
         compiled from "application\views\daugia\jqgrid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16522500fa854abb314-63116691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3347fd2ea487c4847a3b1147cf426b81a07c5502' => 
    array (
      0 => 'application\\views\\daugia\\jqgrid.tpl',
      1 => 1343203112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16522500fa854abb314-63116691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'jqgrid' => 0,
    'langobj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_500fa854cbebb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_500fa854cbebb')) {function content_500fa854cbebb($_smarty_tpl) {?><script type="text/javascript">
var col_names = [];
var col_model = [];
$(document).ready(function(){
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['url_metadata'];?>
',
		type: 'GET',
		dataType: 'json',
		error: function(){
			//alert('Can not load init jqrip!');
		},
		success: function(data){
			col_names = data.names;
			col_model = data.model;
			$("#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['id'];?>
").jqGrid({ 
				url: '<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['url_data'];?>
',
				datatype: "json",
				mtype: "POST",
				colNames: col_names,
				colModel: col_model,
				height:'auto',
				autowidth: true,
				rowNum:10,
				rowList:[10,20,30],
				pager: '#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['pager'];?>
',
				caption: "<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['caption'];?>
",
				viewrecords: true
			});
			jQuery("#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['id'];?>
").jqGrid(
				'navGrid',
				'#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['pager'];?>
', 
				{view:true, add:false, edit:false, del:false, search:true, refresh: true}, //options
				{}, // edit options 
				{}, // add options 
				{}, // del options 
				{height:'auto',closeAfterSearch:true,multipleSearch:true} // search options 
			).navButtonAdd('#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['pager'];?>
',{
				caption:"<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('create');?>
", 
				buttonicon:"ui-icon-add", 
				onClickButton: function(){ 
					urlGo('<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['url_create'];?>
');
				}, 
				position:"last"
			}).navButtonAdd('#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['pager'];?>
',{
				caption:"<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('edit');?>
", 
				buttonicon:"ui-icon-edit", 
				onClickButton: function(){ 
					var gr = $("#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['id'];?>
").jqGrid('getGridParam', 'selrow');
					if( gr != null ) urlGo('<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['url_edit'];?>
/id/'+gr);
					else alert("<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('please_select');?>
");
				}, 
				position:"last"
			}).navButtonAdd('#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['pager'];?>
',{
				caption:"<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('delete');?>
", 
				buttonicon:"ui-icon-delete", 
				onClickButton: function(){ 
					var gr = $("#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['id'];?>
").jqGrid('getGridParam', 'selrow');
					if( gr != null ){
						confirmUrl("<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('delete_confirm');?>
", '<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['url_delete'];?>
/id/'+gr);
					}
					else alert("<?php echo $_smarty_tpl->tpl_vars['langobj']->value->line('please_select');?>
");
				}, 
				position:"last"
			});
			
			jQuery("#<?php echo $_smarty_tpl->tpl_vars['jqgrid']->value['id'];?>
").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
		}
	});
});
</script><?php }} ?>