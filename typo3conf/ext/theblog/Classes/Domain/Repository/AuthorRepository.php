<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 29.11.14
 * Time: 20:15
 */

namespace Todoweb\Theblog\Domain\Repository;


class AuthorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    protected $defaultOrderings = array('fullname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
} 