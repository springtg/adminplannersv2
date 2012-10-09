/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var Product = (function () {
    //Adding event listeners

    function _addEventListeners() {

        $('#window').bind('resizing', function (event) {
            $('#tab').jqxTabs('height', $('#windowContent').height() - 3);
        });

    };
    //Creating all page elements which are jqxWidgets
    function _createElements() {
        var theme=Product.config.theme;
        $('#window .showWindowButton').jqxButton({ theme: theme, height: '25px', width: '65px' });
        $('#tab').jqxTabs({ height: 258, theme: theme });
    };
    //Creating the demo window
    function _createWindow() {
        var theme=Product.config.theme;
        $('#window').jqxWindow({
            autoOpen: false,showCollapseButton: true, maxHeight: 500, maxWidth: 720, 
            minHeight: 240, minWidth: 300, width: 400, theme: theme 
        });
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
                    { name: '_game_',type:'string'},
                    { name: '_pecent_',type:'string'},
                    { name: '_insert_',type: 'date'},
                    { name: '_update_',type: 'date'}
                    
            ],
            url: base_url+'quayso_ngaokiem/product/jqgrid_data/',
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
        var linkrenderer = function (row, column, value) {
            var str="<span style='margin: 4px; float: left;'>";
            try{
                value = $.parseJSON(value);
                str+="\
                    <div onclick=\"Product.Detail_row('"+value._id_+"');\" \
                    class='icon16 detail_icon hover50' title='Detail'></div>\
                ";
            }catch(e){}
            str+="</span>";
            return str;
        }
        // initialize jqxGrid
        $("#jqxgrid").jqxGrid(
        {	
            width:'920px',
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
            groupable: true,
            groupsexpandedbydefault: true,
            pageable: true,
            virtualmode: true,
            columns: [
                    { text: ''          ,datafield: '_id_',cellsrenderer: linkrenderer         },
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
        Detail_row:function (id){
            window.location=base_url+'quayso_ngaokiem/product/history/'+id;
        }
    };
} ());
