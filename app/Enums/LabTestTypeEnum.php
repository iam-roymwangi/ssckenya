<?php
namespace App\Enums;
enum LabTestTypeEnum: string
{
    use \App\Traits\EnumHelpers; 

    case XRF = 'xrf';
    case FIRE_ASSAY = 'fire_assay';

}