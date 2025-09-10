<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Wishlist extends Model
{
    /**
     * WISHLIST ATTRIBUTES
     * $this->attributes['id'] - int - contains the wishlist primary key (id)
     * $this->attributes['name'] - string - contains the wishlist name
     * $this->attributes['created_at'] - string - contains the timestamp of creation
     * $this->attributes['updated_at'] - string - contains the timestamp of updates
     * this->customer - Customer - contains the associated customer
     * this->products - Product[] - contains the associated products
     */
    protected $fillable = ['name'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function setProducts(Collection $products): void
    {
        $this->products()->sync($products->pluck('id')->toArray());
    }
}
