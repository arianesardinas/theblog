<?php
namespace Todoweb\Theblog\Domain\Model;


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
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * content
	 *
	 * @var string
	 */
	protected $content = '';

	/**
	 * postdate
	 *
	 * @var \DateTime
	 */
	protected $postdate = NULL;

	/**
	 * comments
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Comment>
	 * @cascade remove
	 * @lazy
	 */
	protected $comments = NULL;

	/**
	 * author
	 *
	 * @var \Todoweb\Theblog\Domain\Model\Author
	 */
	protected $author = NULL;

	/**
	 * tags
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Tag>
	 */
	protected $tags = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->comments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the content
	 *
	 * @return string $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 *
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Returns the postdate
	 *
	 * @return \DateTime $postdate
	 */
	public function getPostdate() {
		return $this->postdate;
	}

	/**
	 * Sets the postdate
	 *
	 * @param \DateTime $postdate
	 * @return void
	 */
	public function setPostdate(\DateTime $postdate) {
		$this->postdate = $postdate;
	}

	/**
	 * Adds a Comment
	 *
	 * @param \Todoweb\Theblog\Domain\Model\Comment $comment
	 * @return void
	 */
	public function addComment(\Todoweb\Theblog\Domain\Model\Comment $comment) {
		$this->comments->attach($comment);
	}

	/**
	 * Removes a Comment
	 *
	 * @param \Todoweb\Theblog\Domain\Model\Comment $commentToRemove The Comment to be removed
	 * @return void
	 */
	public function removeComment(\Todoweb\Theblog\Domain\Model\Comment $commentToRemove) {
		$this->comments->detach($commentToRemove);
	}

	/**
	 * Returns the comments
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Comment> $comments
	 */
	public function getComments() {
		return $this->comments;
	}

	/**
	 * Sets the comments
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Comment> $comments
	 * @return void
	 */
	public function setComments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $comments) {
		$this->comments = $comments;
	}

	/**
	 * Returns the author
	 *
	 * @return \Todoweb\Theblog\Domain\Model\Author $author
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Sets the author
	 *
	 * @param \Todoweb\Theblog\Domain\Model\Author $author
	 * @return void
	 */
	public function setAuthor(\Todoweb\Theblog\Domain\Model\Author $author) {
		$this->author = $author;
	}

	/**
	 * Adds a Tag
	 *
	 * @param \Todoweb\Theblog\Domain\Model\Tag $tag
	 * @return void
	 */
	public function addTag(\Todoweb\Theblog\Domain\Model\Tag $tag) {
		$this->tags->attach($tag);
	}

	/**
	 * Removes a Tag
	 *
	 * @param \Todoweb\Theblog\Domain\Model\Tag $tagToRemove The Tag to be removed
	 * @return void
	 */
	public function removeTag(\Todoweb\Theblog\Domain\Model\Tag $tagToRemove) {
		$this->tags->detach($tagToRemove);
	}

	/**
	 * Returns the tags
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Tag> $tags
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * Sets the tags
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Todoweb\Theblog\Domain\Model\Tag> $tags
	 * @return void
	 */
	public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags) {
		$this->tags = $tags;
	}

}