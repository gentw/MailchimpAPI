<!doctype html>
<html>
<head>
	<title>Test MailChimp</title>
</head>
<body>
	<div id="message"></div>
	<form id="subscribe-form" method="post">
		<input type="text" name="email" placeholder="Your email" id="email">
		<input type="hidden" name="submitted" value="submit">
		<input type="submit" name="submit" value="Subscribe" id="submit">
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
	<script src="js/mailchimp.js"></script>

</body>
</html>