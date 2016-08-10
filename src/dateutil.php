<?php 
namespace cosmos\util;

abstract class DateUtil
{
	function __construct() {}

	/**
	 * toSimple
	 * datetime을 간단하게 표시.
	 * @param  string $date    datetime
	 * @param  array $formats format [0]=>date, [1]=>time
	 * @return string          오늘이면 time, 다르면 date만 return.
	 */
	public static function toSimple($date, $formats = ['Y-m-d','H:i:s']) {
		$date = strtotime($date);
		$today = date($formats[0]);
		if($today == date($formats[0], $date)) {
			return date($formats[1], $date);
		}else {
			return date($formats[0], $date);
		}
	}

	/**
	 * strtoDateTime
	 * strtotime()으로 timestamp로 바꾼 time을 format형식의 datetime으로 return.
	 * @param  string $time   
	 * @param  string $format datetime format
	 * @return string         datetime
	 */
	public static function strtoDateTime($time, $format = 'Y-m-d H:i:s') {
		$time = strtotime($time);
		return date($format, $time);
	}

	/**
	 * getAge
	 * 
	 * @param  string $birth_date 
	 * @return integer		age
	 */
	public static function getAge($birth_date) {
		$birth = new \DateTime($birth_date);
		$today = new \DateTime();
		return $birth->diff($today)->y;
	}
}
?>