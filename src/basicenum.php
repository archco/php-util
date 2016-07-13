<?php 
namespace cosmos\util;

/**
 * BasicEnum
 * Enum처럼 사용할 추상 클래스
 * @link goggling -> PHP and Enumerations
 */
abstract class BasicEnum {

	private static $constCacheArray = NULL;

	/**
	 * getConstants 
	 * 호출된 클래스의 constants를 cache에 저장하고 return.
	 * @return array 호출된 클래스의 상수들
	 */
	private static function getConstants() {
		if(self::$constCacheArray == NULL) {
			self::$constCacheArray = [];
		}
		$calledClass = get_called_class(); // static이 호출된 클래스
		if(!array_key_exists($calledClass, self::$constCacheArray)) {
			$reflect = new ReflectionClass($calledClass); // class에 대한 정보 설명해준다.
			self::$constCacheArray[$calledClass] = $reflect->getConstants(); // 호출된 클래스의 상수를 얻어서 캐시에 저장.
		}
		return self::$constCacheArray[$calledClass];
	}

	/**
	 * isValidName
	 * constant의 이름이 존재하는지 확인.
	 * @param  string  $name   constant key
	 * @param  boolean $strict case sensitive
	 * @return boolean         존재 여부
	 */
	public static function isValidName($name, $strict = false) {
		$constants = self::getConstants();
		if($strict) {
			// case sensitive
			return array_key_exists($name, $constants);
		}
		// case insensitive
		$keys = array_map('strtolower', array_keys($constants)); // 콜백(strtolower) 를 array의 모든 요소에 적용하고 return.
		return in_array(strtolower($name), $keys);
	}

	/**
	 * isValidValue
	 * constant의 값이 존재하는지 확인
	 * @param  mixed	$value	constant value
	 * @param  boolean	$strict	true면 value의 type도 비교
	 * @return boolean		존재여부
	 */
	public static function isValidValue($value, $strict = true) {
		$values = array_values(self::getConstants());
		return in_array($value, $values, $strict);
	}
}
?>