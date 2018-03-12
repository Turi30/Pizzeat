<?php 
function replace_special_character($text) {
	ereg_replace('à', '&agrave;', $text);	// Replace à with &agrave;
	ereg_replace('è', '&egrave;', $text);	// Replace è with &egrave;
	ereg_replace('é', '&eacute;', $text);	// Replace é with &egrave;
	ereg_replace('ì', '&igrave;', $text);	// Replace ì with &igrave;
	ereg_replace('ò', '&ograve;', $text);	// Replace ò with &ograve;
	ereg_replace('ù', '&ugrave;', $text);	// Replace ù with &ugrave;
	return $text;
}
?>