<fieldset class="section client">
	<legend>Client Information</legend>
	<div>
		<label for="r_cname">Campaign Name<span>*</span></label>
		<input id="r_cname" name="r_cname" type="text" value="<?php if(isset($r_cname)) {echo($r_cname);} ?>" required="required">
		<!-- <label class="error" for="r_cname">This field is required.</label> -->
	</div>
	<div>
		<label for="r_cobjective">Campaign Objective<span>*</span> <small>(goals, metrics)</small></label>
		<input id="r_cobjective" name="r_cobjective" type="text" value="<?php if(isset($r_cobjective)) {echo($r_cobjective);} ?>" required="required">
		<!-- <label class="error" for="r_cobjective">This field is required.</label> -->
	</div>
	<div>
		<label for="r_client">Client<span>*</span></label>
		<input id="r_client" name="r_client" type="text" value="<?php if(isset($r_client)) {echo($r_client);} ?>" required="required">
		<!-- <label class="error" for="r_client">This field is required.</label> -->
	</div>
	<div>
		<label for="r_cwebsite">Client Website URL<span>*</span></label>
		<input id="r_cwebsite" name="r_cwebsite" type="text" value="<?php if(isset($r_cwebsite)) {echo($r_cwebsite);} ?>" required="required">
		<!-- <label class="error" for="r_cwebsite">This field is required.</label> -->
	</div>
</fieldset>
