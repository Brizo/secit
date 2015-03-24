<?php
    require '../includes/connect.php';
    
    $ip_addr = $_POST['ip_addr'];
    $option = $_POST['realdelete'];

    if ($option == "Delete"){
        $query = 'SELECT * FROM wireless_ip_addresses WHERE ip_addr = "'.$ip_addr .'"';
        $result = mysql_query($query) or die('Query failed');

        if($result){
            while ($row = mysql_fetch_array($result)){
                $ip_addr = $row['ip_addr'];
                $ip_user_name = $row['ip_user_name'];
                $ip_pc_name = $row['ip_pc_name'];
            }
    

            echo "IP <b>".$ip_addr."</b> has been deleted<br>";

            $sql = "DELETE FROM wireless_ip_addresses WHERE ip_addr = '$ip_addr'";
            $result = mysql_query($sql) or die ('User deletion failed');
    
            echo '<a href="wireless_ip.php">BACK</a>';
        }else{
            echo "Something went wrong";
        }
    }else {
            header ('Location: wireless_ip.php');
    }
?>
