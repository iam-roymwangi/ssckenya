<?php
namespace App\Enums;

enum OrganizationUserRoleEnum: string
{
    //MORE OPTIONS TO BE ADDED LATER BASED ON THE ROLES WE IDENTIFY IN THE SYSTEM FROM OUR CLIENT
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';

     public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}