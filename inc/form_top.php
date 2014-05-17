<div class="section top">
	<div>
		<label for="r_name">Your Name<span>*</span></label>
		<input id="r_name" name="r_name" type="text" value="<?php if(isset($r_name)) {echo($r_name);} ?>" required="required">
		<!-- <label class="error" for="r_name">This field is required.</label> -->
	</div>
	<div>
		<label for="r_phone">Phone<span>*</span></label>
		<input id="r_phone" name="r_phone" type="tel" value="<?php if(isset($r_phone)) {echo($r_phone);} ?>" required="required">
		<!-- <label class="error" for="r_phone">This field is required.</label> -->
	</div>
	<div style='vertical-align: top;'>
		<label for="r_email">Your E-mail<span>*</span> <small>(project notifications will be sent to this e-mail)</small></label>
		<input id="r_email" name="r_email" type="email" value="<?php if(isset($r_email)) {echo($r_email);} ?>" required="required">
		<!-- <label class="error" for="r_email">This field is required.</label> -->
	</div>
	<div>
		<label for="r_due">Due Date<span>*</span> <small>(no sooner than 5–7 business days)</small></label>
		<input id="r_due" name="r_due" type="text" value="<?php if(isset($r_due)) {echo($r_due);} ?>" required="required">
		<!-- <label class="error" for="r_due">This field is required.</label> -->
		<div class="notification dueDateNot" style='display:none;width:240px;font-size: 13px;'>
			To ensure that your deadline is met, please acquire necessary design assets from client prior to requesting creative services. See Upload section below for more info.
		</div>
	</div>
	<div>
		<label for="r_addl_email">Additional E-mail <small>(project notifications will also be sent to this e-mail — Sojern employees only)</small></label>
		<input id="r_addl_email" name="r_addl_email" value="<?php if(isset($r_addl_email)) {echo($r_addl_email);} ?>" type="email">
	</div>
</div>
