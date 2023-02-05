<?php

namespace App\Data;

use App\Models\Organization;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class OrganizationData extends Data
{

    public function __construct(
        //
        public                $id,
        #[MapName("account_id")]
        public                $accountId,
        public                $name,
        public                $email,
        public                $phone,
        public                $address,
        public                $city,
        public                $region,
        public                $country,
        #[MapName("postal_code")]
        public                $postalCode,
        #[MapName("created_at")]
        public                $createdAt,
        #[MapName("updated_at")]
        public                $updatedAt,
        #[MapName("deleted_at")]
        public                $deletedAt,
        #[DataCollectionOf(OrganizationData::class)]
        public DataCollection $contacts
    )
    {
    }


    public static function fromModel(Organization $organization): self
    {
        return new self(
            $organization->id,
            $organization->account_id,
            $organization->name,
            $organization->email,
            $organization->phone,
            $organization->address,
            $organization->city,
            $organization->region,
            $organization->country,
            $organization->postal_code,
            $organization->created_at,
            $organization->updated_at,
            $organization->deleted_at,
            OrganizationContactsData::collection($organization->contacts()->orderByName()->get())
        );
    }
}
