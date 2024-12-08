<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $transaction_id
 * @property string $card_holder_name
 * @property string $card_number
 * @property string $card_exp
 * @property string $card_cvv
 * @property float $amount
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Subscription $subscription
 */
class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'card_holder_name',
        'card_number',
        'card_exp',
        'card_cvv',
        'amount',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'card_number' => 'encrypted',
        ];
    }

    /**
     * Subscription relationship.
     *
     * @return BelongsTo
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
