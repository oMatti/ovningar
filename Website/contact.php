<?php // <-- Här öppnar vi PHP-taggen.

if (isset($_POST['submit'])) { // Här kollar vi om "Skicka"-knappen är klickad och vad som ska hända efter att den är klickad.

  // Kollar ifall förnamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren.
  if (!$_POST['firstName']) {
    $error = "- Ange ditt förnamn.";
  }

  // Kollar ifall efternamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['lastName']) {
    $error = "<br>- Ange ditt efternamn.";
  }

  // Kollar ifall e-postadressen INTE är ifylld och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['email']) {
    $error .= "<br>- Skriv in en E-mail adress.";
  }

  // Kollar ifall meddelandet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['message']) {
    $error .= "<br>- Skriv in ett meddelande.";
  }

  // Kollar ifall svaret är något annat än 5 och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (intval($_POST['human']) !== 5) {
    $error .= "<br>- Bekräfta att du  inte är en robot.";
  }

  // Här kollar vi ifall det finns några fel och om det finns så skriver vi ut dem åt användaren.
  if ($error) {
    $result = "Oh no! An Error! Please correct the following: $error";
  }

  // Skickar mejlet ifall alla fält är ifyllda och inga fel finns.
  else {

    // PHPs mailfunktion.
    mail(
      "matts-erik.sandin@optistud.fi", // <-- Adressen dit mejlet skickas
      "Subject line", // <-- Mejlets ämnesrad.
      "Name: " .$_POST['firstName']. // <-- Det användaren har angett som förnamn i formuläret.
      "\r\nEmail: " .$_POST['email']. // <-- Det användaren har angett som e-postadress i formuläret. \r\n gör radbrytningar i själva mejlet.
      "\r\nMessage: " .$_POST['message'] // <-- Det användaren har angett som meddelande i formuläret. \r\n gör radbrytningar i själva mejlet.
    );

    // Texten som visas efter att mejlet skickats.
    {
      $result = "Thank you! We will be in touch shortly.";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Egna resor</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/website.css" rel="stylesheet">
</head>
<body>

  <!--NAVIGATION-->
  <nav>
    <a href="index.php">Hem</a>
    <a href="about.php">Om</a>
    <a href="contact.php" style="border-bottom: 4px solid #e67e22">Kontakta oss</a>
  </nav>

  <!--HERO-->
  <header class="contact">
    <div class="hero-content">
      <h1>Kontakta oss</h1>
    </div>
  </header>

<!-- Contact Form-->
<form method="post">
<?php echo $result; //prints out error to the screen ?>

  <input type="text" name="firstName" placeholder="Förnamn" value="<?php echo $_post['firstname']; ?>"  autofocus>

<input type="text" name="lastName" placeholder="Efternamn" value="<?php echo $_post['lastName']; ?>">

<input type="email" name="email" placeholder="E-mail" value="<?php echo $_post['email']; ?>">



<textarea placeholder=" Ditt meddelande..." name="message" rows="3" cols="20" ><?php echo $_post['message'];?></textarea>
<input type="text" name="human" placeholder="What is 3 + 2?">
<input type="submit" class="button" name="submit" value="Skicka in!">
</form>
  <!--FOOTER-->
  <footer> Egna resor &copy; <?php echo date('Y'); ?></footer>

</body>
</html>
