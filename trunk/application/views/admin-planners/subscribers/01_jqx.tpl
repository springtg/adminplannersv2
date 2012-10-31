<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.classic.css" type="text/css" />
<script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/jqx-all.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/fix_jqxGrid/fix_jqxGrid.css" type="text/css" />
<div style="padding-right: 2px;padding-left: 0px;">
    <div id='jqxWidget' style="position: relative;">
        <div id="jqxgrid"></div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 4px;
             cursor: pointer; " title="Settings" 
             onclick="jqxGrid.Setting();"
             class="hidden jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
            <div style="margin-left: 6px; width: 15px; height: 15px;

                 " 
                 class="setting_icon"

                 ></div>
        </div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 40px;
             cursor: pointer; " title="Refresh" 
             onclick="jqxGrid.Refresh();"
             class="jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
            <div style="margin-left: 6px; width: 15px; height: 15px;

                 " 
                 class="refresh_icon"

                 ></div>
        </div>
    </div>
    <div id="frmDetail" class="tabdetail hidden">
        Loadding...
    </div>
</div>
<div id="window-setting" class="hidden">
    <div id="windowSettingHeader">
        <span style="line-height: 20px;font-weight: bold">
            Settings
        </span>
    </div>
    <div style="overflow: hidden;" id="windowContentSetting">
        <table style="width: 100%">
            <tr>
                <td style="width: 50%;vertical-align: top">
                    <div class="jqx_group id-group-setting-column">
                        <div class=""><span class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Columns Setting</span></div>
                        <div style="padding: 4px">
                            <div style="float: left;" id="jqxlistbox-colums"></div>
                        </div>
                    </div>
                </td>
                <td style="vertical-align: top">
                    <div class="jqx_group id-group-setting-delete">
                        <div class=""><span class="pl0 pr0 pt0 pb0 ml0 mr0 mt0 mb0">Display Setting</span></div>
                        <div>

                            <div style='float: left;margin-top: 10px;' id='jqxRadioButtonShowAll'>
                                <span>Show all record</span>
                            </div>
                            <div style='float: left;margin-top: 10px;' id='jqxRadioButtonHideDelete'>
                                <span>Hide deleted record</span>
                            </div>
                            <div style='float: left;margin-top: 10px;' id='jqxRadioButtonShowDeleteOnly'>
                                <span>Only show deleted record</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    var jqxGrid = (function () {
        //Creating the demo window
        function _createWindow() {
            var theme=jqxGrid.config.theme;
            $("#window-setting").jqxWindow({
                autoOpen: false,showCollapseButton: true, resizable: false,
                Height: 300,width: 480, theme: theme 
            });
            //$("#jqxRadioButtonShowAll").jqxRadioButton({ width: 250, height: 25, {{if $_SESSION["JQX-DEL-CONTACT"]==1}}checked: true,{{/if}} theme: theme });
            //$("#jqxRadioButtonHideDelete").jqxRadioButton({ width: 250, height: 25,{{if $_SESSION["JQX-DEL-CONTACT"]==0}}checked: true,{{/if}} theme: theme });
            //$("#jqxRadioButtonShowDeleteOnly").jqxRadioButton({ width: 250, height: 25,{{if $_SESSION["JQX-DEL-CONTACT"]==-1}}checked: true,{{/if}} theme: theme });
        };
        //Adding event listeners
        function _addEventListeners() {
            $('#jqxRadioButtonShowAll').bind('checked', function (event) { 
                // Some code here. 
                _changeDisplayDelete(1);
            });
            $('#jqxRadioButtonHideDelete').bind('checked', function (event) { 
                // Some code here. 
                _changeDisplayDelete(0);
            });
            $('#jqxRadioButtonShowDeleteOnly').bind('checked', function (event) { 
                // Some code here. 
                _changeDisplayDelete(-1);
            });
        };
        //Creating all page elements which are jqxWidgets
        function _createElements() {
            var theme=jqxGrid.config.theme;
            $("#window-setting .jqx_group").jqxExpander({ showArrow: false, toggleMode: 'none', theme: theme });
            var listSource = [
                { label: 'FullName' , value: 'FullName', checked: true }, 
                { label: 'Email'    , value: 'Email', checked: true }, 
                { label: 'Phone'    , value: 'Phone', checked: false }, 
                { label: 'Subject'  , value: 'Subject', checked: true }, 
                { label: 'Status'   , value: 'Status', checked: false }, 
                { label: 'Insert'   , value: 'Insert', checked: true }, 
                { label: 'Update'   , value: 'Update', checked: false },
                { label: 'Delete'   , value: 'Delete', checked: false }
                
            ];
            $("#jqxlistbox-colums").jqxListBox({ source: listSource, width: 200, height: 200, theme: theme, checkboxes: true });
            $("#jqxlistbox-colums").bind('checkChange', function (event) {
                if (event.args.checked) {
                    $("#jqxgrid").jqxGrid('showcolumn', event.args.value);
                }
                else {
                    $("#jqxgrid").jqxGrid('hidecolumn', event.args.value);
                }
            });
        };
        //create jqgrid
        function _createGrid() {
            var theme=jqxGrid.config.theme;
            var source ={
                datatype: "json",
                datafields: [
                    { name: 'Email'     , type: 'string'},
                    { name: 'Insert'    ,type: 'date'},
                    { name: 'Subscribers'     , type: 'string'}
                    
                ],
                url: baseurl+'admin-planners/subscribers/jqxgrid/',
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
            });
            var linkrenderer = function (row, column, value) {
                var str="<span style='margin: 4px; float: left;'>";
                try{
                    RowOBJ = $.parseJSON(value);
                    if(RowOBJ.Delete==null){
                        str+="\
                <div onclick=\"jqxGrid.Delete('"+RowOBJ.ID+"');\" \
                class='icon16 delete_icon hover50' title='Delete'></div>\
            ";
                        
                    }else{
                        str+="\
                <div onclick=\"jqxGrid.Restore('"+RowOBJ.ID+"');\" \
                class='icon16 restore_icon hover50' title='Retore'></div>\
            ";
                    }
                   
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
                columnsresize: true,
                pageable: true,
                pagesize: 20,
                pagesizeoptions: ['20', '50', '100'],
                virtualmode: true,
                columns: [
                    { text: ''          , datafield: 'Subscribers'  ,cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'Email'     , datafield: 'Email'    ,width:120     },
                    { text: 'Insert'    , datafield: 'Insert'   ,cellsformat: 'yyyy-MM-dd',width:80}
                    
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
            Setting: function () {
                $('#window-setting').jqxWindow('open');
            },
            Refresh:function (){
                $("#jqxgrid").jqxGrid('updatebounddata');
            },
            Delete:function (ID){
                _delete(ID);
            },
            Restore:function (ID){
                _restore(ID);
            },
            Edit:function (VideoID){
                $("#frmDetail").show();
                $("#jqxWidget").hide();
                $("#frmDetail").html("Loadding...");
                if(VideoID==undefined){
                    $(".tab-nav li.hover .tabdes").html(" → Insert");
                    htmlAjax(baseurl+"admin-planners/video/EditVideo",{},$("#frmDetail"));
                }else{
                    $(".tab-nav li.hover .tabdes").html(" → Update");
                    htmlAjax(baseurl+"admin-planners/video/EditVideo",{VideoID:VideoID},$("#frmDetail"));
                }
            },
            Detail:function (ID){
                if(ID!=undefined){
                    $("#frmDetail").show();
                    $("#jqxWidget").hide();
                    $("#frmDetail").html("Loadding...");
                    $(".tab-nav li.hover .tabdes").html(" → Detail");
                    htmlAjax(baseurl+"admin-planners/contact/Detail",{ID:ID},$("#frmDetail"));
                }
            },
            CancelEdit:function (){
                $("#frmDetail").hide();
                $("#jqxWidget").show();
                $(".tab-nav li.hover .tabdes").html("");
            },
            Save:function (){
                _SaveVideo();
            },
            ChangeStatus:function (VideoID,Status){
                _ChangeStatus(VideoID,Status);
                
            }
        };
    } ());
    
    
    function _delete(ID){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/subscribers/deleteSubscribers";
        var data={
            ID:ID
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage(result.msg,"Notice Message !",function(){
                        jqxGrid.Refresh();
                    });
                }
            }catch(err){
                ShowErrorDialogMessage(err);
            }
        });
    }
    
    
    $(document).ready(function () {
        jqxGrid.init();
    });
        
</script>
