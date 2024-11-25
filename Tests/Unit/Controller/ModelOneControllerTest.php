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
    public function listActionFetchesAllModelOnesFromRepositoryAndAssignsThemToView(): void
    {
        $allModelOnes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $modelOneRepository = $this->getMockBuilder(\Vendor\Extkey\Domain\Repository\ModelOneRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $modelOneRepository->expects(self::once())->method('findAll')->will(self::returnValue($allModelOnes));
        $this->subject->_set('modelOneRepository', $modelOneRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('modelOnes', $allModelOnes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenModelOneToView(): void
    {
        $modelOne = new \Vendor\Extkey\Domain\Model\ModelOne();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('modelOne', $modelOne);

        $this->subject->showAction($modelOne);
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

    /**
     * @test
     */
    public function editActionAssignsTheGivenModelOneToView(): void
    {
        $modelOne = new \Vendor\Extkey\Domain\Model\ModelOne();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('modelOne', $modelOne);

        $this->subject->editAction($modelOne);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenModelOneInModelOneRepository(): void
    {
        $modelOne = new \Vendor\Extkey\Domain\Model\ModelOne();

        $modelOneRepository = $this->getMockBuilder(\Vendor\Extkey\Domain\Repository\ModelOneRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $modelOneRepository->expects(self::once())->method('update')->with($modelOne);
        $this->subject->_set('modelOneRepository', $modelOneRepository);

        $this->subject->updateAction($modelOne);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenModelOneFromModelOneRepository(): void
    {
        $modelOne = new \Vendor\Extkey\Domain\Model\ModelOne();

        $modelOneRepository = $this->getMockBuilder(\Vendor\Extkey\Domain\Repository\ModelOneRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $modelOneRepository->expects(self::once())->method('remove')->with($modelOne);
        $this->subject->_set('modelOneRepository', $modelOneRepository);

        $this->subject->deleteAction($modelOne);
    }
}
