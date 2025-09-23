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
     * $this->attributes['hasShipped'] - bool - indicates if the order has shipped
     * $this->attributes['created_at'] - string - contains the timestamp of creation
     * $this->attributes['updated_at'] - string - contains the timestamp of updates
     * $this->user - User - contains the associated user
     * $this->items - Item[] - contains the associated items
     */
    protected $fillable = ['has_shipped', 'user_id', 'total'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'total' => 'required|integer|min:0',
            'hasShipped' => 'required|boolean',
            'userId' => 'required|exists:users,id',
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

    public function getDollarTotal(): float
    {
        return $this->attributes['total'] / 100;
    }

    public function getHasShipped(): bool
    {
        return $this->attributes['hasShipped'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getUser(): User
    {
        return $this->user;
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
        $this->attributes['hasShipped'] = $hasShipped;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setItems(Collection $items): void
    {
        $this->items()->saveMany($items);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
