<?php
$plugins            = array();
$functionality_data = file_get_contents( SiteGround_Wizard\DIR . '/misc/functionality.json' );
$functionality      = json_decode( $functionality_data, true );

foreach ( $functionality as $plugin_data ) {
	if ( ! is_plugin_active( $plugin_data['plugin_name'] ) ) {
		continue;
	}

	$plugins[] = $plugin_data;
}

if ( empty( $plugins ) ) {
	return;
}

?>
<h4 class="title title--density-cozy title--level-4 typography typography--weight-light with-color with-color--color-darkest sg-margin-top-large"><?php esc_html_e( 'Manage Functionality', 'siteground-wizard' ); ?></h4>
<div style="width: 100%;">
	<div class="container container--padding-medium container--elevation-1 with-padding with-padding--padding-top-medium with-padding--padding-right-x-small with-padding--padding-bottom-none with-padding--padding-left-x-small">
		<div class="flex flex--gutter-medium flex--margin-none with-padding with-padding--padding-top-none with-padding--padding-right-none with-padding--padding-bottom-none with-padding--padding-left-none">
			<?php foreach ( $plugins as $plugin_data ) : ?>
				<div class="box box--direction-row box--sm-3 with-padding with-padding--padding-top-none with-padding--padding-right-x-small with-padding--padding-bottom-medium with-padding--padding-left-x-small mobile-space-reset">
					<div class="container container--padding-none container--elevation-none with-border">
						<div class="flex flex--align-center flex--gutter-medium flex--direction-column flex--margin-none with-padding with-padding--padding-top-medium with-padding--padding-right-none with-padding--padding-bottom-medium with-padding--padding-left-none">
							<span class="icon" style="width: <?php echo $plugin_data['icon']['width'] ?>px;">
								<img src="<?php echo SiteGround_Wizard\URL . $plugin_data['icon']['file']; ?>" width="<?php echo $plugin_data['icon']['width'] ?>" height="<?php echo $plugin_data['icon']['height'] ?>">
							</span>
							<h5 class="title title--density-cozy title--level-5 typography typography--weight-bold typography--align-center with-color with-color--color-darkest"><?php esc_html_e( $plugin_data['title'], 'siteground-wizard' ); ?></h5>
							<a href="<?php echo admin_url( $plugin_data['link'] ); ?>" class="sg--button button--primary button--small button--outlined" type="submit" style="max-width: 200px;">
								<span class="button__content">
									<span class="button__text">
										<?php esc_html_e( $plugin_data['button_text'], 'siteground-wizard' ); ?>
									</span>
								</span>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
