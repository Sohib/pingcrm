<?php

namespace App\Data;

use App\Models\Contact;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class OrganizationContactsData extends Data
{
    public function __construct(
        //
        public $id,
        public $name,
        public $phone,
        public $city,
        #[MapName("deleted_at")]
        public $deletedAt,
    )
    {
    }

    public static function fromModel(Contact $contact)
    {
        return new self($contact->id,
            $contact->getNameAttribute(),
            $contact->phone,
            $contact->city,
            $contact->deleted_at);
    }
}
