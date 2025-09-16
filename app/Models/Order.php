<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total'] - int - contains the order total
     * $this->attributes['has_shipped'] - bool - indicates if the order has shipped
     * $this->attributes['payment_type'] - string - contains the payment type
     * $this->attributes['created_at'] - string - contains the timestamp of creation
     * $this->attributes['updated_at'] - string - contains the timestamp of updates
     * $this->customer - Customer - contains the associated customer
     * $this->items - Item[] - contains the associated items
     */
    protected $fillable = ['total', 'has_shipped', 'payment_type', 'customer_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'total' => 'required|integer|min:0',
            'has_shipped' => 'required|boolean',
            'payment_type' => 'required|string|max:50',
            'customer_id' => 'required|exists:customers,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function getHasShipped(): bool
    {
        return $this->attributes['has_shipped'];
    }

    public function getPaymentType(): string
    {
        return $this->attributes['payment_type'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function setHasShipped(bool $hasShipped): void
    {
        $this->attributes['has_shipped'] = $hasShipped;
    }

    public function setPaymentType(string $paymentType): void
    {
        $this->attributes['payment_type'] = $paymentType;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function cancelOrder(): void
    {
        $this->setHasShipped(false);
        $this->save();
    }

    public function calculateTotal(): int
    {
        $total = 0;
        foreach ($this->getItems() as $item) {
            $total += $item->getPrice() * $item->getQuantity();
        }
        $this->setTotal($total);

        return $total;
    }

    public function pay(): void
    {
        $this->setHasShipped(true);
        $this->save();
    }
}
