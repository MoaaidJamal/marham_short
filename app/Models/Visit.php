<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Visit
 *
 * @property int $id
 * @property int|null $link_id
 * @property string|null $request_method
 * @property string|null $device
 * @property string|null $protocol
 * @property string|null $user_agent
 * @property string|null $ip
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Link|null $link
 * @package App\Models
 * @property-read mixed $status_value
 * @method static \Database\Factories\VisitFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit newQuery()
 * @method static \Illuminate\Database\Query\Builder|Visit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereProtocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereRequestMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visit whereUserAgent($value)
 * @method static \Illuminate\Database\Query\Builder|Visit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Visit withoutTrashed()
 */
class Visit extends Model
{
	use SoftDeletes;
	use HasFactory;
	protected $table = 'visits';

	protected $casts = [
		'link_id' => 'int'
	];

	protected $fillable = [
		'link_id',
		'request_method',
		'device',
		'protocol',
		'user_agent',
		'ip'
	];

	public function link()
	{
		return $this->belongsTo(Link::class);
	}
}
