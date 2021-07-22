<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>assignment ASE|<?=$title?></title>
	<meta name="description" content="Assignmnet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/css/login.css" rel="stylesheet">
	<script src="<?=base_url()?>/assets/js/jquery.js"></script>
</head>
<body>
<div class="wrapper fadeInDown">
	<div id="formContent">
		<!-- Tabs Titles -->
		<h5>AssignmentASE</h5>

		<div class="row">
			<div class="col-lg-12">
				<div id="response"></div>
			</div>
		</div>

		<?php if (isset($_SESSION["flash"])) : ?>
			<div class="alert alert-success">
				<?php
				vprintf("<p class='flash %s'>%s</p>", $_SESSION["flash"]);
				unset($_SESSION["flash"]);
				?>
			</div>
		 <?php endif;?>

		<!-- Login Form -->
		<?= form_open('/login/post_login', array('role' => 'form', 'method' => 'post','id' => 'login_form')); ?>
			<input type="text" id="login" class="fadeIn second" name="userName" placeholder="UserName" required >
			<input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required minlength="8">
			<input type="submit" class="fadeIn fourth" value="Log In" id="btnSave">
		<?=form_close()?>

	</div>
</div>
</body>
<script>
    $("body").on("submit", "#login_form", function(e) {
        e.preventDefault();
        if (validate() === false) {
            return;
        }
        $("#response").removeClass().html("");
        var btn = $("#btnSave");
        btn.button('loading');
        $.ajax({
            url: "<?= site_url('login/post_login'); ?>",
            method: 'post',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == 1) {
                    show_success_alert("#response", data.msg);
                    btn.button('reset');
                    window.location.replace("<?= site_url('dashboard'); ?>");
                } else {
                    show_error_alert("#response", data.msg);
                    btn.button('reset');
                }
            },
            error: function() {
                alert('Operation failed. Please try again.');
                btn.button('reset');
            }
        });

    });
</script>
<script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/assets/js/common.js"></script>
</html>
