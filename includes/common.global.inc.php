<?php
/**
 * These functions are used by the admin area and the main files
 * Should reduce duplication of function in both sets of "common.inc.php" files
 */


/**
 * Prints out data for debugging
 * @param mixed $arr
 */
function pr($arr) {
	echo '<pre>';
	if(is_string($arr)) {
		echo $arr;
	} else {
		print_r($arr);
	}
	echo '</pre>';
}


/**
 * Gets any flash messages
 * @return string
 */
function flash() {
	$str = '';
	if(isset($_SESSION['flash'])) {
		if(!isset($_SESSION['flash']['type']) || !isset($_SESSION['flash']['msg'])) {
			return '';
		}
		$class = '';
		switch($_SESSION['flash']['type'])
		{
			case 'good':
				$class = ' class="flash_good"';
				break;
			case 'bad':
				$class = ' class="flash_bad"';
				break;
		}
		$str = "<p{$class}>".$_SESSION['flash']['msg']."</p>";
		unset($_SESSION['flash']);
	}
return $str;
}


/**
 * Redirect to a page
 * @param string $url
 */
function redirect($url) {
	header('Location: '.$url);
	exit;
}


/**
 * Gets all files in a diectory
 * @param string $dir
 */
function get_files($dir) {
	if(!is_dir($dir)) {
	return FALSE;
	}

	$files = @scandir($dir);
	foreach($files as $k=>$v) {
		if(strpos($v,'.')==0) {
			unset($files[$k]);
		}
	}

return $files;
}


/**
 * Creates a directory
 * @param string $dir
 */
function create_dir($dir) {
	$res = TRUE;
	if(!is_dir($dir)) {
		$res = mkdir($dir);
		@chmod($dir,0777);
	}
return $res;
}


/**
 * PHP4 version of json_encode
 * taken from: http://au.php.net/manual/en/function.json-encode.php#82904
 */
if (!function_exists('json_encode'))
{
  function json_encode($a=false)
  {
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a))
    {
      if (is_float($a))
      {
        // Always use "." for floats.
        return floatval(str_replace(",", ".", strval($a)));
      }

      if (is_string($a))
      {
        static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); $i < count($a); $i++, next($a))
    {
      if (key($a) !== $i)
      {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList)
    {
      foreach ($a as $v) $result[] = json_encode($v);
      return '[' . join(',', $result) . ']';
    }
    else
    {
      foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
      return '{' . join(',', $result) . '}';
    }
  }
}