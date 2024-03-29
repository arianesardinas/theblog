<?php
namespace Todoweb\Theblog\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Ariane Sardinas <asardinas@gmx.de>, Todoweb
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Todoweb\Theblog\Controller\BlogController.
 *
 * @author Ariane Sardinas <asardinas@gmx.de>
 */
class BlogControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Todoweb\Theblog\Controller\BlogController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Todoweb\\Theblog\\Controller\\BlogController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllBlogsFromRepositoryAndAssignsThemToView() {

		$allBlogs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$blogRepository = $this->getMock('Todoweb\\Theblog\\Domain\\Repository\\BlogRepository', array('findAll'), array(), '', FALSE);
		$blogRepository->expects($this->once())->method('findAll')->will($this->returnValue($allBlogs));
		$this->inject($this->subject, 'blogRepository', $blogRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('blogs', $allBlogs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
