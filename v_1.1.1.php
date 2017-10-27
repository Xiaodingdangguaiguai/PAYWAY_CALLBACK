<?php
# header to cross the domain


header('Access-Control-Allow-Origin:*');

$q = $_REQUEST["q"];
$cn_search = "https://api.payway.com.au/rest/v1/transactions/search-customer?customerNumber=".$q;

$cn_search_1 = "https://api.payway.com.au/rest/v1/transactions";
if($q == ""){
  echo "please input coustomer ID";
}else{
//echo $cn_search;
  $curl = curl_init();
#$search_trans = transactions/search-receipt?receiptNumber=;
#$cus_number =  ;
  curl_setopt_array($curl, array(
    CURLOPT_URL =>  $cn_search,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Basic VDEwNzg2X1NFQ191dHhheHNicXRjNHR0c3B4NHJwZmszY3gyYnRtZzR5ejZqcGYydm02OTNxeWVzYXN6M2hpbWU3OGR0aXM6",
      "cache-control: no-cache",
      "postman-token: 87462809-2020-5557-bc51-f845b7b1fe5b"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
#将json解码
  $de_response = json_decode($response, true);
#用户总数
#  $customer_amount = count($de_response['data']); 
#For loop 输出Customer Number 与 Customer Name

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
  //echo $cn_search;
    #echo $response;
    $tranid_amount = count($de_response['data']); 
    echo "<ul>"; //缩进
  #echo "TransactionID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Name : "; //&nbsp; 空格
    for($i=0; $i < $tranid_amount; $i++ ){
    #将json编码，显示Customer Number. 
    #echo "<li>".$CustomerNumber = json_encode($de_response['data'][$i]['customerNumber']). "</li>";
    #将json编码，显示Customer Name.
    #echo "<li>".$CustomerName = json_encode($de_response['data'][$i]['customerName'])."</li>";
    #客户No & Name
    
      $Number = json_encode($de_response['data'][$i]['transactionId']);    
      $Status = json_encode($de_response['data'][$i]['status']);
    
      echo "<li>". $Number. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $Status. "</li>";
    }
    echo "</ul>"; //结束缩进
  }

}
#}
#to get data if I can
#$q = $_REQUEST["q"];
#$hint = "";
