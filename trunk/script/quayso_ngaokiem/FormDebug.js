var DebugFRM = (function () {
    function _addEvents(){
        $('#window-debug').bind('resizing', function (event) {
            $('#tab-debug').jqxTabs('height', $('#windowContent-debug').height() - 3);
        });
    };
    function _createElements(){
        var theme=LoginFRM.config.theme;
        //cbx
        $('#window-debug').jqxWindow({ 
            autoOpen: false,showCollapseButton: true,showCloseButton: false, 
            maxHeight: 700, maxWidth: 720, minHeight: 100, minWidth: 320,
            width: 420,height:500, theme: theme,position: { x: 0, y: 100 }
        });
        $('#tab-debug').jqxTabs({ height:485, theme: theme });
        

    };
    //Creating the demo window
    return {
        debug:function (){
//            htmlAjax(base_url+"home/debug/a",{},"#windowContent-debug .tab0");
//            htmlAjax(base_url+"home/debug/p",{},"#windowContent-debug .tab1");
//            htmlAjax(base_url+"home/debug/r",{},"#windowContent-debug .tab2");
//            htmlAjax(base_url+"home/debug/g",{},"#windowContent-debug .tab3");
        },
        config: {
            dragArea: null,
            theme: 'classic'
        },
        init: function () {
            
            //Creating all jqxWindgets except the window
            _createElements();
            //Add events
            _addEvents();
            DebugFRM.debug();
        }
    };
} ());

