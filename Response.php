<?php
/* User: nicolashalberstadt 
* Date: 14/12/2020 
* Time: 10:34
*/

namespace nicolashalberstadt\phpmvc;

/**
 * Class Response
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc
 */
class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}