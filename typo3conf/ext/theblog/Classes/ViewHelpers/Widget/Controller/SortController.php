<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 30.11.14
 * Time: 11:54
 */
namespace Todoweb\Theblog\ViewHelpers\Widget\Controller;

class SortController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController {

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     *
     */
    protected $objects;

    public function initializeAction(){
        $this->objects = $this->widgetConfiguration['objects'];
    }

    /**
     * @param string $order
     */

    public function indexAction($order= \TYPO3\CMS\Extbase\Persistence\QueryResultInterface::ORDER_DESCENDING){

        $order= ($order= \TYPO3\CMS\Extbase\Persistence\QueryResultInterface::ORDER_ASCENDING)?
            \TYPO3\CMS\Extbase\Persistence\QueryResultInterface::ORDER_DESCENDING:
            \TYPO3\CMS\Extbase\Persistence\QueryResultInterface::ORDER_ASCENDING;

        $query = $this->objects->getQuery();
        $query->setOrderings(array($this->widgetConfiguration['property']=>$order));

        $modifiedObjects = $query->execute();
        $this->view->assign('contentArguments' ,array(
            $this->widgetConfiguration['as']=>$modifiedObjects
        ));
        $this->view->assign('order', $order);

    }
} 