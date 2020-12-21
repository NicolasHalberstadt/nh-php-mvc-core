<?php
/* User: nicolashalberstadt 
* Date: 18/12/2020 
* Time: 13:39
*/

namespace nicolashalberstadt\phpmvc;

use nicolashalberstadt\phpmvc\db\DbModel;

/**
 * Class UserModel
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName();

}