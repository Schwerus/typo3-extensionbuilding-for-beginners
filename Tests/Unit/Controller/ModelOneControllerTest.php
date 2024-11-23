<?php

declare(strict_types=1);

namespace Vendor\Extkey\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class ModelOneControllerTest extends UnitTestCase
{
    /**
     * @var \Vendor\Extkey\Controller\ModelOneController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Vendor\Extkey\Controller\ModelOneController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenModelOneToModelOneRepository(): void
    {
        $modelOne = new \Vendor\Extkey\Domain\Model\ModelOne();

        $modelOneRepository = $this->getMockBuilder(\Vendor\Extkey\Domain\Repository\ModelOneRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $modelOneRepository->expects(self::once())->method('add')->with($modelOne);
        $this->subject->_set('modelOneRepository', $modelOneRepository);

        $this->subject->createAction($modelOne);
    }
}
