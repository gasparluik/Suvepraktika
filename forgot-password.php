<?php
require 'Member.php';

if (! empty($_POST["forgot-btn"])) {
    require_once __DIR__ . '/Member.php';
    $member = new Member();
    $displayMessage = $member->handleForgot();
}
?>
<HTML>
<HEAD>
<TITLE>Unustasid Salasõna</TITLE>
<link href="style.css" type="text/css"
	rel="stylesheet" />
<script src="jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading"><h3>Unustasid Salasõna<h3></div>
<?php
if (! empty($displayMessage["status"])) {
    if ($displayMessage["status"] == "error") {
        ?>
				    <div class="server-response error-msg"><?php echo $displayMessage["message"]; ?></div>
<?php
    } else if ($displayMessage["status"] == "success") {
        ?>
                    <div class="server-response success-msg"><?php echo $displayMessage["message"]; ?></div>
<?php
    }
}
?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
							Sisesta Email<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="forgot-btn" id="forgot-btn"
							value="Forgot Password">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	var UserName = $("#username").val();
	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>