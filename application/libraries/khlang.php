<?php
$language=  isset($_SESSION["LANG"])?$_SESSION["LANG"]:"EN";
function KH_language($value) { /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// /// ///
    global $language;
    $language = trim($language)==""?"EN":trim($language);
    if (is_array($value)) {
        return isset($value[$language])?$value[$language]:$value["EN"];
    } else {
        if (strpos($value, "{" . $language . "}") === false) {
            if (strpos($value, "{EN}") === false)
                return $value;
            else
                $language = "EN";
        }
        $temp = explode("{" . $language . "}", $value);
        $temp = explode("{/" . $language . "}", $temp[1]);
        return $temp[0];
    }
}

function KH($array) {
    return KH_language($array);
}
$lang["home"]           =   KH(array(   "EN"=>"Home"            ,    "VI"=>"Trang chủ"    ));
$lang["settings"]       =   KH(array(   "EN"=>"Settings"        ,    "VI"=>"Tùy chỉnh"    ));
$lang["content"]        =   KH(array(   "EN"=>"Contents"        ,    "VI"=>"Nội dung"    ));
$lang["account"]        =   KH(array(   "EN"=>"Account"         ,    "VI"=>"Tài khoản"    ));
$lang["usermanage"]     =   KH(array(   "EN"=>"User Manage"     ,    "VI"=>"Quản lý người dùng"    ));
?>
