<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Link
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $link
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Visit[] $visits
 * @package App\Models
 * @property-read mixed $status_value
 * @property-read int|null $visits_count
 * @method static \Database\Factories\LinkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Link hidden()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Query\Builder|Link onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Link withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Link withoutTrashed()
 */
class Link extends Model
{
	use SoftDeletes;
	use HasFactory;
	protected $table = 'links';

	protected $fillable = [
		'code',
		'link'
	];

	public function visits()
	{
		return $this->hasMany(Visit::class);
	}
}
