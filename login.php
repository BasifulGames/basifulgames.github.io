<?php
session_start(); // Inicie a sessão

$servername = "localhost";
$username = "root";
$password = "!Quicouri";
$dbname = "basifulgames";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obter dados do formulário
$email = $_POST['Email'];
$password = $_POST['Passwd'];

// Preparar e executar a consulta
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Verificar a senha
    if (password_verify($password, $row['password'])) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $row['id']; // Armazenar o ID do usuário na sessão
        $_SESSION['username'] = $row['username'];
        echo "Login bem-sucedido! Bem-vindo, " . $_SESSION['username'] . "!";
        // Redirecionar ou fazer outra ação
    } else {
        echo "E-mail ou senha incorretos.";
    }
} else {
    echo "E-mail ou senha incorretos.";
}

$stmt->close();
$conn->close();
?>


<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BasifulGames | Login</title>
    <style>
        html, body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 0;
        padding: 0;
        border: 0;
        position: absolute;
        height: 100%;
        min-width: 100%;
        font-size: 13px;
        color: #404040;
        direction: ltr;
        -webkit-text-size-adjust: none;
        }
        button,
        input[type=button],
        input[type=submit] {
        font-family: Arial, sans-serif;
        font-size: 13px;
        }
        a,
        a:hover,
        a:visited {
        color: #427fed;
        cursor: pointer;
        text-decoration: none;
        }
        a:hover {
        text-decoration: underline;
        }
        h1 {
        font-size: 20px;
        color: #262626;
        margin: 0 0 15px;
        font-weight: normal;
        }
        h2 {
        font-size: 14px;
        color: #262626;
        margin: 0 0 15px;
        font-weight: bold;
        }
        input[type=email],
        input[type=number],
        input[type=password],
        input[type=tel],
        input[type=text],
        input[type=url] {
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
        display: inline-block;
        height: 36px;
        padding: 0 8px;
        margin: 0;
        background: #fff;
        border: 1px solid #d9d9d9;
        border-top: 1px solid #c0c0c0;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -moz-border-radius: 1px;
        -webkit-border-radius: 1px;
        border-radius: 1px;
        font-size: 15px;
        color: #404040;
        }
        input[type=email]:hover,
        input[type=number]:hover,
        input[type=password]:hover,
        input[type=tel]:hover,
        input[type=text]:hover,
        input[type=url]:hover {
        border: 1px solid #b9b9b9;
        border-top: 1px solid #a0a0a0;
        -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=password]:focus,
        input[type=tel]:focus,
        input[type=text]:focus,
        input[type=url]:focus {
        outline: none;
        border: 1px solid #4d90fe;
        -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
        }
        input[type=checkbox],
        input[type=radio] {
        -webkit-appearance: none;
        display: inline-block;
        width: 13px;
        height: 13px;
        margin: 0;
        cursor: pointer;
        vertical-align: bottom;
        background: #fff;
        border: 1px solid #c6c6c6;
        -moz-border-radius: 1px;
        -webkit-border-radius: 1px;
        border-radius: 1px;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        }
        input[type=checkbox]:active,
        input[type=radio]:active {
        background: #ebebeb;
        }
        input[type=checkbox]:hover {
        border-color: #c6c6c6;
        -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        input[type=radio] {
        -moz-border-radius: 1em;
        -webkit-border-radius: 1em;
        border-radius: 1em;
        width: 15px;
        height: 15px;
        }
        input[type=checkbox]:checked,
        input[type=radio]:checked {
        background: #fff;
        }
        input[type=radio]:checked::after {
        content: '';
        display: block;
        position: relative;
        top: 3px;
        left: 3px;
        width: 7px;
        height: 7px;
        background: #666;
        -moz-border-radius: 1em;
        -webkit-border-radius: 1em;
        border-radius: 1em;
        }
        input[type=checkbox]:checked::after {
        content: url(//web.archive.org/web/20140527041251im_/https://ssl.gstatic.com/ui/v1/menu/checkmark.png);
        display: block;
        position: absolute;
        top: -6px;
        left: -5px;
        }
        input[type=checkbox]:focus {
        outline: none;
        border-color: #4d90fe;
        }
        .stacked-label {
        display: block;
        font-weight: bold;
        margin: .5em 0;
        }
        .hidden-label {
        position: absolute !important;
        clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
        clip: rect(1px, 1px, 1px, 1px);
        height: 0px;
        width: 0px;
        overflow: hidden;
        visibility: hidden;
        }
        input[type=checkbox].form-error,
        input[type=email].form-error,
        input[type=number].form-error,
        input[type=password].form-error,
        input[type=text].form-error,
        input[type=tel].form-error,
        input[type=url].form-error {
        border: 1px solid #dd4b39;
        }
        .error-msg {
        margin: .5em 0;
        display: block;
        color: #dd4b39;
        line-height: 17px;
        }
        .help-link {
        background: #dd4b39;
        padding: 0 5px;
        color: #fff;
        font-weight: bold;
        display: inline-block;
        -moz-border-radius: 1em;
        -webkit-border-radius: 1em;
        border-radius: 1em;
        text-decoration: none;
        position: relative;
        top: 0px;
        }
        .help-link:visited {
        color: #fff;
        }
        .help-link:hover {
        color: #fff;
        background: #c03523;
        text-decoration: none;
        }
        .help-link:active {
        opacity: 1;
        background: #ae2817;
        }
        .wrapper {
        position: relative;
        min-height: 100%;
        }
        .content {
        padding: 0 44px;
        }
        .main {
        padding-bottom: 100px;
        }
        /* For modern browsers */
        .clearfix:before,
        .clearfix:after {
        content: "";
        display: table;
        }
        .clearfix:after {
        clear: both;
        }
        /* For IE 6/7 (trigger hasLayout) */
        .clearfix {
        zoom:1;
        }
        .basifulgames-header-bar {
        height: 71px;
        border-bottom: 1px solid #e5e5e5;
        overflow: hidden;
        }
        .header .logo {
        margin: 17px 0 0;
        float: left;
        height: 38px;
        width: 116px;
        }
        .header .secondary-link {
        margin: 28px 0 0;
        float: right;
        }
        .header .secondary-link a {
        font-weight: normal;
        }
        .basifulgames-header-bar.centered {
        border: 0;
        height: 108px;
        }
        .basifulgames-header-bar.centered .header .logo {
        float: none;
        margin: 40px auto 30px;
        display: block;
        }
        .basifulgames-header-bar.centered .header .secondary-link {
        display: none
        }
        .basifulgames-footer-bar {
        position: absolute;
        bottom: 0;
        height: 35px;
        width: 100%;
        border-top: 1px solid #e5e5e5;
        overflow: hidden;
        }
        .footer {
        padding-top: 7px;
        font-size: .85em;
        white-space: nowrap;
        line-height: 0;
        }
        .footer ul {
        float: left;
        max-width: 80%;
        padding: 0;
        }
        .footer ul li {
        color: #737373;
        display: inline;
        padding: 0;
        padding-right: 1.5em;
        }
        .footer a {
        color: #737373;
        }
        .lang-chooser-wrap {
        float: right;
        display: inline;
        }
        .lang-chooser-wrap img {
        vertical-align: top;
        }
        .lang-chooser {
        font-size: 13px;
        height: 24px;
        line-height: 24px;
        }
        .lang-chooser option {
        font-size: 13px;
        line-height: 24px;
        }
        .hidden {
        height: 0px;
        width: 0px;
        overflow: hidden;
        visibility: hidden;
        display: none !important;
        }
        .banner {
        text-align: center;
        }
        .card {
        background-color: #f7f7f7;
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        width: 304px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .card > *:first-child {
        margin-top: 0;
        }
        .rc-button,
        .rc-button:visited {
        display: inline-block;
        min-width: 46px;
        text-align: center;
        color: #444;
        font-size: 14px;
        font-weight: 700;
        height: 36px;
        padding: 0 8px;
        line-height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
        border: 1px solid #dcdcdc;
        background-color: #f5f5f5;
        background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
        background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
        background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
        background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
        background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
        -o-transition: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
        }
        .card .rc-button {
        width: 100%;
        padding: 0;
        }
        .rc-button.disabled,
        .rc-button[disabled] {
        opacity: .5;
        filter: alpha(opacity=50);
        cursor: default;
        pointer-events: none;
        }
        .rc-button:hover {
        border: 1px solid #c6c6c6;
        color: #333;
        text-decoration: none;
        -o-transition: all 0.0s;
        -moz-transition: all 0.0s;
        -webkit-transition: all 0.0s;
        transition: all 0.0s;
        background-color: #f8f8f8;
        background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
        background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
        background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
        background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
        background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }
        .rc-button:active {
        background-color: #f6f6f6;
        background-image: -webkit-linear-gradient(top,#bb0000,#f1f1f1);
        background-image: -moz-linear-gradient(top,#f6f6f6,#f1f1f1);
        background-image: -ms-linear-gradient(top,#f6f6f6,#f1f1f1);
        background-image: -o-linear-gradient(top,#f6f6f6,#f1f1f1);
        background-image: linear-gradient(top,#f6f6f6,#f1f1f1);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .rc-button-submit,
        .rc-button-submit:visited {
        border: 1px solid #3079ed;
        color: #fff;
        text-shadow: 0 1px rgba(0,0,0,0.1);
        background-color: #4d90fe;
        background-image: -webkit-linear-gradient(top,#4dfe6a,#47ed6b);
        background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
        background-image: linear-gradient(top,#4d90fe,#4787ed);
        }
        .rc-button-submit:hover {
        border: 1px solid #2f5bb7;
        color: #fff;
        text-shadow: 0 1px rgba(0,0,0,0.3);
        background-color: #357ae8;
        background-image: -webkit-linear-gradient(top,#4dfe6a,#35e84d);
        background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
        background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
        background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
        background-image: linear-gradient(top,#4d90fe,#357ae8);
        }
    </style>
    <style>
        .banner h1 {
        font-family: 'Open Sans', arial;
        -webkit-font-smoothing: antialiased;
        color: #555;
        font-size: 42px;
        font-weight: 300;
        margin-top: 0;
        margin-bottom: 20px;
        }
        .banner h2 {
        font-family: 'Open Sans', arial;
        -webkit-font-smoothing: antialiased;
        color: #555;
        font-size: 18px;
        font-weight: 400;
        margin-bottom: 20px;
        }
        .signin-card {
        width: 274px;
        padding: 40px 40px;
        }
        .signin-card .profile-img {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        }
        .signin-card .profile-name {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
        }
        .signin-card input[type=email],
        .signin-card input[type=password],
        .signin-card input[type=text],
        .signin-card input[type=submit] {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        }
        .signin-card #Email,
        .signin-card #Passwd,
        .signin-card .captcha {
        direction: ltr;
        height: 44px;
        font-size: 16px;
        }
        .signin-card #Email + .stacked-label {
        margin-top: 15px;
        }
        .signin-card #reauthEmail {
        display: block;
        margin-bottom: 10px;
        line-height: 36px;
        padding: 0 8px;
        font-size: 15px;
        color: #404040;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        }
        .one-basifulgames p {
        margin: 0 0 10px;
        color: #555;
        font-size: 14px;
        text-align: center;
        }
        .one-basifulgames p.create-account,
        .one-basifulgames p.switch-account {
        margin-bottom: 60px;
        }
        .one-basifulgames img {
        display: block;
        width: 210px;
        height: 17px;
        margin: 10px auto;
        }
        </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="basifulgames-header-bar  centered">
        <div class="header content clearfix"> <img alt="BasifulGames" class="logo"

            src="logo_completo.png"> </div>
      </div>
      <div class="main content clearfix">
        <div class="banner">
          <h1>Basiful Games Account</h1>
          <h2 class="hidden-small"> Sign in to continue </h2>
        </div>
        <div class="card signin-card clearfix"> <img class="profile-img">
          <p class="profile-name"></p>
          <form method="post" action="login.php"

            id="gaia_loginform"> <input name="GALX" value="Ly8M9363p0I" type="hidden">
            <input name="continue" value="" type="hidden"> <input name="service"

              value="basifulgames" type="hidden"> <input name="hl" value="basifulgames"

              type="hidden"> <input id="_utf8" name="_utf8" value="☃" type="hidden">
            <input name="bgresponse" id="bgresponse" value="js_disabled" type="hidden">
            <label class="hidden-label" for="Email">Email</label> <input id="Email"

              name="Email" placeholder="Email" value="" spellcheck="false" class=""

              type="email"> <label class="hidden-label" for="Passwd">Password</label>
            <input id="Passwd" name="Passwd" placeholder="Password" class="" type="password">
            <input id="signIn" name="signIn" class="rc-button rc-button-submit"

value="Sign in" type="submit"> <input name="PersistentCookie" value="yes" type="hidden">
            <a id="link-forgot-passwd" href="https://basifulgames.github.io/account_recovery">
              Need help? </a> </form>
        </div>
        <div class="one-basifulgames">
          <p class="create-account"> <a id="link-signup" href="/signUp.html"> Create an
              account </a> </p>
        </div>
      </div>
      <div class="basifulgames-footer-bar">
        <div class="footer content clearfix">
          <ul id="footer-list">
            <li> BasifulGames </li>
            <li> <a href="" target="_blank"> Privacy &amp; Terms </a> </li>
            <li> <a href="" target="_blank"> Help </a> </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>