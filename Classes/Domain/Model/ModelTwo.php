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
 * ModelTwo
 */
class ModelTwo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * modelTwoName
     *
     * @var string
     */
    protected $modelTwoName = '';

    /**
     * Returns the modelTwoName
     *
     * @return string
     */
    public function getModelTwoName()
    {
        return $this->modelTwoName;
    }

    /**
     * Sets the modelTwoName
     *
     * @param string $modelTwoName
     * @return void
     */
    public function setModelTwoName(string $modelTwoName)
    {
        $this->modelTwoName = $modelTwoName;
    }
}
