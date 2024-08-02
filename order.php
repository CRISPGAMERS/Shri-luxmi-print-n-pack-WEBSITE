<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $customerName = strip_tags(trim($_POST["customerName2"]));
    $customerName = str_replace(array("\r","\n"),array("",""),$customerName);
    $phone= trim($_POST["phoneNumber2"]);
    $email = filter_var(trim($_POST["email2"]), FILTER_SANITIZE_EMAIL);
    $itemDetails = strip_tags(trim($_POST["itemDetails2"]));
    $itemDetails = str_replace(array("\r","\n"),array("",""),$itemDetails);
    $quantity =strip_tags(trim($_POST["quantity2"]));
    $referenceNumber = strip_tags(trim($_POST["referenceNo"]));
    $quantity = str_replace(array("\r","\n"),array("",""),$quantity);
    $orderDetails = trim($_POST["orderDetails"]);
    // $file = $_FILES['file'];
    // $file_name = $_FILES["file"]["name"];
    // $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
    // $expensions= array("jpeg","jpg","png","doc","docx","xml","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document");
    // in_array($file_ext,$expensions)=== false OR
    if( empty($quantity) OR empty($itemDetails) OR !filter_var($phone, FILTER_VALIDATE_INT) OR empty($customerName) OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL)){
      http_response_code(400);
      echo "Oops! There was a problem with your submission. Please complete the form and try again.";
      exit;
    }
    $recipient = "anum@cockar.com";
    $subject = "ORDER received from $customerName";
    $email_content = "Name:$customerName\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Business Phone#:\n$phone\n";
    $email_content .= "Item(s):\n$itemDetails\n";
    $email_content .= "Quantity:\n$quantity\n";
    $email_content .= "Reference No:\n$referenceNumber\n";
    $email_content .= "Other Details:\n$orderDetails\n";
    $email_headers = "From:$customerName<$email>";
    if(mail($recipient, $subject, $email_content, $email_headers))
  //set a 200(okay) response code.
      http_response_code(200);
      echo "Thankyou! Your order has been received by Executive Printing Works Ltd.
      You will receive a confirmation email once your order is accepted";
    }else{
      http_response_code(403);
      echo "There was a problem with your submission, please try again.";
    }
?>
