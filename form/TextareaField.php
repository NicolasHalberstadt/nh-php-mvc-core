<?php
/* User: nicolashalberstadt 
* Date: 20/12/2020 
* Time: 19:25
*/

namespace nicolashalberstadt\phpmvc\form;

/**
 * Class TextareaField
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\form
 */
class TextareaField extends BaseField
{

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute},
        );
    }
}