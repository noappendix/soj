<?php
	$current_page = 'external-product-doc';
	$meta_description = 'External product doc request form';
//form type label for the DB insert
$requestType = "External Product Doc";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_pname" => "What is the product?",
	"r_pfeatures" => "Features",
	"r_pbenefits" => "Benefits",
	"r_pmetrics" => "List supporting 3-4 research metrics",
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
						<legend>External Product Doc Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section product">
							<legend>Product Information</legend>
							<div>
								<label for="r_pname">What is the product?</label>
								<input id="r_pname" name="r_pname" type="text">
							</div>
							<div>
								<label for="r_pfeatures">Features</label>
								<textarea id="r_pfeatures" name="r_pfeatures" rows="3" cols="60"></textarea>
							</div>
							<div>
								<label for="r_pbenefits">Benefits</label>
								<textarea id="r_pbenefits" name="r_pbenefits" rows="3" cols="60"></textarea>
							</div>
							<div>
								<label for="r_pmetrics">List supporting 3–4 research metrics</label>
								<input id="r_pmetrics" name="r_pmetrics[]" type="text">
								<input type="text" name="r_pmetrics[]">
								<input type="text" name="r_pmetrics[]">
								<input type="text" name="r_pmetrics[]">
							</div>
						</fieldset>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Brand Logo <small>(EPS or AI format)</small></li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
								<li>Creatives <small>(EPS, AI, or PSD format)</small></li>
								<li>Fonts <small>(TrueType or OpenType)</small></li>
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