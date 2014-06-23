<?php

class Random extends Phalcon\Mvc\User\Component {

    public function  random_string($length){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function random_number($length){
        $characters = '1234567890';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function random_email(){
        $domains = array("com", "net", "gov", "org", "edu", "biz", "info");
        return strtolower($this->random_string(rand(5,10)) . '@' . $this->random_string(rand(5,10)) . '.' .$domains[rand(0, count($domains) - 1)]);
    }

    public function random_date($from, $to, $format){
        $from = strtotime($from);
        $to = strtotime($to);
        return date($format, rand($from, $to));
    }

    public function random_gender(){
        $genders = array('female', 'male');
        return $genders[rand(0, count($genders) -1)];
    }

    public function random_created_date(){
        return $this->random_date(date('Y-m-d'), date('Y-m-d' ,strtotime("- 2 months")), 'Y-m-d H:i:s');
    }

    public function random_birth_date(){
        return $this->random_date(date('Y-m-d', strtotime("- 50 years")), date('Y-m-d' ,strtotime("- 18 years")), 'Y-m-d');
    }

}