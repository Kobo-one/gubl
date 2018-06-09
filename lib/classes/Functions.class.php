<?php
class Functions {
    public static function addOrUpdateUrlParam($name, $value)
    {
        $params = $_GET;
        unset($params[$name]);
        $params[$name] = $value;
        return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
    } 
}


?>