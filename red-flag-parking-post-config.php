<?php

/* 

		global $wpdb;				
		$results = $wpdb->get_results( "SELECT * FROM $wpdb->sitemeta  ", OBJECT );	
		echo "<pre>".print_r($results,1)."</pre>"; 
		 */
		

//get saved data	
if ( !$widget_options = get_option( self::wid ) )
{
   $widget_options = array();
}
//echo "<pre>".print_r($widget_options,1)."</pre>";


//process update	
if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['red_flag_parking']) ) 
{
	
	// define validation variables and set them empty values.
		$startingMonthErr = $startingDayErr = $startingYearErr = "";
		$startingMeridiemErr = $startingHourErr = $startingMinuteErr = "";
		
		$endingMonthErr = $endingDayErr = $endingYearErr = "";
		$endingMeridiemErr = $endingHourErr = $endingMinuteErr = "";
		
		// Error array.		
		$Err = array();	
		
		// Date Utilities
		require_once( get_stylesheet_directory(). '/util-functions/date-util-functions.php' );	
					
				
		//get saved data	
		if ( !$widget_options = get_site_option( self::wid ) )
		{
		   
		   $widget_options = array();
		   
		}
		
		
			
				
				// create the starting time for Red Flag.
				$start_datetime = createDateTime(
								$_POST['red_flag_parking']['starting_month'],
								$_POST['red_flag_parking']['starting_day'],
								$_POST['red_flag_parking']['starting_year'],
								$_POST['red_flag_parking']['starting_hour'],
								$_POST['red_flag_parking']['starting_minute'],
								$_POST['red_flag_parking']['starting_meridiem']
							);
				$widget_options['start_datetime'] = $start_datetime;
				
				// create the ending time for Red Flag.
				$end_datetime = createDateTime(
								$_POST['red_flag_parking']['ending_month'],
								$_POST['red_flag_parking']['ending_day'],
								$_POST['red_flag_parking']['ending_year'],
								$_POST['red_flag_parking']['ending_hour'],
								$_POST['red_flag_parking']['ending_minute'],
								$_POST['red_flag_parking']['ending_meridiem']
							);
				$widget_options['end_datetime'] = $end_datetime;
				
				
				// days remaining for red flag.
				$widget_options['days remaining'] = dateDiff($start_datetime, $end_datetime);
				
				
				// validate start date is less than end date.
				if($start_datetime > $end_datetime)
				{	
					
					$Err['datetimeErr'] = "Starting date is greater than Ending date.";
					
				}
				
				// validate start date not in past.
				if(date('Y-m-d H:i:s') >= $start_datetime)
				{
					
					$Err['startTimeErr'] = "Starting date is less than today's date.";
					
				}
				
				// validate start month is not empty.					
				if(empty($_POST['red_flag_parking']['starting_month']))
				{
					
					$Err['startingMonthErr'] = "Starting month is required.";
					
				}
				else{
					
					$widget_options['starting_month'] = $_POST['red_flag_parking']['starting_month'];
					
				}
				
				// validate start day is not empty.
				if(empty($_POST['red_flag_parking']['starting_day']))
				{
					
					$Err['startingDayErr'] = "Starting day is required.";
					
				}
				else{
					
					$widget_options['starting_day'] = $_POST['red_flag_parking']['starting_day'];
							
				}
				
				// validate start year is not empty.
				if(empty($_POST['red_flag_parking']['starting_year']))
				{
					
					$Err['startingYearErr'] = "Starting year is required.";
					
				}
				else {
				
					$widget_options['starting_year'] = $_POST['red_flag_parking']['starting_year'];
					
				}
				
				// validate start hour is not empty.
				if(empty($_POST['red_flag_parking']['starting_hour']))
				{
					
					$Err['startingHourErr'] = "Starting hour is required.";
					
				}
				else{
					
					$widget_options['starting_hour'] = $_POST['red_flag_parking']['starting_hour'];
				
				}
				
				// no validation required since always 00.
				$widget_options['starting_minute'] = $_POST['red_flag_parking']['starting_minute'];
				
				
				// validate start meridiem is not empty.
				if(empty($_POST['red_flag_parking']['starting_meridiem']))
				{
					
					$Err['startingMeridiemErr'] = "Starting meridiem is required.";
					
				}
				else{
					
					$widget_options['starting_meridiem'] = $_POST['red_flag_parking']['starting_meridiem'];
					
				}
				
				// validate end month is not empty.
				if(empty($_POST['red_flag_parking']['ending_month']))
				{
					
					$Err['endingMonthErr'] = "Ending month is required.";
					
				}
				else{
					
					$widget_options['ending_month'] = $_POST['red_flag_parking']['ending_month'];
				
				}
				
				// validate end day is not empty.
				if(empty($_POST['red_flag_parking']['ending_day']))
				{
					
					$Err['endingDayErr'] = "Ending day is required.";
					
				}
				else{
					
					$widget_options['ending_day'] = $_POST['red_flag_parking']['ending_day'];
					
				}
				
				// validate end year is not empty.
				if(empty($_POST['red_flag_parking']['ending_year']))
				{
					
					$Err['endingYearErr'] = "Ending year is required.";
					
				}
				else{
					
					$widget_options['ending_year'] = $_POST['red_flag_parking']['ending_year'];
				
				}
				
				// validate end hour is not empty.
				if(empty($_POST['red_flag_parking']['ending_hour']))
				{
					
					$Err['endingHourErr'] = "Ending hour is required.";
					
				}
				else {
					
					$widget_options['ending_hour'] = $_POST['red_flag_parking']['ending_hour'];
				
				}
				
				
				//no validation required always 00.
				$widget_options['ending_minute'] = $_POST['red_flag_parking']['ending_minute'];
				
				
				// validate end meridiem is not empty.
				if(empty($_POST['red_flag_parking']['ending_meridiem']))
				{
					
					$Err['endingMeridiemErr'] = "Ending meridiem is required.";
					
				}
				else{
					
					$widget_options['ending_meridiem'] = $_POST['red_flag_parking']['ending_meridiem'];
				
				}
				
				// validate reset is zero or value of 1.
				if(empty($_POST['red_flag_parking']['reset']))
				{
					
					$widget_options['reset'] = 0;
					
				}
				else{
					
					$widget_options['reset'] = $_POST['red_flag_parking']['reset'];
					
				}
				
			
			
			//  and not reset then add the current user and active.
			if( empty($Err) )  
			{		
				
				$widget_options['active'] = 1;
				
				$current_user = wp_get_current_user();	
				
				$widget_options['set_by_user'] = $current_user->user_login;	
				
			}

			// delete options.
			if($widget_options['reset'] == 1)
			{
				// used to reset 
				self::delete_dashboard_widget_options( 'red_flag_widget_options' );
				
				//Red Flag ending time was reached. reset. reset. reset.			
		
				//Register default settings...
				self::update_dashboard_widget_options(
					self::wid,                                  //The  widget id
					array(                                      //Associative array of options & default values
						'remaining_days' => 0,
						'reset' => 0,
						'start_conversion' => 0,
						'start_datetime' => '',
						'end_datetime' => '',
						'starting_year' => '',
						'starting_month' => '',
						'starting_day' => '',
						'starting_hour' => '',
						'starting_minute' => '',
						'starting_meridiem' => '',
						'starting_date' => '',
						'starting_time' => '',
						'ending_year' => '',
						'ending_month' => '',
						'ending_day' => '',
						'ending_hour' => '',
						'ending_minute' => '',
						'ending_meridiem' => '',
						'ending_date' => '',
						'ending_time' => '',
						'set_by_user' => '',
						'active' => 0
					),
					true                                        //Add only (will not update existing options)
				);
		
			}
			else {
				
				//save update        
				self::update_dashboard_widget_options( self::wid, $widget_options );
			
			}
			
		}
		
		// get widget options from the network database table.
		$get_widget_options = self::get_dashboard_widget_options('red_flag_parking');
				
		$get_starting_month = $get_widget_options['starting_month'];
		$get_starting_day = $get_widget_options['starting_day'];
		$get_starting_year = $get_widget_options['starting_year'];
		$get_starting_hour = $get_widget_options['starting_hour'];
		$get_starting_minute = $get_widget_options['starting_minute'];
		$get_starting_meridiem = $get_widget_options['starting_meridiem'];
		$get_ending_month = $get_widget_options['ending_month'];
		$get_ending_day = $get_widget_options['ending_day'];
		$get_ending_year = $get_widget_options['ending_year'];
		$get_ending_hour = $get_widget_options['ending_hour'];
		$get_ending_minute = $get_widget_options['ending_minute'];
		$get_ending_meridiem = $get_widget_options['ending_meridiem'];
		$get_set_by_user = $get_widget_options['set_by_user'];
		
		
		// set message to display on admin page.
		if(isset($get_widget_options['active']) && $get_widget_options['active'] == 1) 
		{
			$active = '<div id="active"> The Red Flag Parking is ACTIVE.</div>';
		} 
		else{
			
			$active = '<div id="not-active"> The Red Flag Parking is NOT ACTIVE.</div>';
		}
	
		
	
	// calculate the difference between starting and ending date and time.		
	//$widget_options['remaining_days'] = ceil(dateDiff($widget_options['starting_mysql_datetime_format'], $widget_options['ending_mysql_datetime_format']));


