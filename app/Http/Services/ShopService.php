<?php

namespace App\Http\Services;

use App\Models\Product;

class ShopService
{

    const LIMIT = 5;

    public function get($page = null)
    {

        return Product::orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }
}
