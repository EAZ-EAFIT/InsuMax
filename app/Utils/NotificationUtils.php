<?php

namespace App\Utils;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class NotificationUtils
{
    public static function updateNotificationsDate(Collection $notifications): void
    {

        foreach ($notifications as $notification) {
            $originalDate = $notification->getDate();
            $notificationDate = Carbon::parse($notification->getDate());

            while ($notificationDate->lessThan(Carbon::today())) {
                $notificationDate->addDays($notification->getTimeInterval());
                $notification->setDate($notificationDate->toDateString());
            }

            if ($notification->getDate() !== $originalDate) {
                $notification->save();
            }
        }
    }

    public static function retrieveExpiringNotifications(Collection $notifications): array
    {
        $nextNotifications = [];

        foreach ($notifications as $notification) {
            $notificationDate = Carbon::parse($notification->getDate());
            if ($notificationDate->lessThan(Carbon::today()->addDays(6))) {
                $remainingDays = Carbon::today()->diffInDays($notificationDate, false);
                $nextNotifications[$notification->getProduct()->getName()] = $remainingDays;
            }
        }

        return $nextNotifications;
    }

}

