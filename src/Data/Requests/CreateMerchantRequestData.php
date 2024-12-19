<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Requests;

use JeffreyVanHees\LaravelOpp\Enums\Country;
use JeffreyVanHees\LaravelOpp\Enums\Locale;
use JeffreyVanHees\LaravelOpp\Enums\MerchantLegalEntity;
use JeffreyVanHees\LaravelOpp\Enums\MerchantType;
use Spatie\LaravelData\Attributes;
use Spatie\LaravelData\Data;

final class CreateMerchantRequestData extends Data
{
    public function __construct(
        #[Attributes\MapOutputName('type')]
        public MerchantType $type,

        #[Attributes\MapOutputName('country')]
        public Country $country,

        #[Attributes\MapOutputName('locale')]
        public Locale $locale,

        #[Attributes\MapName('name_first')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::CONSUMER)]
        public ?string $firstName,

        #[Attributes\MapName('name_last')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::CONSUMER)]
        public ?string $lastName,

        #[Attributes\MapName('coc_nr')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::BUSINESS)]
        public ?string $cocNr,

        #[Attributes\MapName('vat_nr')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::BUSINESS)]
        public ?string $vatNr,

        #[Attributes\MapName('legal_name')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::BUSINESS)]
        public ?string $legalName,

        #[Attributes\MapName('legal_entity')]
        #[Attributes\Validation\RequiredIf('type', MerchantType::BUSINESS)]
        public ?MerchantLegalEntity $legalEntity,

        #[Attributes\MapName('emailaddress')]
        public string $email,

        #[Attributes\MapName('phone')]
        public string $phone,

        #[Attributes\MapName('metadata')]
        public array $metadata = [],
    ) {
        // ...
    }
}
