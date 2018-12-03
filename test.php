<?php

//     $curl = curl_init();

//     $my_apikey = "OL2UHKKNOM9QZR9Q3EC8";
//     $number = "919025371522";
//     $type = "IN";
//     $markaspulled = "0";
//     $getnotpulledonly = "1";
//     $api_url_in  = "http://panel.apiwha.com/get_messages.php";
//     $api_url_in .= "?apikey=". urlencode ($my_apikey);
//     $api_url_in .=	"&number=". urlencode ($number);
//     $api_url_in .= "&type=". urlencode ($type);

//     $api_url_in .= "&markaspulled=". urlencode ($markaspulled);
//     $api_url_in .= "&getnotpulledonly=". urlencode ($getnotpulledonly);

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => $api_url_in,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//     ));

//     $response = curl_exec($curl);
//     $results = json_decode($response);

//     $count = count($results);
//     $last_item = $results[$count -  1];
//     $userNumber = $last_item->from;

//     $servername = "190.97.166.223";
//     $username = "skylotoo_newtest";
//     $password = "newtest_sample";
//     $dbname = "skylotoo_newtest";
//     $text = '';

//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

// $sql_login = "SELECT id FROM users where phonenumber = '$userNumber' limit 1";
// $result_login = $conn->query($sql_login);

// if ($result_login->num_rows > 0) {
//     $user = $result_login->fetch_object();
//     $user_id = $user->id;

//     $test_data = $last_item->text;
//     $datas = explode(' ',$test_data);
//     //$datas = explode(' ','ABC 215 5');
//     $count = count($datas);
//     $betTime = $datas[$count - 1];
//     $boardA = '';$boardB = '';$boardC = '';
//     $role = '';$alpa='';$drawid = 0;
//     $totalCost = '';$currentPayment = '';

//     try{

//         $text =  "Wrong Bet try again.";
//         if ($count == 2){
//             $onlyNum = $datas[0];
//             $numArray = str_split($onlyNum);

//             if (count($numArray) != 3){
//                 sendMessage($userNumber, $text);
//                 return;
//             }

//             if (!is_numeric($onlyNum)){
//                 sendMessage($userNumber, $text);
//                 return;
//             }


//             $boardA = $numArray[0];
//             $boardB = $numArray[1];
//             $boardC = $numArray[2];
//             $role = '3';$alpa = 'ABC';

//         }else if ($count == 3){
//             $onlyNum = $datas[1];
//             $onlyStr = $datas[0];

//             $numArray = str_split($onlyNum);
//             $strArray = str_split($onlyStr);

//             if (count($numArray) != count($strArray)){
//                 sendMessage($userNumber, $text);
//                 return;
//             }


//             for ($i = 0; $i < count($strArray); $i++){
//                 if ($strArray[$i] == 'a' || $strArray[$i] == 'A'){
//                     $boardA = $numArray[$i];
//                     $alpa .= 'A';
//                 }else if ($strArray[$i] == 'b' || $strArray[$i] == 'B'){
//                     $boardB = $numArray[$i];
//                     $alpa .= 'B';
//                 }else if ($strArray[$i] == 'c' || $strArray[$i] == 'C'){
//                     $boardC = $numArray[$i];
//                     $alpa .= 'C';
//                 }else{
//                     sendMessage($userNumber, $text);
//                     return;
//                 }
//             }

//             if (count($numArray) == 3){
//                 $role = '3';
//             }

//             if (count($numArray) == 2){
//                 $role = '2';
//             }

//             if (count($numArray) == 1){
//                 $role = '1';
//             }



//         }else{
//             sendMessage($userNumber, $text);
//             return;
//         }


//     } catch (Exception $exception){
//         sendMessage($userNumber, $text);
//         return;
//     }

//     $sqlAdmin = "SELECT id,tDticketCost,sDticketCost,fDticketCost FROM admin_tdbets WHERE status = 'active' ORDER BY created_at DESC LIMIT 1";
//     $resultAdmin = $conn->query($sqlAdmin);

//     if( $resultAdmin->num_rows == 0 ) {
//         $text = "There aren't any active game now.";
//         sendMessage($userNumber, $text);
//         return;
//     }else {
//         while ($row = mysqli_fetch_assoc($resultAdmin)) {
//             if ($role == '3') {
//                 $totalCost = $row['tDticketCost'] * $betTime;
//             } elseif ($role == 2) {
//                 $totalCost = $row['sDticketCost'] * $betTime;
//             } else {
//                 $totalCost = $row['fDticketCost'] * $betTime;
//             }
//             $drawid = $row['id'];
//         }
//     }
//     $has_payment = $conn->query("SELECT id FROM payments WHERE userid = '$user_id'");

//     if($has_payment->num_rows == 0){
//         $text = "There isn't your payment account.";
//         sendMessage($userNumber, $text);
//         return;
//     }else{
//         $approve_payment = $conn->query("SELECT id,totalPayment FROM payments WHERE userid = '$user_id' AND status = '1' ORDER BY created_at DESC LIMIT 1");

//         if($approve_payment->num_rows == 0){
//             $text = "Please wait approve of your payment account.";
//             sendMessage($userNumber, $text);
//             return;
//         }else{
//             $left_payment = $approve_payment->fetch_object()->totalPayment;

//             if ($totalCost > $left_payment){
//                 $text = "You don't have enough deposit for buy.";
//                 sendMessage($userNumber, $text);
//                 return;
//             }else{
//                 $currentPayment = $left_payment-$totalCost;
//                 $conn->query("UPDATE payments SET totalPayment='$currentPayment' WHERE userid='$user_id'");

//                 $_SESSION["balance"] = $currentPayment;
//             }
//         }
//     }


//     $ticketData = $conn->query("SELECT ticketID FROM buyer_tdbets");

//     $tickets = $ticketData->fetch_all();

//     if (count($tickets) == 0){
//         $tmp =mt_rand(100000,999999);
//         $ticketid = $role.'D'.$drawid.$tmp;
//     }else{

//         while(true) {

//             $totalnum = 0;$partnum = 0;
//             $tmp =mt_rand(100000,999999);
//             $randNum = $role.'D'.$drawid.$tmp;

//             for ($i=0;$i<count($tickets);$i++) {
//                 $totalnum ++;
//                 $t_id = $tickets[$i];
//                 if ($t_id == $randNum) {
//                     break;
//                 }else{
//                     $partnum ++;
//                     $ticketid = $randNum;
//                     continue;
//                 }
//             }
//             if ($totalnum == $partnum){
//                 break;
//             }
//         }
//     }

//     $buyer_tdbets = "INSERT INTO buyer_tdbets (betType, betTimes, totalCost, boardA, boardB, boardC, ticketID, role, drawId, buyerId)
//             VALUES ('$role', '$betTime', '$totalCost', '$boardA', '$boardB', '$boardC', '$ticketid', '$role', '$drawid', '$user_id')";

//     if ($conn->query($buyer_tdbets) === TRUE) {
//         $text = "BetNo-".$alpa." ".$boardA.$boardB.$boardC." Cost-".$totalCost."₹"." ticketid-".$ticketid." Balance-".$currentPayment."₹";
//         sendMessage($userNumber, $text);
//         return;
//     }

// } else {
//     $text = "Please Login";
//     sendMessage($userNumber, $text);
//     return;
// }

// $conn->close();
// curl_close($curl);


// function sendMessage($userNumber, $text){

$curl = curl_init();

$my_apikey = "OL2UHKKNOM9QZR9Q3EC8";
$destination = 12012017727;
$message = 'text';
$api_url_out = "http://panel.apiwha.com/send_message.php";
$api_url_out .= "?apikey=". urlencode ($my_apikey);
$api_url_out .= "&number=". urlencode ($destination);
$api_url_out .= "&text=". urlencode ($message);
curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url_out,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;

} else {
    echo $response;

}
// }
?>





