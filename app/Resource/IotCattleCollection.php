<?php

namespace App\Resource;

use Hyperf\Resource\Json\ResourceCollection;

class IotCattleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
