<?php
class Functions {
    public static function addOrUpdateUrlParam($name, $value)
    {
        $params = $_GET;
        unset($params[$name]);
        $params[$name] = $value;
        return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
    } 

    public static function timeAgo($pTime){
        // tijdzone veranderen naar brusselse
        date_default_timezone_set("Europe/Brussels");
        
        $productTime = new DateTime($pTime);
        $currentTime = new DateTime();
        //verschil tussen timestamp post en current time
        $interval = $productTime->diff($currentTime);
  
        if ($interval->h==0  && $interval->d==0 && $interval->m==0 && $interval->y==0){
            if($interval->i==1){
                return $interval->format('%i minute')."\n";
            }
            else{
                return $interval->format('%i minute(s)')."\n";
            }
        }
        if ($interval->d==0 && $interval->m==0 && $interval->y==0){
            if($interval->h==1){
                return $interval->format('%h hour')."\n";
            }
            else{
                return $interval->format('%h hour(s)')."\n";
            }
        }
        if($interval->m==0 && $interval->y==0){
            if($interval->d==1){
                return $interval->format('%a day')."\n";
            }
            else{
                return $interval->format('%a day(s)')."\n";
            }
            
        }
        if($interval->y==0){
            if($interval->m==1){
                return $interval->format('%m month');
            }
            else{
                return $interval->format('%m month(s)');
            }
            
        }
        if($interval->y>=1){
            if($interval->y==1){
                return $interval->format('%y year');
            }
            else{
                return $interval->format('%y year(s)');
            }
            
        }
    }




}


?>