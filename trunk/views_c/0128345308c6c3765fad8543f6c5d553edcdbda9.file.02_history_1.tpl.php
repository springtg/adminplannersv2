<?php /* Smarty version Smarty-3.1.7, created on 2012-09-10 06:38:01
         compiled from "application\views\quayso_ngaokiem\adbi\pr\02_history_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27830504d6e52a86366-00152804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0128345308c6c3765fad8543f6c5d553edcdbda9' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\pr\\02_history_1.tpl',
      1 => 1347251880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27830504d6e52a86366-00152804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_504d6e530558c',
  'variables' => 
  array (
    '_SESSION' => 0,
    'configs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504d6e530558c')) {function content_504d6e530558c($_smarty_tpl) {?>    <script type="text/javascript">
        
        $(document).ready(function () {
            <?php if (!isset($_smarty_tpl->tpl_vars['_SESSION']->value["USER"])){?>
                LoginFRM._show();
            <?php }?>
            ProductHistory2.init("<?php echo $_smarty_tpl->tpl_vars['configs']->value["product"];?>
");
            $("#jqxCheckboxshowhide").jqxCheckBox({ width: 120, height: 25, theme: "classic",checked:true });
            $("#jqxCheckboxshowhide").bind('change', function (event) {
                var checked = event.args.checked;
                if (checked) {
                    $('#jqxgrid').jqxGrid('clear');
                    $("#jqxgrid").jqxGrid({ source: getsource_("<?php echo $_smarty_tpl->tpl_vars['configs']->value["product"];?>
","show") });
                }
                else {
                    $('#jqxgrid').jqxGrid('clear');
                    $("#jqxgrid").jqxGrid({ source: getsource_("<?php echo $_smarty_tpl->tpl_vars['configs']->value["product"];?>
","hide") });
                }
            });
        });
        function getsource_(product,status){
        var source ={
            datatype: "json",
            datafields: [
                    { name: '_id_', type: 'string'},
                    { name: '_username_',type:'string'},
                    { name: '_server_',type:'string'},
                    { name: '_charactor_',type:'string'},
                    { name: '_productname_',type:'string'},
                    { name: '_gifcode_',type:'string'},
                    { name: '_status_',type:'status'},
                    { name: '_insert_',type: 'date'}
                    
            ],
            url: status=="show"?base_url+'quayso_ngaokiem/product/jqgrid_data_history/'+product:base_url+'quayso_ngaokiem/product/jqgrid_data_history/'+product+"/hide",
            filter: function(){
                    $("#jqxgrid").jqxGrid('updatebounddata');
            },
            sort: function(){
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
            },
            root: 'Rows',
            beforeprocessing: function(data){		
                    source.totalrecords = data[0].TotalRows;					
            }
        };
        var dataadapter = new $.jqx.dataAdapter(source, {
                            loadError: function(xhr, status, error)
                            {
                                $('#window-error').jqxWindow('setContent',"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+error+"<br/>");
                                $('#window-error').jqxWindow('open');
                            }
                    }
            );
                return dataadapter;
    }
    </script>
    <div style="padding-right: 22px;padding-left: 20px;">
        <div id='jqxWidget' style="position: relative;">
            <div id="jqxgrid"></div>
            <div
                 
                style="padding: 0px; margin-top: 0px; margin-right: 3px; 
                position: absolute;bottom: 2px;left: 4px;height: 20px"
                >
                <div id="jqxCheckboxshowhide">
                Ẩn/Hiện phần thưởng đã gửi
                </div>
            </div>
        </div>
    </div>
   <?php }} ?>