-- SQL Queries for Big Data Management Coursework
-- 1. AIRPORTS, CITIES & COUNTRIES 


SELECT airports.name AS airport_name, city, iata, icao, x, y, elevation, apid, cid, cities.name AS city_name, country, timezone, tz_id, code, countries.name AS country_name, oa_code, dst 
FROM airports, cities, countries
WHERE airports.city = cities.cid 
AND   cities.country = countries.code;
-- 7179 returns not 7184

-- 2. AIRLINES & COUNTRIES

SELECT airlines.name AS airline_name, iata, icao, callsign, country, alid, alias, mode, active, code, countries.name AS country_name, oa_code, dst 
FROM airlines, countries
WHERE airlines.country = countries.code;
-- seems OK.

-- 3. ROUTES & AIRPORTS

SELECT * FROM routes, airports 
WHERE routes.src_ap = airports.iata; 
-- returns 66818 not 67663  
