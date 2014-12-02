<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 29.11.14
 * Time: 18:35
 */

namespace Todoweb\Theblog\Domain\Repository;


class TagRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{
    protected $defaultOrderings = array('tagvalue' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);

} 