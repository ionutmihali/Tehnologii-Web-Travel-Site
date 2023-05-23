<?php
if (isset($_SESSION["Type"]))
  if ($_SESSION["Type"] == "ADMIN" || $_SESSION["Type"] == "SUPERVISOR") {
    echo "<div id='error-message'>
            <h1>ACCESS DENIED! YOU HAVE NO RIGHTS FOR THIS ACTION!</h1>
            <img src='../IMAGES/ERROR/access.gif' alt='Error: Page Not Found'>
          </div>";
    exit();
  }
