<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Aldi Duzha" />
    <meta name="description" content="Free Bulma Login Template, part of Awesome Bulma Templates" />
    <meta name="keywords" content="bulma, login, page, website, template, free, awesome" />
        <link rel="stylesheet" href="css/styles.css" />

    <link rel="canonical" href="https://aldi.github.io/bulma-login-template/" />
    <title>Bulma Login - Free Bulma Template</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-social@1/bin/bulma-social.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css" />
  </head>
  <body>
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-4 is-offset-4">
            <div class="box">
              <p class="subtitle is-4">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "scolarite";
                // Create connection
                $conn = new mysqli($servername, $username, $password,$db);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $result = $conn->query("SELECT username, pword FROM users WHERE username = '$username' AND pword = '$password'");
                  if($result->num_rows == 0) {
                    echo "Username or password incorrect";
                  } else {
                    header("Location: /scolarite");
                    exit();
                  }
                }
                else {
                  echo "Please login to proceed.";
                }
                ?>
              </p>
              <br />
              <form method="post" action="index.php" onsubmit="return validateform()" >
                <div class="field">
                  <p class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" name="username" placeholder="Username" />
                    <span class="icon is-medium is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-medium is-right">
                      <i class="fas fa-check"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input is-medium" type="password" name="password" placeholder="Enter your password"/>
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <label class="checkbox">
                    <input type="checkbox" />
                    Remember me
                  </label>
                </div>
                <button class="button is-block is-info is-large is-fullwidth">Login</button><br />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-foot">
        <div class="container has-text-centered">
          <p class="footer-text">
            <a href="#" style="color: white;">Designed by BENZITOUNI Mehdi</a>
          </p>
        </div>
      </div>
    </section>
    <script>  
    function validateform(){  
      var name=document.myform.name.value;  
      var password=document.myform.password.value;  
      if (name==null || name==""){  
        alert("Name can't be blank");  
        return false;  
      }else if(password.length<6){  
        alert("Password must be at least 6 characters long.");  
        return false;  
      }  
    }  
    </script>  
  </body>
</html>
