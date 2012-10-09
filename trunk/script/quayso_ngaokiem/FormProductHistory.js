/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var ProductHistory = (function () {
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
    function getsource(product){
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
                    { name: '_insert_',type: 'string'}
                    
            ],
            url: base_url+'quayso_ngaokiem/product/jqgrid_data_history/'+product,
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
    function _createGrid(product) {
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
            }catch(e){}
            str+="</span>";
            return str;
        }
        
        // initialize jqxGrid
        $("#jqxgrid").jqxGrid(
        {	
            width:'920px',
            source: getsource(product),
            theme: theme,
            sortable: true,
            pageable: true,
            autoheight: true,
            editable :true,
            filterable: true,
            autoshowfiltericon: true,
            pagesize:20,
            pagesizeoptions: [20,50, 100, 200],
            rendergridrows: function(obj)
            {
                return obj.data;    
            },
            virtualmode: true,
            columns: [
                    { text: ''           },
                    { text: 'User Name'      , datafield: '_username_' ,editable :true  },
                    { text: 'Server'    , datafield: '_server_',editable :false},
                    { text: 'Charactor'    , datafield: '_charactor_'  ,editable :false},
                    { text: 'Product'    , datafield: '_productname_' ,editable :false},
                    { text: 'Gifcode'    , datafield: '_gifcode_',editable :false},
                    { text: 'Status'    , datafield: '_status_',cellsrenderer:statusderer,editable :false},
                    { text: 'Insert'    , datafield: '_insert_' ,cellsformat: 'yyyy-MM-dd',width:160,editable :false}
            ]
        });
    };
    return {
        config: {
            dragArea: null,
            theme: 'classic'
        },
        init: function (product) {
            //Creating all jqxWindgets except the window
            _createElements();
            //Adding jqxWindow
            _createWindow();
            //Adding jqxGrid
            _createGrid(product);
            //Attaching event listeners
            _addEventListeners();
        },
        changeStatusRow:function (row,status){
            changeStatus(row,status);
        }
    };
} ());
var ProductHistory2 = (function () {
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
    function getsource(product){
        var source ={
            datatype: "json",
            datafields: [
                    { name: '_insert_',type: 'string'},
                    { name: '_sl_',type: 'int'}
            ],
            url: base_url+'quayso_ngaokiem/product/jqgrid_data_history2/'+product,
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
    function _createGrid(product) {
        var theme=Product.config.theme;
        
        // initialize jqxGrid
        $("#jqxgrid").jqxGrid(
        {	
            width:'920px',
            source: getsource(product),
            theme: theme,
            sortable: true,
            pageable: true,
            autoheight: true,
            pagesize:20,
            pagesizeoptions: [20,50, 100, 200],
            
            rendergridrows: function(obj)
            {
                return obj.data;    
            },
            virtualmode: true,
            columns: [
                    { text: 'Insert'    , datafield: '_insert_' ,width:160,editable :false},
					{ text: 'Count'    , datafield: '_sl_' ,width:160,editable :false}
            ]
        });
    };
    return {
        config: {
            dragArea: null,
            theme: 'classic'
        },
        init: function (product) {
            //Creating all jqxWindgets except the window
            _createElements();
            //Adding jqxWindow
            _createWindow();
            //Adding jqxGrid
            _createGrid(product);
            //Attaching event listeners
            _addEventListeners();
        },
        changeStatusRow:function (row,status){
            changeStatus(row,status);
        }
    };
} ());
function changeStatus(row,status){
    try{
        var history = $('#jqxgrid').jqxGrid('getcellvalue', row, "_id_");
        history = $.parseJSON(history);
    }catch(e){
        return;
    }
    var url=base_url+"quayso_ngaokiem/product/changestatus";
    var data={
            id          :   history._id_,
            status      :   status,
            params:JSON.stringify({
                    status      :   status
            })
    };
    jqxAjax(url,data,function(code){
        if(code==1){
            $("#jqxgrid").jqxGrid('setcellvalue', row, "_status_", status);
            //$('#jqxgrid').jqxGrid('updatebounddata');
        }
    });
}