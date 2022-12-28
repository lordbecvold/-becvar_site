<?php //REST API function

    //Check if API enabled
    if ($apiController->isApiEnabled()) {

        //Init token for controll user add token
        $accesToken = $pageConfig->getValueByName('apiToken');

        //Init token from get parameter and escaped
        $token = $mysqlUtils->escapeString($apiController->getToken(), true, true);
        
        //Check if token is valid
        if ($apiController->isTokenValid($token, $accesToken) == null) {
            die("Error: api token is empty");
       
        } elseif ($apiController->isTokenValid($token, $accesToken) == "invalid") {
            die("Error: api token is invalid, please check token format or validate with admin");

        } elseif ($apiController->isTokenValid($token, $accesToken) == "valid") {
            
            //Get value from url get
            $value = $mysqlUtils->escapeString($apiController->getValue(), true, true);
            
            //Check if value is null
            if ($value == null) {
                $apiController->printValueNull();
            
            } else {

                
                /* ////////////////////////////// Main value list ////////////////////////////// */

                //Print api data to json by value name
                if ($value == "list") {
                    $apiController->prntValueList();

                //Get API status
                } elseif ($value == "status") {
                    $apiController->printApiStatus();
                
                //Log to mysql
                } elseif ($value == "log") {
                    $apiController->saveLog();

                /* ///////////////////////////// End of value list ///////////////////////////// */


                //Print error if value not found
                } else {
                    $apiController->printUnknowValue();
                }
            }
        }
    } else {
        
        if ($siteController->isSiteDevMode()) {
            die("[DEV-MODE]:Error: api is disabled in comfig file");

        } else {
            $urlUtils->jsRedirect("ErrorHandlerer.php?code=404");
        }
    }
?>