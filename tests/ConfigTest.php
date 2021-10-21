<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * Validate if api ini is defined
     */
    public function testConfigs()
    {
        $this->assertFileExists('config/api.ini', 'Config não definida');
    }

    /**
     * Validate parameters of ini is defined 
     */
    public function testInis()
    {
        $ini = parse_ini_file('config/api.ini');
        
        $this->assertNotEmpty($ini['endpoint'], 'Endpoint não definido');
        $this->assertNotEmpty($ini['private_key'], 'Private Key não definido');
        $this->assertNotEmpty($ini['public_key'], 'Public não definido');
        $this->assertNotEmpty($ini['ts'], 'TS não definido');
    }
}
