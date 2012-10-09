<?php /* Smarty version Smarty-3.1.7, created on 2012-10-08 10:22:53
         compiled from "application\views\quayso_ngaokiem\adbi\pr\02_history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5683502a017563aa44-29640708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b43d1608f059dbf2b3d305c674ea9386eb130e8' => 
    array (
      0 => 'application\\views\\quayso_ngaokiem\\adbi\\pr\\02_history.tpl',
      1 => 1349662971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5683502a017563aa44-29640708',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_502a01756711c',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_502a01756711c')) {function content_502a01756711c($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
<link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.classic.css" type="text/css" />
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
            var statusderer = function (row, column, value) {
                var str="<span class='showandhide' style='margin: 4px; float: left;'>";
                try{
                    if(value=="send"){
                        str+="\
                <span class='hideifhover' style='color:blue;'>Đã Gửi</span>\
                <span class='showifhover'><a href=\"javascript:ProductHistory.changeStatusRow('"+row+"','');\"><span style='color:blue;'>Đã gửi </span> <span style='color:#000;'>→ Chưa gửi</span></a></span>\
                ";
                    }else if(value=="unsend"){
                        str+="\
                <span class='hideifhover'>Chưa Gửi</span>\
                <span class='showifhover'><a href=\"javascript:ProductHistory.changeStatusRow('"+row+"','send');\"><span style='color:#000;'>Chưa gửi → </span> <span style='color:blue;'>Đã gửi</span></a></span>\
                ";
                    }
                }catch(e){ }
                str+="</span>";
                return str;
            }
            var source ={
                datatype: "json",
                datafields: [
                    { name: '_id_', type: 'string'},
                    { name: '_username_',type:'string'},
                    { name: '_server_',type:'string'},
                    { name: '_charactor_',type:'string'},
                    { name: '_productname_',type:'string'},
                    { name: '_gifcode_',type:'string'},
                    { name: '_status_',type:'string'},
                    { name: '_insert_',type: 'string'}
                    
                ],
                url: baseurl+'quayso_ngaokiem/product/jqgrid_data_history/',
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
                    alert("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+error+"<br/>");
                                
                }
            }
        );
            var statusrenderer = function (row, column, value) {
                var str="<span class='showandhide' style='margin: 4px; float: left;'>";
                try{
                    var status = $.parseJSON(value);
                    if(status._status_=="sended"){
                        str+="\
            <span class='hideifhover' style='color:blue;'>Đã Gửi</span>\
            <span class='showifhover'><a href=\"javascript:Product.changeStatusRow('"+status._id_+"','unsend');\"><span style='color:blue;'>Đã gửi </span> <span style='color:#000;'>→ Chưa gửi</span></a></span>\
            ";
                    }else if(status._status_=="none" || status._status_=="unsend"){
                        str+="\
            <span class='hideifhover'>Chưa Gửi</span>\
            <span class='showifhover'><a href=\"javascript:Product.changeStatusRow('"+status._id_+"','sended');\"><span style='color:#000;'>Chưa gửi → </span> <span style='color:blue;'>Đã gửi</span></a></span>\
            ";
                    }
                }catch(e){ }
                str+="</span>";
                return str;
            }
            var linkrenderer = function (row, column, value) {
                var str="<span style='margin: 4px; float: left;'>";
                try{
                    value = $.parseJSON(value);
                    str+="\
                <div onclick=\"Product.Detail_row('"+value._id_+"');\" \
                class='icon16 detail_icon hover50' title='Detail'></div>\
            ";
                }catch(e){ }
                str+="</span>";
                return str;
            }
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {	
                width:'100%',
                height:'500px',
                source: dataadapter,
                theme: theme,
                filterable: true,
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
                autoshowfiltericon: true,
                //            groupable: true,
                //            groupsexpandedbydefault: true,
                pageable: true,
                pagesize:20,
                pagesizeoptions: [20,50, 100, 200],
                editable :true,
                virtualmode: true,
                columns: [
                    { text: ''           },
                    { text: 'User Name'      , datafield: '_username_' ,editable :true  },
                    { text: 'Server'    , datafield: '_server_',editable :true},
                    { text: 'Charactor'    , datafield: '_charactor_'  ,editable :true},
                    { text: 'Product'    , datafield: '_productname_' ,editable :true},
                    { text: 'Gifcode'    , datafield: '_gifcode_',editable :false},
                    { text: 'Status'    , datafield: '_status_',cellsrenderer:statusrenderer,editable :false},
                    { text: 'Insert'    , datafield: '_insert_' ,cellsformat: 'yyyy-MM-dd',width:160,editable :false}
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
            changeStatusRow:function (id){
                alert(id);
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