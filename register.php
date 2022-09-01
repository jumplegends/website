<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrieren</title>
  </head>
  <body>
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        //Username ist frei
        if($_POST["pw"] == $_POST["pw2"]){
          //User anlegen
          $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, email) VALUES (:user, :pw, :mail)");
          $stmt->bindParam(":user", $_POST["username"]);
          $stmt->bindParam(":mail", $_POST["email"]);
          $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
          $stmt->bindParam(":pw", $hash);
          $stmt->execute();
          echo "Dein Account wurde angelegt";
        } else {
          echo "Die Passwörter stimmen nicht überein";
        }
      } else {
        echo "Der Username ist bereits vergeben";
      }
    }
     ?>
     <h1 class="center">Registrieren</h1>
    <form action="register.php" method="post">
      
        <div class="container">
          <label for="uname"><b>Benutzername</b></label>
          <input type="text" placeholder="Benutzername" name="username" required>

          <label for="uname"><b>Email</b></label>
          <input type="text" placeholder="Email" name="email" required>
      
          <label for="psw"><b>Passwort</b></label>
          <input type="password" placeholder="Passwort" name="pw" required>

          <label for="psw"><b>Passwort</b></label>
          <input type="password" placeholder="Passwort Wiederholen" name="pw2" required>
      
          <button type="submit" name="submit">Login</button>
        </div>
      
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn" onclick="window.location.href='index.html'">Abbrechen!</button>
          <button type="button" class="forgotbtn" onclick="window.location.href='login.php'">Hast du bereits einen Account?</button>
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
      display: flex;
      justify-content: center;
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
