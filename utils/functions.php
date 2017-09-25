<?php
/**
 *
 */
class RoyaltyUtils{
    private $allowedPaymentMethods;

    function __construct(){
        /*$this->allowedPaymentMethods = [
            'credit',
            'paypal',
            'cash',
            'deposit'
        ];*/
    }

    /**
     * Get a value on a variable or Array if exists, return empty otherwise.
     * @param  [?] $value
     * @param  [?] $valueInArray
     * @return [value]
     */
    public function getValueIfExists($value, $valueInArray = null)
    {
        if($valueInArray != null){
            if(isset($value[$valueInArray]) && ($value[$valueInArray] !== '' || $value[$valueInArray] !== null)){
                return $value[$valueInArray];
            }else{
                return '';
            }
        }else{
            if($value !== '' || $value !== null){
                return $value;
            }else{
                return '';
            }
        }

    }

    /**
     * Get base url
     * @return [string]
     */
    public function baseUrl(){
      return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
      );
    }


    /**
     * Redirect to home if client is not pressent on SESSION
     */
    public function redirectIfNotClient($ajax = false, $where = null)
    {
        if($ajax){
            if(!isset($_SESSION['id_cliente'])){
                exit;
            }
        }else{
            if(!isset($_SESSION['id_cliente'])){
                header("HTTP/1.1 301 Moved Permanently");
                if($where == 'cuenta'){
                  header('Location: ' . $this->baseUrl() . '/cuenta.php');
                }else{
                  header('Location: ' . $this->baseUrl());
                }

                exit;
            }
        }
    }


    /**
     * Redirect to home if client is not pressent on SESSION
     */
    public function checkIfValidPaymentMethod($value)
    {
        if(!isset($value) || !in_array($value, $this->allowedPaymentMethods)){
            return false;
        }else{
            return true;
        }
    }


    public function hashPassword($password)
    {
        $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
        $salt=str_replace("+",".",$salt);
        $param='$'.implode('$',array(
                "2y", //select the most secure version of blowfish (>=PHP 5.3.7)
                str_pad(11,2,"0",STR_PAD_LEFT), //add the cost in two digits
                $salt //add the salt
        ));

        return crypt($password, $param);
    }


    /**
     * Generate strong random token to recover passwords passwords
     * @param  integer $length         [description]
     * @param  [type]  $add_dashes     [description]
     * @param  string  $available_sets [description]
     * @return [type]                  [description]
     */
    public function generateRandomString($length = 30, $add_dashes = false, $available_sets = 'lud'){
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    public function checkPassword($str1, $str2)
    {
        if(!function_exists('hash_equals')) {
            if(strlen($str1) != strlen($str2)) {
              return false;
            } else {
              $res = $str1 ^ $str2;
              $ret = 0;
              for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
              return !$ret;
            }
      }else{
          return hash_equals($str1, $str2);
      }
    }


}
?>
