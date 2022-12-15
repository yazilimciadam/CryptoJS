<?php
session_start();
require_once './Requests-develop/src/Autoload.php';

use \WpOrg\Requests\Requests;
WpOrg\Requests\Autoload::register();

class POSTRequest {

    function login ($mail,$password) {
        $data = array('pass' => $password, 'name' => $mail);
        $response = Requests::post('https://app.tpayment.co/admin/login', array(), $data);
        return json_decode($response->body);
    }
    function sms ($phone,$code,$auth) {
        $data = array('phone' => $phone, 'code' => $code);
        $headers = array('Content-Type' => 'application/json', "Authorization"=>"Bearer ".$auth);
        
        $response = Requests::post('https://app.tpayment.co/admin/sms',$headers, json_encode($data));
        return json_decode($response->body);
    }
    function getData ($path,$auth,$data) {
        $headers = array('Content-Type' => 'application/json', "Authorization"=>"Bearer ".$auth);
        $options = array(
            'timeout' => 10000,
            'connect_timeout' => 100000,
        );
        $response = Requests::post('https://app.paybling.co/crypto/'.$path, $headers, $data, $options);
     
        return json_decode($response->body);
    }
   
    function getTRans ($path,$auth,$data) {
        $headers = array('Content-Type' => 'application/json', "Authorization"=>"Bearer ".$auth);
        $options = array(
            'timeout' => 10000,
            'connect_timeout' => 100000,
        );
        $response = Requests::post('https://app.tpayment.co/admin/getTrans/'.$path, $headers, $data, $options);
     
        return json_decode($response->body);
    }
    function yetkiKontrolFull ($yetki,$var) {
        $aa = explode(",", $var);
        $bb = explode(",",$yetki);
        $result=array_intersect($bb,$aa);
        if(count($result)>0){
            return false;
            echo $yetki;
        }else 
        echo $yetki;
           return true;
        }
     
        
    
    
}
?>