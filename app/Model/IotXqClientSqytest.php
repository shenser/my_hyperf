<?php

declare(strict_types=1);

namespace App\Model;
use Hyperf\Scout\Searchable;


/**
 * @property int $id 
 * @property int $source_id 物联网系统ID
 * @property int $sn 设备编号
 * @property string $deviceId 设备ID
 * @property int $msg_id 消息类型
 * @property string $longitude 经度
 * @property string $latitude 纬度
 * @property string $altitude 海拔高度
 * @property int $nsat 搜索到的卫星数
 * @property string $rsrp 网络信号强度
 * @property string $battery 电池电压
 * @property string $temperature 温度
 * @property int $steps 步数
 * @property string $acc_x 加速度值：X轴
 * @property string $acc_y 加速度值：Y轴
 * @property string $acc_z 加速度值：Z轴
 * @property int $bandge_status 绑带状态：0->断开 1->链接
 * @property string $ver 版本号
 * @property int $timestamp 时间戳
 * @property string $date 
 * @property string $wifi_data wifi信息
 * @property string $nb_data nb信息
 * @property string $gps_state 定位状态
 * @property string $txt 
 */
class IotXqClientSqytest extends Model
{
    use Searchable;
    /**
     * The table associated with the model.
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    
    protected ?string $table = 'iot_xq_client_sqytest';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'source_id' => 'integer', 'sn' => 'integer', 'msg_id' => 'integer', 'nsat' => 'integer', 'steps' => 'integer', 'bandge_status' => 'integer', 'timestamp' => 'integer'];
}
