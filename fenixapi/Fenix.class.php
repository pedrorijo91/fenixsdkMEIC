<?php

require_once('fenixapi/FenixEdu.class.php');

class Fenix extends FenixEdu {
    
    private static $INSTANCE = null;
    
    public static function getSingleton() {
        if (self::$INSTANCE == null) {
            self::$INSTANCE = new self();
        }
        return self::$INSTANCE;
    }
    
    public function Auth() {
        if (isset($_GET['error'])) {
            // TODO handle error auth
            die("You must accept the app scopes.");
        } else if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $this->getAccessTokenFromCode($code);
        } else {
            // TODO show auth page - do NOT redirect automatically
            $authUrl = $this->getAuthUrl();
            header(sprintf("Location: %s", $authUrl));
        }
    }
    
    public function forceAuthPage() {
        // TODO show auth page - do NOT force redirect automatically
        $authUrl = $this->getAuthUrl();
        header(sprintf("Location: %s", $authUrl));
    }
    
    public function handleAuthError($error) {
        // TODO show error page
        echo "There was an authorization error - " . $error;
    }
    
    public function handleAuthCode($code) {
        $this->getAccessTokenFromCode($code);
    }
    
    
}

?>