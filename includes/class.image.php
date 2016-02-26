<?php
class Image {
	// image filename
	var $filename = '';
	// image object resource
	var $image;
	// image type
	var $image_type;
	// image width
	var $width;
	// image height
	var $height;
	
	// save any class errors
	var $errors = array();
	// turn on/off debug messages
	var $debug = 0;
	
	
	/**
	 * Image constructor
	 * @param array $params
	 */
	function Image($params=array()) {
		if(!empty($params)) {
			foreach($params as $k=>$v) {
				if(isset($this->{$k})) {
					$this->{$k} = $v;
				}
			}
		}
		
		if(empty($this->filename)) {
			$this->errors[] = 'Filename not set';
			return FALSE;
		}
		
	return $this->load($this->filename);
	}
	
	
	/**
	 * Loads an image
	 * @param string $filename
	 */
	function load($filename) {
		if(!file_exists($filename)) {
			$this->errors[] = 'File doesn\'t exist: '.$filename;
		return FALSE;
		}
		
		$image_info = getimagesize($filename);
		$this->width 		= $image_info[0];
		$this->height 		= $image_info[1];
		$this->image_type 	= $image_info[2];
		
		if($this->image_type == IMAGETYPE_JPEG) {
			$this->image = imagecreatefromjpeg($filename);
		} elseif($this->image_type == IMAGETYPE_GIF) {
			$this->image = imagecreatefromgif($filename);
		} elseif($this->image_type == IMAGETYPE_PNG) {
			$this->image = imagecreatefrompng($filename);
		} else {
			$this->errors[] = 'Invalid image type';
		}
		
		$this->pr($this->errors);
	return TRUE;
	}
	
	
	/**
	 * Resizes the Image to fit a width
	 * @param int $width
	 */
	function resize_to_width($width) {
		$ratio = $width / $this->width;
		$height = $this->height * $ratio;
	return $this->resize($width,$height);
	}
	
	
	/**
	 * Resizes the image to fit a height
	 * @param int $height
	 */
	function resize_to_height($height) {
		$ratio = $height / $this->height;
		$width = $this->width * $ratio;
	return $this->resize($width,$height);
	}
	
	
	/**
	 * Scales the image by a percentage
	 * @param int $scale
	 */
	function scale($scale) {
		$width = $this->width * ($scale/100);
		$height = $this->height * ($scale/100);
	return $this->resize($width, $height);
	}
	
	
	/**
	 * Resizes an image
	 * @param int $width
	 * @param int $height
	 * @return bool
	 */
	function resize($width,$height) {
		$new_image = @imagecreatetruecolor($width, $height);
		if($new_image === FALSE) {
			$this->errors[] = 'Error resizing image, problem with imagecreatetruecolor()';
			return FALSE;
		}
		
		if(!imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->width, $this->height)) {
			$this->errors[] = 'Error resizing image, problem with imagecopyresampled()';
		return FALSE;
		}
		
		$this->image = $new_image;
		
		$this->pr($this->errors);
		
	return TRUE;
	}
	
	
	/**
	 * Save the current image object
	 * @param string $filename
	 * @param string $image_type
	 * @param int $compression
	 */
	function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75) {
		$result = FALSE;
		if($image_type == IMAGETYPE_JPEG) {
			$result = imagejpeg($this->image, $filename,$compression);
			imagedestroy($this->image);
		} elseif($image_type == IMAGETYPE_GIF) {
			$result = imagegif($this->image, $filename);
			imagedestroy($this->image);
		} elseif($image_type == IMAGETYPE_PNG) {
			$result = imagepng($this->image, $filename);
			imagedestroy($this->image);
		} else {
			$this->errors[] = 'Invalid image type';
		}
	return $result;
	}
	
	
	/**
	 * Output the image to the screen
	 */
	function output() {
		header('Content-Type: '.$this->image_type);
		if($this->image_type == IMAGETYPE_JPEG) {
			imagejpeg($this->image);
		} elseif($this->image_type == IMAGETYPE_GIF) {
			imagegif($this->image);
		} elseif($this->image_type == IMAGETYPE_PNG) {
			imagepng($this->image);
		} else {
			$this->errors[] = 'Invalid image type';
		}
	}
	
	
	/**
	 * Prints out debug info
	 * @param mixed $arr
	 * @param string
	 */
	function pr($arr,$heading='') {
		if($this->debug && !empty($arr)) {
			echo '<pre>';
			if($heading) {
				echo '<strong>'.$heading.'</strong><br/>';
			}
			if(is_string($arr)) {
				echo $arr;
			} else {
				print_r($arr);
			}
			echo '</pre>';
		}
	}
}