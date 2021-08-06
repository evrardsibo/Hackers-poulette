<?php
require "./assets/php/country.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer(true);
$nam = $lastname = $email = $sex = $subject = $message = "";
$namErr = $lastnameErr = $emailErr = $sexErr =$countryErr = $subjectErr = $messageErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isvalid = true;
    if (empty($_POST["name"])) {
        $namErr = "Name is required ";
        $isvalid = false;
    } else {
        $nam = test_input($_POST["name"]);

    }
    
    if (empty($_POST["lastname"])) {
        $lastnameErr = "lastname is required";
        $isvalid = false;
    } else {
        $lastname = test_input($_POST["lastname"]);
    }
      
    if (empty($_POST["email"])) {
        $emailErr = "Mail is required";
        $isvalid = false;
    } else {
        $email = test_input($_POST["email"]);
    }
  
    if (empty($_POST["sex"])) {
        $sexErr = "Gender is required";
        $isvalid = false;
    } else {
        $sex = test_input($_POST["sex"]);
    }
  
    if (empty($_POST["subject"])) {
        $subjectErr  = "Subject is required";
        $isvalid = false;
    } else {
        $subject = test_input($_POST["subject"]);
    }
    if (empty($_POST["message"])) {
        $messageErr  = "Subject is required";
        $isvalid = false;
    } else {
        $message = test_input($_POST["message"]);
    }
    if($isvalid){
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'df7544ab12c0f5';                     //SMTP username
        $mail->Password   = '83ac5a1f4f5ef8';                               //SMTP password
       // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 2525; 
        $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
        $mail->setFrom('replay@hackeuspoulette.com', 'php');
        $mail->addAddress($email);     //Add a recipient
                      
        $mail->addReplyTo('info@mailtrap.io', 'mailtrap');
        $mail->Subject = $subject; 
        $mail->Body = $message; 
        $mail->send();
    
      }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
    
    
    
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hackers Poulette</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/normalize.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6  offset-3 offset-3">
            <img  src="./assets/img/hackers-poulette-logo.png"  alt="Logo hackers-poulette"> 
            <div class="container1">

              <form id = "valid" name="vali" accept-charset="UTF-8" autocomplete="off" method="POST"  onsubmit="return validateform()"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <fieldset>
                <div class="form-group">
                    <h1>Support Team</h1>
                    <h3>Contact Form</h3>
                    <p><span class="error">* required field</span></p>
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="SIbomana">
                        <span class="error">* <?php echo $namErr;?></span>
                        
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Evrard">
                        <span class="error">* <?php echo $lastnameErr;?></span>
                        <input id="website" name="website" type="text" value="">
                       
                    </div>
                    <div class="form-group">
                        <label for="sex">Gender</label><br />
                        <input name="sex" type="radio" id="male" value="male"> Male <br/>
                        <input name="sex" type="radio" id="female" value="female"> Female <br/>
                        <input name="sex" type="radio" id="other" value="other"> Other <br/>
                        <span class="error">* <?php echo $sexErr ;?></span>
                       
                    </div>

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                         <input type="email" class="form-control" placeholder="name@example.com" id="mail" name="email">
                         <span class="error">* <?php echo $emailErr;?></span>
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-select" id="country" name="country">
                        <option value="BE" selected>Belgium</option>
                        <?php 
                        foreach($country as $countr){?>
                        <option value="<?php echo $countr?>"><?php echo $countr?></option>
                        <?php 
                        }
                    ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label><br />
                        <select name="subject" class="form-select">
                           <option  value="other"></option>
                            <option  value="other" selected>Other</option>
                            <option  value="sales">Sales</option>
                            <option  value="it">IT Support</option>
                            <option  value="change">Exchange</option>
                        </select>
                        <span class="error">* <?php echo $subjectErr;?></span>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" cols="30" rows="5" name="message" placeholder="Your message"></textarea><br /> 
                    </div>
                    <p style="color: red;" id="erreur"></p>
                  
                    <button type="submit" name="submit" class="btn btn-primary" value="Submit">Submit</button> 
                    </fieldset> 
                </form>
                </div>
            </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./assets/js/script.js"></script> 
        <script src="./assets/js/app.js"></script> 
        
</body>
</html>