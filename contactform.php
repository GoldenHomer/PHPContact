<?php 
  if ($_POST["submit"]) {
  	if(!$_POST['name']) { /* If name input field is empty. */
  	  $error.= "<br />Enter your email address";
  	}

  	if (!$_POST['comment']) {
  	  $error.= "<br />Enter a comment";
  	}
  	
  	if($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  	  $error.= "<br />Enter a valid email address";
  	}

  	if($error) {
  	  $result = '<div class="alert alert-danger"><strong>There were errors in your form:</strong>'.$error.'</div>';
  	}
  }
?>

<!doctype html>
<html>
  <head>
    <title>First PHP page, whoa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <style>

      .emailForm {
 	    border:1px solid grey;
 	    border-radius:10px;
 	    margin-top:20px;
	  }

	  form {
 	    padding-bottom:20px;
	  }
	</style>
  </head>