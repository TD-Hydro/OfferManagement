<?php
if ($_GET["op"] == "del") {
    $handle = new SQLite3("offer.sq3");
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM offer WHERE ID = $id";
    $result = $handle->exec($sql);
    if ($result >= 1) {
        echo ("<script>alert(\"Delete Success\");window.location.href=\"offer.php\"</script>");
    } else {
        echo ("<script>alert(\"Delete Failed\");window.location.href=\"offer.php\"</script>");
    }
} else if ($_GET["op"] == "add") {
    $handle = new SQLite3("offer.sq3");
    $shop = htmlentities($_GET["shop"]);
    $card = htmlentities($_GET["card"]);
    $condition = htmlentities($_GET["condition"]);
    $expire = htmlspecialchars($_GET["expire"]);
    $remark = htmlentities($_GET["remark"]);

    $sql = "INSERT INTO offer (Shop,Card,Condition,Expire,Remark) VALUES (\"$shop\",\"$card\",\"$condition\",\"$expire\",\"$remark\")";
    $result = $handle->exec($sql);
    if ($result >= 1) {
        echo ("<script>alert(\"Add Success\");window.location.href=\"offer.php\"</script>");
    } else {
        echo ("<script>alert(\"Add Failed\");window.location.href=\"offer.php\"</script>");
    }
}
else if ($_GET["op"] == "dec") {
    $handle = new SQLite3("offer.sq3");
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM coupon WHERE ID = $id";
    $result = $handle->exec($sql);
    if ($result >= 1) {
        echo ("<script>alert(\"Delete Success\");window.location.href=\"offer.php\"</script>");
    } else {
        echo ("<script>alert(\"Delete Failed\");window.location.href=\"offer.php\"</script>");
    }
} else if ($_GET["op"] == "adc") {
    $handle = new SQLite3("offer.sq3");
    $shop = htmlentities($_GET["shop"]);
    $item = htmlentities($_GET["item"]);
    $condition = htmlentities($_GET["condition"]);
    $expire = htmlspecialchars($_GET["expire"]);
    $remark = htmlentities($_GET["remark"]);

    $sql = "INSERT INTO coupon (Shop,Item,Condition,Expire,Remark) VALUES (\"$shop\",\"$item\",\"$condition\",\"$expire\",\"$remark\")";
    $result = $handle->exec($sql);
    if ($result >= 1) {
        echo ("<script>alert(\"Add Success\");window.location.href=\"offer.php\"</script>");
    } else {
        echo ("<script>alert(\"Add Failed\");window.location.href=\"offer.php\"</script>");
    }
}
?>
