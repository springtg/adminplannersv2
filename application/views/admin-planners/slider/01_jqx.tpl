<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.base.css" type="text/css" />
<!--    <script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/scripts/jquery-1.8.1.min.js"></script>-->
<link rel="stylesheet" href="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/styles/jqx.classic.css" type="text/css" />
<script type="text/javascript" src="{{base_url()}}jqwidgets-ver2.4.2/jqwidgets/jqx-all.js"></script>
<link rel="stylesheet" href="{{base_url()}}syslib/fix_jqxGrid/fix_jqxGrid.css" type="text/css" />

<script type="text/javascript">
    var jqxGrid = (function () {
        //Adding event listeners

        function _addEventListeners() {

       

        };
        //Creating all page elements which are jqxWidgets
        function _createElements() {
            var theme=jqxGrid.config.theme;
       
        };
        //Creating the demo window
        function _createWindow() {
            var theme=jqxGrid.config.theme;
        
        };
        //create jqgrid
        function _createGrid() {
            var theme=jqxGrid.config.theme;
            var source ={
                datatype: "json",
                datafields: [
                    { name: 'Slider', type: 'string'},
                    { name: 'Image', type: 'string'},
                    { name: 'Title', type: 'string'},
                    { name: 'Position', type: 'int'},
                    { name: 'Status',type:'string'},
                    { name: 'Insert',type: 'date'},
                    { name: 'Update',type: 'date'}
                    
                ],
                url: baseurl+'admin-planners/slider/jqxgrid/',
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
                class='icon16 edit_icon hover50' title='Chỉnh sửa video'></div>\
            ";
                        str+="\
                <div onclick=\"jqxGrid.Delete('"+RowOBJ.ID+"');\" \
                class='icon16 delete_icon hover50' title='Xóa'></div>\
            ";
                    }else{
                        str+="\
                <div onclick=\"jqxGrid.Retore('"+RowOBJ.ID+"');\" \
                class='icon16 retore_icon hover50' title='Khôi phục'></div>\
            ";
                    }
                    str+="\
                <div onclick=\"jqxGrid.Detail('"+RowOBJ.ID+"');\" \
                class='icon16 log_icon hover50' title='Lịch sử ghi vết'></div>\
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
                pageable: true,
                pagesize: 20,
                pagesizeoptions: ['20', '50', '100'],
                virtualmode: true,
                columns: [
                    { text: ''          , datafield: 'Slider',cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'Title'     , datafield: 'Title'       },
                    { text: 'Image'     , datafield: 'Image'       },
                    { text: 'Position'  , datafield: 'Position'    ,width:200},
                    { text: 'Status'    , datafield: 'Status'   ,cellsrenderer:statusrenderer ,width:100 },
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
            Refresh:function (){
                $("#jqxgrid").jqxGrid('updatebounddata');
            },
            Delete:function (){
                $("#jqxgrid").jqxGrid('updatebounddata');
            },
            Retore:function (){
                $("#jqxgrid").jqxGrid('updatebounddata');
            },
            Edit:function (ID){
                $("#frmDetail").show();
                $("#jqxWidget").hide();
                $("#frmDetail").html("Loadding...");
                if(ID==undefined){
                    $(".tab-nav li.hover .tabdes").html(" → Insert");
                    htmlAjax(baseurl+"admin-planners/slider/Edit",{},$("#frmDetail"));
                }else{
                    $(".tab-nav li.hover .tabdes").html(" → Update");
                    htmlAjax(baseurl+"admin-planners/slider/Edit",{ID:ID},$("#frmDetail"));
                }
            },
            CancelEdit:function (){
                $("#frmDetail").hide();
                $("#jqxWidget").show();
                $(".tab-nav li.hover .tabdes").html("");
            },
            Save:function (){
                _Save();
            },
            ChangeStatus:function (VideoID,Status){
                _ChangeStatus(VideoID,Status);
                
            }
        };
    } ());
    function _ChangeStatus(ID,Status){
        if(isrunning)return;
        isrunning=true;
        var url=baseurl+"admin-planners/slider/ChangeStatus";
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
                    ShowNoticeDialogMessage("Slider' Status have been Changed!","Notice Message !",function(){
                        jqxGrid.Refresh();
                    });
                }
            }catch(err){
                ShowErrorDialogMessage(err);
            }
        });
    }
    function _Save(){
        if(isrunning)return;
        var VideoID     =   $("#VideoID"  ).val();
        var Title       =   $("#Title"  ).val();
        var Image       =   $("#Image"      ).val();
        var Position    =   $("#Position"     ).val();
        isrunning=true;
        
        var url=baseurl+"admin-planners/slider/Save";
        var data={
            Params:{
                VideoID:VideoID,
                Title:Title,
                Image:Image,
                Position:Position
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
                    ShowNoticeDialogMessage(result.msg,function(){
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
            string:$("#VideoName").val()
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
    function getYoutubeInfo(){
        if(isrunning)return;
        if( (!_FcheckFilled($("#Link").val())) && (!_FcheckFilled($("#VideoKey").val()))){
            ShowNoticeDialogMessage("Please enter Youtube link or Youtube Key.");
            return;
            }
        var url=baseurl+"admin-planners/video/YoutubeInfo";
        var data={
            url:$("#Link").val(),
            key:$("#VideoKey").val()
        };
        jqxAjax(url,data,function(video){
            isrunning=false;
            try{
                $("#Link").val(video.watchURL);
                $("#Title").val(video.title);
                $("#Alias").val(video.alias);
                $("#VideoKey").val(video.key);
                $("#Author").val(video.author);
                $("#Thumbs").val(video.thumbnail);
                $("#Description").val(video.description);
                $("#Embel").val(video.embed);
                $("#Length").val(video.length);
                $("img.thumbs").attr("src",video.thumbnail);
            }catch(err){
                ShowErrorDialogMessage("Cant get video information.<br/> Please check your Youtube link or Youtube Key.");
            }
        });
    }
    $(document).ready(function () {
        jqxGrid.init();
    });
        
</script>
<div style="padding-right: 2px;padding-left: 0px;">
    <div id='jqxWidget' style="position: relative;">
        <div id="jqxgrid"></div>
        <div type="button" 
             style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
             position: absolute;bottom: 4px;left: 4px;
             cursor: pointer; " title="Tạo Deal Mới" 
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
             cursor: pointer; " title="Tùy Chỉnh" 
             onclick="jqxGrid.setting();"
             class="jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
            <div style="margin-left: 6px; width: 15px; height: 15px;

                 " 
                 class="setting_icon"

                 ></div>
        </div>
    </div>
    <div id="frmDetail" class="tabdetail hidden">
        Loadding...
    </div>
</div>
<style>
    .token-item{position: relative;height: 40px;width: 480px}
    .token-item img{height: 40px; width: 60px; position: absolute;top: 0;left: 0}
    .token-item div{height: 40px; position: absolute;top: 0;left: 68px;overflow: hidden;font-size: 11px;font-weight: normal;}
    .token-item div h5{padding: 0;margin: 0;font-size: 11px;font-weight: bold;height: 16px;overflow: hidden;font-family: tahoma;}
    .token-item div p{padding: 0;margin: 0;font-size: 11px;font-weight: normal;overflow: hidden;;font-family: tahoma;}
    ul.token-input-list-facebook li input{margin: 0px 0;}
    div.token-input-dropdown-facebook ul li.token-input-selected-dropdown-item-facebook{background: #C0E6E5;color:#000}
/*    .token-input-dropdown-facebook ul{width: 300px}*/
</style>



