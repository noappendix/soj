<?php
	$current_page = 'other-custom';
	$meta_description = 'Other/custom request form';

//form type label for the DB insert
$requestType = "Other/Custom";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
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
						<legend>Other Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<div class="section additional">
							<label for="r_addl_info">Project Information<span>*</span></label>
							<div>Provide as much information as possible on what you would like to achieve with this request.</div>
							<textarea id="r_addl_info" name="r_addl_info" required="required" cols="60" rows="10"></textarea>
							<!-- <label class="error" for="r_addl_info">This field is required.</label> -->
							<div class="explanation">Marketing will reach out to schedule a kick-off call.</div>							
						</div>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Brand Logo <small>(EPS or AI format)</small></li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
								<li>Style Guide <small>(PDF format)</small></li>
								<li>Fonts <small>(TrueType or OpenType)</small></li>
								<li>Creatives <small>(EPS, AI, or PSD format)</small></li>
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