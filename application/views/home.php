<?php include_once 'common/header.php'?>
<main id="wrapper">
	<div class="py-1 text-center">
		<h2>Checkout form</h2>
	</div>

	<div class="row g-1">
		<h4 class="mb-3">Billing address</h4>
		<div class="row">
			<div class="col-lg-12">
				<div id="response"></div>
			</div>
		</div>
		<?= form_open('/welcome/post_checkout', array('role' => 'form', 'method' => 'post','id' => 'checkout_form')); ?>
			<div class="row g-3">
				<div class="col-md-6">
					<label for="firstName" class="form-label">First name</label>
					<input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="">
				</div>

				<div class="col-md-6">
					<label for="lastName" class="form-label">Last name</label>
					<input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="">
				</div>

				<div class="col-md-6">
					<label for="email" class="form-label"><span class="text-danger">* </span>Email </label>
					<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
				</div>

				<div class="col-md-6">
					<label for="username" class="form-label"><span class="text-danger">* </span>Username</label>
					<div class="input-group has-validation">
						<span class="input-group-text">@</span>
						<input type="text" class="form-control" id="username" name="userName" placeholder="Username" required minlength="6">
					</div>
				</div>

				<div class="col-md-6">
					<label for="address" class="form-label">Address Line 1</label>
					<input type="text" class="form-control" id="address" name="address1" placeholder="1234 Main St">
				</div>

				<div class="col-md-6">
					<label for="address2" class="form-label">Address Line 2</label>
					<input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
				</div>

				<div class="col-md-6">
					<label for="password" class="form-label"><span class="text-danger">* </span>Password </label>
					<input type="password" class="form-control" name="password1" id="password1" minlength="8" required>
				</div>

				<div class="col-md-6">
					<label for="password" class="form-label"><span class="text-danger">* </span> Confirm Password </label>
					<input type="password" class="form-control" name="password2" id="password2" minlength="8" required>
				</div>

				<div class="col-md-6">
					<label for="nic" class="form-label"><span class="text-danger">* </span>NIC No. </label>
					<input type="text" class="form-control" name="nic" id="nic" required>
				</div>

				<div class="col-md-6">
					<label for="tp" class="form-label"><span class="text-danger">* </span> Telephone / mobile </label>
					<input type="tp" class="form-control" name="tp" id="tp" placeholder="011-2730019 / 0712214587">
				</div>

				<div class="col-12">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="save-info" required>
						<label class="form-check-label" for="save-info"><span class="text-danger">* </span>I agree to the <span class="text-primary">Terms and Conditions</span> </label>
					</div>
				</div>

				<hr class="my-4">
			</div>

			<h4 class="mb-3">Packages chosen</h4>

			<div class="row">
				<div class="col-md-2">
					<div class="form-check col-form-label">
						<input type="checkbox" class="form-check-input pack" id="p_1" name="pack[]">
						<label class="form-check-label" for="p_1">Package 1</label>
					</div>
				</div>
				<div class="col-md-2 col-form-label">
					<label id="price_1" price="250">LKR 250</label>
					<input type="hidden" name="price[]" value="250"/>
				</div>
				<div class="col-md-4 row">
					<label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly quan" id="quantity_1" name="quantity[]">
					</div>
				</div>
				<div class="col-md-4 row">
					<label for="subTotal" class="col-sm-3 col-form-label">Sub Total</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly subT" id="subTotal_1" name="subTotal[]">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					<div class="form-check col-form-label">
						<input type="checkbox" class="form-check-input pack" id="p_2" name="pack[]">
						<label class="form-check-label" for="p_2">Package 2</label>
					</div>
				</div>
				<div class="col-md-2 col-form-label">
					<label id="price_2" price="350">LKR 350</label>
					<input type="hidden" name="price[]" value="350"/>
				</div>
				<div class="col-md-4 row">
					<label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly quan" id="quantity_2" name="quantity[]">
					</div>
				</div>
				<div class="col-md-4 row">
					<label for="subTotal" class="col-sm-3 col-form-label">Sub Total</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly subT" id="subTotal_2" name="subTotal[]">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					<div class="form-check col-form-label">
						<input type="checkbox" class="form-check-input pack" id="p_3" name="pack[]">
						<label class="form-check-label" for="p_3">Package 3</label>
					</div>
				</div>
				<div class="col-md-2 col-form-label">
					<label id="price_3" price="500">LKR 500</label>
					<input type="hidden" name="price[]" value="500"/>
				</div>
				<div class="col-md-4 row">
					<label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly quan" id="quantity_3" name="quantity[]">
					</div>
				</div>
				<div class="col-md-4 row">
					<label for="subTotal" class="col-sm-3 col-form-label">Sub Total</label>
					<div class="col-sm-9">
						<input type="text" class="form-control numericOnly subT" id="subTotal_3" name="subTotal[]">
					</div>
				</div>
			</div>

			<div class="row my-4">
				<div class="mx-auto col-md-4 row">
					<label for="total" class="col-sm-3 col-form-label">Total</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="total" name="total">
					</div>
				</div>
			</div>

			<hr class="my-4">

			<button class="w-100 btn btn-primary btn-lg" type="submit" id="btnSave">Continue to checkout</button>
		<?= form_close() ?>

	</div>
</main>

<script>

    $(document).on('change', '.pack', function(event) {
        var myArr = event.target.id.split("_");
        var clicked=myArr[1];
        calculate_sum(clicked);
    });

    $(document).on('change', '.quan', function(event) {
        var myArr = event.target.id.split("_");
        var clicked=myArr[1];
        calculate_sum(clicked);
    });

    function calculate_sum(clicked){
        var qt_selecter= $('#quantity_'+clicked);
        var quantity= qt_selecter.val() !== '' ? parseInt(qt_selecter.val(),10) : 0;
        var label = $('#price_'+clicked);
        var price=parseInt(label.attr('price'),10);
        var st=quantity*price;
        var tot=0;
        if($("#p_"+clicked).is(':checked')){
            $("#subTotal_"+clicked).val(st);
        }else{
            $("#subTotal_"+clicked).val('');
            $("#quantity_"+clicked).val('');
        }
        $('.subT').each(function () {
            if($(this).val() !== ''){
                tot+=parseInt($(this).val(),10);
            }
        });
        $("#total").val(tot);
    }

    $("body").on("submit", "#checkout_form", function(e) {
        e.preventDefault();
        if (validate() === false) {
            return;
        }
        $("#response").removeClass().html("");
        $("#btnSave").prop("disabled", true);
        $("#btnSave").html('<i class="fa fa-spinner fa-spin"></i> loading...' );
        $.ajax({
            url: "<?php echo site_url('welcome/post_checkout'); ?>",
            method: 'post',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == 1) {
                    $("html, body").animate({scrollTop: $('#wrapper').offset().top}, 1000);
                    show_success_alert("#response", data.msg);
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    $("#btnSave").prop("disabled", false);
                    $("#btnSave").html('Continue to checkout' );
                    $("html, body").animate({scrollTop: $('#wrapper').offset().top}, 1000);
                    show_error_alert("#response", data.msg);
                }
            },
            error: function() {
                $("#btnSave").prop("disabled", false);
                $("#btnSave").html('Continue to checkout' );
                alert('Operation failed. Please try again.');
            }
        });

    });

</script>
<?php include_once 'common/footer.php'?>

