<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Notification extends Model
{
    /**
     * NOTIFICATION ATTRIBUTES
     * $this->attributes['id'] - int - contains the notification primary key (id)
     * $this->attributes['notification_date'] - string - contains the notification date
     * $this->attributes['time_interval'] - int - contains the time interval
     * $this->attributes['quantity'] - int - contains the quantity
     * $this->product - Product - contains the associated product
     * $this->customer - Customer - contains the associated customer
     */
    protected $fillable = ['notification_date', 'time_interval', 'quantity', 'product_id', 'customer_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'notification_date' => 'required|date',
            'time_interval' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getNotificationDate(): string
    {
        return $this->attributes['notification_date'];
    }

    public function getTimeInterval(): int
    {
        return $this->attributes['time_interval'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setNotificationDate(string $date): void
    {
        $this->attributes['notification_date'] = $date;
    }

    public function setTimeInterval(int $interval): void
    {
        $this->attributes['time_interval'] = $interval;
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public static function createNotification(array $data): self
    {
        return self::create($data);
    }

    public static function getNotification(int $id): ?self
    {
        return self::find($id);
    }

    public static function updateNotification(int $id, array $data): bool
    {
        $notification = self::find($id);

        return $notification ? $notification->update($data) : false;
    }

    public static function deleteNotification(int $id): bool
    {
        return self::destroy($id) > 0;
    }

    public function notify(): void
    {
        $customer = $this->getCustomer();

        $toEmail = $customer->getEmail();
        $subject = 'Product Notification';
        $message = 'Hello '.$customer->getName().",\n\n"
            .'This is a reminder for the product: '.$this->getProduct()->getName().".\n"
            .'Quantity: '.$this->getQuantity()."\n"
            .'Notification Date: '.$this->getNotificationDate()."\n\n"
            .'Thank you for using our service!';

        \Mail::raw($message, function ($mail) use ($toEmail, $subject) {
            $mail->to($toEmail)
                ->subject($subject);
        });
    }
    public function shouldShowBanner(): bool
    {
        $notificationDate = Carbon::parse($this->getNotificationDate());
        $today = Carbon::today();

        return $today->between(
            $notificationDate->copy()->subDays(5),
            $notificationDate->copy()->addDays(5)
        );
    }

    public static function getBannerNotificationsForUser($customerId)
    {
        $today = Carbon::today();
        $start = $today->copy()->subDays(5);
        $end = $today->copy()->addDays(5);

        return self::where('customer_id', $customerId)
            ->whereBetween('notification_date', [$start, $end])
            ->with('product')
            ->get();
    }
}
