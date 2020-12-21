<?php
/* User: nicolashalberstadt 
* Date: 17/12/2020 
* Time: 16:00
*/

namespace nicolashalberstadt\phpmvc\form;

use nicolashalberstadt\phpmvc\Model;

/**
 * Class Form
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\form
 */
class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }

}