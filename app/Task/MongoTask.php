<?php

declare(strict_types=1);

namespace App\Task;

use Hyperf\Task\Annotation\Task;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;
use MongoDB\Driver\WriteConcern;
use MongoDB\Client;

class MongoTask
{
    public Client $client;

    #[Task]
    public function select()
    {
        $databaseName = 'aiotagro';
        $collectionName = 'farm';
        // 选择集合
        // $filter = ['name' => '玉山•吐合提'];
        // $options = [];

        // 查询文档
        $db = $this->client->{$databaseName};
        $collection = $db->{$collectionName};
        $result = $collection->findOne(['name' => '玉山•吐合提']);
        echo $result['name'] . ', ' . $result['age'];
        return $result;
    }

    protected function client()
    {
        if ($this->client instanceof Client) {
            return $this->client;
        }
        $uri = 'mongodb://root:aiotagro@192.168.0.104:27017/aiotagro';
        return $this->client = new Client($uri, []);
        // return $this->manager = new Client('default');
    }
}
