<script>
            $(document).ready(function () {
                $('#slider').cycle({ 
                    fx:     'fade',
                    prev:   '#arrow-pre', 
                    next:   '#arrow-nex', 
                    //pager:  '#nav', 
                    //pagerAnchorBuilder: function(idx, slide) { 
                    //    return '<a href="#"></a>'; 
                    //},      
                    timeout: 3000 
                });
            });
        </script>

    </body>
</html>