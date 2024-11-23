<?php

declare(strict_types=1);

namespace Vendor\Extkey\Controller;


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
     * @param \Vendor\Extkey\Domain\Repository\ModelOneRepository $modelOneRepository
     */
    public function injectModelOneRepository(\Vendor\Extkey\Domain\Repository\ModelOneRepository $modelOneRepository)
    {
        $this->modelOneRepository = $modelOneRepository;
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
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
}
