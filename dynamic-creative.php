<?php
	$current_page = 'dynamic-creative';
	$meta_description = 'Dynamic creative request form';
//form type label for the DB insert
$requestType = "Dynamic Creative";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_cname" => "Campaign Name",
	"r_cobjective" => "Campaign Objective",
	"r_client" => "Client",
	"r_cwebsite" => "Client Website URL",
	"r_background" => "Project Background",
	"r_sizes" => "Sizes",
	"r_headline" => "Headline",
	"r_subhead" => "Subhead",
	"r_cta" => "CTA",
	"r_addl_copy" => "Additional Copy",
	"r_landing_url" => "Landing Page URL/Click-Through URL",
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
				<input name="dynamic" type="hidden" value="1">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Dynamic Creative Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<?php include_once('inc/form_client_info.php'); ?>
						<fieldset class="section background">
							<legend>Project Background</legend>
							<div>
								<label><input type="radio" name="r_background" value="Brand New Ads"> Brand New Ads</label>
								<label><input type="radio" name="r_background" value=" Revision"> Revision</label>
								<label><input type="radio" name="r_background" value="Strategy Changed"> Strategy Changed</label>
							</div>
							<div class="sizes">
								<label for="r_sizes">Specify Size(s)<span>*</span></label>
								<input id="r_sizes" name="r_sizes" type="text" required="required">
								<!-- <label class="error" for="r_sizes">This field is required.</label> -->
						</div>
						</fieldset>
						<fieldset class="section">
							<legend>Ad Copy</legend>
							<div>
								<label for="r_headline">Headline</label>
								<input id="r_headline" name="r_headline" type="text">
							</div>
							<div>
								<label for="r_subhead">Subhead</label>
								<input id="r_subhead" name="r_subhead" type="text">
							</div>
							<div>
								<label for="r_cta">Call to action <small>(CTA)</small></label>
								<input id="r_cta" name="r_cta" type="text">
							</div>
							<div>
								<label for="r_addl_copy">Additional Copy</label>
								<textarea id="r_addl_copy" name="r_addl_copy" cols="30" rows="3"></textarea>
							</div>
							<div class="r_landing_url">
								<label for="r_landing_url">Landing Page URL/Click-Through URL</label>
								<input id="r_landing_url" name="r_landing_url" type="text">
							</div>
						</fieldset>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Brand Logo <small>(EPS or AI format)</small></li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
								<li>Creatives <small>(EPS, AI, or PSD format)</small></li>
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