<?php 
# categorize functions
/************************ common 으로 분류해야할 것들 **************/

function ccl_genarateFileName($curName) {
	# file name 을 random string 으로 작성.
	$name = "";
	$name = date("His").ccl_randomString(16);

	$path_part = pathinfo($curName);
	$path = $path_part['dirname']."/".$name.".".$path_part['extension'];

	return $path;
}

function ccl_path_to_absolute($path) {
	# path 가 절대경로면 앞에 root_path 를 덧붙여서 출력
	if(substr($path, 0, 1) == '/')
		$path = $_SERVER['DOCUMENT_ROOT'].$path;
	return $path;
}

function ccl_password_hash($password) {
	# 160411 password_hash() 의 custom
	$options = [
		'cost' => 11,
		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];
	$password = password_hash($password, PASSWORD_BCRYPT, $options);
	return $password;
}
?>