<?
session_start();
print_r($_SESSION);
return;
function do_post_request($url, $data) {

    $query = http_build_query($data);
    $ch = curl_init(); // Init cURL

    curl_setopt($ch, CURLOPT_URL, $url); // Post location
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // 1 = Return data, 0 = No return
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ignore HTTPS
    curl_setopt($ch, CURLOPT_POST, 1); // This is POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query); // Add the data to the request

    $response = curl_exec($ch); // Execute the request
    curl_close($ch); // Finish the request

    if ($response) {
        return $response;
    } else {
        return NULL;
    }
}

function access_Gifcode() {
    $url = $_SESSION["QSNK-BASEURL"].'home/GetGiftcode';
    $data = array(
        "_SESSION"=>$_SESSION
    );
    $result = do_post_request($url, $data);        
    return $result;
}
session_start();
$result=access_Gifcode();
echo"
<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<result>
 <rs>$result</rs>
</result>
";?>

