<?php
class Event{
	private $json;
	private $status;
	function __construct($name){
		$file = file_get_contents($name);
		$this->json = json_decode($file, true);
		$date = $this->json[EVENT_DATA_DATE];
		$beginOfDay = strtotime("midnight");
		$endOfDay = strtotime("tomorrow midnight");
		if($date > $endOfDay)
			$this->status = EVENT_STATUS_NEW;
		else if($date >= $beginOfDay && $date <= $endOfDay)
			$this->status = EVENT_STATUS_CURRENT;
		else if($date < $beginOfDay)
			$this->status = EVENT_STATUS_OLD;
	}

	public function getDate(){
		return date("l, F j, Y", $this->json[EVENT_DATA_DATE]);
	}

	public function getStatus(){
		switch($this->status){
			case EVENT_STATUS_NEW:
			return "Upcoming";
			case EVENT_STATUS_CURRENT:
			return "Today";
			case EVENT_STATUS_OLD:
			return "Completed";
		}
	}

	public function getValue($value){
		if($value == EVENT_DATA_STATUS)
			return $this->status; 
		if($value == EVENT_DATA_START || $value == EVENT_DATA_END)
			return $this->json[EVENT_DATA_TIME][$value];
		if(!array_key_exists($value, $this->json))
			throw new Exception("Cannot get value of \"".$value."\"");
		return $this->json[$value];
	}

	public function getJson(){
		return $this->json;
	}

	public static function getAll($limit = -1, $order = EVENT_ASC){
		$output;
		$dir = scandir(EVENT_LOCATION);
		switch($order){
			case EVENT_DESC:
			arsort($dir);
			break;
			case EVENT_ASC:
			default:
			asort($dir);
			break;
		}
		if($limit == -1){
			foreach($dir as $file){
				if($file != ".." && $file != ".")
					$output[] = new Event(EVENT_LOCATION.$file);
			}
		}
		else{
			$count = 0;
			foreach($dir as $file){
				if($count >= $limit)
					break;
				if($file != ".." && $file != "."){
					$output[] = new Event(EVENT_LOCATION.$file);
					$count++;
				}
			}
		}

		return $output;
	}

	public static function getCurrent($limit = -1, $order = EVENT_ASC){
		$output;
		$dir = scandir(EVENT_LOCATION);
		switch($order){
			case EVENT_DESC:
			arsort($dir);
			break;
			case EVENT_ASC:
			default:
			asort($dir);
			break;
		}
		$endOfDay = strtotime("today midnight");
		if($limit == -1){
			foreach($dir as $file){
				if($file != ".." && $file != "." && $file > $endOfDay)
					$output[] = new Event(EVENT_LOCATION.$file);
			}
		}
		else{
			$count = 0;
			foreach($dir as $file){
				if($count >= $limit)
					break;
				if($file != ".." && $file != "." && $file > $endOfDay){
					$output[] = new Event(EVENT_LOCATION.$file);
					$count++;
				}
			}
		}
		return $output;
	}
}
?>
