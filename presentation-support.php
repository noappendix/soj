<?php
	$current_page = 'presentation-support';
	$meta_description = 'Presentation support request form';

//form type label for the DB insert
$requestType = "Presentation Support";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_confname" => "Client/Conference Name",
	"r_option" => "Design or Copy Edit",
	"r_psize" => "Boarding Pass Type(s)",
	"r_sizes_print" => "Boarding Pass Sizes(s) - Printed",
	"r_sizes_online" => "Boarding Pass Sizes(s) - Online",
	"r_psize_other" => "Boarding Pass Size(s) - Other",
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
						<legend>Presentation Support Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<div class="r_conference">
							<label for="r_confname">Client/Conference Name<span>*</span></label>
							<input id="r_confname" name="r_confname" type="text" required="required">
							<!-- <label class="error" for="r_confname">This field is required.</label> -->
						</div>
						<fieldset class="section option">
							<legend>Select Option</legend>
							<div>
								<label><input type="checkbox" name="r_option[]" value="Design"> Design</label>
								<label><input type="checkbox" name="r_option[]" value="Copy Edit"> Copy Edit</label>
								<label><input type="checkbox" name="r_option[]" value="Boarding Pass"> Boarding Pass Mockup</label>
							</div>
						</fieldset>
						<fieldset class="section size" id="boarding_pass">
							<legend><span>If you selected “Boarding Pass” above:</span> Select Boarding Pass Sizes</legend>
							<div>
								<label><input type="checkbox" name="r_psize[]" value="Printed"> Printed Boarding Pass</label>
								<div>
									<label><input type="checkbox" name="r_sizes_print[]" value="300x250"> 300&times;250</label>
									<label><input type="checkbox" name="r_sizes_print[]" value="300x500"> 300&times;500</label>
								</div>
							</div>
							<div>
								<label><input type="checkbox" name="r_psize[]" value="Online"> Online Boarding Pass</label>
								<div>
									<label><input type="checkbox" name="r_sizes_online[]" value="300x250"> 300&times;250</label>
									<label><input type="checkbox" name="r_sizes_online[]" value="300x600"> 300&times;600</label>
									<label><input type="checkbox" name="r_sizes_online[]" value="300x200"> 620&times;200</label>
								</div>
							</div>
							<div>
								<label><input type="checkbox" name="r_psize[]" value="Takeover"> Boarding Pass Takeover</label>
							</div>
							<div class="other">
								<label><input type="checkbox" name="r_psize[]" value="Other"> Other</label>
								<input id="r_psize_other" name="r_psize_other" type="text">
							</div>
						</fieldset>
						<div class="section additional">
							<label for="r_addl_info">Project Information</label>
							<div>Provide as much information as possible on what you would like to achieve with this request.</div>
							<textarea id="r_addl_info" name="r_addl_info" cols="60" rows="10"></textarea>
						</div>
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