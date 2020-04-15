<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Context\Order\Models{
/**
 * App\Context\Reservation\Models\Reservation
 *
 * @property int $id
 * @property string $uuid
 * @property string $event_uuid
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereProductUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\Order whereUuid($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App\Context\Order\Models{
/**
 * App\Context\Reservation\Models\EventAvailability
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\ProductStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\ProductStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Order\Models\ProductStock query()
 */
	class EventAvailability extends \Eloquent {}
}

namespace App\Context\Product\Models{
/**
 * App\Context\Event\Models\Event
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Product\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Product\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Context\Product\Models\Product query()
 */
	class Event extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUuid($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUuid($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

