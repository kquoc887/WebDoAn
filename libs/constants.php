
<?php
/**
 *  If you make this application for live payments then update following variable values:
 *  Change MODE from sandbox to live
 *  Update PayPal Client ID and Secret to match with your live paypal app details
 *  Change Base URL to https://api.paypal.com/v1/
 *  finally make sure that APP URL matcher to your application url
 */
 
define('MODE', 'sandbox');
define('CURRENCY', 'USD');
define('APP_URL', 'http://localhost:8080/WebDatVe/user/payment.php'); 
 
define("PayPal_CLIENT_ID", "AZJaHGvh4nGw0sVf_Ag_nSwh-5k0wY63D16_rabBr_11N7ClMhcoe0T5qC92pHLNwOuzMvE3iBRcD78B");
define("PayPal_SECRET", "ELfZKqteRsWoS2miznLPJIEvOPPqmsNpxVsPPo47dEPaZQQhZv4daSk4X5plslfZ4YQm5T4nwlm69gHX");
define("PayPal_BASE_URL", "https://api.sandbox.paypal.com/v1/");
