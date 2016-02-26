<?php
// include global common file
include_once 'common.global.inc.php';
 

/**
 * Converts XML string to an array
 * http://uk.php.net/manual/en/function.simplexml-load-string.php
 * @param string $xml
 * @param bool $recursive
 * @return array
 */
function XML2Array( $xml , $recursive = false ) {
    if( ! $recursive ){
		$array = simplexml_load_string ( $xml ) ;
    } else {
        $array = $xml ;
    }

    $newArray = array () ;
    $array = ( array ) $array ;
    foreach ( $array as $key => $value ) {
        $value = ( array ) $value ;
        if ( isset ( $value [ 0 ] ) ) {
            $newArray [ $key ] = trim ( $value [ 0 ] ) ;
        } else {
            $newArray [ $key ] = XML2Array ( $value , true ) ;
        }
    }
    return $newArray ;
}


/**
 * Connects to database
 * @return db class
 */
function db_connect() {
	// create database instance
	$db = new DB(array(
		'hostname'=>HOSTNAME,
		'username'=>DB_USERNAME,
		'password'=>DB_PASSWORD,
		'db_name'=>DB_NAME
	));

	// stop on db fail
	if($db===FALSE) {
		pr($db->errors);
		exit;
	}

return $db;
}


/**
 * Gets all Stores in JSON format
 * @param string $sql
 * @return array
 */
function get_json_stores($sql) {
	// connect to db
	$db = db_connect();
	// get local stores
	$stores = $db->get_rows($sql);
	// init json array
	$json = array();
	// add stores
	if(!empty($stores)) {
		// set success flag
		$json['success'] = 1;
		// create stores array
		$json['stores'] = array();
		// add all stores to array
		foreach($stores as $k=>$v) {
			// build upload directory
			$upload_dir = ROOT.'admin/imgs/stores/'.$v['id'].'/';
			// get all images
			$files = get_files($upload_dir);
			// reset the array keys
			if(is_array($files)) {
				$files = array_values($files);
			}
			// get first image
			$img = '';
			if($files !== FALSE && isset($files[0])) {
				$img = ROOT_URL.'admin/imgs/stores/'.$v['id'].'/'.$files[0];
			}
			
			// build data
			$row = array(
				'name'=>$v['name'],
				'address'=>$v['address'],
				'telephone'=>$v['telephone'],
				'email'=>$v['email'],
				'website'=>$v['website'],
				'description'=>$v['description'],
				'lat'=>$v['latitude'],
				'lng'=>$v['longitude'],
				'img'=>$img
			);
			
			// encode data
			$row = array_map( utf8_encode, $row );
			
			// add to stores
			$json['stores'][] = $row;
		}
	} else {
		// return error json
		$json = array('success'=>0,'msg'=>'No nearby stores were found');
	}

return json_encode($json);
}