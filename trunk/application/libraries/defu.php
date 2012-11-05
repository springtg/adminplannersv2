<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists("htmlentities_UTF8")) {

    function htmlentities_UTF8($str) {
        return htmlentities($str, ENT_QUOTES, 'utf-8');
    }

}

if (!function_exists("JO_location")) {

    function JO_location($URL = false) {
        if ($URL)
            exit("<script> try { parent.location.replace ( '" . $URL . "'						); } catch ( exception ) { location.replace( '" . $URL . "'							); } </script>");
        else
            exit("<script> try { parent.location.replace ( '" . $_SERVER["HTTP_REFERER"] . "'	); } catch ( exception ) { location.replace( '" . $_SERVER["HTTP_REFERER"] . "'	); } </script>");
    }

}
if (!function_exists("objectToArray")) {

    function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }

}
if (!function_exists("convertUrl")) {

    function convertUrl($str) {
        $remove = "~ ` ! @ # $ % ^ & * ( ) _ + | \\ = ' \" ; : ? / > . , < ] [ { }";
        $from = "à á ạ ả ã â ầ ấ ậ ẩ ẫ ă ằ ắ ặ ẳ ẵ è é ẹ ẻ ẽ ê ề ế ệ ể ễ ì í ị ỉ ĩ ò ó ọ ỏ õ ô ồ ố ộ ổ ỗ ơ ờ ớ ợ ở ỡ ù ú ụ ủ ũ ư ừ ứ ự ử ữ ỳ ý ỵ ỷ ỹ đ ";
        $to = "a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
        $from .= " À Á Ạ Ả Ã Â Ầ Ấ Ậ Ẩ Ẫ Ă Ằ Ắ Ặ Ẳ Ẵ È É Ẹ Ẻ Ẽ Ê Ề Ế Ệ Ể Ễ Ì Í Ị Ỉ Ĩ Ò Ó Ọ Ỏ Õ Ô Ồ Ố Ộ Ổ Ỗ Ơ Ờ Ớ Ợ Ở Ỡ Ù Ú Ụ Ủ Ũ Ư Ừ Ứ Ự Ử Ữ Ỳ Ý Ỵ Ỷ Ỹ Đ ";
        $to .= " a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
        $remove = explode(" ", $remove);
        $from = explode(" ", $from);
        $to = explode(" ", $to);
        $str = str_replace($from, $to, $str);
        $str = str_replace($remove, "", $str);
        $str = strip_tags($str);
        $str = iconv("UTF-8", "ISO-8859-1//TRANSLIT//IGNORE", $str);
        //$str = iconv("ISO-8859-1","UTF-8",$str);
        $str = str_replace(" ", "-", $str);
        while (!(strpos($str, "--") === false)) {
            $str = str_replace("--", "-", $str);
        }

        $str = strtolower($str);
        return $str;
    }

}
if (!function_exists("ShowError")) {

    function ShowError(
    $Error = array(
        "color" => "",
        "errortype" => "404",
        "title" => "Webpage not found.",
        "title" => "Webpage not found.",
        "message" => "The 404 or Not Found, the server could not find what was requested",
        "homelink" => ""
    )
    ) {
        die('
                <link href="' . base_url("syslib/syscss/sysstyle.css") . '" rel="stylesheet" type="text/css" />
                <div class="MrKhuong' . $Error["color"] . '">
                    <div class="tit"><span>' . $Error["errortype"] . '</span>' . $Error["title"] . '</div>
                    <p>' . $Error["message"] . '</p>
                    <a href="javascript:window.history.back()" class="back">Go back</a>
                    <a href="' . ($Error["homelink"] == "" ? base_url("home") : $Error["homelink"]) . '" class="home">Go home</a>
                </div>
            ');
    }

}
if (!function_exists("getIP")) {

    function getIP() {
        $ip = '';
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else
            $ip = "UNKNOWN";

        $ip = explode(',', $ip);
        return $ip[0];
    }

}
if (!function_exists("print_r_reverse")) {
    function print_r_reverse(&$output) {
    $expecting = 0; // 0=nothing in particular, 1=array open paren '(', 2=array element or close paren ')'
    $lines = explode("\n", $output);
    $result = null;
    $topArray = null;
    $arrayStack = array();
    $matches = null;
    while (!empty($lines) && $result === null) {
        $line = array_shift($lines);
        $trim = trim($line);
        if ($trim == 'Array') {
            if ($expecting == 0) {
                $topArray = array();
                $expecting = 1;
            } else {
                trigger_error("Unknown array.");
            }
        } else if ($expecting == 1 && $trim == '(') {
            $expecting = 2;
        } else if ($expecting == 2 && preg_match('/^\[(.+?)\] \=\> (.+)$/', $trim, $matches)) { // array element
            list ($fullMatch, $key, $element) = $matches;
            if (trim($element) == 'Array') {
                $topArray[$key] = array();
                $newTopArray = & $topArray[$key];
                $arrayStack[] = & $topArray;
                $topArray = & $newTopArray;
                $expecting = 1;
            } else {
                $topArray[$key] = $element;
            }
        } else if ($expecting == 2 && $trim == ')') { // end current array
            if (empty($arrayStack)) {
                $result = $topArray;
            } else { // pop into parent array
                // safe array pop
                $keys = array_keys($arrayStack);
                $lastKey = array_pop($keys);
                $temp = & $arrayStack[$lastKey];
                unset($arrayStack[$lastKey]);
                $topArray = & $temp;
            }
        }
        // Added this to allow for multi line strings.
        else if (!empty($trim) && $expecting == 2) {
            // Expecting close parent or element, but got just a string
            $topArray[$key] .= "\n" . $line;
        } else if (!empty($trim)) {
            $result = $line;
        }
    }

    $output = implode("\n", $lines);
    return $result;
}
}
?>
