<?php

declare(strict_types=1);

namespace App\Model;



/**
 * @property int $id 
 * @property int $org_id 所属机构
 * @property int $ear_number 耳号
 * @property int $sex 公母:1公2母
 * @property int $strain 品系
 * @property int $varieties 品种
 * @property int $cate 品类
 * @property string $birth_weight 出生体重kg
 * @property int $birthday 出生日期
 * @property string $weight 体重kg
 * @property int $fence_id 栏舍id
 * @property int $into_time 入场日期
 * @property int $parity 胎次
 * @property int $source 来源
 * @property int $source_day 断奶日龄
 * @property string $source_weight 断奶体重
 * @property int $event 事件
 * @property int $event_time 事件时间
 * @property int $lactation_day 泌乳天数
 * @property string $semen_num 冻精编号
 * @property int $is_wear 是否佩戴电子设备
 * @property int $batch_id 批次id
 * @property string $imgs 照片
 * @property int $is_ele_auth 是否电子认证
 * @property int $is_qua_auth 是否检疫认证
 * @property int $is_delete 删除时间
 * @property int $is_out 离栏时间
 * @property int $create_uid 创建人
 * @property int $create_time 创建时间
 * @property int $algebra 代数
 * @property int $descent 血统纯度 1纯血2杂交3混血
 * @property string $colour 花色描述
 * @property string $info_weight 入栏体重kg
 * @property int $is_vaccin 是否防疫
 * @property int $is_insemination 是否冷配
 * @property int $is_insure 是否投保
 * @property int $is_mortgage 是否抵押
 * @property int $update_time 更新时间
 */
class IotCattle extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'iot_cattle';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'org_id' => 'integer', 'ear_number' => 'integer', 'sex' => 'integer', 'strain' => 'integer', 'varieties' => 'integer', 'cate' => 'integer', 'birthday' => 'integer', 'fence_id' => 'integer', 'into_time' => 'integer', 'parity' => 'integer', 'source' => 'integer', 'source_day' => 'integer', 'event' => 'integer', 'event_time' => 'integer', 'lactation_day' => 'integer', 'is_wear' => 'integer', 'batch_id' => 'integer', 'is_ele_auth' => 'integer', 'is_qua_auth' => 'integer', 'is_delete' => 'integer', 'is_out' => 'integer', 'create_uid' => 'integer', 'create_time' => 'integer', 'algebra' => 'integer', 'descent' => 'integer', 'is_vaccin' => 'integer', 'is_insemination' => 'integer', 'is_insure' => 'integer', 'is_mortgage' => 'integer', 'update_time' => 'integer'];
}
