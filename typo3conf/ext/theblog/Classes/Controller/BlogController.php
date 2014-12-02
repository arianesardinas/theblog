<?php
namespace Todoweb\Theblog\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Ariane Sardinas <asardinas@gmx.de>, Todoweb
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * blogRepository
	 *
	 * @var \Todoweb\Theblog\Domain\Repository\BlogRepository
	 * @inject
	 */
	protected $blogRepository = NULL;

	/**
	 * action list
	 * @param string $search
	 *
	 */
	public function listAction($search='') {

        if ($this->request->hasArgument('search')) {
           $search = $this->request->getArgument('search');
        }
        $limit = ($this->settings['blog']['max'])?:NULL;
        $this->view->assign('blogs', $this->blogRepository->findSearchForm($search, $limit));
        $this->view->assign('search', $search);
	}

    /**
     * addForm action - zeigt die Form für das einlesen von blogs
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function addFormAction(\Todoweb\Theblog\Domain\Model\Blog $blog = NULL){
        $this->view->assign('blog', $blog);
    }


    public function initializeAction(){
        if ($this -> arguments -> hasArgument('blog')) {

            $this->arguments->getArgument('blog') -> getPropertyMappingConfiguration() -> setTargetTypeForSubProperty('image', 'array');
        }
    }
    /**
     * show action - zeigt die single view
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function showAction(\Todoweb\Theblog\Domain\Model\Blog $blog){

        $this->view->assign('blog', $blog);
    }
    /**
     * action add - Insert the blogs in den Repository
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function addAction(\Todoweb\Theblog\Domain\Model\Blog $blog) {

        $this->blogRepository->add($blog);
        $this->redirect('list');
    }

    /**
     * action update - Update the blogs in den Repository
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function updateAction(\Todoweb\Theblog\Domain\Model\Blog $blog) {

        $this->blogRepository->update($blog);
        $this->redirect('list');
    }
    /**
     * updateForm action - zeigt die Form für das update von blogs
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function updateFormAction(\Todoweb\Theblog\Domain\Model\Blog $blog = NULL){
        $this->view->assign('blog', $blog);
    }

    /**
     * delete action - löscht die blogs
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     */
    public function deleteAction(\Todoweb\Theblog\Domain\Model\Blog $blog){
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }
    /**
     * delete confirmation action - frage vor den löschen
     *
     * @param Blog $blog
     */
    public function deleteConfirmAction(\Todoweb\Theblog\Domain\Model\Blog $blog) {
        $this->view->assign('blog', $blog);
    }

}