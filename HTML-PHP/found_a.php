<?php
if (!(isset($_SESSION["Type"]))) {
    echo "<div id='error-message'>
    <h1>ACCES DENIED! YOU ARE NOT CONNECTED!</h1>
        <img src='../IMAGES/ERROR/found.gif' alt='Error: Page Not Found'>
      </div>";
    exit();
} else 
    if ($_SESSION["Type"] != "ADMIN") {
        echo "<div id='error-message'>
        <h1>ACCESS DENIED! YOU HAVE NO RIGHTS FOR THIS ACTION!</h1>
        <img src='../IMAGES/ERROR/access.gif' alt='Error: Page Not Found'>
      </div>";
    exit();
}
