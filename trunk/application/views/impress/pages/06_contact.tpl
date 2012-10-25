<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Mr. Khương</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link href="http://y2graphic.com/templates/v2/favicon.ico" rel="shortcut icon" type="image/x-icon" />
            <link href="{{base_url()}}Interdesign/im/css/css.css" rel="stylesheet"/>
            <link href="{{base_url()}}syslib/syscss/sysstyle.css" rel="stylesheet"/>
            <script src="{{base_url()}}Interdesign/im/js/jquery-1.7.1.min.js"></script>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&amp;subset&#61;latin,vietnamese' rel='stylesheet' type='text/css'/>
            <script src="{{base_url()}}Interdesign/im/js/jmpress.js"></script>
            <script src="{{base_url()}}Interdesign/im/js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="{{base_url()}}syslib/slimScroll/slimScroll.js"></script>

            <link rel="stylesheet" href="{{base_url()}}syslib/jwysiwyg/jwysiwyg/jwysiwyg/jquery.wysiwyg.css" type="text/css"/>
            <script type="text/javascript" src="{{base_url()}}syslib/jwysiwyg/jwysiwyg/jwysiwyg/jquery.wysiwyg.js"></script>

            <link href='{{base_url()}}syslib/redactor/redactor.css' rel='stylesheet' type='text/css'/>
            <script src="{{base_url()}}syslib/redactor/redactor.js"></script>
    </head>

    <body style="padding: 0;margin: 0;background: none">
        {{include file="../../sys/01_notice.tpl"}}
        {{include file="../../sys/02_script.tpl"}}

<!--        <script src="{{base_url()}}syslib/nicEdit/nicEdit.js" type="text/javascript"></script>-->
        <div class="p12">

            <table class="w100pc">
                <tr>
                    <td class="w100">Họ và tên</td>
                    <td><input class="classic-input w160"/></td>
                    <td rowspan="4" style="width: 200px">
                        <div style="float: left; width: 200px">
                            <h3>The Companyname Inc.</h3>
                            <p class="text">
                                181/19 Hồng Lạc P.10 Q.Tân Bình<br/>
                                TP.Hồ Chí Minh - Việt Nam<br/>
                                Telephone: (+84) 985 747 240<br/>
                                E-mail: <a href="#">KhuongXuanTruong@gmail.com</a>
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Công ty</td>
                    <td><input class="classic-input w160"/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="classic-input w160"/></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input class="classic-input w160"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="pr10">
                            <div class="pr">
                                <textarea id="Content" name="Content" style="min-height: 96px" class="classic-input mceEditor w100pc rsv html-wysiwyg"></textarea>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <script>
            //$('#Content').redactor({ air: true });	
            if($('.html-wysiwyg').length){
                $('.html-wysiwyg').wysiwyg({
                    controls: {
                        strikeThrough : { visible : true },
                        underline     : { visible : true },

                        separator00 : { visible : true },

                        justifyLeft   : { visible : true },
                        justifyCenter : { visible : false },
                        justifyRight  : { visible : true },
                        justifyFull   : { visible : false },

                        separator01 : { visible : true },

                        indent  : { visible : true },
                        outdent : { visible : true },

                        separator02 : { visible : false },

                        subscript   : { visible : false },
                        superscript : { visible : false },

                        separator03 : { visible : false },

                        undo : { visible : false },
                        redo : { visible : false },

                        separator04 : { visible : false },

                        insertOrderedList    : { visible : true },
                        insertUnorderedList  : { visible : true },
                        insertHorizontalRule : { visible : false },
                        h1   : { visible : false },
                        h2   : { visible : false },
                        h3   : { visible : false },
                        separator06 : { visible : false },
                        separator07 : { visible : false },

                        cut   : { visible : false },
                        copy  : { visible : false },
                        paste : { visible : false },
                        separator09 : { visible : false },
                        removeFormat:{ visible : false }
                    }
                });
                $('.wysiwyg').css("width","100%");
                $('.wysiwyg iframe').css("width","100%");
            }
        </script>
    </body>
</html>