<?php /* Smarty version Smarty-3.1.7, created on 2012-10-08 13:01:42
         compiled from "application\views\quayso_ngaokiem\adbi\pr\01_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97245029c9d5567165-54021413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca0ab45ee02228441c1c439dc9c5a3a4b0fb42d' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\pr\\01_product.tpl',
      1 => 1349666634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97245029c9d5567165-54021413',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5029c9d570fc9',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5029c9d570fc9')) {function content_5029c9d570fc9($_smarty_tpl) {?>    <link rel="stylesheet" href="<?php echo base_url();?>
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
                    { name: '_id_', type: 'string'},
                    { name: '_name_',type:'string'},
                    { name: '_amount_',type:'string'},
                    { name: '_active_',type:'string'},
                    { name: '_pecent_',type:'string'},
                    { name: '_insert_',type: 'date'},
                    { name: '_update_',type: 'date'}
                    
            ],
            url: baseurl+'quayso_ngaokiem/product/jqgrid_data/',
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
        var linkrenderer = function (row, column, value) {
            var str="<span style='margin: 4px; float: left;'>";
            try{
                value = $.parseJSON(value);
                str+="\
                    <div onclick=\"Product.HistoryDetail('"+value._id_+"');\" \
                    class='icon16 detail_icon hover50' title='Lịch sử quay số'></div>\
                ";
                str+="\
                    <div onclick=\"Product.LogDetail('"+value._id_+"');\" \
                    class='icon16 log_icon hover50' title='Lịch sử ghi vết'></div>\
                ";
            }catch(e){ }
            str+="</span>";
            return str;
        }
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
                    { text: ''          ,datafield: '_id_',cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'Name'      , datafield: '_name_'   },
                    { text: 'Amount'    , datafield: '_amount_' ,width:80},
                    { text: 'Active'    , datafield: '_active_' ,width:80 },
                    { text: 'Pecent'    , datafield: '_pecent_' ,width:80 },
                    { text: 'Insert'    , datafield: '_insert_' ,cellsformat: 'yyyy-MM-dd',width:160},
                    { text: 'Update'    , datafield: '_update_' ,cellsformat: 'yyyy-MM-dd',width:160}
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
        },
        LogDetail:function (id){
            window.location=baseurl+'quayso_ngaokiem/product/log/'+id;
        },
        HistoryDetail:function (id){
            window.location=baseurl+'quayso_ngaokiem/product/history/'+id;
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