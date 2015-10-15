<?php 
/**
* Red Flag Parking Display
*/
$start = self::get_dashboard_widget_option(self::wid, 'starting_conversion');
$remaining_days = self::get_dashboard_widget_option(self::wid, 'starting_conversion');
?>

<style>
	h3 {
		font-weight: normal;
		font-size: 14px;
	}
	.red-flag-conditions {
		max-width: 100%;						
		margin: 0 0 10px;
		text-align: center;
		border-bottom: 1px solid #d1d2d4;
	}
	.red-flag-expiry {
		font-style:italic;
	}
</style>
	
	<div class="red-flag-conditions">
	
	<?php 
	
	// get network options
	$opts = get_site_option(  'red_flag_widget_options'  );	
	
	if(isset($opts['red_flag_parking']['start_conversion']))
	{
		$start = $opts['red_flag_parking']['start_conversion'];	
	}			
	
	if( is_admin() && $start == 1 ):
	
		?>
		
		<p class="red-flag-expiry">Currently, Red Flag Parking is set expire in <span style="font-weight:bold;">
				<?php echo	$remaining_days; ?>	</span> day(s)!</p>
	
	<?php endif; ?>	
	
	
	<?php 
	// output parking flags
	
	if( $start == 1 ): ?>
	
		
		<a href="admin.php?page=red-flag-parking-setting-admin" title="red flag page current condition is set to Restricted Parking, Tickets and Tow">
		
		<img src="http://cityofpasadena.net/assets/0/73/84/149/6442451095/345ee7cd-bf9f-4dd5-b938-bdad1dbd0544.jpg" title="Restricted Parking, Tickets and Tow" alt="Restricted Parking, Tickets and Tow" />
		
	<?php else: ?>
		
		<a href="admin.php?page=red-flag-parking-setting-admin" title="red flag page current condition is set to Normal Parking">
		
		<img src="http://cityofpasadena.net/assets/0/73/84/149/6442451095/05c30ce5-d311-4209-ac00-aaa3f236b465.jpg" title="Normal Parking" alt="Normal Parking" />
	
	<?php endif; ?>
	
		</a>		
	
		<h3>Red Flag Condition For: <?php echo date('F d, Y') ?></h3>
		
	</div>