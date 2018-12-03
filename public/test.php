<?php
    session_start();

     $curl = curl_init();

     $my_apikey = "OL2UHKKNOM9QZR9Q3EC8";
     $number = "919025371522";
     $type = "IN";
     $markaspulled = "0";
     $getnotpulledonly = "0";
     $api_url_in  = "http://panel.apiwha.com/get_messages.php";
     $api_url_in .= "?apikey=". urlencode ($my_apikey);
     $api_url_in .=	"&number=". urlencode ($number);
     $api_url_in .= "&type=". urlencode ($type);

     $api_url_in .= "&markaspulled=". urlencode ($markaspulled);
     $api_url_in .= "&getnotpulledonly=". urlencode ($getnotpulledonly);

     curl_setopt_array($curl, array(
         CURLOPT_URL => $api_url_in,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
     ));

     $response = curl_exec($curl);
     $results = json_decode($response);
     $count = count($results);

//     echo $response;die();
     if (!Isset($_SESSION ['messageID'])){
        $_SESSION['messageID'] = $results[$count - 2];
     }

     $m_id = array();
     $pendingMessagesText = array("4231 1, abe 425 3, bcd 231 5, ce 35 1, e 1 1");
     $pendingMessagesFrom = array('12012017727');

     $last_item = $results[$count -  1];

     for ($i = 0; $i < $count; $i++){
         if ($results[$i]->id == $_SESSION["messageID"]){
             array_push($pendingMessagesFrom, $results[$i]->from);
             array_push($pendingMessagesText, $results[$i]->text);
             array_push($m_id,$results[$i]->id);
         }
     }

//     $servername = "190.97.166.223";
//     $username = "skylotoo_newtest";
//     $password = "newtest_sample";
//     $dbname = "skylotoo_newtest";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "skylotoo_skyloto";

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }

     for ($pend=0;$pend<count($pendingMessagesText);$pend++) {

         $userNumber = $pendingMessagesFrom[$pend];

         $text = '';

         $sql_login = "SELECT id FROM users where phonenumber = '$userNumber' limit 1";
         $result_login = $conn->query($sql_login);

         if ($result_login->num_rows > 0) {
             $user = $result_login->fetch_object();
             $user_id = $user->id;

             $test_data = $pendingMessagesText[$pend];

//             $test_data = explode(' ','ABC 215 5');

             $multiDatas = str_replace(array("\n", ', '), ',', $test_data);
             $multiDatas = explode(',', $multiDatas);
             $multiCount = count($multiDatas);

             $boardA = '';
             $boardB = '';
             $boardC = '';
             $boardD = '';
             $boardE = '';
             $role = '';
             $totalCost = 0;
             $currentPayment = '';
             $error = '';
             $success = '';
             $poor_deposite = '';

             for ($mul = 0;$mul < $multiCount;$mul++) {

                 $datas = explode(' ', $multiDatas[$mul]);
                 $count = count($datas);
                 $betTime = $datas[$count - 1];
                 $drawid = 0;
                 $eachCost = 0;
                 $onlyNum = '';
                 $winningPrize = 0;
                 $right = 0;
                 $alpa = '';

//                 var_dump($multiDatas);
//                 echo $multiCount;
//                 die();
                 try {

//                     echo $count;die();
                     $text = "Wrong Bet try again.";
                     if ($count == 2) {
                         $onlyNum = $datas[0];
                         $numArray = str_split($onlyNum);

//                         echo $onlyNum." ///";echo $numArray;die();
                         if (count($numArray) > 4) {
//                             echo count($numArray);die();
                             if($multiCount == 1){
                                 sendMessage($userNumber, $text, $m_id[$pend]);
                                 break;
                             }else{
                                 $error .= $onlyNum." ";
                                 continue;
                             }
                         }

                         if (!is_numeric($onlyNum)) {
//                             echo $onlyNum;die();
                             if ($multiCount == 1) {
                                 sendMessage($userNumber, $text, $m_id[$pend]);
                                 break;
                             }else{
                                 $error .= $onlyNum." ";
                                 continue;
                             }
                         }

                         if (count($numArray) == 1){
                             $boardA = $numArray[0];
                             $role = '1';
                             $alpa = 'A';
                         }elseif (count($numArray) == 2){
                             $boardB = $numArray[1];
                             $role = '2';
                             $alpa = 'AB';
                         }elseif (count($numArray) == 3){
                             $boardC = $numArray[2];
                             $role = '3';
                             $alpa = 'ABC';
                         }else {
                             $boardD = $numArray[3];
                             $role = '4';
                             $alpa = 'ABCD';
                         }


                     } else if ($count == 3) {
                         $onlyNum = $datas[1];
                         $onlyStr = $datas[0];

                         $numArray = str_split($onlyNum);
                         $strArray = str_split($onlyStr);

//                         echo $onlyNum." ///";echo $onlyStr;die();

                         if (count($numArray) != count($strArray)) {
                             if($multiCount == 1) {
                                 sendMessage($userNumber, $text, $m_id[$pend]);
                                 break;
                             }else{
                                 $error .= $onlyNum." ";
                                 continue;
                             }
                         }


                         for ($i = 0; $i < count($strArray); $i++) {
                             if ($strArray[$i] == 'a' || $strArray[$i] == 'A') {
                                 $boardA = $numArray[$i];
                                 $alpa .= 'A';
                             } else if ($strArray[$i] == 'b' || $strArray[$i] == 'B') {
                                 $boardB = $numArray[$i];
                                 $alpa .= 'B';
                             } else if ($strArray[$i] == 'c' || $strArray[$i] == 'C') {
                                 $boardC = $numArray[$i];
                                 $alpa .= 'C';
                             } else if ($strArray[$i] == 'd' || $strArray[$i] == 'D') {
                                 $boardD = $numArray[$i];
                                 $alpa .= 'D';
                             } else if ($strArray[$i] == 'e' || $strArray[$i] == 'E') {
                                 $boardE = $numArray[$i];
                                 $alpa .= 'E';
                             }else {
                                 if($multiCount == 1){
                                     sendMessage($userNumber, $text, $m_id[$pend]);
                                     break;
                                 }else{
                                     $error .= $onlyNum." ";
                                     continue;
                                 }
                             }
                         }

                         if (count($numArray) == 4) {
                             $role = '4';
                         }

                         if (count($numArray) == 3) {
                             $role = '3';
                         }

                         if (count($numArray) == 2) {
                             $role = '2';
                         }

                         if (count($numArray) == 1) {
                             $role = '1';
                         }


                     } else {

                         if ($multiCount == 1) {
                             sendMessage($userNumber, $text, $m_id[$pend]);
                             break;
                         }else{
                             $error .= $datas[0]." ";
                             continue;
                         }
                     }

                 } catch (Exception $exception) {
                     if ($multiCount == 1) {
                         sendMessage($userNumber, $text, $m_id[$pend]);
                         break;
                     }else{
                         $error .= $datas[0]." ";
                         continue;
                     }
                 }

                 $sqlAdmin = "SELECT * FROM admin_picbets WHERE status = 'active' ORDER BY created_at DESC LIMIT 1";
                 $resultAdmin = $conn->query($sqlAdmin);

                 if ($resultAdmin->num_rows == 0) {
                     $text = "There aren't any active game now.";
                     sendMessage($userNumber, $text, $m_id[$pend]);
                     break;
                 } else {
                     while ($row = mysqli_fetch_assoc($resultAdmin)) {

                         $array_inputNum = array($boardA,$boardB,$boardC,$boardD,$boardE);
                         $array_winningNumm = array($row['boardA'],$row['boardB'],$row['boardC'],$row['boardD'],$row['boardE']);

                         if($role == 4){
                             $winningPrize = $row['prizeFor'] * $betTime;
                         }elseif ($role == 3){
                             $winningPrize = $row['prizeThr'] * $betTime;
                         }elseif ($role == 2){
                             $winningPrize = $row['prizeTwo'] * $betTime;
                         }else{
                             $winningPrize = $row['prizeOne'] * $betTime;
                         }

                         for($a=0;$a<5;$a++){
                             if($array_inputNum[$a] != ''){

                                 if($array_inputNum[$a] != $array_winningNumm[$a]){

                                     $error .= $onlyNum." ";
                                     $right = 1;
                                     break;
                                 }
                             }
                         }

                         $eachCost = $row['ticketCost'] * $betTime;

                         $drawid = $row['id'];
                     }
                 }

                 if ($right == 1){

                     if($multiCount == 1) {
                         $text = "Wrong BET " . $error . "Try again.";
                         sendMessage($userNumber, $text, $m_id[$pend]);
                     }
                     continue;
                 }

                 $has_payment = $conn->query("SELECT id FROM payments WHERE userid = '$user_id'");

                 if ($has_payment->num_rows == 0) {
                     $text = "There isn't your payment account.";
                     sendMessage($userNumber, $text, $m_id[$pend]);
                     break;
                 } else {
                     $approve_payment = $conn->query("SELECT id,totalPayment FROM payments WHERE userid = '$user_id' AND status = '1' ORDER BY created_at DESC LIMIT 1");

                     if ($approve_payment->num_rows == 0) {
                         $text = "Please wait approve of your payment account.";
                         sendMessage($userNumber, $text, $m_id[$pend]);
                         break;
                     } else {
                         $left_payment = $approve_payment->fetch_object()->totalPayment;

                         if ($eachCost > $left_payment) {
                             if($multiCount == 1) {
                                 $text = "You don't have enough deposit for buy.";
                                 sendMessage($userNumber, $text, $m_id[$pend]);
                                 break;
                             }else{
                                 $poor_deposite = $mul;
                                 break;
                             }
                         } else {
                             $currentPayment = $left_payment - $eachCost;
                             $conn->query("UPDATE payments SET totalPayment='$currentPayment' WHERE userid='$user_id'");

                             $_SESSION["balance"] = $currentPayment;
                         }
                     }
                 }


                 $ticketData = $conn->query("SELECT ticketID FROM buyer_tdbets");

                 $tickets = $ticketData->fetch_all();

                 if (count($tickets) == 0) {
                     $tmp = mt_rand(10000, 99999);
                     $ticketid = $role . 'P' . $drawid . $tmp;
                 } else {

                     while (true) {

                         $totalnum = 0;
                         $partnum = 0;
                         $tmp = mt_rand(10000, 99999);
                         $randNum = $role . 'P' . $drawid . $tmp;

                         for ($i = 0; $i < count($tickets); $i++) {
                             $totalnum++;
                             $t_id = $tickets[$i];
                             if ($t_id == $randNum) {
                                 break;
                             } else {
                                 $partnum++;
                                 $ticketid = $randNum;
                                 continue;
                             }
                         }
                         if ($totalnum == $partnum) {
                             break;
                         }
                     }
                 }

                 $buyer_picbets = "INSERT INTO buyer_picbets (betType, betTimes, totalCost, boardA, boardB, boardC, boardD, boardE,winningPrize, ticketID, drawId, buyerId)
             VALUES ('$role', '$betTime', '$eachCost', '$boardA', '$boardB', '$boardC', '$boardD', '$boardE', '$winningPrize', '$ticketid', '$drawid', '$user_id')";

                 if ($conn->query($buyer_picbets) === TRUE) {
                     if ($multiCount == 1) {
                         $text = "BetNo-" . $alpa . " " . $boardA . $boardB . $boardC . $boardD . $boardE. " Cost-" . $eachCost . "₹" . " ticketid-" . $ticketid . " Balance-" . $currentPayment . "₹";
                         sendMessage($userNumber, $text, $m_id[$pend]);
                         break;
                     }else{

                         $totalCost = $totalCost + $eachCost;
                         $success .= $alpa . $onlyNum ." ";
                     }
                 }
             }


             if ($multiCount > 1){

                 if(is_null($poor_deposite)) {

                     if ($poor_deposite == 0){
                         $text = "You don't have enough deposit for buy.";
                         sendMessage($userNumber, $text, $m_id[$pend]);
                     }else{

                         $text = "Success BET " . $success . " Cost-" . $totalCost . "₹" . " Balance-". $currentPayment . "₹ Poor Deposit";
                         sendMessage($userNumber, $text, $m_id[$pend]);
                     }
                 }elseif ($success == ''){

                     $text = "Wrong BET " . $error . "Try again.";
                     sendMessage($userNumber, $text, $m_id[$pend]);
                 } elseif($error == '') {

                     $text = "Success BET " . $success . " Cost-" . $totalCost . "₹" . " Balance-". $currentPayment . "₹";
                     sendMessage($userNumber, $text, $m_id[$pend]);
                 } else{

                     $text = "Success BET " . $success . " Cost-" . $totalCost . "₹" . " Balance-". $currentPayment . "₹ Wrong BET " . $error;
                     sendMessage($userNumber, $text, $m_id[$pend]);
                 }
             }

         } else {
             $text = "Please Login";
             sendMessage($userNumber, $text, $m_id[$pend]);
             continue;
         }

         $conn->close();
         curl_close($curl);
     }

    function sendMessage($userNumber, $text, $m_id){

         echo $userNumber." //";echo $text;

//    $curl = curl_init();
//
//    $my_apikey = "OL2UHKKNOM9QZR9Q3EC8";
//    $destination = $userNumber;
//    $message = $text;
//    $api_url_out = "http://panel.apiwha.com/send_message.php";
//    $api_url_out .= "?apikey=". urlencode ($my_apikey);
//    $api_url_out .= "&number=". urlencode ($destination);
//    $api_url_out .= "&text=". urlencode ($message);
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => $api_url_out,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//    ));
//
//    $response = curl_exec($curl);
//
//    $_SESSION["messageID"] = $m_id;
//
//    $err = curl_error($curl);
//
//    curl_close($curl);
//
//    if ($err) {
//        echo "cURL Error #:" . $err;
//
//    } else {
//        echo $response;
//
//    }
 }
?>





