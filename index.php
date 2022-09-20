<?php
try {
    $db = new PDO("mysql:host=mysql-hackers.alwaysdata.net;dbname=hackers_poulette;charset=utf8","hackers","!nJRHW5jReSc6Ex");

}catch(Exception $e) {
    die("erreur : ".$e -> getMessage());

}
$select = "SELECT * FROM formulaire";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    
    <script src="https://www.google.com/recaptcha/api.js?render=6LfcvQMiAAAAAPm7Kecu7PPxm9TBdNobBIBWaX7V"></script>
    <title>Hackers Poulette</title>
</head>
<header class="header">
    
</header>

<body>
<div class="container">


<form method="post" action="add_data.php" enctype="multipart/form-data" class="form">
   
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" class="form-control" id="name" name="name" minlength="2" maxlength="255" required onchange="validname();">
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" minlength="2" maxlength="255" required onchange="validFirstname();">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required onchange="validEmail();">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="File">Files ( jpg , png , gif)</label>
            <input type="file" name="myImage" accept="image/png, image/gif, image/jpeg" />
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea class="form-control" id="description" rows="3" name="description" minlength="2" maxlength="255" required></textarea>
    </div>
    <div class="form-group d-flex justify-content-center align-items-center">
        <button type="submit" onclick="onClick(event)" class="btn bg-info text-light">Send feedback</button>
    </div>

</form>
</div>
</body>
<footer>
<script src="JS/validator.js"></script>
<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfcvQMiAAAAAPm7Kecu7PPxm9TBdNobBIBWaX7V', {action: 'submit'}).then(function(token) {
                // Add your logic to submit to your backend server here.
                document.querySelector('form').insertAdjacentHTML('afterbegin','<input type="hidden" name="token" value="' + token + '">');
                document.querySelector('form').insertAdjacentHTML('afterbegin','<input type="hidden" name="action" value="submit">');
                document.querySelector('form').submit()
            });
        });
    }
</script>


</footer>

</html>