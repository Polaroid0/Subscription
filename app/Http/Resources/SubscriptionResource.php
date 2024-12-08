<?php

namespace App\Http\Resources;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Subscription */
class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'subscription_plan' => $this->relationLoaded('subscriptionPlan') ? SubscriptionPlanResource::make($this->subscriptionPlan) : null,
            'payment_id' => $this->payment_id,
            'end_date' => $this->end_date->format('d.m.Y H:i'),
        ];
    }
}
