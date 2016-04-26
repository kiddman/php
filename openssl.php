<?php 

/**
/* 引き渡し(kindとitem_idを渡す)
**/

$kind = $_GET["kind"];
$item_id = $_GET["item_id"];

$arr['kind']= $kind;
$arr['item_id'] = $item_id;

// OpenSSL 暗号処理
function encOpenssl($arr){
    foreach ($arr as $key => $value) {
        $c_t[$key] = openssl_encrypt($value, 'AES-128-ECB', $key);
    }
    // var_dump($c_t);
    return $c_t;
}

// OpenSSL 複合処理
function decOpenssl($arr){
    foreach ($arr as $key => $value) {
        $p_t[$key] = openssl_decrypt($value, 'AES-128-ECB', $key);
    }
    // var_dump($p_t);
    return $p_t;
}

$encdata = encOpenssl($arr);

echo "<br>";
echo "暗号化後";
echo "<br>";

foreach ($encdata as $key => $value) {
    echo $key.':'.$value;
    echo "<br>";
}

echo "<br>";
echo "生成URL";
echo "<br>";

foreach ($encdata as $key => $value) {
    // echo $key.':'.$value;
    echo $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?'.$key.'='.$value;
    echo "<br>";
}


$decdata = decOpenssl($encdata);

echo "<br>";
echo "複合化後";
echo "<br>";

foreach ($decdata as $key => $value) {
    echo $key.':'.$value;
    echo "<br>";
}

?>