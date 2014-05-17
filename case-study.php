<?php
	$current_page = 'case-study';
	$meta_description = 'Case study request form';
//form type label for the DB insert
$requestType = "Case Study";

//Array for friendly field labels for the email
$fieldNames = array(
	"r_name" => "Requested By",
	"r_phone" => "Phone",
	"r_email" => "Email",
	"r_due" => "Due Date",
	"r_addl_email" => "Additional E-mail",
	"r_cname" => "Campaign Name",
	"r_client" => "Client",
	"r_cwebsite" => "Client Website URL",
	"r_cdescription" => "Describe what the client does",
	"r_cmetrics" => "Provide metrics",
	"r_cobjectives" => "Campaign Objectives",
	"r_cresults" => "Campaign Results",
	"r_achieved_1" => "Top 3 Metrics Achieved (1)",
	"r_achieved_2" => "Top 3 Metrics Achieved (2)",
	"r_achieved_3" => "Top 3 Metrics Achieved (3)",
	"r_cquote" => "Client Quote",
	"r_cquote_internal" => "Internal Quote",
	"srep_name" => "Sales Rep Name",
	"srep_email" => "Sales Rep Email",
	"actmgr_name" => "Account Manager Name",
	"actmgr_email" => "Account Manager Email",
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
						<legend>Case Study Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section client">
							<legend>Client Information</legend>
							<div>
								<label for="r_cname">Campaign Name<span>*</span></label>
								<input id="r_cname" name="r_cname" type="text" required="required">
								<!-- <label class="error" for="r_cname">This field is required.</label> -->
							</div>
							<div>
								<label for="r_client">Client<span>*</span></label>
								<input id="r_client" name="r_client" type="text" required="required">
								<!-- <label class="error" for="r_client">This field is required.</label> -->
							</div>
							<div>
								<label for="r_cwebsite">Client Website URL<span>*</span></label>
								<input id="r_cwebsite" name="r_cwebsite" type="text" required="required">
								<!-- <label class="error" for="r_cwebsite">This field is required.</label> -->
							</div>
							<div>
								<label for="r_cdescription">Describe what the client does<span>*</span></label>
								<textarea id="r_cdescription" name="r_cdescription" required="required" cols="30" rows="3"></textarea>
								<!-- <label class="error" for="r_cdescription">This field is required.</label> -->
							</div>
							<div>
								<label for="r_cmetrics">Provide metrics<span>*</span> <small>(e. g. monthly site uniques, customers, markets served, etc.)</small></label>
								<textarea id="r_cmetrics" name="r_cmetrics" required="required" cols="30" rows="3"></textarea>
								<!-- <label class="error" for="r_cmetrics">This field is required.</label> -->
							</div>
						</fieldset>
						<fieldset class="section client">
							<legend>Case Study Information</legend>
							<div>
								<label for="r_cobjectives">Campaign Objectives<span>*</span> <small>(include metrics goals)</small></label>
								<textarea id="r_cobjectives" name="r_cobjectives" required="required" cols="30" rows="3"></textarea>
								<!-- <label class="error" for="r_cobjectives">This field is required.</label> -->
							</div>
							<div>
								<label for="r_cresults">Results <span>*</span> <small>(e. g. levers used to meet the objectives, optimization strategies such as targeting, timing, channels, geo)</small></label>
								<textarea id="r_cresults" name="r_cresults" required="required" cols="30" rows="3"></textarea>
								<!-- <label class="error" for="r_cresults">This field is required.</label> -->
							</div>
							<div>
								<label for="r_achieved">Top 3 Metrics Achieved <span>*</span> <small>(CTR, % conversion, # of conversions, etc.)</small></label>
								<input id="r_achieved" name="r_achieved_1" type="text" required="required">
								<input type="text" name="r_achieved_2" required="required">
								<input type="text" name="r_achieved_3" required="required">
								<!-- <label class="error" for="r_achieved">This field is required.</label> -->
							</div>
							<div>
								<label for="r_cquote">Client Quote <small>(include a quote from the case study partner when available)</small></label>
								<textarea id="r_cquote" name="r_cquote" cols="30" rows="3"></textarea>
							</div>
							<div>
								<label for="r_cquote_internal">Internal Quote <small>(if blind case study)</small></label>
								<textarea id="r_cquote_internal" name="r_cquote_internal" cols="30" rows="3"></textarea>
							</div>
						</fieldset>
						<fieldset class="section client">
							<legend>Sales Rep Information</legend>
							<div>
								<label for="srep_name">Name<span>*</span></label>
								<input id="srep_name" name="srep_name" required="required" type="text">
								<!-- <label class="error" for="srep_name">This field is required.</label> -->
							</div>
							<div>
								<label for="srep_email">E-mail<span>*</span></label>
								<input id="srep_email" name="srep_email" required="required" type="email">
								<!-- <label class="error" for="srep_email">This field is required.</label> -->
							</div>
						</fieldset>
						<fieldset class="section client">
							<legend>Account Manager Information</legend>
							<div>
								<label for="actmgr_name">Name<span>*</span></label>
								<input id="actmgr_name" name="actmgr_name" required="required" type="text">
								<!-- <label class="error" for="actmgr_name">This field is required.</label> -->
							</div>
							<div>
								<label for="actmgr_email">E-mail<span>*</span></label>
								<input id="actmgr_email" name="actmgr_email" required="required" type="email">
								<!-- <label class="error" for="actmgr_email">This field is required.</label> -->
							</div>
						</fieldset>
						<fieldset class="section file">
							<legend><label for="r_file">Upload File(s)</label></legend>
							<ul>
								<li>Brand Logo <small>(EPS or AI format)</small></li>
								<li>Images <small>(JPG, PNG, GIF, etc.)</small></li>
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