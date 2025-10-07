<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Notification extends Model
{
    /**
     * NOTIFICATION ATTRIBUTES
     * $this->attributes['id'] - int - contains the notification primary key (id)
     * $this->attributes['date'] - string - contains the notification date
     * $this->attributes['time_interval'] - int - contains the time interval
     * $this->attributes['quantity'] - int - contains the quantity
     * $this->attributes['created_at'] - string - contains the timestamp of creation
     * $this->attributes['updated_at'] - string - contains the timestamp of updates
     * $this->product - Product - contains the associated product
     * $this->user - User - contains the associated user
     */
    protected $fillable = ['date', 'time_interval', 'quantity', 'product_id', 'user_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'date' => 'required|date',
            'timeInterval' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'productId' => 'required|exists:products,id',
            'userId' => 'required|exists:users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getDate(): string
    {
        return $this->attributes['date'];
    }

    public function setDate(string $date): void
    {
        $this->attributes['date'] = $date;
    }

    public function getTimeInterval(): int
    {
        return $this->attributes['time_interval'];
    }

    public function setTimeInterval(int $interval): void
    {
        $this->attributes['time_interval'] = $interval;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    // Relationships

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
