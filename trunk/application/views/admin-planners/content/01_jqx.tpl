<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.classic.css" type="text/css" />
<script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/jqx-all.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/fix_jqxGrid/fix_jqxGrid.css" type="text/css" />

<!--<script type="text/javascript" src="{{base_url()}}syslib/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>-->
<script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="{{base_url()}}syslib/ckfinder/browse.js"></script>
<div style="padding-right: 2px;padding-left: 0px;">
    <div id='jqxWidget' style="position: relative;">
        <div id="jqxgrid"></div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 4px;
             cursor: pointer; " title="Add New Record" 
             onclick="jqxGrid.Edit();"
             class="jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
            <div style="margin-left: 6px; width: 15px; height: 15px;

                 " 
                 class="new_icon"

                 ></div>
        </div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 40px;
             cursor: pointer; " title="Settings" 
             onclick="jqxGrid.Setting();"
             class="jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
            <div style="margin-left: 6px; width: 15px; height: 15px;

                 " 
                 class="setting_icon"

                 ></div>
        </div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 76px;
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
            $("#jqxRadioButtonShowAll").jqxRadioButton({ width: 250, height: 25, {{if $_SESSION["JQX-DEL-CONTENT"]==1}}checked: true,{{/if}} theme: theme });
            $("#jqxRadioButtonHideDelete").jqxRadioButton({ width: 250, height: 25,{{if $_SESSION["JQX-DEL-CONTENT"]==0}}checked: true,{{/if}} theme: theme });
            $("#jqxRadioButtonShowDeleteOnly").jqxRadioButton({ width: 250, height: 25,{{if $_SESSION["JQX-DEL-CONTENT"]==-1}}checked: true,{{/if}} theme: theme });
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
                { label: 'Title', value: 'Title', checked: true }, 
                { label: 'Alias', value: 'Alias', checked: false }, 
                { label: 'Thumb', value: 'Thumb', checked: false }, 
                { label: 'Status', value: 'Status', checked: true }, 
                { label: 'Insert', value: 'Insert', checked: true }, 
                { label: 'Update', value: 'Update', checked: false },
                { label: 'Delete', value: 'Delete', checked: false }
                
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
                    { name: 'Content', type: 'string'},
                    { name: 'Title', type: 'string'},
                    { name: 'Alias', type: 'string'},
                    { name: 'Thumb',type:'string'},
                    { name: 'Status',type:'string'},
                    { name: 'Insert',type: 'date'},
                    { name: 'Update',type: 'date'},
                    { name: 'Delete',type: 'date'}
                    
                ],
                url: baseurl+'admin-planners/content/jqxgrid/',
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
                <div onclick=\"jqxGrid.Edit('"+RowOBJ.ID+"');\" \
                class='icon16 edit_icon hover50' title='Edit'></div>\
            ";
                if(RowOBJ.Lock==0){
                        str+="\
                <div onclick=\"jqxGrid.Delete('"+RowOBJ.ID+"');\" \
                class='icon16 delete_icon hover50' title='Delete'></div>\
            ";
                    }
                    }else{
                        str+="\
                <div onclick=\"jqxGrid.Restore('"+RowOBJ.ID+"');\" \
                class='icon16 restore_icon hover50' title='Retore'></div>\
            ";
                    }
                    str+="\
                <div onclick=\"jqxGrid.Detail('"+RowOBJ.ID+"');\" \
                class='icon16 log_icon hover50' title='Log'></div>\
            ";
                }catch(e){ }
                str+="</span>";
                return str;
            }
            var statusrenderer = function (row, column, value) {
                var str="<span class='showandhide' style='margin: 4px; float: left;'>";
                try{
                    Status = $.parseJSON(value);
                    if(Status.Status=="Public"){
                        str+="\
                <span class='hideifhover' style='color:blue;'>Public</span>\
                <span class='showifhover'><a href=\"javascript:jqxGrid.ChangeStatus('"+Status.ID+"','Private');\"><span style='color:blue;'>Public </span> <span style='color:#000;'>→ Private</span></a></span>\
                ";
                    }else if(Status.Status=="Private"){
                        str+="\
                <span class='hideifhover'>Private</span>\
                <span class='showifhover'><a href=\"javascript:jqxGrid.ChangeStatus('"+Status.ID+"','Public');\"><span style='color:#000;'>Private → </span> <span style='color:blue;'>Public</span></a></span>\
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
                    { text: ''          , datafield: 'Content',cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'Title'     , datafield: 'Title'      },
                    { text: 'Alias'     , datafield: 'Alias'    ,hidden:true       },
                    { text: 'Thumb'     , datafield: 'Thumb'    ,width:200,hidden:true},
                    { text: 'Status'    , datafield: 'Status'   ,cellsrenderer:statusrenderer ,width:100 },
                    { text: 'Insert'    , datafield: 'Insert'   ,cellsformat: 'yyyy-MM-dd',width:80},
                    { text: 'Update'    , datafield: 'Update'   ,cellsformat: 'yyyy-MM-dd',width:80,hidden:true},
                    { text: 'Delete'    , datafield: 'Delete'   ,cellsformat: 'yyyy-MM-dd',width:80,hidden:true}
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
            Edit:function (ID){
                $("#frmDetail").show();
                $("#jqxWidget").hide();
                $("#frmDetail").html("Loadding...");
                if(ID==undefined){
                    $(".tab-nav li.hover .tabdes").html(" → Insert");
                    htmlAjax(baseurl+"admin-planners/content/Edit",{},$("#frmDetail"));
                }else{
                    $(".tab-nav li.hover .tabdes").html(" → Update");
                    htmlAjax(baseurl+"admin-planners/content/Edit",{ID:ID},$("#frmDetail"));
                }
            },
            CancelEdit:function (){
                $("#frmDetail").hide();
                $("#jqxWidget").show();
                removeEditorContent();
                $(".tab-nav li.hover .tabdes").html("");
            },
            Save:function (){
                _save();
            },
            ChangeStatus:function (VideoID,Status){
                _ChangeStatus(VideoID,Status);
                
            }
        };
    } ());
    function  _changeDisplayDelete(v){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/content/ChangeDeleteDisplay/";
        var data={
            showDelete  :   v
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            if(result.code>=0){
                $('#jqxgrid').jqxGrid('updatebounddata');
            }else{
                ShowNoticeDialogMessage(result.msg);
            }
        });
    }
    function _ChangeStatus(ID,Status){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/content/ChangeStatus";
        var data={
            ID:ID,
            Status:Status
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
    function _delete(ID){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/content/delete";
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
    function _restore(ID){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/content/retore";
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
    function _save(){
        if(isrunning)return;
        var Title   =   $("#Title"  ).val();
        var Alias   =   $("#Alias"  ).val();
        var Thumb   =   $("#Thumb"  ).val();
        var Content =   areaContent.instanceById('Content').getContent();
        isrunning=true;
        var url=baseurl+"admin-planners/content/Save";
        var data={
            Params:{
                Title:Title,
                Alias:Alias,
                Thumb:Thumb,
                Content:Content
            }
        };
        if($("#ID").val()!=""){
            data.Params.ID=$("#ID").val();
        }
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage(result.msg,"Notice Message",function(){
                        jqxGrid.CancelEdit();
                        jqxGrid.Refresh();
                    });
                }
            }catch(err){
                ShowErrorDialogMessage(err);
            }
        });
    }
    
    function getAlias(){
        var url=baseurl+"sys/excution/getAlias";
        var data={
            string:$("#Title").val()
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code>=0){
                    $("#Alias").val(result.msg);
                }
            }catch(err){
                
            }
        });
    }
    var areaContent;
    function addEditorContent(){
        if(!areaContent) {
            areaContent = new nicEditor({fullPanel : true}).panelInstance('Content',{hasPanel : true});
	}
    }
    function removeEditorContent(){
        if(areaContent) {
        	areaContent.removeInstance('Content');
		areaContent = null;
	}
    }
    
    $(document).ready(function () {
        jqxGrid.init();
    });
        
</script>
