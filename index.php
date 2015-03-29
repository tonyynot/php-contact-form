<?php
// Contact form PHP
if ($_POST["submit"]) {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$human = intval($_POST['human']);
$from = 'Krisniknj.com';
$to = 'EMAIL OF FORM RECIPIENT';
$subject = 'SUBJECT OF EMAIL';
$body ="From: $name\n E-Mail: $email\n Message:\n $message";
// Check if name has been entered
if (!$_POST['name']) {
$errName = 'Please enter your name';
}
// Email validation
if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
$errEmail = 'Please enter a valid email address';
}
// Message validation
if (!$_POST['message']) {
$errMessage = 'Please enter your message';
}
// Test for human or bot
if ($human !== 5) {
$errHuman = 'Your anti-spam is incorrect';
}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
if (mail ($to, $subject, $body, $from)) {
$result='<div class="alert-success">Thank You! We will be in touch shortly.</div>';
} else {
$result='<div class="alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
}
}
}
?>

<!-- FORM FIELDS -->

	<form class="form-horizontal" role="form" method="post" action="#contact">
<!-- Name field-->
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
<?php echo "<p class='text-danger'>$errName</p>";?>
</div>
</div>
<!-- Email field-->
<div class="form-group">
<label for="email" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="email" name="email" placeholder="Valid Email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
<?php echo "<p class='text-danger'>$errEmail</p>";?>
</div>
</div>
<!-- Message field-->
<div class="form-group">
<label for="message" class="col-sm-2 control-label">Message</label>
<div class="col-sm-10">
<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
<?php echo "<p class='text-danger'>$errMessage</p>";?>
</div>
</div>
<!-- Human confirmation field -->
<div class="form-group">
<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
<?php echo "<p class='text-danger'>$errHuman</p>";?>
</div>
</div>
<!-- Send button -->
<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
</div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
<?php echo $result; ?>	
</div>
</div>
</form> 
