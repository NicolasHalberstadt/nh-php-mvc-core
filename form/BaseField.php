<?php
/* User: nicolashalberstadt 
* Date: 20/12/2020 
* Time: 19:15
*/

namespace nicolashalberstadt\phpmvc\form;

use nicolashalberstadt\phpmvc\Model;

/**
 * Class BaseField
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\form
 */
abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * Field constructor.
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
        <div class="form-group">
            <label>%s</label>
           %s
             <div class="invalid-feedback">
                %s
            </div>
        </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}