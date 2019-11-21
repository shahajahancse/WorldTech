<?php  
	
	$first_index = -1;
	$last_index = -1;
	$find_value = 8;

	$array = [5,7,7,8,8,10];
	sort($array);

	$key_array = [];
	$result_array = [];

	foreach ($array as $key => $value) {
		if ($value === $find_value) {
			$key_array[] = $key;
		}
	}

	if (count($key_array)) {
		$result_array[] = $key_array[0]; 
		$result_array[] = end($key_array);
	}
	else
	{
		$result_array[] = $first_index; 
		$result_array[] = $last_index; 
	}

	print_r($result_array);


