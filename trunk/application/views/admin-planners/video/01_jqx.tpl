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
                    { name: 'Video', type: 'string'},
                    { name: 'VideoName', type: 'string'},
                    { name: 'Title', type: 'string'},
                    { name: 'Category',type:'string'},
                    { name: 'Source',type:'string'},
                    { name: 'Status',type:'string'},
                    { name: 'Insert',type: 'date'},
                    { name: 'Update',type: 'date'}
                    
                ],
                url: baseurl+'admin-planners/video/jqxgrid_video/',
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
                    Video = $.parseJSON(value);
                    if(Video.Delete==null){
                    str+="\
                <div onclick=\"jqxGrid.Edit('"+Video.VideoID+"');\" \
                class='icon16 edit_icon hover50' title='Chỉnh sửa video'></div>\
            ";
                    str+="\
                <div onclick=\"jqxGrid.Delete('"+Video.VideoID+"');\" \
                class='icon16 delete_icon hover50' title='Xóa'></div>\
            ";
                }else{
                    str+="\
                <div onclick=\"jqxGrid.Retore('"+Video.VideoID+"');\" \
                class='icon16 retore_icon hover50' title='Khôi phục'></div>\
            ";
                    }
                    str+="\
                <div onclick=\"jqxGrid.Detail('"+Video.VideoID+"');\" \
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
                    { text: ''          , datafield: 'Video',cellsrenderer: linkrenderer  ,width:80       },
                    { text: 'VideoName' , datafield: 'VideoName'       },
                    { text: 'Title'     , datafield: 'Title'       },
                    { text: 'Category'  , datafield: 'Category'    ,width:200},
                    { text: 'Status'    , datafield: 'Status'    ,width:100 },
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
            Edit:function (VideoID){
                $("#frmDetail").show();
                $("#jqxWidget").hide();
                if(id==undefined){
                    $(".tab-nav li.hover .tabdes").html(" → Cập nhật");
                    htmlAjax(baseurl+"admin-planners/video/EditVideo",{VideoID:VideoID},$("#frmDetail"));
                }else{
                    }
            },
            CancelEdit:function (){
                $("#frmDetail").hide();
                $("#jqxWidget").show();
                $(".tab-nav li.hover .tabdes").html("");
            },
            Save:function (){
                _SaveVideo();
            }
        };
    } ());
    function _SaveVideo(){
        if(isrunning)return;
        var VideoKey   =   $("#VideoKey"  ).val();
        var Author   =   $("#Author"  ).val();
        var Title       =   $("#Title"      ).val();
        var Thumbs      =   $("#Thumbs"     ).val();
        var Source      =   $("#Link"     ).val();
        var Description =   $("#Description").val();
        var Tag         =   $("#Tag"        ).val();
        var Embel       =   $("#Embel"      ).val();
        
        var Categorys=$(".Categorys input[type=checkbox]");
        var strCategorys="";
        for(var i=0;i<Categorys.length;i++)
        {
            if(Categorys[i].checked)
            {
                strCategorys+=","+Categorys[i].value+",";
            }
        }
        isrunning=true;
        
        var url=baseurl+"admin-planners/video/savevideo";
        var data={
            Params:{
                VideoKey:VideoKey,
                Author:Author,
                Title:Title,
                Thumbs:Thumbs,
                Categorys:strCategorys,
                Source:Source,
                Description:Description,
                Tag:Tag,
                Embel:Embel
            }
        };
        if($("#VideoID").val()!=""){
            data.Params.VideoID=$("#VideoID").val();
        }
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage("Thành công","Thông báo !",function(){
                        jqxGrid.CancelEdit();
                        jqxGrid.Refresh();
                    });
                }
            }catch(err){
                ShowErrorDialogMessage("Lỗi",err);
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
        var url=baseurl+"admin-planners/video/YoutubeInfo";
        var data={
            url:$("#Link").val()
        };
        jqxAjax(url,data,function(video){
            isrunning=false;
            try{
                
                $("#Title").val(video.title);
                $("#Alias").val(video.alias);
                $("#VideoKey").val(video.key);
                $("#Author").val(video.author);
                $("#Thumbs").val(video.thumbnail);
                $("#Description").val(video.description);
                $("#Embel").val(video.embed);
            }catch(err){
                
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
        a
    </div>
</div>


