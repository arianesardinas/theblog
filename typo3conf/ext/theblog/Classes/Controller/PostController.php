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
 * PostController
 */
class PostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * postRepository
	 *
	 * @var \Todoweb\Theblog\Domain\Repository\PostRepository
	 * @inject
	 */
	protected $postRepository = NULL;

	/**
	 * action show
	 *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
	 */
	public function showAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post) {

        $this->view->assign('blog', $blog);
		$this->view->assign('post', $post);
	}

    /**
     * updateForm action - zeigt die Form für das update von posts
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function updateFormAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post){
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\TagRepository')->findAll());
        #$this->view->assign('authors', $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\AuthorRepository')->findAll());


    }

    /**
     * action update
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function updateAction(\Todoweb\Theblog\Domain\Model\Blog $blog,  \Todoweb\Theblog\Domain\Model\Post $post) {

        $this->postRepository->update($post);
        $this->redirect('show','Blog',NULL, array('blog'=>$blog));
    }

    /**
     * action AddForm
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function addFormAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post= NULL) {

        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\TagRepository')->findAll());
      # $this->view->assign('authors', $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\AuthorRepository')->findAll());

    }

   /* public function initializeAction(){
        $action = $this->request->getControllerActionName();
        if($action!= 'show'){
            if(!$GLOBALS['TSFE']->fe_user->user['uid']){

               $this->redirect(NULL,NULL,NULL,NULL,16);
            }
        }
    }*/

    /**
     * add action - einfügen die Posts in den repository
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function addAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post) {

        $post->setPostdate(new \DateTime());


        #$post->setAuthor($this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\AuthorRepository')->findOneByUid($GLOBALS['TSFE']->fe_user->user['uid']));

        $blog->addPost($post);
        /* Update des Blogs, um die Verbindung Blog -> Post herzustellen */
        $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
    }
    /**
     * delete Frage action -
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function deleteConfirmAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post) {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
    }

    /**
     * delete action
     *
     * @param \Todoweb\Theblog\Domain\Model\Blog $blog
     * @param \Todoweb\Theblog\Domain\Model\Post $post
     */
    public function deleteAction(\Todoweb\Theblog\Domain\Model\Blog $blog, \Todoweb\Theblog\Domain\Model\Post $post){

        /*Abhängigkeit zu blog löschen aus DB*/
        $blog->removePost($post);
        $this->objectManager->get('Todoweb\\Theblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->postRepository->remove($post);
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
    }
}