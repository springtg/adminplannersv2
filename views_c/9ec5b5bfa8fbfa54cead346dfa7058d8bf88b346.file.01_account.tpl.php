<?php /* Smarty version Smarty-3.1.7, created on 2012-08-14 06:12:15
         compiled from "application\views\admin-planners\account\01_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2950950220b52dff524-34632133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ec5b5bfa8fbfa54cead346dfa7058d8bf88b346' => 
    array (
      0 => 'application\\views\\admin-planners\\account\\01_account.tpl',
      1 => 1344915542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2950950220b52dff524-34632133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50220b52e41d2',
  'variables' => 
  array (
    '_SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50220b52e41d2')) {function content_50220b52e41d2($_smarty_tpl) {?>        
    <script type="text/javascript" src="<?php echo base_url();?>
script/admin-planners/01_account.js"></script>
    <script type="text/javascript">
        
    </script>
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            <?php if (!isset($_smarty_tpl->tpl_vars['_SESSION']->value["USER"])){?>
                LoginFRM._show();
            <?php }?>
            Account.init();
        });
        
    </script>
    <div style="padding-right: 22px;padding-left: 20px;">
        <div id='jqxWidget' style="position: relative;">
            <div id="jqxgrid"></div>
            <div type="button" 
                style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; 
                position: absolute;bottom: 4px;left: 4px;
                cursor: pointer; " title="New Account" 
                onclick="Account.edit_row(null);"
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
                    <li>Helper</li>
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
                    
                    
                </div>
                <div>
                    
                    
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