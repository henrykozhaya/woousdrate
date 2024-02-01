<div class="wrap">
	<h1>Welcome to Woo USD Rate</h1>
    
    <p>For your support, please reach us on: <a href="https://logicempower.com/contact-us" target="_blank">Logic Empower Contact Page</a></p>
	<?php settings_errors(); ?>

	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php 
			settings_fields( 'logicempower_option_group' );
			do_settings_sections( 'logicempower_plugin' );
			submit_button();
		?>
	</form>
</div>