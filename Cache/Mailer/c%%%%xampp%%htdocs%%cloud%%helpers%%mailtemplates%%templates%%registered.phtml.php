<!DOCTYPE html>
<html>
<head>
    <title>Successful registration</title>
</head>
<body>

<img src="cid:iceo_agency_mini_logo.png">
<h1><?php echo $post['user_email']; ?></h1>

Uzyj tego kodu by aktywowac konto
<a href="<?php echo $vars['front_app_url']; ?>signup/<?php echo $post['activation_key']; ?>"> link</a>



</body>
</html>