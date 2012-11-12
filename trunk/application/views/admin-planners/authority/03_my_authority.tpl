
<div class="">
    {{foreach $_SESSION["ADP-USER"]["Au"] as $au}}
    <div class="grid_12 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
        <div class="pt1 pb1 pl1 pr1">
            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                {{$au->Name}}
            </h4>
            <p class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0">
                {{$au->Note}}
            </p>
        </div>
    </div>
    {{/foreach}}
    <div class="clear"></div>
</div>