<?php
/**
 * Created by PhpStorm.
 * User: arianesardinas
 * Date: 28.11.14
 * Time: 20:32
 */
namespace Todoweb\Theblog\Validation\Validator;
class WordValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator{

    /**
     * @var array
     */
    protected $supportedOptions = array(
        'minimum' => array(0, 'The minimum value to accept', 'integer'),
        'maximum' => array(PHP_INT_MAX, 'The maximum value to accept', 'integer'),
        'startRange' => array(0, 'The minimum value to accept', 'integer'),
        'endRange' => array(PHP_INT_MAX, 'The maximum value to accept', 'integer')
    );

    /**
     * @param mixed $property
     *
     * @return bool|void
     */



    public function isValid($property) {
         $max = 2;
        if (str_word_count($property, 0) <= $max) {
            return TRUE;
        }else{
            $this->addError('Verringen Sie die Anzahl der Wöter - Es sind max '.$max.'', 1393152387

            );
            return false;
        }
    }
} 