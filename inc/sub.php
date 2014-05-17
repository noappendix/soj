<?php if(!isset($current_page)) {$current_page = '';} ?>
<div id="sub">
	<nav>
		<ul>
			<li<?php if($current_page == 'business-card') { ?> class="current"<?php } ?>><a href="business-card.php">Business Card</a></li>
			<li<?php if($current_page == 'case-study') { ?> class="current"<?php } ?>><a href="case-study.php">Case Study</a></li>
			<li<?php if($current_page == 'client-creative') { ?> class="current"<?php } ?>><a href="client-creative.php">Client Creative</a></li>
			<li<?php if($current_page == 'conference-materials') { ?> class="current"<?php } ?>><a href="conference-materials.php">Conference Materials</a></li>
			<li<?php if($current_page == 'dynamic-creative') { ?> class="current"<?php } ?>><a href="dynamic-creative.php">Dynamic Creative</a></li>
			<li<?php if($current_page == 'external-product-doc') { ?> class="current"<?php } ?>><a href="external-product-doc.php">External Product Doc</a></li>
			<li<?php if($current_page == 'infographic') { ?> class="current"<?php } ?>><a href="infographic.php">Infographic</a></li>
			<li<?php if($current_page == 'internal-training-doc') { ?> class="current"<?php } ?>><a href="internal-training-doc.php">Internal Training Doc</a></li>
			<li<?php if($current_page == 'presentation-support') { ?> class="current"<?php } ?>><a href="presentation-support.php">Presentation Support</a></li>
			<li<?php if($current_page == 'website-update') { ?> class="current"<?php } ?>><a href="website-update.php">Website Update</a></li>
			<li<?php if($current_page == 'other-custom') { ?> class="current"<?php } ?>><a href="other-custom.php">Other/Custom</a></li>
		</ul>
	</nav>
</div>
