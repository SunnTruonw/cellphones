<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug, $id)
    {
        $product = Product::findOrFail($id);

        //rating
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRating = count($product->productComments);
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        $productColors = array_unique(array_column($product->productDetails->toArray(), 'color'));
        $productCapacitys = array_unique(array_column($product->productDetails->toArray(), 'capacity'));
        //related product
        $relatedProducts = Product::orderBy('id', 'desc')->where('category_id', $product->category_id)->where('id', '!=', $id)->take(5)->get();

        return view('page.detail', [
            'title' => $product->name,
            'product' => $product,
            'avgRating' => $avgRating,
            'relatedProducts' => $relatedProducts,
            'productColors' => $productColors,
            'productCapacitys' => $productCapacitys,
        ]);
    }

    public function sendComment(Request $request)
    {

        $product_id  = $request->product_id;
        $comment_name  = $request->comment_name;
        $comment_content  = $request->comment_content;
        $comment_phone  = $request->comment_phone;
        $comment_rating  = $request->comment_rating;



        $comment = new ProductComment();

        $comment->product_id = $product_id;
        $comment->name = $comment_name;
        $comment->phone = $comment_phone;
        $comment->rating = $comment_rating;

        $comment->messages = $comment_content;


        $comment->save();

        session()->flash('success', 'Gửi phản hồi thành công !');
    }

    public function loadComment(Request $request)
    {
        $product_id  = $request->input('product_id');

        $comments = ProductComment::where('product_id', $product_id)->orderBy('id', 'desc')->get();

        $output = '';
        foreach ($comments as $comment) {
            $output .= '
            
                
            <div class="item-vote fleft">
                <div class="item-vote-header">
                    <div class="item-vote-title-left fleft">
                        <span class="item-vote-avatar">' . ucfirst(substr("$comment->name", 0, 1)) . '</span>
                        <span class="item-vote-user">' . $comment->name . '</span>
                    </div>
                    <div class="item-vote-time-right fright">
                        <i class="fal fa-clock"></i>
                        ' . $comment->created_at . '
                    </div>
                    <div class="cboth"></div>
                </div>
                <div class="item-vote-info">
                    <div class="item-vote-raiting">
                        <strong>Đánh giá:</strong>
                            <span class="pro-item-start-rating">';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $comment->rating) {
                    $output .= '<i class="star-bold far fa-star"></i>';
                } else {
                    $output .= '<i class="far fa-star"></i>';
                }
            }

            $output .= '</span>
                    </div>
                    <div class="item-vote-question">
                        <strong>Nhận xét:</strong>
                        ' . $comment->messages . '
                    </div>
                </div>
            </div><!--end item-vote --> 
            
            ';
        }

        return $output;
    }
}
