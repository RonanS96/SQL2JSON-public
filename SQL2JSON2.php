<?php
   /** This script reads the contents of an SQL database using the given query and 
    *  outputs them as a JSON file that fits the corresponding JSON Schema. 
    *  PAGE 2 - AIRLINES AND BASE COUNTRIES. **/

   include "../../SQL2JSONdbConnection.php";

   $sql = "SELECT airlines.name AS airline_name, iata, icao, callsign, country, alid, alias, mode, active, code, countries.name AS country_name, oa_code, dst 
             FROM airlines, countries
             WHERE airlines.country = countries.code";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

      // Airlines and Countries the airlines are based in
      while($row = $result->fetch_assoc()) {
         // output data of each row            // remove unwanted characters
         $airline_name = $row['airline_name']; $airline_name = str_replace(array('"', "\\"), '', $airline_name); 
         $iata = $row['iata'];                 $iata = str_replace(array('"', "\\"), '', $iata);
         $icao = $row['icao'];                 $icao = str_replace(array('"', "\\"), '', $icao);
         $callsign = $row['callsign'];         $callsign = str_replace(array('"', "\\"), '', $callsign);
         $country = $row['country'];           $country = str_replace(array('"', "\\"), '', $country);
         $alid = $row['alid'];                 $alid = str_replace(array('"', "\\"), '', $alid);
         $alias = $row['alias'];               $alias = str_replace(array('"', "\\"), '', $alias);
         $mode = $row['mode'];                 $mode = str_replace(array('"', "\\"), '', $mode);
         $active = $row['active'];             $active = str_replace(array('"', "\\"), '', $active);
         $code = $row['code'];                 $code = str_replace(array('"', "\\"), '', $code);
         $country_name = $row['country_name']; $country_name = str_replace(array('"', "\\"), '', $country_name);
         $oa_code = $row['oa_code'];           $oa_code = str_replace(array('"', "\\"), '', $oa_code);
         $dst = $row['dst'];                   $dst = str_replace(array('"', "\\"), '', $dst);
         
         // Don't print empty attributes... Strings have quotes ("") around them, integers don't
         if($airline_name == NULL){echo '{';} else { echo '{ "airline_name": "' . $airline_name . '"';} 
         if($iata == NULL){echo '';} else { echo ', "iata": "' . $iata . '"';} 
         if($icao == NULL){echo '';} else { echo ', "icao": "' . $icao . '"';} 
         if($callsign == NULL){echo '';} else { echo ', "callsign": "' . $callsign . '"';} 
         if($country == NULL){echo '';} else { echo ', "country": "' . $country . '"';} 
         if($alid == NULL){echo '';} else { echo ', "alid": ' . $alid;} 
         if($alias == NULL){echo '';} else { echo ', "alias": "' . $alias . '"';} 
         if($mode == NULL){echo '';} else { echo ', "mode": "' . $mode . '"';} 
         if($active == NULL){echo '';} else { echo ', "active": "' . $active . '"';}  
         if($code == NULL){echo '';} else { echo ', "code": "' . $code . '"';}
         if($country_name == NULL){echo '';} else { echo ', "country_name": "' . $country_name . '"';} 
         if($oa_code == NULL){echo '';} else {echo ', "oa_code": "' . $oa_code . '"';}
         if($dst == NULL){echo '';} else { echo ', "dst": "' . $dst . '" }<br> ';}
      }
   } else {
      echo "No results found...";
   }
   $conn->close();
?>

