<?php

class roistatSend {
    private $title;
    private $comment;
    private $name;
    private $email;
    private $phone;

    public function __construct($title, $comment, $name, $email, $phone) {
        $this->title   = $this->sanitizeString($title);
        $this->comment = $this->sanitizeString($comment);
        $this->name    = $this->sanitizeString($name);
        $this->email   = $this->sanitizeString($email);
        $this->phone   = $this->sanitizeString($phone);
    }

    public function send($products, $city=null) {
        $roistatData = array(
            'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : '',
            'key'     => 'MTc2NDA6MTk2NzA6ZmJiNjNmNWU3NDU1MjQ5YWIyMGZhOTVkNDQyODg4ZWE=',
            'title'   => $this->title,
            'comment' => $this->comment,
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'is_need_callback' => '0',
            'fields'  => array(
                'existing_store_uuid'        => 'ba1f99ee-275d-11e4-5ffc-002590a28eca',
                'existing_organization_uuid' => '092105cb-4b2e-11e5-7a40-e8970037e833',
                'state_uuid'                  => '3039e25a-540b-11e6-7a69-8f5500107e15',
                'existing_good_uuid'         => $products,
                'city'                       => $city,
                'site' => array(
                    'uuid'  => 'c29744691-d516-11e4-7a40-e8970000bf6b',
                    'value' => 'ae147ca8-d516-11e4-7a40-e8970000c3db',
                    'type'  => 'entity',
                ),
                'phone' => array(
                    'uuid'  => 'c4e64b1de-3d56-11e4-5c8b-002590a28eca',
                    'value' => $this->phone,
                    'type'  => 'string',
                ),
            ),

        );

        file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
    }

    private function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        return $var;
    }

    public function getProductId($name)
    {
        $arr = array (
            'id'  => '',
            'sum' => ''
        );
        switch($name) {
            case 'Nose Mask – L':
                $arr['id']  = '16f55f6f-c88a-11e4-7a40-e89700023112';
                $arr['sum'] = '790';
                break;
            case 'Pit Stopper – L':
                $arr['id']  = '59bd16e7-c88a-11e4-7a40-e897000237d9';
                $arr['sum'] = '790';
                break;
            case 'Nose Mask – S':
                $arr['id']  = '7e1df574-c88a-11e4-90a2-8ecb00021e21';
                $arr['sum'] = '790';
                break;
            case 'Pit Stopper – S':
                $arr['id']  = 'fd38fbf5-c88a-11e4-7a40-e89700024dc1';
                $arr['sum'] = '790';
                break;
        }
        return $arr;
    }
}