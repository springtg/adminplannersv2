var LoginFRM = (function () {
    function _addEvents(){

    };
    //Adding event listeners
    function _createElements(){
        var theme=LoginFRM.config.theme;
        //cbx
        $('#window-login').jqxWindow({ 
            autoOpen: false,showCollapseButton: true, 
            maxHeight: 400, maxWidth: 700, minHeight: 100, minWidth: 320,
            width: 320, theme: theme 
        });
        // Create a jqxButton
        $("#window-login .showWindowButton").jqxButton({ theme: theme, height: '25px', width: '65px' });

    };
    //Creating the demo window
    return {
        config: {
            dragArea: null,
            theme: 'classic'
        },
        init: function () {
            
            //Creating all jqxWindgets except the window
            _createElements();
            //Add events
            _addEvents();
        },
        reloadMenu:function(){
            //load_menu
            var url=base_url+'quayso_ngaokiem/home/reloadMenu/';
            var data={};
            htmlAjax(url,data,"#id-menu-cdtabarea");
        },
        _show:function(){
            $('#window-login').jqxWindow('open');
        },
        _close:function(){
            $('#window-login').jqxWindow('close');
        },
        _login:function(){
            var username=$("#txt-uname-login").val();
            var password=$("#txt-pass-login").val();
            var surl=base_url+"admin-planners/account/login";
            var sdata={
                    "username"    :   username,
                    "password"    :   password,
                    "params":JSON.stringify({
                            "username"    :   username,
                            "password"    :   password
                    })
            };
            jqxAjax(surl,sdata,function(code){
                if(code==0){
                    $('#jqxgrid').jqxGrid('updatebounddata');
                    LoginFRM._close();
                    LoginFRM.reloadMenu();            
                }
            });
        },
        logout:function(){
            var surl=base_url+"admin-planners/account/logout";
            var sdata={};
            jqxAjax(surl,sdata,function(code){
                if(code==0){
                    //$('#jqxgrid').jqxGrid('updatebounddata');
                    $('#jqxgrid').jqxGrid('clear');
                    LoginFRM._show();
                    LoginFRM.reloadMenu();            
                }
            });
        }
    };
} ());

