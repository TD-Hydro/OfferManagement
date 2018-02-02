<?php
function GetAll($dbhandle)
{

    $result = $dbhandle->query("SELECT * FROM offer");
    return $result;
}
function DeleteOld($dbhandle)
{
    $result = $dbhandle->exec("DELETE FROM offer WHERE Expire < DATE('now')");
    return $result;
}
function GetCoupon($dbhandle)
{

    $result = $dbhandle->query("SELECT * FROM coupon");
    return $result;
}
function DeleteExpireCoupon($dbhandle)
{
    $result = $dbhandle->exec("DELETE FROM coupon WHERE Expire < DATE('now')");
    return $result;
}
$handle = new SQLite3("offer.sq3");
$result = GetAll($handle);
$cp = GetCoupon($handle);
DeleteOld($handle);
DeleteExpireCoupon($handle);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <title>Offer</title>
    </head>

    <body>
        <h2 style="text-align:center;margin:0 0 -2rem 0">Card Offer</h2>
        <form action="oper.php" method="get" data-ajax="false">
            <table class="ui-body-d ui-shadow table-stripe ui-responsive" id="table-custom-2" data-role="table" data-mode="columntoggle"
                data-column-popup-theme="a" data-column-btn-text="Columns" data-column-btn-theme="b">
                <thead>
                    <tr class="ui-bar-d">
                        <th>Shop</th>
                        <th>Card</th>
                        <th>Condition</th>
                        <th data-priority="1">Expire</th>
                        <th data-priority="2">Remark</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetchArray()) {
                        echo("<tr>");
                        echo("<td>$row[Shop]</td>");
                        echo("<td>$row[Card]</td>");
                        echo("<td>$row[Condition]</td>");
                        echo("<td>$row[Expire]</td>");
                        echo("<td>$row[Remark]</td>");
                        echo("<td><a data-ajax=\"false\" class=\"ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all\" href=\"oper.php?op=del&id=$row[ID]\">No text</a></td>");
                        echo("</tr>");
                    }
                    ?>
                    <tr>
                        <td>
                            <input name="shop" id="shop" type="text" value="">
                        </td>
                        <td>
                            <select name="card" id="select-choice">
                                <option value="AMEX">AMEX</option>
                                <option value="BOA">BOA</option>
                                <option value="Discover">Discover 5%</option>
                                <option value="Other">IN Remark</option>
                            </select>
                        </td>
                        <td>
                            <input name="condition" id="condition" type="text" value="">
                        </td>
                        <td>
                            <input name="expire" id="expire" type="date" data-role="date" value="" data-clear-btn="false">
                        </td>
                        <td>
                            <input name="remark" id="remark" type="text" value="">
                            <input name="op" id="op" type="hidden" value="add">
                        </td>
                        <td>
                            <input type="submit" value="Icon only" data-icon="plus" data-iconpos="notext">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <h2 style="text-align:center;margin:0 0 -2rem 0">Coupon Offer</h2>
        <form action="oper.php" method="get" data-ajax="false">
            <table class="ui-body-d ui-shadow table-stripe ui-responsive" id="table-custom-2" data-role="table" data-mode="columntoggle"
                data-column-popup-theme="a" data-column-btn-text="Columns" data-column-btn-theme="b">
                <thead>
                    <tr class="ui-bar-d">
                        <th>Shop</th>
                        <th>Item</th>
                        <th>Condition</th>
                        <th data-priority="1">Expire</th>
                        <th data-priority="2">Remark</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $cp->fetchArray()) {
                        echo("<tr>");
                        echo("<td>$row[Shop]</td>");
                        echo("<td>$row[Item]</td>");
                        echo("<td>$row[Condition]</td>");
                        echo("<td>$row[Expire]</td>");
                        echo("<td>$row[Remark]</td>");
                        echo("<td><a data-ajax=\"false\" class=\"ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all\" href=\"oper.php?op=dec&id=$row[ID]\">No text</a></td>");
                        echo("</tr>");
                    }
                    ?>
                    <tr>
                        <td>
                            <input name="shop" id="shop" type="text" value="">
                        </td>
                        <td>
                            <input name="item" id="item" type="text" value="">
                        </td>
                        <td>
                            <input name="condition" id="condition" type="text" value="">
                        </td>
                        <td>
                            <input name="expire" id="expire" type="date" data-role="date" value="" data-clear-btn="false">
                        </td>
                        <td>
                            <input name="remark" id="remark" type="text" value="">
                            <input name="op" id="op" type="hidden" value="adc">
                        </td>
                        <td>
                            <input type="submit" value="Icon only" data-icon="plus" data-iconpos="notext">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>

    </html>