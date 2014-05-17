<?php
	$current_page = 'client-creative';
	$meta_description = 'Client creative request form';
//form type label for the DB insert
$requestType = "Client Creative";

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
	"r_quickedit" => "Is this a quick edit?",
	"r_campaign" => "Select Campaign",
	"r_budget" => "National Campaign Budget",
	"r_csize" => "Select Size(s)",
	"r_headline" => "Headline",
	"r_subhead" => "Subhead",
	"r_cta" => "CTA",
	"r_addl_copy" => "Additional Copy",
	"r_landing_url" => "Landing Page",
	"r_addl_info" => "Additional Information",
	"r_no_altering" => "No altering copy",
	"r_psize" => "Boarding Pass Type",
	"r_sizes" => "Boarding Pass Sizes",
	"fb_company_headline" => "FB Company / Headline",
	"fb_text" => "FB text",
	"fb_link_title" => "FB Link Title",
	"fb_domain_url" => "FB Domain Url",
	"fb_description" => "FB Description",
	"fb_fb_url" => "FB Profile Url",
	"fb_image_design_desc" => "FB Image Design Description"

);
	if(isset($_POST['b_submit']) || isset($_POST['b_update'])) {
		$r_name = $_POST['r_name'];
		$r_phone = $_POST['r_phone'];
		$r_email = $_POST['r_email'];
		$r_due = $_POST['r_due'];
		$r_addl_email = $_POST['r_addl_email'];
		$r_cname = $_POST['r_cname'];
		$r_cobjective = $_POST['r_cobjective'];
		$r_client = $_POST['r_client'];
		$r_cwebsite = $_POST['r_cwebsite'];
		if(!empty($_POST['r_campaign'])) {$r_campaign = $_POST['r_campaign'];}
	}
	require_once('form-process.php');
	include_once('inc/doc_header.php');
$fb_type = '';
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
						<legend>Client Creative Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<?php include_once('inc/form_client_info.php'); ?>
						<fieldset class="section" id="quick">
							<legend>Is this a quick edit?<span>*<!-- <label class="error">This selection is required.</label> --></span></legend>
							<div>
								<label><input type="radio" name="r_quickedit" value="yes" required="required"> Yes</label>
								<label><input type="radio" name="r_quickedit" value="no" required="required"> No</label>
							</div>
							<div class="notification quickEdit" style='display:none;'>
								<p>Quick edits are for simple updates, such as new expiration dates or image swaps.</p><p>Files are not needed if original creatives were designed in-house, although uploading the example file is helpful for reference.</p>
								<p>Assets needed for changes to client supplied ads:</p>
								<ul>
									<li>Adobe Photoshop files for static ads.</li>
									<li>Adobe Flash files (not .swf format) for animated ads.</li>
								</ul>
								<p>Turnaround time is 1-2 business days</p>
							</div>
							<fieldset class='selectCampaign'>
								<legend>(If you selected “Yes” above, skip this section)</legend>
								<div>
									<span>Select Campaign<span>*<!-- <label class="error">This selection is required.</label> --></span></span>
									<label><input type="radio" name="r_campaign" value="RevDirect"<?php if(isset($r_campaign) && $r_campaign == 'RevDirect') { ?> checked="checked"<?php } ?>> RevDirect<sup>TM</sup></label>
									<label><input type="radio" name="r_campaign" value="National"<?php if(isset($r_campaign) && $r_campaign == 'National') { ?> checked="checked"<?php } ?>> National</label>
									<label><input type="radio" name="r_campaign" value="Boarding Pass"<?php if(isset($r_campaign) && $r_campaign == 'Boarding Pass') { ?> checked="checked"<?php } ?>> Boarding Pass</label>
									<label><input type="radio" name="r_campaign" value="Facebook News Feed"<?php if(isset($r_campaign) && $r_campaign == 'Facebook News Feed') { ?> checked="checked"<?php } ?>> Facebook News Feed</label>
									<input type="submit" value="Update" name="b_update" formnovalidate="formnovalidate">
								</div>
							<?php
								if(isset($r_campaign)) :
								$r_campaign = strtolower($r_campaign);
								$r_campaign = str_replace(' ','_',$r_campaign);
							?>
								<div class="section container">
								<?php if($r_campaign == 'boarding_pass') { ?>
									<fieldset class="section size" id="boarding_pass">
										
										<div>
											<legend>Select Boarding Pass Sizes</legend>
											<label><input type="radio" name="r_psize[]" value="Printed" required="required">PBP - Printed Boarding Pass</label><br>
											<small>(Does not have a button and should be 60% white space to save on ink when printing)</small>
											<div class='sizes printed'>
												<label><input type="checkbox" name="r_sizes[]" value="300x250" required="required"> 300&times;250</label>
												<label><input type="checkbox" name="r_sizes[]" value="300x500" required="required"> 300&times;500</label>
											</div>
										</div>
										<div>
											<label><input type="radio" name="r_psize[]" value="Online" required="required">OBP - Online Boarding Pass</label>
											<div class='sizes online'>
												<label><input type="checkbox" name="r_sizes[]" value="300x250" required="required"> 300&times;250</label>
												<label><input type="checkbox" name="r_sizes[]" value="300x600" required="required"> 300&times;600</label>
												<label><input type="checkbox" name="r_sizes[]" value="620x200" required="required"> 620&times;200</label>
											</div>
										</div>
										<div>
											<label><input type="radio" name="r_psize[]" value="Takeover" required="required">BPTO - Boarding Pass Takeover</label><br>
											<small>(Please include the high resolution file(s) for the wallpaper image if your client has a specific request)</small>
										</div>
										<div class="other">
											<label><input type="radio" name="r_psize[]" value="Other" required="required"> Other</label>
											<input id="r_psize_other" name="r_psize_other" type="text">
										</div>
									</fieldset>
									<?php
											}
											else if($r_campaign == 'facebook_news_feed') { 
										?>
											<div class="section" id='facebook'>
												<label for="mockup"><input type="radio" name="fb_option" value="mockup" id="mockup" required="required">News Feed Mockup</label>
												<label for="design"><input type="radio" name="fb_option" value="design" id="design" required="required">News Feed Image Design</label>
												<div class="mockup" style='display:none'>
													<div class="notification">
														<p>Mockup purposes only. The creative team does not setup the Facebook News Feed campaigns.</p>
														<p>Turnaround time is 3 business days.</p>
													</div>
													<div>
														<label for="fb_company">Company Name/Headline*</label>
														<input type="text" name="fb_company_headline" required="required">
													</div>
													<div>
														<label for="fb_text">Text (90 characters)*</label>
														<textarea name="fb_text" id="fb_text" cols="30" rows="3" required="required"></textarea>
													</div>
													<div>
														<label for="fb_link_title">Link Title (25 characters)*</label>
														<input type="text" name="fb_link_title" required="required">
													</div>
													<div>
														<label for="fb_domain_url">Domain Link/URL (one line of text)*</label>
														<input type="text" name="fb_domain_url" required="required">
													</div>
													<div>
														<label for="fb_description">Description (2-3 lines of text)*</label>
														<textarea name="fb_description" id="" cols="30" rows="10" required="required"></textarea>
													</div>
													<div>
														<label for="fb_fb_url">Facebook Profile URL *</label>
														<input type="text" name="fb_fb_url" required="required">
													</div>
												</div>
												<div class="design" style='display:none'>
													<div class="notification">
														<p>Turnaround time is 3-5 business days.</p>
													</div>
													<div>
													<p>Describe what the client is looking for. News Feed images do not need to be ads or offers since the offer is written out in the campaign copy. Facebook News Feed images cannot contain more than 20% text.*</p>
													<textarea name="fb_image_design_desc" id="" cols="30" rows="10" required='required'></textarea>
													</div>
													<div>
														<label for="">Facebook Profile URL *</label>
														<input type="text" name="fb_fb_url" required="required">
													</div>
												</div>
											</div>
										
									<?php

										}
										else if($r_campaign == 'revdirect' || $r_campaign == 'national') {
									?>
									<div class="section" id="<?php if($r_campaign == 'revdirect') {echo('revdirect');} else {echo('national');} ?>">
										<?php if($r_campaign == 'revdirect') { ?>
										<div class="notification">
											<strong>RevDirect<sup>TM</sup> Design Support Includes:</strong>
											<ul>
												<li>1 design concept/1 set of static creatives (a total of 4 files: 3 display sizes plus one Facebook Right Rail image)</li>
												<li>2 rounds of iteration with client; $75/hour for additional changes. </li>
											</ul>
											<strong>Animated banners are offered for budgets $50,000+</strong>
											<p>Turnaround time is 7 business days for static ads. Within 4 days of request, one initial concept will be designed for approval. On concept approval, complete set will be produced in 3 business days.</p>
										</div>
										<div class="explanation">
											<div id="standard_budget">
												<strong>Standard Design Support:</strong>
												<ul>
													<li>1 set of creative (3 display sizes plus one FBX ad creative for STP campaigns)</li>
													<li>Only two rounds of iteration with client; $75/hour for additional rounds</li>
													<li>Turnaround time for creative is 5–7 business days (inclusive of 2 rounds) depending on complexity of project and client approval turnaround.</li>
													<li>Quick edits (e.g. text change) can be completed more quickly</li>
												</ul>
											</div>
											<div id="enhanced_budget">
												<strong>Enhanced Design Support:</strong>
												<ul>
													<li>2 sets of creative (3 display sizes plus one FBX ad creative for STP campaigns)</li>
													<li>Only two rounds of iteration with client; $75/hour for additional rounds</li>
													<li>Turnaround time for creative is 7–10 business days (inclusive of 2 rounds) depending on complexity of project and client approval turnaround.</li>
													<li>Quick edits (e.g. text change) can be completed more quickly</li>
												</ul>
											</div>
											<div>Design support beyond the scope of the Standard and Enhanced Design Support packages involving more complex design elements need to be pre-cleared with Gretchen (ISO) or GM and Maly before proposing to prospects/clients. More complex campaigns will also require a quick prioritization and timeline discussion between Gretchen/GM and Maly before confirming delivery timeline to client.</div>
										</div>
										
										<?php
											}
											else { // if national campaign
										?>
										<label for="r_budget">Campaign Budget*</label>
										<p>Creative support is offered for national campaigns $15,000+ over a 3 month period. Please enter the campaign budget for this request:</p>
										<label id="budgetLabel"><input type="text" name="r_budget" id='national_budget'><span class="dollar">$</span></label>
										
										<div class="notification nationalBudget" style='display:none;'>
											<div id="enhanced_budget" style='display:none;'>
												<strong>Enhanced Design Support for campaigns between $50,000 Includes:</strong>
												<ul>
													<li>2 design concepts/2 sets of static creatives (a total of 8 files, 6 display sizes plus 2 Facebook Right Rail images and Facebook Newsfeed mockup)
    													<br>OR 1 set of animated banners plus 1 Facebook Right Rail Image</li>
													<li>2 rounds of iteration with client; $75/hour for additional changes. </li>
												</ul>
											</div>
											<div id="standard_budget" style='display:none;'>
												<strong>Standard Design Support for campaigns between $15,000 and $49,000 Includes:</strong>
												<ul>
													<li>1 design concept/1 set of static creatives (a total of 4 files: 3 display sizes plus one Facebook Right Rail image)</li>
													<li>2 rounds of iteration with client; $75/hour for additional changes. </li>
												</ul>
												<strong>Animated banners are offered for budgets $50,000+</strong>
											</div>
											<div>Turnaround time is 7 business days for static ads or 14 business days for animated ads. Within 4 days of request, one initial concept will be designed for approval. On concept approval, complete set will be produced in 3 business days.</div>
										</div>
										<?php } ?>
									</div>
									<div class="section sizes">
										<span>STP Size(s)<span>*<!-- <label class="error">At least one selection is required.</label> --></span></span>
										<ul>
											<li><label><input type="checkbox" name="r_csize[]" value="300x250"> 300&times;250</label></li>
											<li><label><input type="checkbox" name="r_csize[]" value="728x90"> 728&times;90</label></li>
											<li><label><input type="checkbox" name="r_csize[]" value="160x600"> 160&times;600</label></li>
											<li><label><input type="checkbox" name="r_csize[]" value="120x120 RR"> 120&times;120 Right Rail</label></li>
											
												
										</ul>
							
									</div>
									<?php } 
										if($r_campaign != 'facebook_news_feed'){
									?>
									<fieldset class='adcopy'>
										<legend>Ad Copy</legend>
										<p>Client suggested copy helps to determine the design direction of the creatives. Copy may be edited to better fit campaign goals.</p>
										<label for="r_no_altering_check"><input type="checkbox" name="r_no_altering_check" id="noAlter">Select this option if client provided copy <strong>MUST NOT</strong> be altered.</label>
										<input type="hidden" name="r_no_altering">
										<div>
											<label for="r_headline">Headline*</label>
											<input id="r_headline" name="r_headline" type="text" required="required">
										</div>
										<div>
											<label for="r_subhead">Subhead</label>
											<input id="r_subhead" name="r_subhead" type="text" >
										</div>
										<div>
											<label for="r_cta">Call to action*<small>(CTA)</small></label>
											<input id="r_cta" name="r_cta" type="text" required="required">
										</div>
										<div>
											<label for="r_addl_copy">Additional Copy</label>
											<textarea id="r_addl_copy" name="r_addl_copy" cols="30" rows="3"></textarea>
										</div>
									</fieldset>
									<div class="r_landing_url">
										<label for="r_landing_url">Landing Page URL/Click-Through URL*</label>
										<p>Creatives will match the landing page/click through URL unless otherwise directed by client.</p>
										<input id="r_landing_url" name="r_landing_url" type="text" required="required">
									</div>
								</div><!-- end .section.container -->
								<?php 
									}
								endif; ?>
							</fieldset>
						</fieldset> <!-- end #quick -->
						<fieldset class="section file">
							<div class="simple">
								<legend><label for="r_file">Upload Assets and Files</label></legend>
								<p>File can also be uploaded one at a time.  For requests requiring multiple asset files, save time by uploading one ZIP/compressed folder.
								Total size of all uploaded files is a <strong>maximum of 20MB.</strong> If your files are larger than this, please upload to your Google drive and copy the share link 
								into the Additional Information field on this form.</p>
							</div>

                            <div class="complex_mockup" style='display:none;'>
                                <legend><label for="r_file">Upload Assets</label></legend>
                                <p>Providing proper assets will reduce the amount of changes requested by the client and ensure that your deadline is met.</p>
                                <ul>
                                    <li>
                                        <p><strong>Images</strong> (jpg, png, gif, etc)</p>
                                        <p> Image that your client would like to use for the Facebook News Feed
                                            Use lifestyle photos or attractive product imagery. When using photos, keep text overlay to a minimum. Images with more
                                            than 20% text will be not be approved.
                                            (jpg, png, gif, etc)</p>
                                    </li>

                                    <li>
                                        <p><strong>Logo</strong> (eps or ai format)</p>
                                        <p>Must be the same logo used for their Facebook profile picture</p>
                                    </li>

                                </ul>
                                <p>File can also be uploaded one at a time.  For requests requiring multiple asset files, save time by uploading one ZIP/compressed folder.
                                    Total size of all uploaded files is a <strong>maximum of 20MB.</strong> If your files are larger than this, please upload to your Google drive and copy the share link
                                    into the Additional Information field on this form.</p>
                            </div>
							<div class="complex" style='display:none;'>
								<legend><label for="r_file">Upload Assets</label></legend>
								<p>Providing proper assets will reduce the amount of changes requested by the client and ensure that your deadline is met.</p>
								<ul>
									<li>
										<p><strong>Images</strong> (jpg, png, gif, etc)</p>
										<p> If your client requests a specific image to be used, you must include a high resolution file for that image. Low resolutions files taken off the internet can result in blurry low quality ads.</p>
									</li>
									<li>
										<p><strong>Creatives</strong> (eps, ai, or psd format)</p>
										<p>Existing editable banner ad files in Adobe Photoshop format help to speed up the design process.</p>
									</li>
									<li>
										<p><strong>Logo</strong> (eps or ai format)</p>
										<p>Vector format files provide the cleanest art. Low resolutions files taken off the internet can result in blurry low quality ads.</p>
									</li>
									<li>
										<p><strong>Fonts</strong> (true type or open type format)</p>
										<p>Font file(s) must be provided when client requests a  specific font.</p>
									</li>
									<li>
										<p><strong>Corporate Style Guide</strong> (pdf format)</p>
										<p>Clients that have strict guidelines often have these rules outlined in a style guide</p>
									</li>
									<li>
										<p><strong>Fallback Ad or Previous Ads</strong></p>
										<p>Examples of client’s approved style help to speed up the design process.</p>
									</li>
								</ul>

								<p>File can also be uploaded one at a time.  For requests requiring multiple asset files, save time by uploading one ZIP/compressed folder.
								Total size of all uploaded files is a <strong>maximum of 20MB.</strong> If your files are larger than this, please upload to your Google drive and copy the share link 
								into the Additional Information field on this form.</p>
							</div>
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