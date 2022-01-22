<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Services\ShopService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopService;


    public function __construct(ShopService $shopService)
    {

        $this->shopService = $shopService;
    }

    public function index(Request $request, $categoryName)
    {

        // $search = $request->search ?? '';

        // $products = Product::where('name' , 'like', '%'. $search . '%');

        //get category
        $category = Category::where('slug', $categoryName)->firstOrFail();

        //Get Category
        $categories = Category::orderBy('id', 'asc')->get();


        //Get Product
        $products = Category::where('slug', $categoryName)->first()->products->toQuery();

        //Fillter
        $products = $this->Filter($products, $request);

        $products = $products->paginate(5);

        if ($request->ajax()) {
            $view = view('page.listProduct', compact('products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('page.shop', [
            'title' => $category->name,
            'categories' => $categories,
            'products' => $products,
            'category' => $category,

        ]);
    }



    public function Filter($products, Request $request)
    {
        //filter price ,sortBy ,ram
        $price = $request->query('price');
        $sortBy = $request->sortBy;
        $ram = $request->ram;
        $capacity = $request->capacity;
        $screen_size = $request->screen_size;
        $type = $request->type;

        if ($price) {
            switch ($price) {
                case 1:
                    $products->where('price', '<=', 3000000);
                    break;
                case 2:
                    $products->whereBetween('price', [6000000, 9000000]);
                    break;
                case 3:
                    $products->whereBetween('price', [9000000, 12000000]);
                    break;
                case 4:
                    $products->whereBetween('price', [12000000, 15000000]);
                    break;
                case 5:
                    $products->where('price', '>', 15000000);
                    break;
            }
        }

        if ($sortBy) {
            switch ($sortBy) {
                case 'desc':
                    $products->orderBy('price', 'desc');
                    break;

                case 'asc':
                    $products->orderBy('price');
                    break;

                case 'discount':
                    $products->where('discount', '!=', null);
                    break;

                case 'new':
                    $products->orderBy('id');
                    break;

                case 'default':
                    $products->orderBy('id', 'desc');
                    break;
            }
        }

        if ($ram) {
            switch ($ram) {
                case '1':
                    $products = $ram != null ? $products->whereHas('productDetails', function ($query) use ($ram) {
                        return $query->where('ram', '<', 4)->where('qty', '>', 0);
                    })
                        : $products;
                    break;

                case '2':
                    $products = $ram != null ? $products->whereHas('productDetails', function ($query) use ($ram) {
                        return $query->whereBetween('ram', [4, 6])->where('qty', '>', 0);
                    })
                        : $products;
                    break;
                case '3':
                    $products = $ram != null ? $products->whereHas('productDetails', function ($query) use ($ram) {
                        return $query->whereBetween('ram', [8, 12])->where('qty', '>', 0);
                    })
                        : $products;
                    break;
                case '4':
                    $products = $ram != null ? $products->whereHas('productDetails', function ($query) use ($ram) {
                        return $query->where('ram', '>', 12)->where('qty', '>', 0);
                    })
                        : $products;
            }
        }

        if ($capacity) {
            switch ($capacity) {
                case '1':
                    $products = $capacity != null ? $products->whereHas('productDetails', function ($query) use ($capacity) {
                        return $query->where('capacity', '<', 32)->where('qty', '>', 0);
                    })
                        : $products;
                    break;

                case '2':
                    $products = $capacity != null ? $products->whereHas('productDetails', function ($query) use ($capacity) {
                        return $query->whereBetween('capacity', [32, 64])->where('qty', '>', 0);
                    })
                        : $products;
                    break;
                case '3':
                    $products = $capacity != null ? $products->whereHas('productDetails', function ($query) use ($capacity) {
                        return $query->whereBetween('capacity', [128, 256])->where('qty', '>', 0);
                    })
                        : $products;
                    break;
                case '4':
                    $products = $capacity != null ? $products->whereHas('productDetails', function ($query) use ($capacity) {
                        return $query->where('capacity', '>', 512)->where('qty', '>', 0);
                    })
                        : $products;
            }
        }

        if ($screen_size) {
            switch ($screen_size) {
                case '1':
                    $products = $screen_size != null ? $products->whereHas('productDetails', function ($query) use ($screen_size) {
                        return $query->where('screen_size', '<', 6)->where('qty', '>', 0);
                    })
                        : $products;
                    break;

                case '2':
                    $products = $screen_size != null ? $products->whereHas('productDetails', function ($query) use ($screen_size) {
                        return $query->where('screen_size', '>=', 6)->where('qty', '>', 0);
                    })
                        : $products;
                    break;
            }
        }

        if ($type) {
            $products = $type != null ? $products->whereHas('brand', function ($query) use ($type) {
                return $query->where('name', $type);
            })
                : $products;
        }


        return $products;
    }
}



// $artilces = '';
        // if ($request->ajax()) {
        //     foreach ($products as $product) {

        //         //rating
        //         $avgRating = 0;
        //         $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        //         $countRating = count($product->productComments);
        //         if ($countRating != 0) {
        //             $avgRating = $sumRating / $countRating;
        //         }
        //         $artilces .= '
        //             <div class="pro-item bsize fleft">
        //                 <a href="/detail/' . $product->slug . '/' . $product->id . '" class="pro-item-thumb thumb-cover">
        //                     <div class="pro-item-thumb-inner">
        //                         <img src="' . $product->image . '" alt="">';
        //         if (isset($product->discount)) {
        //             $artilces .= ' <span class="pro-item-sale">Giảm ' . ceil(100 - ($product->price) * 100 / ($product->discount)) . '%</span>';
        //         }

        //         $artilces .= '</div>
        //                 </a>
        //                 <div class="pro-item-info">
        //                     <h2 class="pro-item-title">
        //                         <a href="">' . $product->name . '</a>
        //                     </h2>
        //                     <div class="pro-item-price">';
        //         if (isset($product->discount)) {
        //             $artilces .= '<span class="pro-item-price-ins">' . number_format($product->price, 0, ',', '.') . 'đ</span>
        //                             <span class="pro-item-price-del">' . number_format($product->discount, 0, ',', '.') . 'đ</span>';
        //         } else {
        //             $artilces .= '<span class="pro-item-price-ins">' . number_format($product->price, 0, ',', '.') . 'đ</span>';
        //         }


        //         $artilces .= '</div>
        //                     <div class="pro-item-des">
        //                         ' . $product->description . '
        //                     </div>';
        //         if (count($product->productComments) != 0) {
        //             $artilces .= '<div class="pro-item-star">
        //                         <span class="pro-item-start-rating">';
        //             for ($i = 1; $i <= 5; $i++) {
        //                 if ($i <= $avgRating) {
        //                     $artilces .= '<i class="star-bold far fa-star"></i>';
        //                 } else {
        //                     $artilces .= '<i class="far fa-star"></i>';
        //                 }
        //             }

        //             $artilces .= '</span>
        //             <span>
        //                 ' . count($product->productComments) . ' đánh giá
        //             </span>
        //         </div>';
        //         }

        //         $artilces .= '</div>
        //             </div><!-- end pro-item -->
        //         ';
        //     }
        //     return $artilces;
        // }