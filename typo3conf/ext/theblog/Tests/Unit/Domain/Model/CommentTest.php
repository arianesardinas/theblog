<?php

namespace Todoweb\Theblog\Tests\Unit\Domain\Model;

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
 * Test case for class \Todoweb\Theblog\Domain\Model\Comment.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Ariane Sardinas <asardinas@gmx.de>
 */
class CommentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Todoweb\Theblog\Domain\Model\Comment
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Todoweb\Theblog\Domain\Model\Comment();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getCommentReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getComment()
		);
	}

	/**
	 * @test
	 */
	public function setCommentForStringSetsComment() {
		$this->subject->setComment('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'comment',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCommentdateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getCommentdate()
		);
	}

	/**
	 * @test
	 */
	public function setCommentdateForDateTimeSetsCommentdate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setCommentdate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'commentdate',
			$this->subject
		);
	}
}
