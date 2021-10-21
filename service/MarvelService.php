<?php
namespace service;
//  developer.marvel.com

class MarvelService
{
    private $endpoint;
    private $public_key;

    private static $instance;

    public static function getInstance()
    {
        if (! self::$instance)
        {
            self::$instance = new self;

            $ini = parse_ini_file('config/api.ini');
            
            self::$instance->setEndpoint($ini['endpoint']);
            self::$instance->setPublicKey($ini['public_key']);
            self::$instance->setPrivateKey($ini['private_key']);
            self::$instance->setTs($ini['ts']);
        }
        
        return self::$instance;
    }

    public static function post($url, $params = [])
    {
        $instance = self::getInstance();
        return $instance->request($url, 'POST', $params);
    }

    public static function get($url, $params = [])
    {
        $instance = self::getInstance();
        return $instance->request($url, 'GET', $params);
    }

    private function getEndpoint()
    {
        return $this->endpoint;
    }

    private function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    private function getPublicKey()
    {
        return $this->public_key;
    }

    private function setPublicKey($public_key)
    {
        $this->public_key = $public_key;
    }

    private function getPrivateKey()
    {
        return $this->private_key;
    }

    private function setTs($ts)
    {
        $this->ts = $ts;
    }

    private function getTs()
    {
        return $this->ts;
    }

    private function getHash()
    {
        return md5($this->getTs().$this->getPrivateKey().$this->getPublicKey());
    }

    private function getDefaultParams()
    {
        return http_build_query([
            'ts' => $this->getTs(),
            'hash' => $this->getHash(),
            'apikey' => $this->getPublicKey()
        ]);
    }

    private function setPrivateKey($private_key)
    {
        $this->private_key = $private_key;
    }

    public function request($url, $method = 'POST', $params = [])
    {
        $url = $this->getEndpoint() . $url . '?' . $this->getDefaultParams();

        $ch = curl_init();
        if ($method == 'POST' || $method == 'PUT')
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            curl_setopt($ch, CURLOPT_POST, true);
        }
        else if ( ($method == 'GET' || $method == 'DELETE') && $params)
        {
            $url .= '&'.http_build_query($params);
        }

        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => 10
        );
        
        curl_setopt_array($ch, $defaults);
        $output = curl_exec ($ch);
        
        if ($output === false)
        {
            throw new \Exception( curl_error($ch) );
        }
        
        curl_close ($ch);
        
        $return = (array) json_decode($output);
        
        if (json_last_error() !== JSON_ERROR_NONE)
        {
            return $output;
        }

        return $return['data'];
    }
}
