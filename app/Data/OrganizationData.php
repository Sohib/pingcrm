<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class OrganizationData extends Data
{
    function __construct(
        public $name,
        public $email,
        public $phone,
        public $address,
        public $city,
        public $region,
        public $country,
        public $postal_code,
    )
    {
    }

}
