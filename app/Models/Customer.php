<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class Customer extends Model
{
    /**
     * CUSTOMER ATTRIBUTES
     * $this->attributes['id'] - int - contains the customer primary key (id)
     * $this->attributes['username'] - string - contains the customer username
     * $this->attributes['password'] - string - contains the customer password
     * $this->attributes['name'] - string - contains the customer name
     * $this->attributes['email'] - string - contains the customer email
     * $this->attributes['address'] - string - contains the customer address
     * $this->attributes['created_at'] - string - contains the timestamp of creation
     * $this->attributes['updated_at'] - string - contains the timestamp of updates
     * this->orders - Order[] - contains the associated orders
     * this->wishlists - Wishlist[] - contains the associated wishlists
     * this->notifications - Notification[] - contains the associated notifications
     */
    protected $fillable = ['username', 'password', 'name', 'email', 'address'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'username' => 'required|string|min:4|max:20|alpha_num|unique:customers,username',
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:customers,email',
            'address' => 'required|string|max:255',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    public function setUsername(string $username): void
    {
        $this->attributes['username'] = $username;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getWishlists(): Collection
    {
        return $this->wishlists;
    }

    public function setWishlists(Collection $wishlists): void
    {
        $this->wishlists = $wishlists;
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
