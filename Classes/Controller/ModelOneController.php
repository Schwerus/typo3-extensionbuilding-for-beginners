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
    $this->view->assign('newModelOne', new \Vendor\Extkey\Domain\Model\ModelOne());
    return $this->htmlResponse();
}


/**
 * action create
 *
 * @param \Vendor\Extkey\Domain\Model\ModelOne $newModelOne
 */
public function createAction(\Vendor\Extkey\Domain\Model\ModelOne $newModelOne)
{
    $this->addFlashMessage('The object was created.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
    $this->modelOneRepository->add($newModelOne);
    $this->redirect('list');
}


// SEARCH - Mal sehen!

/**
 * Aktion zum Durchführen einer Suche
 *
 * @return \Psr\Http\Message\ResponseInterface
 */
public function searchAction(): \Psr\Http\Message\ResponseInterface
{
    // Initial leer, um das Suchfeld anzuzeigen
    $searchTerm = '';
    $this->view->assign('searchTerm', $searchTerm);
    return $this->htmlResponse();
}

/**
 * Aktion zum Anzeigen der Suchergebnisse
 *
 * @return \Psr\Http\Message\ResponseInterface
 */
public function showSearchResultsAction(): \Psr\Http\Message\ResponseInterface
{
    // Abrufen des eingegebenen Suchbegriffs
    $searchTerm = $this->request->getArgument('searchTerm');
    // Debugging: Ausgabe des Suchbegriffs
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($searchTerm, 'Suchbegriff');

    // Erstelle eine neue Abfrage
    $query = $this->modelOneRepository->createQuery();

    // Definiere die Bedingungen für die Spalten "title" und "prompt_inhalt"
    $constraintmodelOneName = $query->like('modelOneName', '%' . $searchTerm . '%');
    $constraintmodelOneContent = $query->like('modelOneContent', '%' . $searchTerm . '%');

    // Kombiniere die beiden Bedingungen mit einem logicalOr
    $query->matching(
        $query->logicalOr($constraintmodelOneName, $constraintmodelOneContent)
    );

    // Führe die Abfrage aus und speichere die Ergebnisse
    $modelOnes = $query->execute();

    // Debugging: Ausgabe der gefundenen ModelOne-Datensätze
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($modelOnes, 'Suchergebnisse');

    // Daten an die View übergeben
    $this->view->assignMultiple([
        'modelOnes' => $modelOnes,  // Die Suchergebnisse an die View übergeben
        'searchTerm' => $searchTerm  // Den Suchbegriff an die View übergeben
    ]);
    return $this->htmlResponse();
}



    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        // Standardwerte für Sortierung
        $sort = $this->request->hasArgument('sort') ? $this->request->getArgument('sort') : 'modelOneName';
        $order = $this->request->hasArgument('order') ? $this->request->getArgument('order') : 'asc';

        // Query mit Sortierung erstellen
        $query = $this->modelOneRepository->createQuery();
        $query->setOrderings([$sort => ($order === 'asc' ? \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING : \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)]);

        // Abfrage ausführen
        $modelOnes = $query->execute();

        // Werte an die View übergeben
        $this->view->assign('modelOnes', $modelOnes);
        $this->view->assign('sort', $sort);
        $this->view->assign('order', $order);

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
        $modeltwocategory = $this->modelTwoRepository->findAll();
        $this->view->assign('modelOne', $modelOne);
        $this->view->assign('modeltwocategory', $modeltwocategory);
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
