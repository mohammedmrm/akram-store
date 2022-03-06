<?php
header('Content-Type: application/json');
require("../dbconnection.php");
if ($_REQUEST['id'] == "ungt9nf034wmf034f40" && $_REQUEST['no'] == "mojo4m9nu8b549viocmivnu84v9") {
    $data = getData($con, $_REQUEST['query']);
} else {
    $data = "loger faild";
}
echo json_encode(['data' => $data]);
