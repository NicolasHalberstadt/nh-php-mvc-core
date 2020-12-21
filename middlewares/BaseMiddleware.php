<?php
/* User: nicolashalberstadt 
* Date: 18/12/2020 
* Time: 13:50
*/

namespace nicolashalberstadt\phpmvc\middlewares;

/**
 * Class BaseMiddleware
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\middlewares
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}