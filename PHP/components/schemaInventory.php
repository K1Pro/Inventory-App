<?php
    // If inventory was modified, import posted modifications
    $itemName =  $_POST['itemName'] ? $_POST['itemName'] : "";
    $subitemOf =  $_POST['subitemOf'] ? $_POST['subitemOf'] : "";
    $manufacturersPart = $_POST['manufacturersPart'] ? $_POST['manufacturersPart'] : "";
    $descOnPurchTrans = $_POST['descOnPurchTrans'] ? $_POST['descOnPurchTrans'] : "";
    $descOnSalesTrans = $_POST['descOnSalesTrans'] ? $_POST['descOnSalesTrans'] : "";
    $cost = $_POST['cost'] ? $_POST['cost'] : "";
    $COGSaccount = $_POST['COGSaccount'] ? $_POST['COGSaccount'] : "";
    $preferredVendor =  $_POST['preferredVendor'] ? $_POST['preferredVendor'] : "";
    $salesPrice = $_POST['salesPrice'] ? $_POST['salesPrice'] : "";
    $incomeAccount = $_POST['incomeAccount'] ? $_POST['incomeAccount'] : "";
    $assetAccount =  $_POST['assetAccount'] ? $_POST['assetAccount'] : "";
    $reorderPoint =  $_POST['reorderPoint'] ? $_POST['reorderPoint'] : "";
    $quantityOnHand =  $_POST['quantityOnHand'] ? $_POST['quantityOnHand'] : "";
?>