<?php
namespace AppBundle\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class GeographicSwapPreferenceType extends AbstractEnumType
{
    const COUNTRY           = 'CNTRY';
    const STATE             = 'ST';
    const METROPOLITAN_AREA = 'MA';
    const CITY              = 'C';
    

    protected static $choices = [
        self::COUNTRY               => 'Country',
        self::STATE                 => 'State/County',
        self::METROPOLITAN_AREA     => 'Metropolitan Area',
        self::CITY                  => 'City/Town'
    ];
}

