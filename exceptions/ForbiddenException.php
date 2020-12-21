<?php
/* User: nicolashalberstadt 
* Date: 18/12/2020 
* Time: 13:57
*/

namespace nicolashalberstadt\phpmvc\exceptions;

/**
 * Class ForbiddenException
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc\exceptions
 */
class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'You don\'t have permission to access this page';
}