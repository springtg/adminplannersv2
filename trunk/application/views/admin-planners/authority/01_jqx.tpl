<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.classic.css" type="text/css" />
<script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/jqx-all.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/fix_jqxGrid/fix_jqxGrid.css" type="text/css" />

<script type="text/javascript">
    var Authority = (function () {
        //Adding event listeners

        function _addEventListeners() {

       

        };
        //Creating all page elements which are jqxWidgets
        function _createElements() {
            var theme=Authority.config.theme;
       
        };
        //Creating the demo window
        function _createWindow() {
            var theme=Authority.config.theme;
        
        };
        //create jqgrid
        function _createGrid() {
            var theme=Authority.config.theme;
            var source ={
                datatype: "json",
                datafields: [
                    { name: 'Authority', type: 'string'},
                    { name: 'Name',type:'string'},
                    { name: 'Value',type:'string'},
                    { name: 'Note',type:'string'},
                    { name: 'Insert',type: 'date'},
                    { name: 'Update',type: 'date'}
                    
                ],
                url: baseurl+'admin-planners/authority/jqxgrid_authority/',
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
                    Authority = $.parseJSON(value);
                    str+="\
                <div onclick=\"Authority.HistoryDetail('"+Authority.AuthorityID+"');\" \
                class='icon16 detail_icon hover50' title='Lịch sử quay số'></div>\
            ";
                    str+="\
                <div onclick=\"Authority.LogDetail('"+Authority.AuthorityID+"');\" \
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
                    { text: ''          , datafield: 'Authority',cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'Name'      , datafield: 'Name'     ,width:200  },
                    { text: 'Value'     , datafield: 'Value'    ,width:80},
                    { text: 'Note'      , datafield: 'Note'     },
                    { text: 'Insert'    , datafield: 'Insert'   ,cellsformat: 'yyyy-MM-dd',width:100},
                    { text: 'Update'    , datafield: 'Update'   ,cellsformat: 'yyyy-MM-dd',width:100}
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
        Authority.init();
    });
        
</script>
<div style="padding-right: 2px;padding-left: 0px;">
    <div id='jqxWidget' style="position: relative;">
        <div id="jqxgrid"></div>
    </div>
</div>


