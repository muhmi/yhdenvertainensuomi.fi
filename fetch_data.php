<?php

function fetch_initiative_data($id) {

   $text = file_get_contents($id);

   if (is_string($text)) {
      return json_decode($text);
   }

   return FALSE;
}

function print_as_csv($initiative, $printHeader = TRUE) {
   $header_str = "";
   $data_str = "";
   foreach ($initiative as $key => $value) {
      if ($key == "id") continue;
      if (is_object($value)) continue;
      if (is_array($value)) continue;
      if (strlen($header_str) > 0) {
	 $header_str .= ", ";
	 $data_str .= ", ";
      }
      $header_str .= $key;
      $data_str .= $value;
   }
   if ($printHeader) print $header_str."\n";
   print $data_str."\n";
}

$data = fetch_initiative_data('https://www.kansalaisaloite.fi/api/v1/initiatives/707');
if ($data)  {

   print_as_csv($data);
}

?>
