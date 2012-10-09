<?php /* Smarty version Smarty-3.1.7, created on 2012-08-08 08:36:04
         compiled from "application\views\admin-planners\03_1_account_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7149501f364931c1a4-27189505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b927f2b2526385746d7c553c78b3e486af01863' => 
    array (
      0 => 'application\\views\\admin-planners\\03_1_account_list.tpl',
      1 => 1344407748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7149501f364931c1a4-27189505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_501f3649378c8',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501f3649378c8')) {function content_501f3649378c8($_smarty_tpl) {?>        
    <script type="text/javascript" src="<?php echo base_url();?>
script/admin-planners/01_account.js"></script>
    <script type="text/javascript">
        var base_url ="<?php echo base_url();?>
";
        $(document).ready(function () {
            // prepare the data
            var theme = 'classic';
            var addfilter = function () {
                var filtergroup = new $.jqx.filter();
                var filter_or_operator = 1;
                var filtervalue = '';
                var filtercondition = 'contains';
                var filter1 = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
                filtervalue = '';
                filtercondition = 'starts_with';
                var filter2 = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
 
                filtergroup.addfilter(filter_or_operator, filter1);
                filtergroup.addfilter(filter_or_operator, filter2);
                // add the filters.
                $("#jqxgrid").jqxGrid('addfilter', '_name', filtergroup,true);
                $('#jqxgrid').jqxGrid('removefilter', 'id');
                // apply the filters.
                $("#jqxgrid").jqxGrid('applyfilters');
            };
            var source =
            {
                 datatype: "json",
                 datafields: [
                        { name: '_id', type: 'int'},
                        { name: '_name',type:'string'},
                        { name: '_username',type:'string'},
                        { name: '_authority',type: 'string'},
                        { name: '_group',type: 'string'},
                        { name: '_insert',type: 'date'}
                ],
                url: '<?php echo base_url();?>
admin-planners/account/jqgrid_data/',
                filter: function()
                {
                        $("#jqxgrid").jqxGrid('updatebounddata');
                },
                sort: function()
                {
                        // update the grid and send a request to the server.
                        $("#jqxgrid").jqxGrid('updatebounddata');
                },
                root: 'Rows',
                beforeprocessing: function(data)
                {		
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
                return "<span style='margin: 4px; float: left;'>\
                            <div onclick=\"edit_row('"+value+"');\" \
                            class='icon16 edit_icon hover50'></div>\
                        </span>";
                
            }
            var auth_renderer = function (row, column, value) {
                var name = $('#jqxgrid').jqxGrid('getrowdata', row)._authority;
                var imgurl = '../../images/' + name.toLowerCase() + '.png';
                var img = '<div style="background: white;"><img style="margin:2px; margin-left: 10px;" width="32" height="32" src="' + imgurl + '"></div>';
                img+="<div class='clear'></div>";
                return img;
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
                        { text: '', datafield: '_id',cellsrenderer: linkrenderer,width:60},
                        { text: 'Name', datafield: '_name'},
                        { text: 'Username', datafield: '_username'},
                        { text: 'Authority',datafield: '_authority'},
                        { text: 'Group', datafield: '_group'},
                        { text: 'Insert', datafield: '_insert',cellsformat: 'yyyy-MM-dd'}
                  ]
            });
            
            
            
        });
        function edit_row(id){
            if(id!=null){
                $('#tab').jqxTabs('setTitleAt', 0, "Edit Account");
                var url='<?php echo base_url();?>
admin-planners/account/edit_account/'+id;
                var data={id:id}
                htmlAjax(url,data,".edit-product-win");
                //$(".edit-product-win").load('<?php echo base_url();?>
admin-planners/account/edit_account/'+id);
                $('#window').jqxWindow('open');
            }else{
                $('#tab').jqxTabs('setTitleAt', 0, "Create New Account");
                $('#window').jqxWindow('open');
                //$(".edit-product-win").load('<?php echo base_url();?>
admin-planners/account/edit_account');
                var url='<?php echo base_url();?>
admin-planners/account/edit_account/';
                var data={}
                htmlAjax(url,data,".edit-product-win");
            }
            
        }
    </script>
    
    <script type="text/javascript">
        var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                $('#window').bind('resizing', function (event) {
                    $('#tab').jqxTabs('height', $('#windowContent').height() - 3);
                });
                
            };
            //Creating all page elements which are jqxWidgets
            function _createElements() {
                $('.showWindowButton').jqxButton({ theme: basicDemo.config.theme, height: '25px', width: '65px' });
                $('#tab').jqxTabs({ height: 258, theme: basicDemo.config.theme });
            };
            //Creating the demo window
            function _createWindow() {
                $('#window').jqxWindow({ autoOpen: false,showCollapseButton: true, maxHeight: 400, maxWidth: 700, minHeight: 200, minWidth: 200, height: 300, width: 500, theme: basicDemo.config.theme });
            };
            return {
                config: {
                    dragArea: null,
                    theme: 'classic'
                },
                init: function () {
                    //Creating all jqxWindgets except the window
                    _createElements();
                    //Attaching event listeners
                    _addEventListeners();
                    //Adding jqxWindow
                    _createWindow();
                }
            };
        } ());
        $(document).ready(function () {
            basicDemo.init();
        });
        
    </script>
    <div style="padding-right: 22px;padding-left: 20px;">
        <div id='jqxWidget' style="position: relative;">
            <div id="jqxgrid"></div>
            <div type="button" 
                style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
                position: absolute;bottom: 4px;left: 4px;
                cursor: pointer; " title="New Account" 
                onclick="edit_row(null);"
                class="jqx-rc-all jqx-rc-all-classic jqx-button jqx-button-classic jqx-widget jqx-widget-classic jqx-fill-state-hover jqx-fill-state-hover-classic">
                <div style="margin-left: 6px; width: 15px; height: 15px;

                    " 
                    class="new_icon"

                    ></div>
            </div>
        </div>
    </div>
    
         
    <div id="window">
        <div id="windowHeader">
            <span style="line-height: 20px">
                Account Editer
            </span>
        </div>
        <div style="overflow: hidden;" id="windowContent">
            <div id="tab">
                <ul style="margin-left: 30px;">
                    <li class="id-editer-title"><span>Account Information<span></li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>Other</li>
                </ul>
                <div class="edit-product-win">
                    
                </div>   
                <div>
                    
                    End Game is a 2006 action/thriller film, written and directed by Andy Cheng. The
                    film stars Cuba Gooding, Jr. as Secret Service agent Alex Thomas, who is shot in
                    the hand, while unsuccessfully trying to protect the President (played by Jack Scalia)
                    from an assassin's bullet. Later, with the help of a persistent newspaper reporter
                    named Kate Crawford (played by Angie Harmon), he uncovers a vast conspiracy behind
                    what initially appeared to be a lone gunman. James Woods, Burt Reynolds, and Anne
                    Archer co–star in this film that was originally set to be shown in cinemas by MGM
                    in 2005, but was delayed by the takeover from Sony and eventually sent direct to
                    DVD.
                </div>
                <div>
                    
                    The project was in development for approximately three years at Paramount Pictures,
                    during which time a screen adaptation that differed significantly from the novel
                    was written. Summit Entertainment acquired the rights to the novel after three years
                    of the project's stagnant development. Melissa Rosenberg wrote a new adaptation
                    of the novel shortly before the 2007–2008 Writers Guild of America strike and sought
                    to be faithful to the novel's storyline. Principal photography took 44 days, and
                    completed on May 2, 2008; the film was primarily shot in Oregon
                </div>
                <div>
                    
                    Meanwhile, in a rail yard within the northern town of Fuller, two AWVR hostlers,
                    Dewey (Ethan Suplee) and Gilleece (T.J. Miller), are ordered by Fuller operations
                    dispatcher Bunny (Kevin Chapman) to move a freight train led by locomotive #777
                    (nicknamed "Triple Seven") off its current track to clear the track for an excursion
                    train carrying schoolchildren. Dewey attempts to take shortcuts, instructing Gilleece
                    to leave the hoses for the air brakes disconnected for the short trip. Dewey later
                    leaves the moving cab to throw a misaligned rail switch along the train's path,
                    but is unable to climb back on, as the train's throttle jumps from idle, to full
                    power. He is forced to report the train as a "coaster" to Fuller yardmaster Connie
                    Hooper (Rosario Dawson)...
                </div>
                <div>
                    
                    Priest is a 2011 American post-apocalyptic sci-fi western and supernatural action
                    film starring Paul Bettany as the title character. The film, directed by Scott Stewart,
                    is based on the Korean comic of the same name. In an alternate world, humanity and
                    vampires have warred for centuries. After the last Vampire War, the veteran Warrior
                    Priest (Bettany) lives in obscurity with other humans inside one of the Church's
                    walled cities. When the Priest's niece (Lily Collins) is kidnapped by vampires,
                    the Priest breaks his vows to hunt them down. He is accompanied by the niece's boyfriend
                    (Cam Gigandet), who is a wasteland sheriff, and a former Warrior Priestess (Maggie
                    Q).
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>