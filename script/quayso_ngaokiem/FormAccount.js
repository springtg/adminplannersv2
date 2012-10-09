/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Account = (function () {
    //Adding event listeners
    function _addEventListeners() {
        $('#window').bind('resizing', function (event) {
            $('#tab').jqxTabs('height', $('#windowContent').height() - 3);
        });

    };
    //Creating all page elements which are jqxWidgets
    function _createElements() {
        var theme=Account.config.theme;
        $('#window .showWindowButton').jqxButton({ theme: theme, height: '25px', width: '65px' });
        $('#tab').jqxTabs({ height: 258, theme: theme });
    };
    //Creating the demo window
    function _createWindow() {
        var theme=Account.config.theme;
        $('#window').jqxWindow({ 
            autoOpen: false,showCollapseButton: true, maxHeight: 400, maxWidth: 700, 
            minHeight: 200, minWidth: 200, width: 500, theme: theme 
        });
    };
    function _createGrid(){
        var theme = Account.config.theme;
        var source ={
            datatype: "json",
            datafields: [
                    { name: '_id_', type: 'int'},
                    { name: '_name_',type:'string'},
                    { name: '_username_',type:'string'},
                    { name: '_authority_',type: 'string'},
                    { name: '_group_',type: 'string'},
                    { name: '_insert_',type: 'date'}
            ],
            url: base_url+'admin-planners/account/jqgrid_data/',
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
                            loadError: function(xhr, status, error){
                                $('#window-error').jqxWindow('setContent',"<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+error+"<br/>");
                                $('#window-error').jqxWindow('open');
                            }
                    }
            );
        var linkrenderer = function (row, column, value) {
            var str="<span style='margin: 4px; float: left;'>";
            try{
                value = $.parseJSON(value);
                if(value._delete_!=null){
                    str+="\
                        <div onclick=\"Account.restore_row('"+value._id_+"');\" \
                        class='icon16 restore_icon hover50' title='Restore'></div>\
                    ";
                }else{ 
                    str+="\
                        <div onclick=\"Account.edit_row('"+value._id_+"');\" \
                        class='icon16 edit_icon hover50' title='Edit'></div>\
                    ";
                    if(value._lock_==null){
                        str+="\
                            <div onclick=\"Account.delete_row('"+value._id_+"');\" \
                            class='icon16 delete_icon hover50' title='Delete'></div>\
                        ";
                    }

                }
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
                    { text: '', datafield: '_id_',cellsrenderer: linkrenderer,width:60},
                    { text: 'Name', datafield: '_name_'},
                    { text: 'Username', datafield: '_username_'},
                    { text: 'Authority',datafield: '_authority_'},
                    { text: 'Group', datafield: '_group_'},
                    { text: 'Insert', datafield: '_insert_',cellsformat: 'yyyy-MM-dd'}
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
        edit_row:function(id){
            if(id!=null){
                $('#tab').jqxTabs('setTitleAt', 0, "Edit Account");
                var url=base_url+'admin-planners/account/edit_account/'+id;
                var data={id:id};
                htmlAjax(url,data,".edit-product-win");
                $('#window').jqxWindow('open');
            }else{
                $('#tab').jqxTabs('setTitleAt', 0, "Create New Account");
                $('#window').jqxWindow('open');
                var url=base_url+'admin-planners/account/edit_account/';
                var data={};
                htmlAjax(url,data,".edit-product-win");
            }

        },
        delete_row:function (id){
            delete_account(id);
        },
        restore_row:function (id){
            restore_account(id);
        }
    };
} ());

