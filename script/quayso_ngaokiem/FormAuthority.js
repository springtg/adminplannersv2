/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Authority = (function () {
    //Adding event listeners
    function _addEventListeners() {
        $('#window').bind('resizing', function (event) {
            $('#tab').jqxTabs('height', $('#windowContent').height() - 3);
        });

    };
    //Creating all page elements which are jqxWidgets
    function _createElements() {
        var theme=Authority.config.theme;
        $('#window .showWindowButton').jqxButton({ theme: theme, height: '25px', width: '65px' });
        $('#tab').jqxTabs({ height: 258, theme: theme });
    };
    //Creating the demo window
    function _createWindow() {
        var theme=Authority.config.theme;
        $('#window').jqxWindow({
            autoOpen: false,showCollapseButton: true, maxHeight: 400, maxWidth: 700, 
            minHeight: 100, minWidth: 200, width: 320, theme: theme 
        });
    };
    //create jqgrid
    function _createGrid() {
        var theme=Authority.config.theme;
        var source ={
            datatype: "json",
            datafields: [
                    { name: '_id_', type: 'string'},
                    { name: '_name_',type:'string'},
                    { name: '_value_',type:'string'},
                    { name: '_note_',type:'string'},
                    { name: '_insert_',type: 'date'},
                    { name: '_update_',type: 'date'}
            ],
            url: base_url+'admin-planners/authority/jqgrid_data/',
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
                if(value._delete_!=null){
                    str+="\
                        <div onclick=\"Authority.restore_row('"+value._id_+"');\" \
                        class='icon16 restore_icon hover50' title='Restore'></div>\
                    ";
                }else{ 
                    str+="\
                        <div onclick=\"Authority.edit_row('"+value._id_+"');\" \
                        class='icon16 edit_icon hover50' title='Edit'></div>\
                    ";
                    if(value._lock_==null){
                        str+="\
                            <div onclick=\"Authority.delete_row('"+value._id_+"');\" \
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
                    { text: 'Value', datafield: '_value_'},
                    { text: 'Note', datafield: '_note_'},
                    { text: 'Insert', datafield: '_insert_',cellsformat: 'yyyy-MM-dd'},
                    { text: 'Update', datafield: '_update_',cellsformat: 'yyyy-MM-dd'}
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
        edit_row:function (id){
            if(id!=null){
                $('#tab').jqxTabs('setTitleAt', 0, "Edit Authority");
                $('#window').jqxWindow('open');
                var url=base_url+'admin-planners/authority/edit/'+id;
                var data={id:id}
                htmlAjax(url,data,"#windowContent .tab0");
            }else{
                $('#tab').jqxTabs('setTitleAt', 0, "New Authority");
                $('#window').jqxWindow('open');
                var url=base_url+'admin-planners/authority/edit';
                var data={};
                htmlAjax(url,data,"#windowContent .tab0");
            }
        },
        delete_row:function (id){
            delete_authority(id);
        },
        restore_row:function (id){
            restore_authority(id);
        }
    };
} ());

