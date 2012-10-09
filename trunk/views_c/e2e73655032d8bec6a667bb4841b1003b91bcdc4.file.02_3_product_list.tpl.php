<?php /* Smarty version Smarty-3.1.7, created on 2012-08-06 05:42:44
         compiled from "application\views\admin-planners\02_3_product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14772501f21e68210e7-07700440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e73655032d8bec6a667bb4841b1003b91bcdc4' => 
    array (
      0 => 'application\\views\\admin-planners\\02_3_product_list.tpl',
      1 => 1344224562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14772501f21e68210e7-07700440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_501f21e68790b',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_501f21e68790b')) {function content_501f21e68790b($_smarty_tpl) {?>    <link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/styles/jqx.classic.css" type="text/css" />
    <link type="text/css" href="<?php echo base_url();?>
css/adm/adm.css" rel="stylesheet" media="all" title='style' />
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqx-all.js"></script>
<!--    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.selection.js"></script>	
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.filter.js"></script>	
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxdata.js"></script>	
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxlistbox.js"></script>	
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxgrid.pager.js"></script>		
    <script type="text/javascript" src="<?php echo base_url();?>
jqwidgets-ver2.3.1/jqwidgets/jqxdropdownlist.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var theme = 'classic';
            var datefiter=function(){
                var filtergroup = new $.jqx.filter();
                var filter_or_operator = 0;
                var filtervalue = '2012-08-27 17:30:55';
                var filtercondition = 'LESS_THAN_OR_EQUA';
                var filter1 = filtergroup.createfilter('stringfilter ', filtervalue, filtercondition);
                filtervalue = '2012-07-27 17:30:55';
                filtercondition = 'GREATER_THAN_OR_EQUAL';
                var filter2 = filtergroup.createfilter('stringfilter ', filtervalue, filtercondition);
 
                filtergroup.addfilter(filter_or_operator, filter1);
                filtergroup.addfilter(filter_or_operator, filter2);
                // add the filters.
                $("#jqxgrid").jqxGrid('addfilter', 'insert', filtergroup);
                // apply the filters.
                $("#jqxgrid").jqxGrid('applyfilters');
            };
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
                $("#jqxgrid").jqxGrid('addfilter', 'name', filtergroup,true);
                $('#jqxgrid').jqxGrid('removefilter', 'id');
                // apply the filters.
                $("#jqxgrid").jqxGrid('applyfilters');
            };
            var source =
            {
                 datatype: "json",
                 datafields: [
                        { name: 'id', type: 'int'},
                        { name: 'name',type:'string'},
                        { name: 'status',type:'string'},
                        { name: 'startdate',type: 'date'},
                        { name: 'enddate',type: 'date'},
                        { name: 'insert',type: 'date'}
                ],
                url: '<?php echo base_url();?>
admin-planners/tmp/jqgrid_data/',
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
                                        alert(error);
                                }
                        }
                );
            var linkrenderer = function (row, column, value) {
                return "<span style='margin: 4px; float: left;'>\
                            <div onclick=\"edit_row('"+value+"');\" \
                            class='icon16 edit_icon hover50'></div>\
                        </span>";
                
            }
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {	
                width:'100%',
                source: dataadapter,
                theme: theme,
                filterable: false,
                autoheight: false,
                sortable: true,
                ready: function () {
                    $('#jqxgrid').jqxGrid('removefilter', 'id',true);
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
                pagesize: 25,
                pagesizeoptions: ['25', '50', '100', '200', '400'],
                columns: [
                        { text: '', datafield: 'id',cellsrenderer: linkrenderer,width:60},
                        { text: 'Name', datafield: 'name'},
                        { text: 'Status', datafield: 'status'},
                        { text: 'Start Date', datafield: 'startdate', cellsformat: 'yyyy-MM-dd'},
                        { text: 'End Date', datafield: 'enddate',cellsformat: 'yyyy-MM-dd'},
                        { text: 'Insert', datafield: 'insert',cellsformat: 'yyyy-MM-dd'}
                  ]
            });
            
            
        });
        function edit_row(id){
            //$(".edit-product-win").html("haha ha");
            $('#window').jqxWindow('open');
            
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
                    theme: null
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
                cursor: pointer; " title="previous" 
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
                Product Editer
            </span>
        </div>
        <div style="overflow: hidden;" id="windowContent">
            <div id="tab">
                <ul style="margin-left: 30px;">
                    <li>Edit Product</li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>Other</li>
                </ul>
                <div class="edit-product-win">
                    <input type="button" value="Save" class="showWindowButton" />
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 100px">Name</td>
                            <td>
                                <input type="text"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Game</td>
                            <td>
                                <input type="text"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Start Date</td>
                            <td>
                                <input type="text"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px">End Date</td>
                            <td>
                                <input type="text"/>
                            </td>
                        </tr>
                        
                    </table>
                    <div>
                        <input type="button" value="Save" class="showWindowButton" />
                        <input type="button" value="Cancel" class="showWindowButton" />
                    </div>
                    Avatar is a 2009 American[6][7] epic science fiction film written and directed by
                    James Cameron, and starring Sam Worthington, Zoe Saldana, Stephen Lang, Michelle
                    Rodriguez, Joel David Moore, Giovanni Ribisi and Sigourney Weaver. The film is set
                    in the mid-22nd century, when humans are mining a precious mineral called unobtanium
                    on Pandora , a lush habitable moon of a gas giant in the Alpha Centauri star system.
                    The expansion of the mining colony threatens the continued existence of a local
                    tribe of Na'vi—a humanoid species indigenous to Pandora. The film's title refers
                    to the genetically engineered Na'vi-human hybrid bodies used by a team of researchers
                    to interact with the natives of Pandora.
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