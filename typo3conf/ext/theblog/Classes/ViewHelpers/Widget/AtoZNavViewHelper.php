<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 30.11.14
 * Time: 20:41
 */

namespace Todoweb\Theblog\ViewHelpers\Widget;

/**
 * Class AtoZNavViewHelper
 * @package Todoweb\Theblog\ViewHelpers\Widget
 */

class AtoZNavViewHelper extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper {
    /**
     * @var \Todoweb\Theblog\ViewHelpers\Widget\Controller\AtoZNavController
     * @inject
     */
    protected $controller;

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $objects
     * @param string $as
     * @param string $property
     * @return string
     */
    public function render(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface $objects, $as, $property) {
        
        return $this->initiateSubRequest();

    }
} 