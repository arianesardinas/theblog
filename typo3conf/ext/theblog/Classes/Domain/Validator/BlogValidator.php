<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 28.11.14
 * Time: 21:44
 */
namespace Todoweb\Theblog\Domain\Validator;
class BlogValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

    /**
     * Validates the given value
     *
     * @param mixed $object
     *
     * @return bool
     */
    protected function isValid($object) {


        if (preg_match('/Joomla/i', $object->getTitle()) &&
            preg_match('/ist gut/i', $object->getDescription())
        ) {
            $this->result->forProperty('title')
                ->addError(
                    new \TYPO3\CMS\Extbase\Error\Error(
                        'tilte'
                        ,
                        1393160862

                    )
                );
            $this->result->forProperty('description')
                ->addError(
                    new \TYPO3\CMS\Extbase\Error\Error(
                      'SASAs'
                        ,
                        1393161081,
                        array(
                            'title' => $object->getTitle(),
                            'description' => $object->getDescription()
                        )
                    )
                );
            return FALSE;
        } else {
            return TRUE;
        }
    }
} 