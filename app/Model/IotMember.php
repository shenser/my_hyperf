<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Scout\Builder;
use Hyperf\Scout\Searchable;

/**
 * @property int $uid 
 * @property string $username 用户名
 * @property string $mobile 手机号
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string $salt 
 * @property int $mtype 权限
 * @property int $regtime 注册时间
 * @property string $lat 纬度
 * @property string $lon 经度
 * @property string $pre 
 * @property string $money 余额
 * @property string $jifen 积分
 * @property string $paypassword 支付密码
 * @property int $fid 父级uid
 * @property string $wxid 微信号
 * @property string $wxusername 微信昵称
 * @property string $realname 真是姓名
 * @property string $psalt 
 * @property string $beizu 备注
 * @property string $zuobiao 位置信息
 * @property int $mid 
 * @property string $city 城市
 * @property string $tel_province 归属地 省份
 * @property string $tel_city 归属地 城市
 * @property string $tel_operator 运营商
 * @property int $uniacid 统一ID
 * @property string $qrcodeurl 二维码跳转地址
 * @property string $pushurl 推送接口
 * @property int $vip B端id
 * @property string $token 用户唯一标识码
 * @property string $secretkey 用户秘钥
 * @property string $jx_secretkey 精讯秘钥
 * @property int $status 账号状态 1启用 0禁用
 * @property int $reg_status 注册审核状态 0待审核 1审核通过
 * @property int $cate 账户所属：1自有，2农场，3保险，4银行，5政府
 * @property int $type 农场权限：0 所有 1畜牧 2家禽
 * @property int $org_id 所属一级组织id
 * @property int $role_id 角色岗位id
 * @property string $user_sn 员工编号
 * @property string $pid 推广上级uid
 * @property int $exp_time 过期时间
 * @property string $aepLoginUser AEP天翼账号
 * @property string $id_card 身份证号
 * @property string $project_name 项目名称
 */
class IotMember extends Model
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
    protected string $primaryKey = 'uid';
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'iot_member';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['uid', 'username', 'mobile', 'email', 'password', 'salt', 'mtype', 'regtime', 'lat', 'lon', 'pre', 'money', 'jifen', 'paypassword', 'fid', 'wxid', 'wxusername', 'realname', 'psalt', 'beizu', 'zuobiao', 'mid', 'city', 'tel_province', 'tel_city', 'tel_operator', 'uniacid', 'qrcodeurl', 'pushurl', 'vip', 'token', 'secretkey', 'jx_secretkey', 'status', 'reg_status', 'cate', 'type', 'org_id', 'role_id', 'user_sn', 'pid', 'exp_time', 'aepLoginUser', 'id_card', 'project_name'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['uid' => 'integer', 'mtype' => 'integer', 'regtime' => 'integer', 'fid' => 'integer', 'mid' => 'integer', 'uniacid' => 'integer', 'vip' => 'integer', 'status' => 'integer', 'reg_status' => 'integer', 'cate' => 'integer', 'type' => 'integer', 'org_id' => 'integer', 'role_id' => 'integer', 'exp_time' => 'integer'];
}
