<?php // main site controller

    namespace becwork\controllers;

	class SiteController {

        // get true or false if admin page
        public function isCurrentPageAdmin() {
            
            // check if page is admin
            if ($this->getQueryString("admin") != null) {
                return true;
            } else {
                return false;
            }
        }

        // check maintenance mode
        public function ifMaintenance() {

            global $pageConfig;
            global $mysqlUtils;

            // check if maintenance mode valid
            if (($pageConfig->getValueByName('maintenance') == "enabled" && $this->isCurrentPageAdmin() == false) or $mysqlUtils->isOffline()) {
                return true;
            }
        }

        // get query string by name
        public function getQueryString($query) {
            
            global $mysqlUtils;

            // check if query is empty
            if (empty($_GET[$query])) {
                $output = null;
            } else {

                // escape query
                $output = $mysqlUtils->escapeString($_GET[$query], true, true);
            }

            // return final query value
            return $output;
        }

        // get Http host aka domain name
        public function getHTTPhost() {
            return $_SERVER['HTTP_HOST'];
        }

        // get page title by paramater
        public function getPageTitle() {

            global $pageConfig;

            // check if host is localhost
            if ($this->getHTTPhost() == "localhost") {
                return "Localhost Testing"; 
            } else {

                // check if admin site
                if ($this->isCurrentPageAdmin()) { 
                    return "Admin site"; 
                } else {

                    // return app name
                    return $pageConfig->getValueByName('appName'); 
                }
            }
        }

        // get age by birth data input
        public function getAge($birthDate) {

            // explode string data to array
            $birthDate = explode("/", $birthDate);

            // calculate age
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
            return $age;           
        }

        // redirect to error page
        public function redirectError($error) {

            // redirct loaction header
            header("location: ErrorHandlerer.php?code=$error");
        }

        // check if page in dev mode
        public function isSiteDevMode() {

            global $pageConfig;

            // check if dev mode enabled
            if ($pageConfig->getValueByName("dev-mode") == true) {
                return true;
            } else {
                return false;
            }
        }
	}
?>