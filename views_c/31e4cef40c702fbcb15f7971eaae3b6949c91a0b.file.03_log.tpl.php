<?php /* Smarty version Smarty-3.1.7, created on 2012-10-08 10:40:04
         compiled from "application\views\quayso_ngaokiem\adbi\pr\03_log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2262502b53423fbd11-31803675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31e4cef40c702fbcb15f7971eaae3b6949c91a0b' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\pr\\03_log.tpl',
      1 => 1349663811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2262502b53423fbd11-31803675',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_502b53423fcb4',
  'variables' => 
  array (
    'configs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_502b53423fcb4')) {function content_502b53423fcb4($_smarty_tpl) {?>    <link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.4.2/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
    <link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.4.2/jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.4.2/jqwidgets/jqx-all.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>
syslib/fix_jqxGrid/fix_jqxGrid.css" type="text/css" />
    
    <script type="text/javascript">
        var Product = (function () {
    //Adding event listeners

    function _addEventListeners() {

       

    };
    //Creating all page elements which are jqxWidgets
    function _createElements() {
        var theme=Product.config.theme;
       
    };
    //Creating the demo window
    function _createWindow() {
        var theme=Product.config.theme;
        
    };
    //create jqgrid
    function _createGrid() {
        var theme=Product.config.theme;
        var source ={
            datatype: "json",
            datafields: [
                    { name: '_productname_', type: 'string'},
                    { name: '_log_',type:'string'},
                    { name: '_insert_',type: 'date'}
                    
            ],
            url: baseurl+'quayso_ngaokiem/product/jqgrid_data_log_product/<?php echo $_smarty_tpl->tpl_vars['configs']->value["productid"];?>
',
            filter: function(){
                    $("#jqxgrid").jqxGrid('updatebounddata');
                    //$('#grid').jqxGrid('refreshdata');
                    //$('#grid').jqxGrid('refresh');
            },
            sort: function(){
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
                    //$('#grid').jqxGrid('refresh');
            },
            root: 'Rows',
            beforeprocessing: function(data){		
                    source.totalrecords = data[0].TotalRows;					
            }
        };	

        var dataadapter = new $.jqx.dataAdapter(source, {
                            loadError: function(xhr, status, error)
                            {
                                //alert("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+error+"<br/>");
                                
                            }
                    }
            );
        
        // initialize jqxGrid
        $("#jqxgrid").jqxGrid(
        {	
            width:'100%',
            source: dataadapter,
            theme: theme,
            showstatusbar: false,
            autoheight: false,
            sortable: true,
            ready: function () {
                //addfilter();
                //datefiter();
            },
            rendergridrows: function(obj)
            {
                return obj.data;    
            },
            //showfilterrow: true,
            filterable: true,
//            groupable: true,
//            groupsexpandedbydefault: true,
            pageable: true,
            virtualmode: true,
            columns: [
                    { text: 'Name'      , datafield: '_productname_' ,width:120  },
                    { text: 'Log'    , datafield: '_log_' },
                    { text: 'Insert'    , datafield: '_insert_' ,cellsformat: 'yyyy-MM-dd',width:160}
            ]
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
            _createWindow();
            //Adding jqxGrid
            _createGrid();
            //Attaching event listeners
            _addEventListeners();
        }
    };
} ());

        $(document).ready(function () {
            Product.init();
        });
        
    </script>
    <div style="padding-right: 2px;padding-left: 0px;">
        <div id='jqxWidget' style="position: relative;">
            <div id="jqxgrid"></div>
        </div>
    </div>
    
         
    <?php }} ?>