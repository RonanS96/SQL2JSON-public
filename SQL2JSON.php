<?php
   /** This script will reads the contents of an SQL database using the given query and 
    *  outputs them as a JSON file that fits the corresponding JSON Schema. **/

   include "../../SQL2JSONdbConnection.php";

   $sql = "SELECT airports.name AS airport_name, city, iata, icao, x, y, elevation, apid, cid, cities.name AS city_name, country, timezone, tz_id, code, countries.name AS country_name, oa_code, dst 
              FROM  airports, cities, countries
			  WHERE airports.city = cities.cid 
              AND   cities.country = countries.code LIMIT 1";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row
      
      // Airports, Cities and Countries
      while($row = $result->fetch_assoc()) {
         echo "{ 'airport_name': '" . $row["airport_name"] . 
         "', 'city': " . $row['city'] . 
         ", 'iata': '" . $row['iata'] . 
         "', 'iaca': '" . $row['iaca'] . 
         "', 'x': '" . $row['x'] . 
         "', 'y': '" . $row['y'] . 
         "', 'elevation': " . $row['elevation'] . 
         ", 'apid': " . $row['apid'] . 
         ", 'cid': " . $row['cid'] .  
         ", 'city_name': '" . $row['city_name'] .
         "', 'country': '" . $row['country'] . 
         "', 'timezone': '" . $row['timezone'] .
         "', 'tz_id': '" . $row['tz_id'] .
         "', 'code': '" . $row['code'] . 
         "', 'country_name': '" . $row['country_name'] . 
         "', 'oa_code': '" . $row['oa_code'] . 
         "', 'dst': '" . $row['dst'] . "' }<br> ";
      }
   } else {
      echo "No results found...";
   }
   $conn->close();
?>

