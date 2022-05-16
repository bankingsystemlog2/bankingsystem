<?php
function numtowords($num){ 
$decones = array( 
            '01' => "One", 
            '02' => "Two", 
            '03' => "Three", 
            '04' => "Four", 
            '05' => "Five", 
            '06' => "Six", 
            '07' => "Seven", 
            '08' => "Eight", 
            '09' => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            );
$ones = array( 
            0 => " ",
            1 => "One",     
            2 => "Two", 
            3 => "Three", 
            4 => "Four", 
            5 => "Five", 
            6 => "Six", 
            7 => "Seven", 
            8 => "Eight", 
            9 => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            ); 
$tens = array( 
            0 => "",
            2 => "Twenty", 
            3 => "Thirty", 
            4 => "Forty", 
            5 => "Fifty", 
            6 => "Sixty", 
            7 => "Seventy", 
            8 => "Eighty", 
            9 => "Ninety" 
            ); 
$hundreds = array( 
            "Hundred", 
            "Thousand", 
            "Million", 
            "Billion", 
            "Trillion", 
            "Quadrillion" 
            ); //limit t quadrillion 
            $num = number_format($num,2,".",","); 
            $num_arr = explode(".",$num); 
            $wholenum = $num_arr[0]; 
            $decnum = $num_arr[1]; 
            $whole_arr = array_reverse(explode(",",$wholenum)); 
            krsort($whole_arr); 
            $rettxt = ""; 
            foreach($whole_arr as $key => $i){ 
            if($i < 20){ 
            $rettxt .= $ones[$i]; 
            }
            elseif($i < 100){ 
            $rettxt .= $tens[substr($i,0,1)]; 
            $rettxt .= " ".$ones[substr($i,1,1)]; 
            }
            else{ 
            $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            $rettxt .= " ".$tens[substr($i,1,1)]; 
            $rettxt .= " ".$ones[substr($i,2,1)]; 
            } 
            if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
            } 
            } 
            $rettxt = $rettxt." Pesos";
            
            if($decnum > 0){ 
            $rettxt .= " and "; 
            if($decnum < 20){ 
            $rettxt .= $decones[$decnum]; 
            }
            elseif($decnum < 100){ 
            $rettxt .= $tens[substr($decnum,0,1)]; 
            $rettxt .= " ".$ones[substr($decnum,1,1)]; 
            }
            $rettxt = $rettxt." Centavos"; 
        } 
return $rettxt;}
?>
<?php
date_default_timezone_set("Asia/Singapore");
function format_time_ago($time_ago){
  $cur_time 	= time();
  $time_elapsed = $cur_time - $time_ago;
  $seconds 		= $time_elapsed ;
  $minutes 		= round($time_elapsed / 60 );
  $hours 		= round($time_elapsed / 3600);
  $days 		= round($time_elapsed / 86400 );
  $weeks 		= round($time_elapsed / 604800);
  $months 		= round($time_elapsed / 2600640 );
  $years 		= round($time_elapsed / 31207680 );
  // Seconds
  if($seconds <= 60){
	return "$seconds seconds ago";
  }
  //Minutes
  else if($minutes <=60){
	if($minutes==1){
	  return "1 minute ago";
	}
	else{
	  return "$minutes minutes ago";
	}
  }
  //Hours
  else if($hours <=24){
	if($hours==1){
	  return "1 hour ago";
	}else{
	  return "$hours hours ago";
	}
  }
  //Days
  else if($days <= 7){
	if($days==1){
	  return "yesterday";
	}else{
	  return "$days stripping day";
	}
  }
  //Weeks
  else if($weeks <= 4.3){
	if($weeks==1){
	  return "1 week ago";
	}else{
	  return "$weeks weeks ago";
	}
  }
  //Months
  else if($months <=12){
	if($months==1){
	  return "1 month ago";
	}else{
	  return "$months months ago";
	}
  }
  //Years
  else{
	if($years==1){
	  return "1 year ago";
	}else{
	  return "$years years ago";
	}
  }
}
?>