<?php

declare(strict_types=1);

namespace Vendor\Extkey\Domain\Model;


/**
 * This file is part of the "extName" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 
 */

/**
 * ModelOne
 */
class ModelOne extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * relationOne
     *
     * @var \Vendor\Extkey\Domain\Model\ModelTwo
     */
    protected $relationOne = null;

    /**
     * modelOneName
     *
     * @var string
     */
    protected $modelOneName = '';

    /**
     * Returns the relationOne
     *
     * @return \Vendor\Extkey\Domain\Model\ModelTwo
     */
    public function getRelationOne()
    {
        return $this->relationOne;
    }

    /**
     * Sets the relationOne
     *
     * @param \Vendor\Extkey\Domain\Model\ModelTwo $relationOne
     * @return void
     */
    public function setRelationOne(\Vendor\Extkey\Domain\Model\ModelTwo $relationOne)
    {
        $this->relationOne = $relationOne;
    }

    /**
     * Returns the modelOneName
     *
     * @return string
     */
    public function getModelOneName()
    {
        return $this->modelOneName;
    }

    /**
     * Sets the modelOneName
     *
     * @param string $modelOneName
     * @return void
     */
    public function setModelOneName(string $modelOneName)
    {
        $this->modelOneName = $modelOneName;
    }
}
