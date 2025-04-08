<?php

declare(strict_types=1);

namespace JeffreyVanHees\LaravelOpp\Data\Responses;

use DateTime;
use JeffreyVanHees\LaravelOpp\Enums\MerchantSettlementStatus;
use JsonException;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Http\Response;
use Saloon\Traits\Responses\HasResponse;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

final class MerchantSettlementResponseData extends Data implements WithResponse
{
    use HasResponse;

    public function __construct(
        public string $uid,
        public MerchantSettlementStatus $status,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'UTC', format: 'U')] public DateTime $created,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'UTC', format: 'U')] public string $updated,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'UTC', format: 'U')] public ?string $paid,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'UTC', format: 'U')] public string $period_start,
        #[WithCast(DateTimeInterfaceCast::class, timeZone: 'UTC', format: 'U')] public string $period_end,
        public string $payout_type,
        public ?string $po_number,
        public int $number_of_transactions,
        public int $transaction_volume,
        public int $transaction_costs,
        public int $total_number_of_transactions,
        public int $number_of_refunds,
        public int $refund_volume,
        public int $refund_costs,
        public int $number_of_withdrawals,
        public int $withdrawal_volume,
        public int $withdrawal_costs,
        public int $number_of_mandates,
        public int $mandate_volume,
        public int $mandate_costs,
        public int $number_of_internal_transfers,
        public int $internal_transfer_volume,
        public int $internal_transfer_costs,
        public int $number_of_multi_transactions,
        public int $multi_transaction_volume,
        public int $multi_transaction_costs,
        public int $total_order_fees,
        public int $total_refund_fees,
        public int $total_gateway_fees,
        public int $total_volume,
        public int $total_amount,
        public string $currency,
    ) {
        // ...
    }

    /**
     * Create new instance from response.
     *
     * @throws JsonException
     */
    public static function fromResponse(Response $response): self
    {
        return self::from($response->json());
    }
}
