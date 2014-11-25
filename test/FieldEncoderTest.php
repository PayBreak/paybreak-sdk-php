<?php
/**
 * Created by PhpStorm.
 * User: matthewnorris
 * Date: 25/11/14
 * Time: 13:16
 */

namespace PayBreak\Sdk\Tests;


class FieldEncoderTest extends TestCase {

    private $fieldEncoder;
    private $testData = [
        "something" => "something else",
        "1234" => [
            "5678",
            "910"
        ]

    ];
    private $encodedTestData = "eyJzb21ldGhpbmciOiJzb21ldGhpbmcgZWxzZSIsIjEyMzQiOlsiNTY3OCIsIjkxMCJdfQ==";


    protected function setUp()
    {
        $this->fieldEncoder = new \PayBreak\Sdk\FieldEncoder();
    }

    public function tearDown()
    {
        $this->fieldEncoder = null;
    }

    public function testEncode()
    {
        $this->assertEquals(
            $this->encodedTestData,
            $this->fieldEncoder->encodeField($this->testData)
        );
    }

    public function testDecode()
    {
        $this->assertEquals(
            $this->testData,
            $this->fieldEncoder->decodeField($this->encodedTestData)
        );
    }

    private function d($string)
    {
        file_put_contents("debug.log", $string."\n", FILE_APPEND);
    }
}