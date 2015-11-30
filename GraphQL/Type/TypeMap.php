<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/30/15 12:36 AM
*/

namespace Youshido\GraphQL\Type;


use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class TypeMap
{

    /**
     * @return AbstractType[]
     */
    public static function getSystemTypes()
    {
        return [
            'int'    => new IntType(),
            'string' => new StringType(),
        ];
    }

    public static function isTypeAllowed($type)
    {
        $types = self::getSystemTypes();
        return array_key_exists($type, $types);
    }

    public static function getTypeObject($type)
    {
        if (self::isTypeAllowed($type)) {
            $types = self::getSystemTypes();
            return clone $types[$type];
        } else {
            return null;
        }
    }

}