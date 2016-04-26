<style>
    a{
        display: block;
    }
</style>
<?php

$kind = $_GET["kind"];
$item_id = $_GET["item_id"];

$arr['kind']= $kind;
$arr['item_id'] = $item_id;

// OpenSSL 暗号処理
function encOpenssl($arr){
    foreach ($arr as $key => $value) {
        $c_t[$key] = openssl_encrypt($value, 'AES-128-ECB', $key);
    }
    return $c_t;
}

// OpenSSL 複合処理
function decOpenssl($arr){
    foreach ($arr as $key => $value) {
        $p_t[$key] = openssl_decrypt($value, 'AES-128-ECB', $key);
    }
    return $p_t;
}

// URL生成して、リンクをつける関数
function urlcode($encdata){
    foreach ($encdata as $key => $value) {
        //プロトコル含むURLを表示
        $link = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'?'.$key.'='.$value;
        $link_list[] = '<a href="'.$link.'">'.$link.'</a>';
    }

    function urlcode_view($link_list){
        echo $link_list;
    }

    return array_walk_recursive($link_list,'urlcode_view');
}

// 配列の表示を行う関数
function aview($list){

    foreach ($list as $key => $value) {
        $views_list[] = $key.':'.$value."<br>";
    }

    function array_view($views_list){
        echo $views_list;
    }

    return array_walk_recursive($views_list,'array_view');
}

// $encdata = encOpenssl($arr);
// urlcode($encdata);
// $decdata = decOpenssl($encdata);
// aview($decdata);

?>