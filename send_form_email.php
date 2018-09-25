<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125112334-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125112334-2');
</script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank You</title>
  <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
</head>
<body>
<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ptiernan@gmail.com";
    $email_subject = "Message from Larry's DIY website";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['number']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['number']; // not required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "name: ".clean_string($name)."\n";
    $email_message .= "email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($number)."\n";
    $email_message .= "message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

<!-- javascript redirect or PhP redirect-->

<?php
 
}
?>
<div class="container_contact">
        <header class="header">
            <div class="logo">
              <img src="img/larryslogo.jpg" alt="Larry's Logo" class="logo-pic">
            </div>
            <div class="slogan">Gracepark Road, Drumcondra | 01-8373490</div>
          
              <ul class="main-nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#services">Services</a></li>
                <li><a href="index.html#about-us">About us</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
           
          </header>
          <div class="banner">
              <h1 class="pageHeader">
                  <span>Contact </span> Larry's
              </h1>

          </div>
          <div class="thankyou">
<h1> Thank you for contacting us. We will be in touch with you very soon. </h1>
<!-- I can just insert basic HTML and link here --> 
<p> To return to the home page, please click <a href="index.html" class="php_button"> here </a> </p>

</div>
<footer class="footer">
              <div class="footer__phone-fax">
                <div class="footer__phone-fax__phone">
                  Ph:  01 8373490
                </div>
              </div>
  
              <div class="footer__email">
                info@larrysdiy.ie
              </div>
              <div class="footer__address">
                17 Gracepark Road (Richmond Rd end), Drumcondra, Dublin 9
              </div>
              <div class="footer__copyright">
                &copy; Rocket.Chip Web Solutions 2018
              </div>
            </footer>
</div>
</body>
</html>
