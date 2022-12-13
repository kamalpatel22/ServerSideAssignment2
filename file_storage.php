<!-- Author: Kamal Patel, 000863596 
This file is taken from the module section.
-->
<?PHP
function readDataFile($filename) {
	if (! file_exists($filename)) {
		$fileData = array();
	} else {
		$fileData = json_decode(file_get_contents($filename), true);
	}
return $fileData;
}

function writeDataFile($filename,$fileData) {
	file_put_contents($filename,json_encode($fileData));
}
?>