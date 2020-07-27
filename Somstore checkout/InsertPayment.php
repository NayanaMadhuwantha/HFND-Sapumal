<?php
session_start();
include('../config.php');

$sql="INSERT INTO payment (Full_Name, Email, Postal_Code, Address, Country, City, Phone, Warehouse_ID, Dilivery_Address, date, Total_Amount) 
VALUES ('$_POST[fullname]', '$_POST[email]', '$_POST[pcode]', '$_POST[address]', '$_POST[country]', '$_POST[city]', '$_POST[phone]', '$_POST[warehouse]', '$_POST[delivery]','$_POST[date]', '$_POST[Totalka]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  session_start();
if(session_destroy())
{
 header("location: process.php");
 echo "1 payment method has been processed";
}


/* 
 * Nothing goes here.
 */

$user = "94766462180";
$password = "1840";
$text = urlencode(" Miss.A.B.M Wathsala You have successfully payed for HFND.COM. 
You have charged 2$ from your paypal account.
Dilivery Address:Welimada,Bandarawela.
Thank you..");
$to = "$_POST[phone]";
 
$baseurl ="http://www.textit.biz/sendmsg";
$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
$ret = file($url);
 
$res= explode(":",$ret[0]);
 
if (trim($res[0])=="OK")
{
echo "Message Sent - ID : ".$res[1];
}
else
{
echo "Sent Failed - Error : ".$res[1];
}

 mysqli_close($mysqli);
?> 
