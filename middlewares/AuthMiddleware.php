<?php
/* User: nicolashalberstadt 
* Date: 18/12/2020 
* Time: 13:52
*/

namespace nicolashalberstadt\phpmvc\middlewares;

use nicolashalberstadt\phpmvc\Application;
use nicolashalberstadt\phpmvc\exceptions\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\middlewares
 */
class AuthMiddleware extends BaseMiddleware
{
    public array $actions;

    /**
     * AuthMiddleware constructor.
     * @param array $actions
     */
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}