<?php

declare(strict_types=1);

namespace Vendor\Extkey\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class ModelOneTest extends UnitTestCase
{
    /**
     * @var \Vendor\Extkey\Domain\Model\ModelOne|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Vendor\Extkey\Domain\Model\ModelOne::class,
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
    public function getModelOneNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getModelOneName()
        );
    }

    /**
     * @test
     */
    public function setModelOneNameForStringSetsModelOneName(): void
    {
        $this->subject->setModelOneName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('modelOneName'));
    }

    /**
     * @test
     */
    public function getRelationOneReturnsInitialValueForModelTwo(): void
    {
        self::assertEquals(
            null,
            $this->subject->getRelationOne()
        );
    }

    /**
     * @test
     */
    public function setRelationOneForModelTwoSetsRelationOne(): void
    {
        $relationOneFixture = new \Vendor\Extkey\Domain\Model\ModelTwo();
        $this->subject->setRelationOne($relationOneFixture);

        self::assertEquals($relationOneFixture, $this->subject->_get('relationOne'));
    }
}
