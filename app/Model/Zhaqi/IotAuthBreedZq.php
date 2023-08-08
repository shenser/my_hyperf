<?php

declare(strict_types=1);

namespace App\Model\Zhaqi;

use App\Model\Model;

/**
 * @property int $id 
 * @property int $cate 
 * @property int $pid 
 * @property string $name 
 * @property string $icon 
 * @property string $url 
 * @property int $status 
 * @property int $sort 
 */
class IotAuthBreedZq extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'iot_auth_breed_zq';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'cate' => 'integer', 'pid' => 'integer', 'status' => 'integer', 'sort' => 'integer'];
}
