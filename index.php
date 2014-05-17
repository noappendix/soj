<?php
	$current_page = 'home';
	$meta_description = 'Creative request form';
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
				<div>Let’s get started!</div>
				<div>Select your <strong>Creative Request</strong> from the menu and complete the form.</div>
				<div><strong>Asterisk Items are required fields.</strong></div>
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
<!-- Sojern -->
<!--script type="text/javascript">
(function () {
    var pl = document.createElement('script');
    pl.type = 'text/javascript';
    pl.async = true;
    pl.src = 'https://beacon.sojern.com/pixel/p/7';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(pl);
})();
</script-->
<!-- End Sojern -->
</html>