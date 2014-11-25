<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 25/11/14
 * Time: 13:35
 */

namespace PayBreak\Sdk\Tests;

use \PayBreak\Sdk\HashGenerator;

class HashGeneratorTest extends TestCase {

    private $hashGenerator;
    private $key = "abcdefghijk123456789";

    private $dataArray;
    private $dataObject;

    protected function setUp()
    {
        $this->hashGenerator = new HashGenerator();

        $this->dataObject = new \stdClass();
        $this->dataObject->a = "b";
        $this->dataObject->c = "d";

        $this->dataArray = (array) $this->dataObject;

        $this->expectedHashes = [
            HashGenerator::TYPE_SHA256 => "c0e0c8bfa497c90ae90fee958a9ddfb0e8ddef2aa955b48e14eb0fa6a3e91a9d",
            HashGenerator::TYPE_SHA1 => "150ca845f59fdf0bc42d306d02953b656942f099"
        ];
    }

    public function tearDown()
    {
        $this->hashGenerator = null;
    }

    public function testGenHashSha256()
    {
        $this->internalTestGenHash(HashGenerator::TYPE_SHA256);
    }

    public function testGenHashFromObjectSha256()
    {
        $this->internalTestGenHashFromObject(HashGenerator::TYPE_SHA256);
    }

    public function testGenHashSha1()
    {
        $this->internalTestGenHash(HashGenerator::TYPE_SHA1);
    }

    public function testGenHashFromObjectSha1()
    {
        $this->internalTestGenHashFromObject(HashGenerator::TYPE_SHA1);
    }

    private function internalTestGenHash($method)
    {
        $this->assertEquals(
            $this->expectedHashes[$method],
            $this->hashGenerator->genHash($this->dataArray, $this->key, $method)
        );
    }

    private function internalTestGenHashFromObject($method)
    {
        $this->d($method.": ".$this->hashGenerator->genHashFromObject($this->dataObject, $this->key, $method));

        $this->assertEquals(
            $this->expectedHashes[$method], // same as array
            $this->hashGenerator->genHashFromObject($this->dataObject, $this->key, $method)
        );
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }

} 