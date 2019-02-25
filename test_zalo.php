<?php

/*
* Nếu dùng PHP 7 + LARAVEL các funtion mcrypt_get_block_size, mcrypt_get_iv_size ... Không hỗ trợ 
* Chạy riêng file echo ra các hàm không hỗ trợ rồi fix giá trị vào
* Ví dụ với hàm mcrypt_get_block_size
* echo mcrypt_get_block_size('tripledes', 'ecb'); => 8
* $block = 8
*/

function encryptData($input, $key_seed = "xCdva6IXNw8JORD7y2ChNr2K") {
    $input = trim($input);
    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($input);
    $padding = $block - ($len % $block);
    $input .= str_repeat(chr($padding), $padding);

    // generate a 24 byte key from the md5 of the seed 		 
    $key = substr(md5($key_seed), 0, 24);
    $iv_size = mcrypt_get_iv_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    // encrypt 		 
    $encrypted_data = mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, $iv);
    // clean up output and return base64 encoded 
    $encrypted_data = base64_encode($encrypted_data);
    return $encrypted_data;
}

function decrypt($input, $key_seed = "xCdva6IXNw8JORD7y2ChNr2K") {
    $input = base64_decode($input);
    $key = substr(md5($key_seed), 0, 24);

    $text = mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, 'Mkd34ajdfka5');
    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $packing = ord($text{strlen($text) - 1});

    if ($packing and ( $packing < $block)) {
        for ($P = strlen($text) - 1; $P >= strlen($text) - $packing; $P--) {
            if (ord($text{$P}) != $packing) {
                $packing = 0;
            }
        }
    }

    $text = substr($text, 0, strlen($text) - $packing);
    return $text;
}

//Hàm gọi sáng Alego
function postUrl($url, $data) {
    //Định nghĩa Header khi gọi
    $headerArray = array(
        'Content-Type: application/json; charset=UTF-8',
		'app_id' => '51f52133d2cac8589b98ec5c',
		'app_secret_key' => 'f54e2d12046ac5cc',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);

    $result = curl_exec($ch);
    $result = json_decode($result, true);

    return $result;
}

function dataCard() {
//ID tài khoản của đại lý
    $AccID = "5b3f16fc84ae8c224bb96ae5";
//Mã dịch vụ, sản phẩm
    $ProductCode = $_REQUEST['ProductCode'];
    $telco = $_REQUEST["telco"];
    $type = $_REQUEST["type"];
    $CardNumber = $_REQUEST['CardNumber'];
    $RefNumber = "ZL-" . time();
    //$RefNumber = '';
    $data = array(
        //Ma sản phẩm
        'ProductCode' => $_REQUEST['ProductCode'],
        'RefNumber' => $RefNumber,
        'Telco' => $telco,
        'Type' => $type, //TOPUP, TOPUP_AFTER, PINCODE
        'CustMobile' => $_REQUEST['CustMobile'],
        'CustIP' => "103.7.40.209",
        'CardPrice' => $_REQUEST['CardPrice'],
        'CardQuantity' => $CardNumber,
    );

    $KeyMd5 = 'JUjHouIKPLXQHrveq6';
    $data = json_encode($data);
    $EncData = encryptData($data);
    $Func = "buyPrepaidCards";
    $ver = '1.0';
    $agentId = '20180706141508';
    $CheckSum = md5($Func . $ver . $agentId . $AccID . $EncData . $KeyMd5);

//Khởi tạo mảng dữ liệu gọi sang Alego
    $inputs = array(
        'Fnc' => $Func,
        'Ver' => $ver,
        'AgentID' => $agentId,
        'AccID' => $AccID,
        'EncData' => $EncData,
        'Checksum' => $CheckSum,
    );

//Thực hiện tạo String json mảng
    $inputs = json_encode($inputs);

    //var_dump($inputs);
 
    return $inputs;
}

if (isset($_POST['submit'])) {
    $url = "http://api.alego.vn/agent_api/";
    set_time_limit(0);
    $data = postUrl($url, dataCard());

    var_dump($data);
    echo "<hr>";
	echo "Refnumber : ";
    echo  $RefNumber;

    $encodeData = $data['EncData'];
    $desData = decrypt($encodeData);


    echo 'Data Reponse decode: ';
    echo "<pre>";
    print_r(json_decode($desData));
    echo '<hr />';
}

$telco = isset($_REQUEST["telco"]) ? $_REQUEST["telco"] : '';
$type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : '';

?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="copyright" content="2016 (c) ALEGO" />
        <meta name="ROBOTS" content="INDEX, FOLLOW" />
        <meta name="author" content="ALEGO"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="Cache-Control" content="no-cache"/> 
        <meta http-equiv="refresh" content="3600"/>
        <link rel="icon" href="" type="image/x-icon" />
        <title>TEST LIVE</title>
    </head>
    <body>
        <form method="post">
            <table>
                <tr>
                    <td>Product Code</td>
                    <td>
                        <select name="ProductCode">
                            <option value="500" <?php echo @$_POST['ProductCode'] == 500 ? 'selected' : '';?>>Mã Thẻ Viettel</option>
                            <option value="501" <?php echo @$_POST['ProductCode'] == 501 ? 'selected' : '';?>>Mã Thẻ MobiFone</option>
                            <option value="502" <?php echo @$_POST['ProductCode'] == 502 ? 'selected' : '';?>>Mã Thẻ VinaPhone</option>
                            <option value="503" <?php echo @$_POST['ProductCode'] == 503 ? 'selected' : '';?>>Mã Thẻ Sfone</option>
                            <option value="504" <?php echo @$_POST['ProductCode'] == 504 ? 'selected' : '';?>>Mã Thẻ Gmobile</option>
                            <option value="531" <?php echo @$_POST['ProductCode'] == 504 ? 'selected' : '';?>>Mã Thẻ DATA Mobifone</option>
                            <option value="505" <?php echo @$_POST['ProductCode'] == 505 ? 'selected' : '';?>>Mã Thẻ VietnamMobile</option>
                            <option value="600" <?php echo @$_POST['ProductCode'] == 600 ? 'selected' : '';?>>Nạp tiền trả trước Viettel</option>
                            <option value="601" <?php echo @$_POST['ProductCode'] == 601 ? 'selected' : '';?>>Nạp tiền trả trước  MobiFone</option>
                            <option value="602" <?php echo @$_POST['ProductCode'] == 602 ? 'selected' : '';?>>Nạp tiền trả trước  VinaPhone</option>
                            <option value="603" <?php echo @$_POST['ProductCode'] == 603 ? 'selected' : '';?>>Nạp tiền trả trước  Sfone</option>
                            <option value="604" <?php echo @$_POST['ProductCode'] == 604 ? 'selected' : '';?>>Nạp tiền trả trước  Gmobile</option>
                            <option value="605" <?php echo @$_POST['ProductCode'] == 605 ? 'selected' : '';?>>Nạp tiền trả trước  VietnamMobile</option>
                            <option value="630" <?php echo @$_POST['ProductCode'] == 630 ? 'selected' : '';?>>Nạp tiền trả sau Viettel</option>
                            <option value="631" <?php echo @$_POST['ProductCode'] == 631 ? 'selected' : '';?>>Nạp tiền trả sau MobiFone</option>
                            <option value="632" <?php echo @$_POST['ProductCode'] == 632 ? 'selected' : '';?>>Nạp tiền trả sau VinaPhone</option>
                            <option value="633" <?php echo @$_POST['ProductCode'] == 633 ? 'selected' : '';?>>Nạp tiền trả sau Sfone</option>
                            <option value="634" <?php echo @$_POST['ProductCode'] == 634 ? 'selected' : '';?>>Nạp tiền trả sau Gmobile</option>
                            <option value="635" <?php echo @$_POST['ProductCode'] == 635 ? 'selected' : '';?>>Nạp tiền trả sau VietnamMobile</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Telco</td>
                    <td>

                        <select id="telco" name="telco">
                            <option <?php if ($telco == 'VTT') echo 'selected'; ?> value="VTT">Thẻ Viettel</option>
                            <option <?php if ($telco == 'VMS') echo 'selected'; ?> value="VMS">Thẻ MobiFone</option>
                            <option <?php if ($telco == 'VNP') echo 'selected'; ?> value="VNP">Thẻ VinaPhone</option>
                            <option <?php if ($telco == 'VNM') echo 'selected'; ?> value="VNM">Thẻ VietnamMobile</option>
                            <option <?php if ($telco == 'GTEL') echo 'selected'; ?> value="GTEL">Thẻ Gmobile</option>
                            <option <?php if ($telco == 'SFONE') echo 'selected'; ?> value="SFONE">Thẻ Sfone</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                       <select id="type" name="type">
                            <option <?php if ($type == 'TELCO_TOPUP') echo 'selected'; ?> value="TELCO_TOPUP">TOPUP</option>
                            <option <?php if ($type == 'TELCO_TOPUP_AFTER') echo 'selected'; ?> value="TELCO_TOPUP_AFTER">TOPUP_AFTER</option>
                            <option <?php if ($type == 'TELCO_PINCODE') echo 'selected'; ?> value="TELCO_PINCODE">PINCODE</option>
                            <option <?php if ($type == 'DATA') echo 'selected'; ?> value="DATA">DATA INTERNET</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Phonenumber</td>
                    <td><input type="text" name="CustMobile" value="<?php echo @$_REQUEST['CustMobile']; ?>" /></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="CardPrice" value="<?php echo @$_REQUEST['CardPrice']; ?>" /></td>
                </tr>

                <tr>
                    <td>Quanty</td>
                    <td><input type="text" name="CardNumber" value="<?php echo @$_REQUEST['CardNumber']; ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Gửi" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>

