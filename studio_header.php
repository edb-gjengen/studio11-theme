<div id="header" style="position:relative;">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title" style="width:100%;margin:0px;float:none;">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						
						<?php //bloginfo( 'name' ); ?>
						<img style="position:absolute;left:10px;top:10px;" height="120"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/STUDiO_logo_gra.png" alt="STUDiO11" />
						<img style="position:absolute;left:180px;top:55px;" height="100"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Kvalen.png" alt="STUDiO11" />
						<img style="position:absolute;left:230px;bottom:0px;" width="150"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Slangen.png" alt="STUDiO11" />
						
						<img style="position:absolute;left:400px;bottom:0px;" width="50"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Pingvinen.png" alt="STUDiO11" />
						<img style="position:absolute;left:150px;bottom:0px;" width="50"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Ugla.png" alt="STUDiO11" />
						<img style="position:absolute;left:0px;bottom:0px;" width="75"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Kua.png" alt="STUDiO11" />
					
						<div id="countdown" style="position:absolute;top:10px;left:400px;color:#C32083;">Bare <?php echo ceil((strtotime('2011-08-15') - time()) / 60 / 60 / 24) ?> dager igjen!</div>
						
						<img style="position:absolute;left:460px;bottom:-5px;" src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/bjornenmskilt.png" alt="STUDiO11" usemap="#blifrivillig" />
						<map name="blifrivillig">  
        <area shape="poly" coords="1,144,15,46,50,50,41,66,49,87,61,51,29,39,49,0,111,20,97,64,67,55,52,99,62,124,53,149,31,149," href="/bli-med" alt="Bli frivillig!" title="Bli frivillig!"   />
    </map> 

	<img style="position:absolute;left:550px;bottom:0px;" width="40"  src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/Grisen.png" alt="STUDiO11" />
						</a>
						

					</span>
				</<?php echo $heading_tag; ?>
			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
		</div><!-- #header -->
</div><!-- skjønner ikke hvorfor denne trengs -->
