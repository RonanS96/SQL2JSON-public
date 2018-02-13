<?php
   /** This script reads the contents of an SQL database using the given query and
    *  outputs them as a JSON file that fits the corresponding JSON Schema.
    *  PAGE 1 - AIRPORTS AND CITIES. **/

   include "../../SQL2JSONdbConnection.php";

   // SQL Query
   $sql = "SELECT airports.name AS airport_name, city, iata, icao, x, y, elevation, apid, cid, cities.name AS city_name, country, timezone, tz_id, 				code, countries.name AS country_name, oa_code, dst
           FROM  airports, cities, countries
			     WHERE airports.city = cities.cid
              AND   cities.country = countries.code";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row

      // Airports, Cities and Countries
      while($row = $result->fetch_assoc()) {

         // save each value as a variable      // Get rid of unwanted characters
         $name = $row['airport_name'];	       $name = str_replace(array('"', "\\"), '', $name);
         $city = $row['city'];                 $city = str_replace(array('"', "\\"), '', $city);
         $iata = $row['iata'];                 $iata = str_replace(array('"', "\\"), '', $iata);
         $iaca = $row['iaca'];                 $iaca = str_replace(array('"', "\\"), '', $iaca);
         $x    = $row['x'];                    $x = str_replace(array('"', "\\"), '', $x);
         $y    = $row['y'];                    $y = str_replace(array('"', "\\"), '', $y);
         $elevation = $row['elevation'];       $elevation = str_replace(array('"', "\\"), '', $elevation);
         $apid = $row['apid'];                 $apid = str_replace(array('"', "\\"), '', $apid);
         $cid  = $row['cid'];                  $cid = str_replace(array('"', "\\"), '', $cid);
         $city_name = $row['city_name'];       $city_name = str_replace(array('"', "\\"), '', $city_name);
         $country = $row['country'];           $country = str_replace(array('"', "\\"), '', $country);
         $timezone = $row['timezone'];         $timezone = str_replace(array('"', "\\"), '', $timezone);
         $tz_id  = $row['tz_id'];              $tz_id = str_replace(array('"', "\\"), '', $tz_id);
         $code  = $row['code'];                $code = str_replace(array('"', "\\"), '', $code);
         $country_name = $row['country_name']; $country_name = str_replace(array('"', "\\"), '', $country_name);
         $dst = $row['dst'];                   $dst = str_replace(array('"', "\\"), '', $dst);

         // Don't print empty attributes... Strings have quotes ("") around them, integers don't
         if($name == NULL){echo '{';} else { echo '{ "airport_name": "' . $name . '"';}
         if($city == NULL){echo '';} else { echo ', "city": ' . $city;}
         if($iata == NULL){echo '';} else { echo ', "iata": "' . $iata . '"';}
         if($iaca == NULL){echo '';} else { echo ', "iaca": "' . $iaca . '"';}
         if($x == NULL){echo '';} else { echo ', "x": "' . $x . '"';}
         if($y == NULL){echo '';} else { echo ', "y": "' . $y . '"';}
         if($elevation == NULL){echo '';} else { echo ', "elevation": ' . $elevation;}
         if($apid == NULL){echo '';} else { echo ', "apid": ' . $apid;}
         if($cid == NULL){echo '';} else { echo ', "cid": ' . $cid;}
         if($city_name == NULL){echo '';} else { echo ', "city_name": "' . $city_name . '"';}
         if($country == NULL){echo '';} else { echo ', "country": "' . $country . '"';}
         if($timezone == NULL){echo '';} else {echo ', "timezone": "' . $timezone . '"';}
         if($tz_id == NULL){echo '';} else {echo ', "tz_id": "' . $tz_id . '"';}
         if($code == NULL){echo '';} else {echo ', "code": "' . $code . '"';}
         if($country_name == NULL){echo '';} else { echo ', "country_name": "' . $country_name . '"';}
         if($oa_code == NULL){echo '';} else { echo ', "oa_code": "' . $oa_code . '"';}
         if($dst == NULL){echo '}';} else { echo ', "dst": "' . $dst . '" }<br> ';}
      }
   } else {
      echo "No results found...";
   }
   $conn->close();
?>
