<?php

namespace SpongeAdmin\View\Helper;

use Cake\View\Helper;

/**
 * Helper for creating a form for deleting records.
 * Replaces the postLink method in Form Helper with a form that doesn't require JavaScript.
 * This allows progressive enhancement with CSS and jQuery in this theme.
 * Warnings are displayed adjacent to the record being deleted. Users who don’t
 * have JavaScript enabled will still be able to delete records, but they don’t get any warnings.
 */
class DeleteHelper extends Helper
{
    /**
     * Use Form helper
     * @var array
     */
    public $helpers = ['Form'];
    /**
     * Create a form for deleting a record
     * @param  string $url   URL
     * @param  [type] $model [description]
     * @return [type]        [description]
     */
    public function createForm($url = null, $model = null)
    {
        $formName = str_replace('.', '', uniqid('post_', true));
        $formOptions = [
            'url' => $url,
            'id' => $formName,
            'class' => 'form-delete'
        ];
        $out = $this->Form->create($model, $formOptions);
        $out .= $this->Form->submit('Delete');
        $out .= $this->Form->end();
        return $out;
    }
}
