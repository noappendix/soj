<?php
	$current_page = 'conference-materials';
	$meta_description = 'Conference materials request form';
//form type label for the DB insert
$requestType = "Conference Materials";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_condate" => "Conference Date",
	"r_confname" => "Conference Name",
	"r_confmaterials" => "Select Conference Material(s) Needed",
	"q_gum" => "Gum Quantity",
	"q_wipes" => "Mobile Wipe Quantity",
	"q_tablecloth" => "Tablecloth Quantity",
	"q_banner" => "Banner Quantity",
	"q_shirts" => "T-Shirt Quantity",
	"q_keycards" => "Key Card Quantity",
	"r_printed_type" => "Printed Material Type",
	"r_copy_content" => "Printed Material Copy/Content",
	"r_print_format" => "Printed Material Format",
	"r_print_size" => "Printed Material Size",
	"r_print_quantity" => "Printed Material Quantity",
	"r_invite" => "HTML E-mail Invite Copy/Content",
	"r_addl_info" => "Additional Information"
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
						<legend>Conference Materials Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section conference">
							<legend>Conference Information</legend>
							<div>
								<label for="r_confdate">Conference Date<span>*</span></label>
								<input id="r_confdate" name="r_condate" type="text" required="required">
								<!-- <label class="error" for="r_condate">This field is required.</label> -->
							</div>
							<div>
								<label for="r_confname">Conference Name<span>*</span></label>
								<input id="r_confname" name="r_confname" type="text" required="required">
								<!-- <label class="error" for="r_confname">This field is required.</label> -->
							</div>
							<fieldset>
								<legend>Select Conference Material(s) Needed</legend>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Gum"> Gum</label>
									<div>
										<label for="q_gum">Quantity<span>*</span></label>
										<input id="q_gum" name="q_gum" type="text" size="4">
										<!-- <label class="error" for="q_gum">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Mobile Wipes"> Mobile Wipes</label>
									<div>
										<label for="q_wipes">Quantity<span>*</span></label>
										<input id="q_wipes" name="q_wipes" type="text" size="4">
										<!-- <label class="error" for="q_wipes">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Tablecloth"> Tablecloth</label>
									<div>
										<label for="q_tablecloth">Quantity<span>*</span></label>
										<input id="q_tablecloth" name="q_tablecloth" type="text" size="4">
										<!-- <label class="error" for="q_tablecloth">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Banner"> Banner</label>
									<div>
										<label for="q_banner">Quantity<span>*</span></label>
										<input id="q_banner" name="q_banner" type="text" size="4">
										<!-- <label class="error" for="q_banner">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="T-Shirts"> T-shirts</label>
									<div>
										<label for="q_shirts">Quantity<span>*</span></label>
										<input id="q_shirts" name="q_shirts" type="text" size="4">
										<!-- <label class="error" for="q_shirts">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Key cards"> Key Cards <small>(upload specs below)</small></label>
									<div>
										<label for="q_keycards">Quantity<span>*</span></label>
										<input id="q_keycards" name="q_keycards" type="text" size="4">
										<!-- <label class="error" for="q_keycards">This field is required.</label> -->
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Printed materials"> Printed Materials</label>
									<div>
										<div>
											<label for="r_printed_type">Specify Type of Printed Material</label>
											<input id="r_printed_type" name="r_printed_type" type="text">
										</div>
										<div>
											<label for="r_copy_content">Copy/Content <small>(copy and paste or attach text document)</small></label>
											<textarea id="r_copy_content" name="r_copy_content" cols="30" rows="3"></textarea>
										</div>
										<div>
											<div>
												<label for="r_print_format">Format<span>*</span></label>
												<input id="r_print_format" name="r_print_format" type="text">
											</div>
											<div>
												<label for="r_print_size">Size<span>*</span></label>
												<input id="r_print_size" name="r_print_size" type="text">
											</div>
											<div>
												<label for="r_print_quantity">Quantity<span>*</span></label>
												<input id="r_print_quantity" name="r_print_quantity" type="text" size="4">
											</div>
										</div>
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="HTML Email Invite"> HTML E-mail Invite</label>
									<div>
										<label for="r_invite">Copy/Content<span>*</span></label>
										<textarea id="r_invite" name="r_invite" cols="30" rows="3"></textarea>
									</div>
								</div>
								<div>
									<label><input type="checkbox" name="r_confmaterials[]" value="Other"> Other <small>(provide information and upload specs below)</small></label>
								</div>
							</fieldset>
						</fieldset>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Brand Logo <small>(EPS or AI format)</small></li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
								<li>Style Guide <small>(PDF format)</small></li>
								<li>Attendee List</li>
								<li>Contract</li>
								<li>Specifications</li>
							</ul>
							<p>The maximum total size for all uploaded files is 20MB. If your files are larger than this, please upload to your Google drive and copy the share link into the Additional Information field on this form.</p>
							<input id="r_file" name="r_file[]" type="file"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]">
						</fieldset>
						<?php include_once('inc/form_additional.php'); ?>
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