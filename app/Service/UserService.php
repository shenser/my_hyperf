<?php
declare(strict_types=1);
/*
 * @Author: shenqy
 * @Date: 2023-04-27 19:37:56
 * @FilePath: \hyperf-skeleton\app\Service\UserService.php
 * @Description: 
 */
namespace App\Service;

use App\Model\User;

class UserService
{
    public function getInfoById(int $id)
    {
        return ['id' => $id, 'name' => 'bbb'];   
    }

    public function getUserInfo()
    {
        $user = User::query()->find(2);
        // $freshUser = $user->fresh();
        // $user = User::firstOrNew(['name' => 'Hyperf']);
        // $user = User::firstOrCreate(
        //     ['name' => 'Hyperf'],
        //     ['gender' => 1, 'age' => 20]
        // );
        // User::destroy(2);
        return $user;
    }
}