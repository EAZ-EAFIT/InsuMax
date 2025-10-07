<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['keywords'] - string - contains the product keywords
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['inventory'] - int - contains the product inventory
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated items
     * $this->wishlists - Wishlist[] - contains the associated wishlists
     * $this->notifications - Notification[] - contains the associated notifications
     */
    protected $fillable = ['name', 'description', 'keywords', 'image', 'inventory', 'price'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'keywords' => 'nullable|string|max:255',
            'inventory' => 'required|integer|min:0',
            'price' => 'required|integer|gt:0',
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

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getKeywords(): string
    {
        return $this->attributes['keywords'];
    }

    public function setKeywords(string $keywords): void
    {
        $this->attributes['keywords'] = $keywords;
    }

    public function getImage(): string
    {
        return '/storage/'.$this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getInventory(): int
    {
        return $this->attributes['inventory'];
    }

    public function setInventory(int $inventory): void
    {
        $this->attributes['inventory'] = $inventory;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function getDollarPrice(): float
    {
        return $this->attributes['price'] / 100;
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
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

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Wishlist::class);
    }

    public function getWishlists(): Collection
    {
        return $this->wishlists;
    }

    public function setWishlists($wishlists): void
    {
        $this->wishlists()->sync($wishlists->pluck('id')->toArray());
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function setNotifications(Collection $notifications): void
    {
        $this->notifications = $notifications;
    }
}
