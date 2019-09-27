<?php

namespace Signifly\Nova\Fields\ProgressBar;

use Laravel\Nova\Fields\Field;

class ProgressBar extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'progress-bar';

    /**
     * options to send along
     *
     * @return $this
     */
    public function options(array $options)
    {
        return $this->withMeta(['options' => $options]);
    }
}
