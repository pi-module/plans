<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt BSD 3-Clause License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
namespace Module\Plans\Validator;

use Pi;
use Zend\Validator\AbstractValidator;

class Type extends AbstractValidator
{
    const TAKEN = 'typeEmpty';

    /**
     * @var array
     */
    protected $messageTemplates = array(
        self::TAKEN => 'You should select one of this modules when type is module',
    );

    protected $options = array();

    /**
     * Type
     *
     * @param  mixed $value
     * @param  array $context
     * @return boolean
     */
    public function isValid($value, $context = null)
    {
        $this->setValue($value);
        if ($context['type'] == 'module') {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }
}
