
<div class=" mb4 mt4 ml4 mr4" style="border: 1px solid #ddd">
    <div class="pt1 pb1 pl1 pr1">
        <h4 class="pl8 pt7 pb8 pr8 ovfh mt0 mb0 mr0 ml0" style="background: #d7d7d7;margin: 0">
            Order Information
        </h4>
        <div class="pl8 pr8 pt8 pb8 mt0 mb0 ml0 mr0 ovfa">
            <div class="pt4 pb4 pl4 pr4" style="border: 1px solid white;
                 outline: 1px solid #98BF21;">
                <table >
                    <tr>
                        <td class="pr32">Order ID</td>
                        <td>{{$Data["OBJ"][0]->OrderID}}</td>
                        <td class="pl60 pr32">Customer ID</td>
                        <td>{{$Data["OBJ"][0]->CustomerID}}</td>
                    </tr>
                    <tr>
                        <td class="pr32">Order Date</td>
                        <td>{{$Data["OBJ"][0]->OrderDate}}</td>
                        <td class="pl60 pr32">Customer Name</td>
                        <td>{{$Data["OBJ"][0]->CustomerName}}</td>
                    </tr>
                    <tr>
                        <td class="pr32">Shipped Date</td>
                        <td>{{$Data["OBJ"][0]->ShippedDate}}</td>
                        <td class="pl60 pr32">Cash</td>
                        <td>{{$Data["OBJ"][0]->Monney}}</td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship Name</td>
                        <td>{{$Data["OBJ"][0]->ShipName}}</td>
                        <td class="pl60 pr32">Payment Type</td>
                        <td>{{$Data["OBJ"][0]->Paypal}}</td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship Address</td>
                        <td>{{$Data["OBJ"][0]->ShipAddress}}</td>
                        <td class="pl60 pr32">Status</td>
                        <td>{{$Data["OBJ"][0]->Status}}</td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship City</td>
                        <td>{{$Data["OBJ"][0]->ShipCity}}</td>
                        <td class="pl60 pr32"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship Region</td>
                        <td>{{$Data["OBJ"][0]->ShipRegion}}</td>
                        <td class="pl60 pr32"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship Postal Code</td>
                        <td>{{$Data["OBJ"][0]->ShipPostalCode}}</td>
                        <td class="pl60 pr32"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="pr32">Ship Country</td>
                        <td>{{$Data["OBJ"][0]->ShipCountry}}</td>
                        <td class="pl60 pr32"></td>
                        <td></td>
                    </tr>
                </table>

            </div>
            <div class="pt4 pb4 pl4 pr4 mt12" style="border: 1px solid white;
                 outline: 1px solid #98BF21;">
                <table class="ordertable">
                    <tr>
                        <th>ProductID</th>
                        <th>ProductName</th>
                        <th>UnitPrice</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Cash</th>
                    </tr>
                    {{foreach $Data["OBJ"] as $o}}
                        <tr>
                            <td>{{$o->ProductID}}</td>
                            <td>{{$o->ProductName}}</td>
                            <td>{{$o->UnitPrice}}</td>
                            <td>{{$o->Quantity}}</td>
                            <td>{{$o->Discount}}</td>
                            <td>{{$o->UnitPrice*$o->Quantity}}</td>
                        </tr>
                    {{/foreach}}
                </table>
            </div>
                <style type="text/css">
                .ordertable td,.ordertable th{border: 1px solid #98BF21;padding: 3px 8px 4px 8px}
                </style>

                
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="pt8">
    <button class="gray-button" onclick="FlexiGrid.CancelEdit();"><span>Back</span></button>
    <button class="green-button" onclick="FlexiGrid.Save();"><span>Save</span></button>
</div>