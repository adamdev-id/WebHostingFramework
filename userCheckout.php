<?php
  include 'config/connection.php';

  if (isset($_POST['submit']))
  {
    $selection = $_GET['selection'];
    switch ($selection)
    {
      case "userPurchase":
      {
        // code...
        $customer_name = $_POST["customerName"];
        $nationality = $_POST["nationality"];
        $customer_number = $_POST["customerNumber"];
        //$server_class = $_POST["serverClass"];
        $server_type = $_POST["serverType"];
        $total = $_POST["total"];
        $payment_type = $_POST["paymentType"];
        $rent_duration = $_POST["rentDuration"];
        $current_date = "CURRENT_DATE";
        //$serverID = $_GET['serverID'];

        /*
        $getCurrentDateSQL = "SELECT CURRENT_DATE";
        $queryResult = mysqli_query($conn, $getCurrentDateSQL);
        while ($row = mysqli_fetch_array($queryResult))
        {
          $current_date = $queryResult;
        }
        */    

        switch ($rent_duration)
        {
          case "rentDuration_monthly":
          {
            $discount = $total;
            $rent_duration = "DATE_ADD(CURRENT_DATE, INTERVAL 1 MONTH)";
          }
          break;
          case "rentDuration_quarterly":
          {
            $total = ($total * 3);
            $discount = $total * 0.1;
            $rent_duration = "DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH)";
          }
          break;
          case "rentDuration_semiannual":
          {
            $total = ($total * 6);
            $discount = $total * 0.2;
            $rent_duration = "DATE_ADD(CURRENT_DATE, INTERVAL 6 MONTH)";
          }
          break;
          case "rentDuration_annually":
          {
            $total = ($total * 12);
            $discount = $total * 0.3;
            $rent_duration = "DATE_ADD(CURRENT_DATE, INTERVAL 12 MONTH)";
          }
          break;
        }

        //debug
        /*
        echo '<br>';
        echo "Server Type   : " . $server_type;
        echo '<br>';
        echo "Customer Name : " . $customer_name;
        echo '<br>';
        echo "Payment Type  : " . $payment_type;
        echo '<br>';
        echo "Coupon        : " . NULL;
        echo '<br>';
        echo "Total         : " . $total;
        echo '<br>';
        echo "Current Date  : " . "CURRENT_DATE";
        echo '<br>';
        echo "Rent Duration : " . $rent_duration;
        echo '<br>';
        */
        //echo "INSERT INTO 'transaction'('ID', 'Package_ID', 'Customer_ID', 'Payment', 'Coupon', 'Total', 'Purchase_Date', 'Expired_Date') VALUES (NULL, '$server_type', '$customer_name', '$payment_type', NULL, $total, CURRENT_DATE, $rent_duration)";
              //INSERT INTO `transaction`(`Package_ID`, `Customer_ID`, `Payment`, `Coupon`, `Total`, `Purchase_Date`, `Expired_Date`) VALUES ('DP_B1', 'andi', 'Card', '', 65000, CURRENT_DATE, DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH))


        $sql = "INSERT INTO `Transaction`(`Package_ID`, `Customer_ID`, `Payment`, `Coupon`, `Total`, `Purchase_Date`, `Expired_Date`, `Upgrade_Package`) VALUES ('$server_type', '$customer_name', '$payment_type', '', $discount, CURRENT_DATE, $rent_duration, 'None')";
        /*
        echo '<br>';
        echo $sql;
        echo '<br>';
        */
        $queryResult = mysqli_query($conn, $sql);

        //var_dump($queryResult);

        $result = [
          'customerName' => $customer_name,
          'customerNumber' => $customer_number,
          'nationality' => $nationality,
          //'serverClass' => $server_class,
          'serverType' => $server_type,
          'rentDuration' => $rent_duration,
          'paymentType' => $payment_type,
          'total' => $total
        ];

        if ($queryResult)
        {
          //echo "Sukses";
          header("location: index_customerserverlist.php");
        }
        else
        {
          echo "Error! " . mysqli_error($conn);
        }
        /*
        while ($row = mysqli_fetch_array($queryResult))
        {
          //$result = json_encode($result);
          //print_r($result);
          echo "Sukses";
          //echo "<option value=" . echo $row['ID'] . ">" . echo $row['ID'] . "</option>";
        }
        */
      }
      break;
      case "userUpgrade":
      {
        $transactionID = $_POST["transactionID"];
        $upgradePackageID = $_POST["upgradePackageID"];
        $total = $_POST["total"];
        $payment_type = $_POST["paymentType"];
        $sql = "INSERT INTO `upgrade`(`ID`, `Upgrade_ID`, `Purchase_Date`, `Payment`, `Total`) VALUES ('$transactionID', '$upgradePackageID', CURRENT_DATE, '$payment_type', '$total')";
        $updatesql = "UPDATE `transaction` SET `Upgrade_Package` = '$upgradePackageID' WHERE ID = $transactionID";
        /*
        echo '<br>';
        echo $sql;
        echo '<br>';
        */
        
        $queryResult = mysqli_query($conn, $sql);
        $queryUpdateResult = mysqli_query($conn, $updatesql);

        if ($queryUpdateResult)
        {
          echo "Update Successful!";
        }
        else
        {
          echo "There's been an Error!" . mysqli_error($conn);
        }

        if ($queryResult)
        {
          //echo "Sukses";
          header("location: index_customerserverlist.php");
        }
        else
        {
          echo "There's been an Error!" . mysqli_error($conn);
        }
      }
      break;
    }
  }

  ?>