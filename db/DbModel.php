<?php
/* User: nicolashalberstadt 
* Date: 17/12/2020 
* Time: 17:28
*/

namespace nicolashalberstadt\phpmvc\db;

use app\core\App;
use nicolashalberstadt\phpmvc\Application;
use nicolashalberstadt\phpmvc\Model;

/**
 * Class DbModel
 *
 * @author Nicolas Halberstadt <halberstadtnicolas@gmail.com>
 * @package nicolashalberstadt\phpmvc
 */
abstract class DbModel extends Model
{

    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    abstract public static function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
                VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;

    }

    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $list = [];
        $params = [];
        foreach ($attributes as $attr) {
            $list[] = "`$attr`=?";
            $params[] = $this->{$attr};
        }
        $primaryKey = $this->primaryKey();
        $params[] = $this->{$primaryKey};

        $statement = self::prepare("UPDATE $tableName SET " . implode(', ', $list) . " WHERE $primaryKey = ?");
        $statement->execute($params);
        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function findAll()
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function prepare($sql)
    {
        return Application::$app->db->prepare($sql);
    }
}