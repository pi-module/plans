<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt BSD 3-Clause License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */

namespace Module\Plans\Validator;

use Pi;
use Laminas\Validator\AbstractValidator;

class Type extends AbstractValidator
{
    const TAKEN = 'typeEmpty';

    /**
     * @var array
     */
    protected $messageTemplates = [];

    protected $options = [];

    /**
     * {@inheritDoc}
     */
    public function __construct($options = null)
    {
        $this->messageTemplates = [
            self::TAKEN => __('You should select one of this modules when type is module'),
        ];

        parent::__construct($options);
    }

    /**
     * Type
     *
     * @param mixed $value
     * @param array $context
     *
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
