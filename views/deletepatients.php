<?php
include_once "..\includes\db.php";
$db = Database::getInstance();
	$conn = $db->getConnection();
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $pid = $_GET['pid'];

    $drsql = "DELETE FROM patient WHERE uid = $uid";
    if ($conn->query($drsql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting : " . $conn->error;
    }
    
    $sql = "DELETE FROM user_acc WHERE uid = $uid";
    if ($conn->query($sql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting drs: " . $conn->error;
    }
    $sql = "DELETE FROM diagnosis WHERE uid = $uid";
    if ($conn->query($sql) === TRUE) {
        header("location:adminsearch.php");
    } else {
        echo "Error deleting patientinfo: " . $conn->error;
    }
   
} else {
    echo "Invalid ID.";
}
?>
