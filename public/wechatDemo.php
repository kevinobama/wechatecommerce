<?php
/**
 * Created by PhpStorm.
 * User: kevingates
 * Date: 9/24/16
 * Time: 4:37 PM
 * https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=buffercasualty
 */

$url = 'https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid=wxfc74a5c1c717b2b3&secret=6772f96ec58abead3839c4ff7a72c146';
$data = json_decode(file_get_contents($url));

//print_r($data);

function callApi($url)
{
    echo("<li>value=".$url);
    $data = file_get_contents($url);
    echo("<li>value=".$data);
}


/**
 * POST data
 */
function curl_post($url,$data){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $tmpInfo = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Errno'.curl_error($curl);
    }
    curl_close($curl);
    return $tmpInfo;
}
//callApi('https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token='.$data->access_token);
//callApi("https://api.wechat.com/cgi-bin/menu/get?access_token=".$data->access_token);



$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$data->access_token;
$params ='{
  				 "button":[
					 {	
						  "type":"click",
						  "name":"cet4",
						  "key":"V1001_TODAY_MUSIC"
					  },
					  {
						   "type":"click",
						   "name":"cet6",
						   "key":"V1001_TODAY_SINGER"
					  },
					  {
						   "name":"english",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"cet6",
							   "key":"V1001_HELLO_WORLD"
							},
							{
							   "type":"click",
							   "name":"cet6",
							   "key":"V1001_GOOD"
							}]
					   }]
				 }';;

//curl_post($url,$params);

callApi("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$data->access_token);