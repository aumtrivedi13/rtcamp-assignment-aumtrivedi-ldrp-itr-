<div class="widget_main" id="widget_area">
	<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<h4>Latest news</h4>
				<div class="dashed" id="primary">
					<aside id="sidebar-primary" class="sidebar">
						<?php dynamic_sidebar( 'primary' ); ?>
					</aside><!-- #news -->
				</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<h4>Recent Projects</h4>
				<div class="dashed" id="recent_projects">
					<aside id="sidebar-secondary" class="sidebar">
						<?php 
						dynamic_sidebar( 'secondary' ); ?>
					</aside><!-- #projects -->
				</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<h4>Stay in Touch</h4>
				<div class="dashed" id="stay_in_touch">
					<aside id="sidebar-tertiary" class="sidebar">
					
						<?php require_once('lib/inc/widgets.php'); 
						dynamic_sidebar( 'tertiary' ); ?>
					</aside><!-- #touch 3-->
				</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<h4>Security & Privacy</h4>
				<div class="dashed" id="security">
					<li><a href="#" class="simple-link">Security</a></li>	
					<li><a href="#" class="simple-link">Privacy Policy</a></li>	
					<li><a href="#" class="simple-link">Terms of Service</a></li>	
				</div>
		</div>
	</div>
</div>


