<?php

declare(strict_types=1);

namespace Vendor\Extkey\Controller;

use RC\extkey\Domain\Repository\ModelTwoRepository;

/**
 * This file is part of the "extName" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 
 */

/**
 * ModelOneController
 */
class ModelOneController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * modelOneRepository
     *
     * @var \Vendor\Extkey\Domain\Repository\ModelOneRepository
     */
    protected $modelOneRepository = null;

        /**
     * modelTwoRepository
     *
     * @var \Vendor\Extkey\Domain\Repository\ModelTwoRepository
     */
    protected $modelTwoRepository = null;


    /**
     * @param \Vendor\Extkey\Domain\Repository\ModelOneRepository $modelOneRepository
     */
    public function injectModelOneRepository(\Vendor\Extkey\Domain\Repository\ModelOneRepository $modelOneRepository)
    {
        $this->modelOneRepository = $modelOneRepository;
    }

    /**
     * @param \Vendor\Extkey\Domain\Repository\ModelTwoRepository $modelTwoRepository
     */
    public function injectModelTwoRepository(\Vendor\Extkey\Domain\Repository\ModelTwoRepository $modelTwoRepository)
    {
        $this->modelTwoRepository = $modelTwoRepository;
    }


    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        $modeltwocategory = $this->modelTwoRepository->findAll();
        $this->view->assign('modeltwocategory', $modeltwocategory);
        return $this->htmlResponse();
        
    }

    /**
     * action create
     *
     * @param \Vendor\Extkey\Domain\Model\ModelOne $newModelOne
     */
    public function createAction(\Vendor\Extkey\Domain\Model\ModelOne $newModelOne)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->modelOneRepository->add($newModelOne);
        $this->redirect('list');
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $modelOnes = $this->modelOneRepository->findAll();
        $this->view->assign('modelOnes', $modelOnes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Vendor\Extkey\Domain\Model\ModelOne $modelOne
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Vendor\Extkey\Domain\Model\ModelOne $modelOne): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('modelOne', $modelOne);
        return $this->htmlResponse();
    }

    /**
     * action edit
     *
     * @param \Vendor\Extkey\Domain\Model\ModelOne $modelOne
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("modelOne")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Vendor\Extkey\Domain\Model\ModelOne $modelOne): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('modelOne', $modelOne);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Vendor\Extkey\Domain\Model\ModelOne $modelOne
     */
    public function updateAction(\Vendor\Extkey\Domain\Model\ModelOne $modelOne)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->modelOneRepository->update($modelOne);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Vendor\Extkey\Domain\Model\ModelOne $modelOne
     */
    public function deleteAction(\Vendor\Extkey\Domain\Model\ModelOne $modelOne)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->modelOneRepository->remove($modelOne);
        $this->redirect('list');
    }
}
