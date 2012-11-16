<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Product Information</a></li>
        <li><a href="#tabs-2">Album of product</a></li>
        <li><a href="#tabs-3">guide</a></li>
    </ul>
    <div id="tabs-1">
        <input type="hidden" name="txtID" id="txtID" value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ProductID|escape:'html'}}{{/if}}"/>
        <table class="w720px">
            <tr>
                <td class="w100 tar red">Product Name</td>
                <td>
                    <div class="pr10">
                        <input id="txtProductName" name="txtProductName" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ProductName|escape:'html'}}{{/if}}"
                               onblur="getAlias()"
                               />
                    </div>
                </td>
                <td class="w100 tar red">Alias</td>
                <td>
                    <div class="pr10">
                        <input id="txtAlias" name="txtAlias" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Alias|escape:'html'}}{{/if}}"
                               />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Product Title</td>
                <td>
                    <div class="pr10">
                        <input id="txtTitle" name="txtTitle" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->ProductTitle|escape:'html'}}{{/if}}"
                               />
                    </div>
                </td>
                <td class="w100 tar red">Product Image</td>
                <td>
                    <div class="pr10 pr">
                        <input id="txtImage" name="txtImage" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Image|escape:'html'}}{{/if}}"
                               />
                        <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                             onclick="BrowseServer( 'Images:/', 'txtImage' );"
                             title="Choose image from my host"
                             >
                        </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Category</td>
                <td>
                    <div class="pr">
                    <select id="cbxCategory" name="cbxCategory" class="classic-select w100pc">
                        <option value="Unknown">Unknown</option>
                        {{if isset($_SESSION["productcategory"])}}
                            {{foreach $_SESSION["productcategory"] as $k=>$v}}
                                <option 
                                    {{if isset($Data["OBJ"])}}{{if $v["Name"]==$Data["OBJ"]->Categorys}}selected=1{{/if}}{{/if}}
                                    value="{{$v["Name"]}}">{{$v["Name"]}}</option>
                            {{/foreach}}
                        {{/if}}
                    </select>
                    <a href="{{base_url('admin-planners/product/category')}}" class="pa hover50 icon16 chooseimage more_icon"
                            title="More type"></a>
                    </div>
                </td>
                <td class="w100 tar">Supplier</td>
                <td>
                    <div class="pr10">
                        <input id="txtSupplier" name="txtSupplier" type="text"  class="classic-input w100pc"
                               value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Supplier|escape:'html'}}{{/if}}"
                               />
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Amount</td>
                <td colspan="3">
                    <table class="m0 p0 w100pc" style="border: none;border-spacing: 0">
                        <tr>
                            <td class="m0 p0">
                                <div class="pr10">
                                    <input id="txtAmount" name="txtAmount" type="number" min="0"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Amount|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                            <td class="w100 tar red">Quantity Per Unit</td>
                            <td>
                                <div class="pr10">
                                    <input id="txtQuantity" name="txtQuantity" type="text"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->QuantityPerUnit|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                            <td class="w100 tar red">Start Date</td>
                            <td>
                                <div class="pr10">
                                    <input id="txtStartDate" name="txtStartDate" type="text"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->StartDate|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td class="w100 tar red">Unit Price</td>
                <td colspan="3">
                    <table class="m0 p0 w100pc" style="border: none;border-spacing: 0">
                        <tr>
                            <td class="m0 p0">
                                <div class="pr10">
                                    <input id="txtUnitPrice" name="txtUnitPrice" type="number" min="0"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->UnitPrice|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                            <td class="w100 tar red">Unit On Order</td>
                            <td>
                                <div class="pr10">
                                    <input id="txtUnitOnOrder" name="txtUnitOnOrder" type="number" min="0"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->UnitsOnOrder|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                            <td class="w100 tar red">End Date</td>
                            <td>
                                <div class="pr10">
                                    <input id="txtEndDate" name="txtEndDate" type="text"  class="classic-input w100pc"
                                           value="{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->EndDate|escape:'html'}}{{/if}}"
                                           />
                                </div>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td class="w100 tar vtat"><label class="lh24">Tag</label></td>
                <td>
                    <div class="pr10">
                        <textarea id="txtTag" name="txtTag" style="resize: vertical;" class="classic-input w100pc">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Tag|escape:'html'}}{{/if}}</textarea>
                    </div>
                </td>
                <td class="w100 tar vtat"><label class="lh24">Feature</label></td>
                <td>
                    <div class="pr10">
                        <textarea id="txtFeature" name="txtFeature" style="resize: vertical;" class="classic-input w100pc">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Feature|escape:'html'}}{{/if}}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100 tar vtat red"><label class="lh24 red">Content</label></td>
                <td id="tdContent" colspan="3">
                    <div id="txtContent" style="min-height: 100px">{{if isset($Data["OBJ"])}}{{$Data["OBJ"]->Content}}{{/if}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div id="tabs-2">
        <div class="w720px">
            <div id="AlbumItems">
                {{if isset($Data["OBJ"])}}
                    {{$albums=json_decode($Data["OBJ"]->Album)}}
                    
                    {{for $foo=0 to count($albums)-1}}
                    <div class="AlbumItem grid_3 mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
                        <div class="pt1 pb1 pl1 pr1">
                            <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
                                Album item
                            </h4>
                            <div class="pa r8 t8">
                                <span style="cursor: pointer" onclick="DelAlbumItem(this)">✖</span>
                            </div>
                            <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
                                <img class="w100pc" src="{{$albums[$foo]}}"/>
                            </div>
                        </div>
                    </div>
                    {{/for}}
                {{/if}}
            </div>
            <div class="clear"></div>
            <div class="tac w100pc">
                <span style="cursor: pointer" onclick="GenAlbumItemFromContent()"><tt>Auto get images from content of product.</tt></span>
            </div>
            <div class="clear"></div>
            <div class="grid_x pt12 pb12 mt12" style="border-top:1px dotted #ccc">
                <div class="grid_3"><label class="lh24">Album item</label></div>
                <div class="grid_10 pr32">
                    <div class="pr10 pr">
                        <input id="txtAddImage" class="classic-input w100pc"/>
                        <div class="pa hover50 icon16 chooseimage chooseimage_icon"
                             onclick="BrowseServer( 'Images:/', 'txtAddImage' );"
                             title="Choose image from my host"
                             >
                        </div>
                    </div>
                </div>
                <div class="grid_4">
                    <button class="classic-button" onclick="AddAlbumItem()"><span>Add</span></button>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="tabs-3">
        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
    </div>
</div>
<div class="pt8">
    <button class="gray-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
    <button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>
</div>
<script>
    $(function() {
        $( "#tabs" ).tabs();
        addEditorContent("txtContent");
    });
</script>