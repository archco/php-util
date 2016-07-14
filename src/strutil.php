<?php 
namespace cosmos\util;

abstract class StrUtil 
{
	function __construct() {}

	/**
	 * genRandom
	 * length만큼의 random string을 return.
	 * @param  integer $length length of string
	 * @return string         random string
	 */
	public static function genRandom($length) {
		$str = "";
		$keys = array_merge(range(0, 9), range('a', 'z'));
		for($i = 0; $i < $length; $i++) {
			$str .= $keys[array_rand($keys)];
		}
		return $str;
	}

	/**
	 * strLimit
	 * string을 length만큼만 return.
	 * @param  string  $str      input string
	 * @param  integer  $limit 	limit of string
	 * @param  boolean $dots     뒤에 '...'를 붙일지 여부
	 * @return string            ouput string
	 */
	public static function strLimit($str, $limit, $dots = true) {
		$str = strip_tags($str);
		if(mb_strlen($str,'UTF-8') > $limit) {
			if($dots) {
				$str = mb_substr($str, 0, ($limit-3), 'UTF-8')."...";
			}else {
				$str = mb_substr($str, 0, $limit, 'UTF-8');
			}
		}
		return $str;
	}
}
?>