<?php
	$current_page = 'website-update';
	$meta_description = 'Website update request form';
	//form type label for the DB insert
$requestType = "Website Update";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_addl_email" => "Additional E-mail",
	"r_due" => "Due Date",
	"r_option" => "Update Type",
	"lp_title" => "Landing Page Title",
	"lp_purpose" => "Landing Page Purpose",
	"lp_url" => "Landing Page URL",
	"r_addl_info" => "Project Information"
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
						<legend>Website Update Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section option">
							<legend>Select Option<span>*<!-- <label class="error">This selection is required.</label> --></span></legend>
							<div>
								<label><input type="radio" name="r_option" value="landing" required="required"> Landing 
Page Design</label>
								<label><input type="radio" name="r_option" value="Error/Edits" required="required"> Error/Edits</label>
								<label><input type="radio" name="r_option" value="Other" required="required"> Other</label>
							</div>
							<fieldset>
								<legend>(If you selected “Landing Page Design” above, fill out this section, otherwise skip it)</legend>
								<div>
									<label for="lp_title">Title of Landing Page<span>*</span></label>
									<input id="lp_title" name="lp_title" type="text">
									<!-- <label class="error" for="lp_title">This field is required.</label> -->
								</div>
								<div>
									<label for="lp_purpose">Purpose of Landing Page<span>*</span></label>
									<input id="lp_purpose" name="lp_purpose" type="text">
									<!-- <label class="error" for="lp_purpose">This field is required.</label> -->
								</div>
								<div>
									<label for="lp_url">Page URL<span>*</span></label>
									<input id="lp_url" name="lp_url" type="text">
									<!-- <label class="error" for="lp_url">This field is required.</label> -->
								</div>
								<div class="explanation">Marketing will reach out to schedule a kick-off call.</div>
							</fieldset>
						</fieldset>
						<div class="section additional">
							<label for="r_addl_info">Project Information<span>*</span></label>
							<div>Provide as much information as possible on what you would like to achieve with this request.</div>
							<textarea id="r_addl_info" name="r_addl_info" cols="60" rows="10" required="required"></textarea>
							<!-- <label class="error" for="r_addl_info">This field is required.</label> -->
						</div>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Error Screenshots</li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
								<li>Style Guide <small>(PDF format)</small></li>
							</ul>
							<p>The maximum total size for all uploaded files is 20MB. If your files are larger than this, please upload to your Google drive and copy the share link into the Additional Information field on this form.</p>
							<input id="r_file" name="r_file[]" type="file"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]"><br>
							<input type="file" name="r_file[]">
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