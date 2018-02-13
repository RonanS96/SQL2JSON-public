<?php
   /** This script reads the contents of an SQL database using the given query and 
    *  outputs them as a JSON file that fits the corresponding JSON Schema. 
    *  PAGE 3 - ROUTES including the code for the source and destination airports, and the  full name 
        of the airport the route departs from. **/

   include "../../SQL2JSONdbConnection.php";

   $sql = "SELECT * FROM routes, airports WHERE routes.src_ap = airports.iata";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      // Routes
      while($row = $result->fetch_assoc()) {
         
         // output data of each row       // remove unwanted characters
         $alid = $row['alid'];            $alid = str_replace(array('"', "\\"), '', $alid);       
         $src_ap = $row['src_ap'];        $src_ap = str_replace(array('"', "\\"), '', $src_ap); 
         $src_apid = $row['src_apid'];    $src_apid = str_replace(array('"', "\\"), '', $src_apid); 
         $dst_ap = $row['dst_ap'];        $dst_ap = str_replace(array('"', "\\"), '', $dst_ap);
         $dst_apid = $row['dst_apid'];    $dst_apid = str_replace(array('"', "\\"), '', $dst_apid);
         $codeshare = $row['codeshare'];  $codeshare = str_replace(array('"', "\\"), '', $codeshare);
         $stops = $row['stops'];          $stops = str_replace(array('"', "\\"), '', $stops);
         $equipment = $row['equipment'];  $equipment = str_replace(array('"', "\\"), '', $equipment);
         $rid = $row['rid'];              $rid = str_replace(array('"', "\\"), '', $rid);
         $name = $row['name'];            $name = str_replace(array('"', "\\"), '', $name);
         $city = $row['city'];            $city = str_replace(array('"', "\\"), '', $city);
         $iata = $row['iata'];            $iata = str_replace(array('"', "\\"), '', $iata);
         $icao = $row['icao'];            $icao = str_replace(array('"', "\\"), '', $icao);
         $x = $row['x'];                  $x = str_replace(array('"', "\\"), '', $x);
         $y = $row['y'];                  $y = str_replace(array('"', "\\"), '', $y);
         $elevation = $row['elevation'];  $elevation = str_replace(array('"', "\\"), '', $elevation);
         $apid = $row['apid'];            $apid = str_replace(array('"', "\\"), '', $apid);

         // Don't print empty attributes... Strings have quotes ("") around them, integers don't
         if($alid == NULL){echo '{';} else { echo '{ "alid": ' . $alid . ',';} 
         if($src_ap == NULL){echo '';} else { echo '"src_ap": "' . $src_ap . '"';} 
         if($src_apid == NULL){echo '';} else { echo ', "src_apid": ' . $src_apid;} 
         if($dst_ap == NULL){echo '';} else { echo ', "dst_ap": "' . $dst_ap . '"';} 
         if($dst_apid == NULL){echo '';} else { echo ', "dst_apid": ' . $dst_apid;} 
         if($codeshare == NULL){echo '';} else { echo ', "codeshare": "' . $codeshare . '"';} 
         if($stops == NULL){echo '';} else { echo ', "stops": ' . $stops;} 
         if($equipment == NULL){echo '';} else { echo ', "equipment": "' . $equipment . '"';} 
         if($rid == NULL){echo '';} else { echo ', "rid": ' . $rid;}
         if($name == NULL){echo '';} else { echo ', "name": "' . $name . '"';} 
         if($city == NULL){echo '';} else {echo ', "city": ' . $city;}
         if($iata == NULL){echo '';} else { echo ', "iata": "' . $iata . '"';} 
         if($icao == NULL){echo '';} else { echo ', "icao": "' . $icao . '"';} 
         if($x == NULL){echo '';} else { echo ', "x": "' . $x . '"';} 
         if($y == NULL){echo '';} else { echo ', "y": "' . $y . '"';} 
         if($elevation == NULL){echo '';} else { echo ', "elevation": ' . $elevation;} 
         if($apid == NULL){echo '';} else { echo ', "apid": ' . $apid . ' }<br> ';}
      }
   } else {
      echo "No results found...";
   }
   $conn->close();
?>

