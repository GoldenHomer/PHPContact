<?php 
  if ($_POST["submit"]) {

  	if(!$_POST['name']) { /* If name input field is empty. */
  	  $error.= "<br />Enter your name";
  	}

    if(!$_POST['email']) {
      $error.= "<br />Enter an email address";
    }

  	if (!$_POST['comment']) {
  	  $error.= "<br />Enter a comment";
  	}
  	
  	if($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { /* http://php.net/manual/en/filter.filters.validate.php */
  	  $error.= "<br />Enter a valid email address";
  	}

  	if($error) {
  	  $result = '<div class="alert alert-danger"><strong>There were errors in your form:</strong>'.$error.'</div>';
  	}

    else {
      if (mail("joselcontreras@mail.com", "Whoa, comment from PHP contact form.", "Name: ".$_POST['name']."Email: ".$_POST['email']."Comment: ".$_POST['comment'])) {
        $result='<div class="alert alert-success"><strong>Aww yeah.</strong> I\'ll be in touch.</div>';
      }
      else {
        $result='<div class="alert alert-danger">What? There was an error sending your message. How could you mess this up?</div>';
      }
    }
  }
?>

<!doctype html>
<html>
  <head>
    <title>First PHP page</title>
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
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 emailForm">
          <h1>My email form</h1>
          <?php echo $result; ?>
          
          <p class="lead">Please get in touch - I'll get back to you as soon as I can.</p>

          <form method="post">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" name="name" class="form-control" placeholder="Hugh Jazz"
              value="<?php echo $_POST['name']; ?>" />
            </div>

            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" name="email" class="form-control" placeholder="chunkylover53@aol.com"
              value="<?php echo $_POST['email']; ?>" />
            </div>

            <div class="form-group">
              <label for="comment">Your Comment:</label>
              <textarea class="form-control" name="comment"><?php echo $_POST['comment']; ?></textarea>
            </div>
            
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />
          </form>
        </div>
      </div>
    </div>

    <script href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>