<?php
  $fboFullName = "Avian Flight Center";
  $airports = array(
    'KPWT',
    'KOLM',
    'KSHN',
    'KTIW',
    'KHQM',
    'KSEA',
    'KRNT',
    'KBFI',
    'KPAE',
    'KBVS',
    'KCLS',
    'KKLS',
    'KTTD'
  );

  $airportMetarInfo = array();
  $metarDataObject = getMetarData($airports);
  
  $metars = $metarDataObject->xpath('/response/data/METAR');
  $metarArray = array();

  foreach ($metars as $apt) {
    $airportCode = $apt->station_id;
    $metarArray["$airportCode"] = $apt; 
  }

  #foreach ($metars as $metar) {
    #print $metar->station_id . ": " . $metar->flight_category . "\n";
  #}

  function getMetarData ($ap_array) {
    $airportsString = implode('%20', $ap_array);
    $metarDataURL = "http://aviationweather.gov/adds/dataserver_current/httpparam?datasource=metars&requestType=retrieve&format=xml&mostRecentForEachStation=constraint&hoursBeforeNow=1.25&stationString=" . $airportsString;

    if (($response_xml_data = file_get_contents($metarDataURL)) === false) {
      echo "Error fetching XML\n";
    } else {
       libxml_use_internal_errors(true);
       $data = simplexml_load_string($response_xml_data);
       if (!$data) {
         echo "Error loading XML\n";
         foreach(libxml_get_errors() as $error) {
               echo "\t", $error->message;
         }
       } else {
          return($data);
       }
    } 
  };
?>
