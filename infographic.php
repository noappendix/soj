<?php
	$current_page = 'infographic';
	$meta_description = 'Infographic request form';
	if(isset($_POST['b_submit']) || isset($_POST['b_update'])) {
		$r_name = $_POST['r_name'];
		$r_phone = $_POST['r_phone'];
		$r_email = $_POST['r_email'];
		$r_due = $_POST['r_due'];
		$r_addl_email = $_POST['r_addl_email'];
		if(!empty($_POST['r_igtype'])) {$r_igtype = $_POST['r_igtype'];}
	}

	//b_submit is the final submission
	if(isset($_POST['b_submit'])) {

		//form type label for the DB insert
		$requestType = "Infographic";

		//Array for friendly field labels for the email
		$fieldNames = array(
			"r_name" => "Requested By",
			"r_phone" => "Phone",
			"r_email" => "Email",
			"r_due" => "Due Date",
			"r_addl_email" => "Additional E-mail",
			"r_igtype" => "Type of Infographic",
			"infographic" => "Infographic Template To Use",
			"srep_name" => "Sales Rep Name",
			"srep_phone" => "Sales Rep Phone",
			"srep_title" => "Sales Rep Title",
			"srep_email" => "Sales Rep E-mail",
			"srep_destination" => "Destination Infographic",
			"r_month1" => "Searches in the last three months - Month One",
			"r_sum1" => "Sum of Searches - Month One",
			"r_month2" => "Searches in the last three months - Month Two",
			"r_sum2" => "Sum of Searches - Month Two",
			"r_month3" => "Searches in the last three months - Month Three",
			"r_sum3" => "Sum of Searches - Month Three",
			"r_max" => "Maximum Traveller Searches",
			"r_average" => "Average Traveller Searches",
			"r_searchfrom" => "Top 10 Opportunity Markets",
			"r_boarded" => "Top 10 Origination Markets",
			"r_searched_boarded" => "Boards - Searched and Boarded",
			"r_searched_other" => "Other Destinations Searched",
			"r_search_purchase" => "Longest number of days between search and purchase",
			"sp-0" => "0 days between search and purchase",
			"sp-1_2" => "1-2 days between search and purchase",
			"sp-3_7" => "3-7 days between search and purchase",
			"sp-8_14" => "8-14 days between search and purchase",
			"sp-15_21" => "15-21 days between search and purchase",
			"sp-22_30" => "22-30 days between search and purchase",
			"sp-31" => "31+ days between search and purchase",
			"r_purchase_travel" => "Longest number of days between purchase and travel",
			"pt-0" => "0 days between purchase and travel",
			"pt-1_2" => "1-2 days between purchase and travel",
			"pt-3_7" => "3-7 days between purchase and travel",
			"pt-8_14" => "8-14 days between purchase and travel",
			"pt-15_21" => "15-21 days between purchase and travel",
			"pt-22_30" => "22-30 days between purchase and travel",
			"pt-31" => "31+ days between purchase and travel",
			"perc_bus" => "Percentage of Business Travelers",
			"perc_lei" => "Percentage of Leisure Travelers",
			"ls-0_1" => "Nights Stayed 0-1",
			"ls-2_3" => "Nights Stayed 2-3",
			"ls-4_5" => "Nights Stayed 4-5",
			"ls-6_7" => "Nights Stayed 5-7",
			"ls-8" => "Nights Stayed 8+",
			"r_addl_info" => "Additional Information",

			"r_client" => "Client",
			"r_datapoints" => "Datapoints"

		);

		require_once('form-process.php');

	}
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
						<legend>Infographic Request Form</legend>
						<?php include_once('inc/form_top.php'); ?>
						<fieldset class="section" id="i_type">
							<legend>Select Type of Infographic <span>*</span><!-- <label class="error">This field is required.</label> --></legend>
							<div>
								<label><input type="radio" name="r_igtype" value="destination"<?php if(isset($r_igtype) && $r_igtype == 'destination') { ?> checked="checked"<?php } ?>> Destination</label>
								<label><input type="radio" name="r_igtype" value="hotel"<?php if(isset($r_igtype) && $r_igtype == 'hotel') { ?> checked="checked"<?php } ?>> Hotel</label>
								<label><input type="radio" name="r_igtype" value="other"<?php if(isset($r_igtype) && $r_igtype == 'other') { ?> checked="checked"<?php } ?>> Other <small>(Provide details in Additional Information section below)</small></label>
								<input type="submit" value="Update" name="b_update" formnovalidate="formnovalidate">
							</div>
						<?php
								if(isset($r_igtype)) :
									if($r_igtype == 'destination') { ?>
							<fieldset id="destination">
							<script>
								$(document).ready(function(){
									$('.infographicLabels').on('change','input:radio', function(){
									var val = $(this).val(),
									$div = $('.infographicDesign');

									switch(val)
									{
										case 'brand':
											$div.css({'background-image': 'url("/creative-requests/img/destination_infographic_brand.png")'})
											break;
										case 'mint':
											$div.css({'background-image': 'url("/creative-requests/img/destination_infographic_mint.png")'})
											break;
										case 'min':
											$div.css({'background-image': 'url("/creative-requests/img/destination_infographic_min.png")'})
											break;
										case 'beach':
											$div.css({'background-image': 'url("/creative-requests/img/destination_infographic_beach.png")'})
											break;
										default:
											$div.css({'background-image': 'url("/creative-requests/img/destination_infographic_brand.png")'})
									}
									});
								});

							</script>
								<legend>Destination</legend>
								<fieldset class="infographic">
									<legend>Select Infographic Design</legend>
									<div class="infographicLabels">
										<label for="infographic"><input type="radio" name="infographic" value="brand" id="brand"checked> Brand Colors</label>
										<label for="infographic"><input type="radio" name="infographic" value="mint"  id="mint"> Mint/Navy/Orange</label>
										<label for="infographic"><input type="radio" name="infographic" value="min" id="min"> Minimum</label>
										<label for="infographic"><input type="radio" name="infographic" value="beach" id="beach"> Beach</label>
									</div>
									<div class="infographicDesign">

									</div>
								</fieldset>
								<fieldset class="srep">
									<legend>Sales Rep Contact Information (<span>REQUIRED</span>)*</legend>
									<div>
										<label for="srep_name">Name<span>*</span></label>
										<input id="srep_name" type="text" name="srep_name" required="required">
										<!-- <label class="error" for="srep_name">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_phone">Phone<span>*</span></label>
										<input id="srep_phone" name="srep_phone" type="tel" required="required">
										<!-- <label class="error" for="srep_phone">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_title">Title<span>*</span></label>
										<input id="srep_title" name="srep_title" type="text" required="required">
										<!-- <label class="error" for="srep_title">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_email">E-mail<span>*</span></label>
										<input id="srep_email" name="srep_email" type="email" required="required">
										<!-- <label class="error" for="srep_email">This field is required.</label> -->
									</div>
								</fieldset>
								<fieldset class="destination">
									<legend>Destination</legend>
									<div>
										<label for="srep_destination">Destination<span>*</span></label>
										<input id="srep_destination" name="srep_destination" type="text" required="required">
										<!-- <label class="error" for="srep_email">This field is required.</label> -->
									</div>
								</fieldset>

								<fieldset class="boards other">
									<legend><label for="r_searched_other">Boarded to/Confirmed Destinations (Top 10 Origination Markets)*</label></legend>
									<div class="explanation"> <span class="note">Please do not include same destinations
									<small>(e. g., Newark and New York = New York; Washington Dulles and Washington Reagan = Washington D.C.)</small></span></div>
									<div>
										<div>
											<input id="r_boarded" type="text" name="r_boarded[]">
											<input type="text" name="r_boarded[]">
										</div>
										<div>
											<input type="text" name="r_boarded[]">
											<input type="text" name="r_boarded[]">
										</div>
										<div>
											<input type="text" name="r_boarded[]">
											<input type="text" name="r_boarded[]">
										</div>
										<div>
											<input type="text" name="r_boarded[]">
											<input type="text" name="r_boarded[]">
										</div>
										<div>
											<input type="text" name="r_boarded[]">
											<input type="text" name="r_boarded[]">
										</div>
									</div>
								</fieldset>
								<fieldset class="boards">
									<legend>Search Destinations (Top 10 Opportunity Markets)*</legend>
									<div class="explanation">
										These markets should NOT overlap or repeat the Boarded to/Confirmed Destinations (Top 10 Origination Markets) section.
										<span class="note">Please do not include same destinations <small>(e. g., Newark and New York = New York; Washington Dulles and Washington Reagan = Washington D.C.)</small></span>
									</div>
									<div>
										<div>
											<input id="r_searchfrom" type="text" name="r_searchfrom[]">
											<input type="text" name="r_searchfrom[]">
										</div>
										<div>
											<input type="text" name="r_searchfrom[]">
											<input type="text" name="r_searchfrom[]">
										</div>
										<div>
											<input type="text" name="r_searchfrom[]">
											<input type="text" name="r_searchfrom[]">
										</div>
										<div>
											<input type="text" name="r_searchfrom[]">
											<input type="text" name="r_searchfrom[]">
										</div>
										<div>
											<input type="text" name="r_searchfrom[]">
											<input type="text" name="r_searchfrom[]">
										</div>
									</div>

								</fieldset>
								<fieldset class="boards other">
									<legend><label for="r_searched_other">Other Destinations Searched</label></legend>
									<div class="explanation">Provide 10 additional destinations searched. <span class="note">Please do not include same destinations
									<small>(e. g., Newark and New York = New York; Washington Dulles and Washington Reagan = Washington D.C.)</small></span></div>
									<div>
										<div>
											<input id="r_searched_other" type="text" name="r_searched_other[]">
											<input type="text" name="r_searched_other[]">
										</div>
										<div>
											<input type="text" name="r_searched_other[]">
											<input type="text" name="r_searched_other[]">
										</div>
										<div>
											<input type="text" name="r_searched_other[]">
											<input type="text" name="r_searched_other[]">
										</div>
										<div>
											<input type="text" name="r_searched_other[]">
											<input type="text" name="r_searched_other[]">
										</div>
										<div>
											<input type="text" name="r_searched_other[]">
											<input type="text" name="r_searched_other[]">
										</div>
									</div>
								</fieldset>
								<fieldset class="searches">
									<legend>Flight Search Volume*</legend>
									<div>
										<div>
											<label for="r_month1">Month One<span>*</span></label>
											<input id="r_month1" name="r_month1" type="text" required="required">
											<!-- <label class="error" for="r_month1">This field is required.</label> -->
										</div>
										<div>
											<label for="r_sum1">Sum of Searches<span>*</span></label>
											<input id="r_sum1" name="r_sum1" type="text" required="required">
											<!-- <label class="error" for="r_sum1">This field is required.</label> -->
										</div>
									</div>
									<div>
										<div>
											<label for="r_month2">Month Two<span>*</span></label>
											<input id="r_month2" name="r_month2" type="text" required="required">
											<!-- <label class="error" for="r_month2">This field is required.</label> -->
										</div>
										<div>
											<label for="r_sum2">Sum of Searches<span>*</span></label>
											<input id="r_sum2" name="r_sum2" type="text" required="required">
											<!-- <label class="error" for="r_sum2">This field is required.</label> -->
										</div>
									</div>
									<div>
										<div>
											<label for="r_month3">Month Three<span>*</span></label>
											<input id="r_month3" name="r_month3" type="text" required="required">
											<!-- <label class="error" for="r_month3">This field is required.</label> -->
										</div>
										<div>
											<label for="r_sum3">Sum of Searches<span>*</span></label>
											<input id="r_sum3" name="r_sum3" type="text" required="required">
											<!-- <label class="error" for="r_sum3">This field is required.</label> -->
										</div>
									</div>
								</fieldset>

								<fieldset class="num_of_days">
									<legend>Number of Days Between Purchase and Travel (Must add up to 100%)</legend>

									<div>
										<span>Provide the percentage amount only, do not use numbers.</span>
										<div>
											<label for="pt-0">0</label>
											<input id="pt-0" name="pt-0" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-1_2">1–2</label>
											<input id="pt-1_2" name="pt-1_2" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-3_7">3–7</label>
											<input id="pt-3_7" name="pt-3_7" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-8_14">8–14</label>
											<input id="pt-8_14" name="pt-8_14" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-15_21">15–21</label>
											<input id="pt-15_21" name="pt-15_21" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-22_30">22–30</label>
											<input id="pt-22_30" name="pt-22_30" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="pt-31">31+</label>
											<input id="pt-31" name="pt-31" type="text" size="3">&nbsp;%
										</div>
									</div>

									<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
									<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
									<script>
										$(document).ready(function() {
											$('#percent-warning').hide();
											$("#pt-0, #pt-1_2, #pt-3_7, #pt-8_14, #pt-15_21, #pt-22_30, #pt-31").change(function() {
													var pt0 = isNaN(parseInt($('#pt-0').val())) ? 0 : parseInt($('#pt-0').val());
													var pt1_2 = isNaN(parseInt($('#pt-1_2').val())) ? 0 : parseInt($('#pt-1_2').val());
													var pt3_7 = isNaN(parseInt($('#pt-3_7').val())) ? 0 : parseInt($('#pt-3_7').val());
													var pt8_14 = isNaN(parseInt($('#pt-8_14').val())) ? 0 : parseInt($('#pt-8_14').val());
													var pt15_21 = isNaN(parseInt($('#pt-15_21').val())) ? 0 : parseInt($('#pt-15_21').val());
													var pt22_30 = isNaN(parseInt($('#pt-22_30').val())) ? 0 : parseInt($('#pt-22_30').val());
													var pt31 = isNaN(parseInt($('#pt-31').val())) ? 0 : parseInt($('#pt-31').val());
													var newTotal = pt0 + pt1_2 + pt3_7 + pt8_14 + pt15_21 + pt22_30 + pt31;
													if (newTotal !== 100) {
														console.log("Needs to equal 100% : " + newTotal + " is not 100%");
														$('#percent-warning').show().html("These fields must add up to 100%. Currently you are at " + newTotal + "%.");
													} else {
														$('#percent-warning').hide();
													}
											});
										});
									</script>
									<div id="percent-warning"></div>
								</fieldset>
								<fieldset class="travel_type">
									<legend>Travel Purpose - Business vs. Leisure Travel (Must add up to 100%)</legend>
									<div>
										<label for="textinp">Percentage of Business Travelers</label>
										<input id="textinp" type="text" name="perc_bus">&nbsp;%
									</div>
									<div>
										<label for="textinp">Percentage of Leisure Travelers</label>
										<input id="textinp" type="text" name="perc_lei">&nbsp;%
									</div>
								</fieldset>
								<fieldset class="num_of_days">
									<legend>Nights Stayed (Must add up to 100%)</legend>
									<div>
										<span>Provide the percentage amount only, do not use numbers.</span>
										<div>
											<label for="ls-0_1">0-1 Days</label>
											<input id="ls-0_1" name="ls-0_1" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="ls-2_3">2-3 Days</label>
											<input id="ls-2_3" name="ls-2_3" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="ls-4_5">4-5 Days</label>
											<input id="ls-4_5" name="ls-4_5" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="ls-6_7">6-7 Days</label>
											<input id="ls-6_7" name="ls-6_7" type="text" size="3">&nbsp;%
										</div>
										<div>
											<label for="ls-8">8+ Days</label>
											<input id="ls-8" name="ls-8" type="text" size="3">&nbsp;%
										</div>
									</div>
								</fieldset>
								<div class="section additional">
									<label for="r_addl_info">Additional Information</label>
									<div>Provide as much information as possible on what you would like to achieve with this request.</div>
									<textarea id="r_addl_info" name="r_addl_info" cols="60" rows="10"></textarea>
								</div>
							</fieldset>
							<?php
									}
									if($r_igtype == 'hotel') {
							?>
							<fieldset id="hotel">
								<legend>Hotel</legend>
								<fieldset class="srep">
									<legend>Sales Rep Information</legend>
									<div>
										<label for="srep_name">Name<span>*</span></label>
										<input id="srep_name" type="text" name="srep_name" required="required">
										<!-- <label class="error" for="srep_name">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_phone">Phone<span>*</span></label>
										<input id="srep_phone" name="srep_phone" type="tel" required="required">
										<!-- <label class="error" for="srep_phone">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_title">Title<span>*</span></label>
										<input id="srep_title" name="srep_title" name="srep_title" name="srep_title" type="text" required="required">
										<!-- <label class="error" for="srep_title">This field is required.</label> -->
									</div>
									<div>
										<label for="srep_email">E-mail<span>*</span></label>
										<input id="srep_email" name="srep_email" type="email" required="required">
										<!-- <label class="error" for="srep_email">This field is required.</label> -->
									</div>
								</fieldset>
								<div class="section r_client">
									<label for="r_client">Client<span>*</span></label>
									<input id="r_client" name="r_client" name="r_client" name="r_client" type="text" required="required">
									<!-- <label class="error" for="r_client">This field is required.</label> -->
								</div>
								<div class="section r_datapoints">
									<label for="r_datapoints">Enter Data Points</label>
									<div>Provide as much information as possible on what you want to achieve with this request.</div>
									<textarea id="r_datapoints" name="r_datapoints" cols="30" rows="6" required="required"></textarea>
								</div>
							</fieldset>
							<?php
									}
								endif;
							?>
						</fieldset>
						<?php if(isset($r_igtype) && $r_igtype == 'other') { ?>
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
						<?php } ?>
					</fieldset>
					<?php if(isset($_POST['b_update'])) { ?>
					<div class="submit">
						<input type="submit" value="Submit" name="b_submit">
					</div>
					<?php } ?>
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