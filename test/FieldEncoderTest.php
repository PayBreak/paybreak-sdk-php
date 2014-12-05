<?php

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

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\FieldEncoder::testEncode()
     */
    public function testEncode()
    {
        $this->assertEquals(
            $this->encodedTestData,
            $this->fieldEncoder->encodeField($this->testData)
        );
    }

    /**
     * @author Matthew Norris
     * @covers \PayBreak\Sdk\FieldEncoder::testDecode()
     */
    public function testDecode()
    {
        $this->assertEquals(
            $this->testData,
            $this->fieldEncoder->decodeField($this->encodedTestData)
        );
    }
}
