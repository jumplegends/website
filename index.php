<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anmelden</title>
  </head>
  <body>
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
        //Username ist frei
        $row = $stmt->fetch();
        if(password_verify($_POST["pw"], $row["PASSWORD"])){
          session_start();
          $_SESSION["username"] = $row["USERNAME"];
          header("Location: loginsucses.html");
        } else {
          echo "Der Login ist fehlgeschlagen";
        }
      } else {
        echo "Der Login ist fehlgeschlagen";
      }
    }
     ?>
<div>
      <h1 class="center" id="text">Anmelden</h1>
    <form action="index.php" method="post">
    <div class="container">
      <input type="text" name="username" placeholder="Username" required><br>

      <input type="password" name="pw" placeholder="Passwort" required><br>
      <h6></h6>
      <button type="submit" name="submit">Einloggen</button>
      <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn" onclick="window.location.href='index.html'">Abbrechen!</button>
          <button type="button" class="forgotbtn" onclick="window.location.href='register.php'">Registrieren</button>
        </div>
    </div>
    </form>
    <br>
    
  </body>

  <style>
    #text{
      margin-top: 7vw;
     color: white;
    
    }
   .center{
    justify-content: center;
    display:  flex;
    
   }

   body{
    background-color: gray;
   }
  </style>
</html>

<style>
        /* Bordered form */
        form {
        border: 3px solid #777777;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
        opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }

        .forgotbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #0000ff;
        }

        /* Add padding to containers */
        .container {
        padding: 16px;
        background-color: white;
        }

        /* The "Forgot password" text */
        span.psw {
        float: right;
        padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }
    </style>
