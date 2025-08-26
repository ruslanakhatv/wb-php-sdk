<?php

namespace WB\SDK\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WB\SDK\Enums\ContentLanguage;
use WB\SDK\Enums\TagColor;

class BasicTest extends TestCase
{
    public function testEnums()
    {
        $this->assertEquals('ru', ContentLanguage::RU->value);
        $this->assertEquals('D1CFD7', TagColor::GRAY->value);
    }

    public function testEnumCases()
    {
        $this->assertCount(3, ContentLanguage::cases());
        $this->assertCount(6, TagColor::cases());
    }
}
