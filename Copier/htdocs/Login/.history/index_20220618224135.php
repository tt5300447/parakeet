<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Aldi Duzha" />
    <meta name="description" content="Free Bulma Login Template, part of Awesome Bulma Templates" />
    <meta name="keywords" content="bulma, login, page, website, template, free, awesome" />
    <link rel="canonical" href="https://aldi.github.io/bulma-login-template/" />
    <title>Bulma Login - Free Bulma Template</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-social@1/bin/bulma-social.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
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
    echo "<h1>Connected successfully to mysql</h1>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      echo "<h2>".  $username ." and ". $password ."</h2>";
      $result = $conn->query("SELECT username, pword FROM users WHERE username = '$username' AND pword = '$password'");
      if($result->rowCount() == 0) {
        echo "<h1> Username or password incorrect</h1>";
      } else {
        header("Location: /");
        exit();
      }

    }
    ?>
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-4 is-offset-4">
            <div class="box">
              <p class="subtitle is-4">Please login to proceed.</p>
              <br />
              <form method="post">
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
            <a href="https://www.aldiduzha.com?utm_source=Github" style="color: white;">Designed with <i class="fa fa-heart fa-fw" style="font-size: 10px; color: red;"></i> by BENZITOUNI Mehdi</a>
          </p>
        </div>
      </div>
    </section>
  </body>
</html>
