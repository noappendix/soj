<?php
	$current_page = 'business-card';
	$meta_description = 'Business card request form';
//form type label for the DB insert
$requestType = "Business Card";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_bname" => "Card Name",
	"r_bemail" => "Card Email",
	"r_btitle" => "Title/Position",
	"r_bphone" => "Office Phone Number",
	"r_bmobile" => "Mobile Phone Number",
	"r_bfax" => "Fax Number",
	"bcard_address" => "Card Address",
	"bcard_address_other" => "Card Address (Other)"
);

require_once('form-process.php');
	include_once('inc/doc_header.php');
?>
<body>
	<div id="container">
		<header>
			<div id="header">
				<a id="logo" href="/" title="Sojern Home" rel="home"><img src="img/logo_sojern.png" alt="Sojern" width="180" height="54"></a>
				<h1>Creative Request Form</h1>
			</div>
		</header>
		<hr>
		<div id="content">
			<div id="main">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Business Card Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section business">
							<legend>Business Card Copy</legend>
							<div>
								<div>
									<label for="r_bname">Name<span>*</span></label>
									<input id="r_bname" name="r_bname" type="text" required="required">
									<!-- <label class="error" for="r_bname">This field is required.</label> -->
								</div>
								<div>
									<label for="r_bemail">E-mail<span>*</span></label>
									<input id="r_bemail" name="r_bemail" type="email" required="required">
									<!-- <label class="error" for="r_bemail">This field is required.</label> -->
								</div>
								<div>
									<label for="r_btitle">Title/Position<span>*</span></label>
									<input id="r_btitle" name="r_btitle" type="text" required="required">
									<!-- <label class="error" for="r_btitle">This field is required.</label> -->
								</div>
							</div>
							<div>
								<div>
									<label for="r_bphone">Office Phone Number <small>(if applicable)</small></label>
									<input id="r_bphone" name="r_bphone" type="tel">
								</div>
								<div>
									<label for="r_bmobile">Mobile Phone Number</label>
									<input id="r_bmobile" name="r_bmobile" type="tel">
								</div>
								<div>
									<label for="r_bfax">Fax Number <small>(if applicable)</small></label>
									<input id="r_bfax" name="r_bfax" type="tel">
								</div>
							</div>
						</fieldset>
						<fieldset class="section business">
							<legend>Business Card Address</legend>
							<label><input type="radio" name="bcard_address" value="Omaha"> Omaha</label>
							<label><input type="radio" name="bcard_address" value="New York"> New York</label>
							<label><input type="radio" name="bcard_address" value="San Francisco"> San Francisco</label>
							<label><input type="radio" name="bcard_address" value="London"> London</label>
							<label class="other"><input type="radio" name="bcard_address" value="Other"> Other</label>
							<label for="bcard_address_other">Provide the address, city, state, and postal code</label>
							<input id="bcard_address_other" name="bcard_address_other" type="text">
						</fieldset>
					</fieldset>
					<div class="submit">
						<input type="submit" value="Submit" name="b_submit">
					</div>
				</form>
			</div>
			<?php include_once('inc/sub.php'); ?>
</div>
		<!-- end content -->
		<hr>
		<footer>
			<div id="footer">
				<div class="copyright">&copy; 2013 Sojern. All Rights Reserved.</div>
			</div>
		</footer>
	</div>
</body>
</html>