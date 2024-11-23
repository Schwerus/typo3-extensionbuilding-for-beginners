<?php

declare(strict_types=1);

namespace Vendor\Extkey\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class ModelTwoTest extends UnitTestCase
{
    /**
     * @var \Vendor\Extkey\Domain\Model\ModelTwo|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Vendor\Extkey\Domain\Model\ModelTwo::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getModelTwoNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getModelTwoName()
        );
    }

    /**
     * @test
     */
    public function setModelTwoNameForStringSetsModelTwoName(): void
    {
        $this->subject->setModelTwoName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('modelTwoName'));
    }
}
