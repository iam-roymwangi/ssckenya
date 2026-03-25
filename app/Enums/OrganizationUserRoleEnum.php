<?php
namespace App\Enums;

enum OrganizationUserRoleEnum: string
{
    use \App\Traits\EnumHelpers;

    //MORE OPTIONS TO BE ADDED LATER BASED ON THE ROLES WE IDENTIFY IN THE SYSTEM FROM OUR CLIENT
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';

}