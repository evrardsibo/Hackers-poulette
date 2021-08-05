<?php
require "./assets/php/country.php";

// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $errors = [];
//     $names = ["name", "lastname", "email", "country", "subject" , "box"];
//     $values = [];
//     foreach ($names as $name) {
//         if (empty($_POST[$name]) && !$name) {
//           $errors[] = $name;
//         } else {
//           $values[$name] = $_POST[$name];
//         }
//       }
    
//       if (empty($errors)) {
//         foreach ($names as $name) {
//           if ($name === "country") {
//             printf("%s: %s<br />", $name, var_export($_POST[$name], TRUE));
//           } else {
//             printf("%s: %s<br />", $name, $_POST[$name]);
//           }
//         }
//         exit;
//       }
$errors = [];
$names = ["name", "lastname", "email", "country", "subject" , "box"];
$nameopt = ["box"];
$values = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  foreach ($names as $name) {
    if (empty($_POST[$name]) && !in_array($name, $nameopt)) {
      $errors[] = $name;
    } else {
      $values[$name] = $_POST[$name];
    }
  }

  if (empty($errors)) {
    foreach ($names as $name) {
      if ($name=== "country") {
        printf("%s: %s<br />", $name, var_export($_POST[$name], TRUE));
      } else {
        printf("%s: %s<br />", $name, $_POST[$name]);
      }
    }
    exit;
  }
  
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

              <form id = "valid" accept-charset="UTF-8" autocomplete="off" method="POST" target="_blank"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <fieldset>
                <div class="form-group">
                    <h1>Support Team</h1>
                    <h3>Contact Form</h3>
                    
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="SIbomana">
                        <?php if (in_array('name', $errors)): ?>
                        <span class="error">Fill your Name</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Evrard">
                        <?php if (in_array("lastname", $errors)): ?>
                        <span class="error">Fill your Lastname</span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="sex">Gender</label><br />
                        <input checked="checked" name="sex" type="radio" id="male" value="male"> Male <br/>
                        <input name="sex" type="radio" id="female" value="female"> Female <br/>
                        <input name="sex" type="radio" id="other" value="other"> Other <br/>
                        <?php if (in_array("sex", $errors)): ?>
                        <span class="error">Choose your Gender</span>
                        <?php endif; ?>
                    </div>

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                         <input type="email" class="form-control" placeholder="name@example.com" id="mail" name="email">
                         <?php if (in_array("email", $errors)): ?>
                        <span class="error">Fill your Mail</span><br/>
                        <?php endif; ?>
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
                            <option  value="other" selected>Other</option>
                            <option  value="sales">Sales</option>
                            <option  value="it">IT Support</option>
                            <option  value="change">Exchange</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" cols="30" rows="5" name="message" placeholder="Your message"></textarea><br /> 
                    </div>
                    <p style="color: red;" id="erreur"></p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="box" id="box" 
                            <?php if (isset($values["box"]) && $values["box"] == "Yes") echo "checked"; ?>
                            value="yes" class="form-check-input">
                            I accept the conditions.
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" value="Submit">Submit</button> 
                    </fieldset> 
                </form>
                </div>
            </div>
        </div>
    </div>
        <script src="./assets/js/app.js"></script>  
</body>
</html>