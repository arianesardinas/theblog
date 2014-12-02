<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 30.11.14
 * Time: 11:54
 */
namespace Todoweb\Theblog\ViewHelpers\Widget\Controller;

class AtoZNavController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController {

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     *
     */
    protected $objects;

    public function initializeAction(){
        $this->objects = $this->widgetConfiguration['objects'];
    }

    /**
     * @param string $char
     */

    public function indexAction($char = '%'){


        $query = $this->objects->getQuery();

        $query->matching($query->like($this->widgetConfiguration['property'], $char.'%'));
        $modifiedObjects = $query->execute();

        $this->view->assign('contentArguments' ,array(
            $this->widgetConfiguration['as']=>$modifiedObjects
        ));

        foreach(range('A','Z') as $letter){
            $letters[]=$letter;
        }

        $this->view->assign('letters', $letters);
        $this->view->assign('char', $char);

    }
} 