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
                    Authority = $.parseJSON(value);
                    str+="\
                <div onclick=\"jqxGrid.HistoryDetail('"+Authority.AuthorityID+"');\" \
                class='icon16 detail_icon hover50' title='Lịch sử quay số'></div>\
            ";
                    str+="\
                <div onclick=\"jqxGrid.LogDetail('"+Authority.AuthorityID+"');\" \
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
            EditVideo:function (id){
                if(id==undefined){
                    $("#frmDetail").show();
                    $("#jqxWidget").hide();
                    $(".tab-nav li.hover .tabdes").html(" → Thêm mới");
                    htmlAjax(baseurl+"admin-planners/video/EditVideo",{},$("#frmDetail"));
                }
            },
            CancelEditVideo:function (){
                $("#frmDetail").hide();
                $("#jqxWidget").show();
                $(".tab-nav li.hover .tabdes").html("");
            },
            SaveVideo:function (){
                _SaveVideo();
            }
        };
    } ());
    function _SaveVideo(){
        if(isrunning)return;
        var Title       =   $("#Title"      ).val();
        var Thumbs      =   $("#Thumbs"     ).val();
        var Source      =   $("#Source"     ).val();
        var Description =   $("#Description").val();
        var Tag         =   $("#Tag"        ).val();
        var Embel       =   $("#Embel"      ).val();
        //var Thumbs=$("#Thumbs").val();
        //var Thumbs=$("#Thumbs").val();
        
        var Categorys=$(".Categorys input[type=checkbox]");
        var strCategorys="";
        for(var i=0;i<Categorys.length;i++)
        {
            //var chkbox = document.getElementById(chkStaffBonus[i]);
            if(Categorys[i].checked)
            {
                strCategorys+=","+Categorys[i].value+",";
            }
        }
        if(!_FcheckFilled(  Title   )){ $(  "#Title"    ).focus();return; }
        if(!_FcheckFilled(  Thumbs  )){ $(  "#Thumbs"   ).focus();return; }
        if(strCategorys==""){
            ShowNoticeDialogMessage("Bạn chưa chọn danh mục cho video.<br/>Hãy chọn ít nhất 1 danh mục.");
            return;
        }
        if(!_FcheckFilled(  Description )){ $(  "#Description"  ).focus();return; }
        if(!_FcheckFilled(  Tag         )){ $(  "#Tag"          ).focus();return; }
        if(!_FcheckFilled(  Embel       )){ $(  "#Embel"        ).focus();return; }
        
        isrunning=true;
        
        var url=baseurl+"admin-planners/video/savevideo";
        var data={
            Params:{
                Title:Title,
                Thumbs:Thumbs,
                Categorys:strCategorys,
                Source:Source,
                Description:Description,
                Tag:Tag,
                Embel:Embel
            }
        };
        jqxAjax(url,data,function(result){
            isrunning=false;
            try{
                if(result.code<0){
                    
                    var notice=new NoticeDialogMessage(result.msg,"Thông Báo",function(){ login.Show(); });
                    //notice.SetCallBack=function(){ login.Show(); }
                    notice.Show();
                    //ShowNoticeDialogMessage(result.msg);
                }else{
                    ShowNoticeDialogMessage("Thành công",function(){
                        location.reload();
                    });
                }
            }catch(err){
                showUIWindowloginmsg("Lỗi",err.message);
            
                
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
             onclick="jqxGrid.EditVideo();"
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


