<?php
/**
* Display configure scheduling & catch submitted form data.
*
*/
		$days = 31;
		$months = 12;
		$years = 2;
		$meridiems = array('AM','PM');
		
		$get_starting_month = self::get_dashboard_widget_option(self::wid, 'starting_month');
		$get_starting_day = self::get_dashboard_widget_option(self::wid, 'starting_day');
		$get_starting_year = self::get_dashboard_widget_option(self::wid, 'starting_year');
		$get_starting_hour = self::get_dashboard_widget_option(self::wid, 'starting_hour');
		$get_starting_minute = self::get_dashboard_widget_option(self::wid, 'starting_minute');
		$get_starting_meridiem = self::get_dashboard_widget_option(self::wid, 'starting_meridiem');
		$get_ending_month = self::get_dashboard_widget_option(self::wid, 'ending_month');
		$get_ending_day = self::get_dashboard_widget_option(self::wid, 'ending_day');
		$get_ending_year = self::get_dashboard_widget_option(self::wid, 'ending_year');
		$get_ending_hour = self::get_dashboard_widget_option(self::wid, 'ending_hour');
		$get_ending_minute = self::get_dashboard_widget_option(self::wid, 'ending_minute');
		$get_ending_meridiem = self::get_dashboard_widget_option(self::wid, 'ending_meridiem');
	
?>

<style>
	fieldset legend{		
		font-weight:bold;		
	}
	
	label {
		padding-left:10px;
		;
	}
	label:first-child {
		padding-left:0;
	}
	
	.starting-group {
		display:block;
		margin:0;
	}
	.ending-group {
		display:block;
		margin:30px 0 15px;
	}
	
</style>	
<fieldset class="starting-group">	
	<legend>Starting Date:</legend>				
	
	<div class="row-fluid">	
		<label for="Starting_Month">Month:</label>	
		<select name="red_flag_parking[starting_month]" id="Starting_Month">
			<option value=" "> </option>		
			<?php for( $i = 1; $i <= 12; $i++ ): ?>			
			<option value="<?php echo $i; ?>" <?php selected( $get_starting_month, $i ); ?>><?php echo monthName($i); ?></option>
			<?php endfor; ?>
		</select>
		
		<label for="Starting_Day">Day:</label>	
		<select name="red_flag_parking[starting_day]" id="Starting_Day">
			<option value=" "> </option>
			<?php for( $i = 1; $i <= $days; $i++ ):	?>
			<option value="<?php echo $i; ?>" <?php selected( $get_starting_month, $i ); ?>><?php echo $i; ?></option>
			<?php endfor; ?>	
		</select>
	
	
		<label for="Starting_Year">Year:</label>	
		<select name="red_flag_parking[starting_year]" id="Starting_Year">';
			<option value=" "> </option>	
			<?php for( $y = 0; $y <= $years; $y++ ): ?>		
			<option value="<?php echo(date("Y")+$y); ?>" <?php selected( $get_starting_year, (date("Y")+$y) ); ?>><?php echo (date("Y")+$y); ?></option>
			<?php endfor; ?>
		</select>	
		
	</div>
	
	<div>
		<label for="Starting_Hour">Hour:</label>
		<select name="red_flag_parking[starting_hour]" id="Starting_Hour">		
			<option value=""> </option>
			<?php for( $h = 1; $h <= 12; $h++):	?>			
			<option value="<?php echo $h; ?>" <?php selected( $get_starting_hour, $h )?>><?php echo $h; ?></option>
			<?php endfor; ?>			
		</select>&nbsp; : &nbsp;	
	
		<select name="red_flag_parking[starting_minute]" id="Starting_Minute">
			<option value=""> </option>
			<?php for( $m = 0; $m <= 60; $m++ ): ?>
			<option value="<?php echo sprintf( '%02d',$m); ?>" <?php selected( $get_starting_minute, sprintf( '%02d',$m) )?>><?php echo sprintf( '%02d',$m);?></option>
			<?php endfor; ?>
		</select>&nbsp; : &nbsp;		
	
		<select name="red_flag_parking[starting_meridiem]" id="Starting_Meridiem">
			<option value=""> </option>
			<?php foreach($meridiems as $meridiem): ?>
			<option value="<?php echo $meridiem; ?>" <?php selected( $get_starting_meridiem, $meridiem ); ?>><?php echo $meridiem; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	
</fieldset>
	
<fieldset class="ending-group">	
	<legend>Ending Date:</legend>
				
	<div>	
		<label for="Ending_Month">Month:</label>		
		<select name="red_flag_parking[ending_month]" id="Ending_Month">		
			<option value=""></option>
			<?php for($i = 1; $i <= 12; $i++ ): ?>
				<option value="<?php echo $i; ?>" <?php selected( $get_ending_month, $i ); ?>><?php echo monthName($i); ?></option>		
			<?php endfor; ?>		
		</select>
		
		<label for="Ending_Day">Day:</label>		
		<select name="red_flag_parking[ending_day]" id="Ending_Day">';
			<option value=""></option>		
			<?php for( $i = 1; $i <= 31; $i++ ): ?>
			<option value="<?php echo $i ?>" <?php selected( $get_ending_day, $i ); ?>><?php echo $i; ?></option>
			<?php endfor; ?>		
		</select>
		
		<label for="End_Year">Year:</label>		
		<select name="red_flag_parking[ending_year]" id="Ending_Year">
			<option value=""> </option>		
			<?php for( $i = 0; $i <= 2; $i++ ): ?>			
			<option value="<?php echo(date("Y")+$i); ?>" <?php selected( $get_ending_year, (date("Y")+$i) ); ?>><?php echo(date("Y")+$i); ?></option>
			<?php endfor; ?>	
		</select>	
	</div>
	
	<div>		
		<label for="End_Hour">Hour:</label>		
		<select name="red_flag_parking[ending_hour]" id="Ending_Hour">		
			<option value=""> </option>			
			<?php for( $i = 1; $i <= 12; $i++ ): ?>
				<option value="<?php echo $i; ?>" <?php selected( $get_ending_hour, $i )?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>&nbsp; : &nbsp;	
			
		<select name="red_flag_parking[ending_minute]" id="Ending_Minute">	
			<option value=""> </option>			
			<?php for( $i = 0; $i <= 60; $i++): ?>						
				<option value="<?php echo sprintf( '%02d',$i); ?>" <?php selected( $get_ending_minute, sprintf( '%02d',$i) ); ?>><?php echo sprintf( '%02d',$i); ?></option>
			<?php endfor; ?>
		</select>&nbsp; : &nbsp;	
		
		
		<select name="red_flag_parking[ending_meridiem]" id="Ending_Meridiem">
			<option value=""> </option>
			<?php foreach($meridiems as $meridiem): ?>
			<option value="<?php echo $meridiem; ?>" <?php  selected( $get_starting_meridiem, $meridiem ); ?>><?php echo $meridiem; ?></option>
			<?php endforeach; ?>
		</select>		
	</div>		
</fieldset>		
		
<fieldset>		
	<legend style="font-weight:bold;">Clear All:</legend>
	<div>
		<input type="checkbox" name="red_flag_parking[reset]" value="1" /> Master Reset (clears all options)		
	</div>	
</fieldset>
