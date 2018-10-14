<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */

// localhost
$config['recaptcha_sitekey'] = "6LeG72oUAAAAABO5engG6jUG8zgsA3JzKUGYKFix";
$config['recaptcha_secretkey'] = "6LeG72oUAAAAALXODG19XLRTyMrT61Hf-xJ0rQhL";

/*
$config['recaptcha_sitekey'] = "6LcN_h0UAAAAAK4MJjLdhTtVCoAnjbdi-5VrT-vN";
$config['recaptcha_secretkey'] = "6LcN_h0UAAAAANb2wR-PKAqzw0p9iBmoupibNhaK";
*/

// MISTICA
//$config['recaptcha_sitekey'] = "6LcXLzoUAAAAAGfh3BzEAW1YTrFzE6sf_CREf-Zt";
//$config['recaptcha_secretkey'] = "6LcXLzoUAAAAABIMqht_xsZkz_UNfWMEpWH5tyJ_";

$config['lang'] = "es";