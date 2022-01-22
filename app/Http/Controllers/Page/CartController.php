<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' =>  $id,
            'name' =>  $product->name,
            'qty' =>  1,
            'price' =>  $product->discount ?? $product->price,
            'weight' =>  0,
            'options' => [
                'image' => $product->image,
                'giagoc' => $product->price,
                'color' => $request->color,
                'capacity' => $request->capacity,
            ],
        ]);


        return back();
    }

    public function buyNow(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        Cart::add([
            'id' =>  $id,
            'name' =>  $product->name,
            'qty' =>  1,
            'price' =>  $product->discount ?? $product->price,
            'weight' =>  0,
            'options' => [
                'image' => $product->image,
                'giagoc' => $product->price,
                'color' => $request->color ?? '...',
                'capacity' => $request->capacity ?? '...',
            ],
        ]);



        return redirect('/cart');
    }

    public function cart()
    {
        $carts = Cart::content();

        return view('page.cart', [
            'title' => 'Cart',
            'carts' => $carts,
        ]);
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return back();
    }

    public function destroy()
    {
        Cart::destroy();

        return back();
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }

    //CHECKOUT
    public function addOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            // 1.Add Order
            $order = Order::create($request->all());

            //2.Add OrderDetail
            $carts = Cart::content();

            foreach ($carts as $cart) {
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'qty' => $cart->qty,
                    'amount' => $cart->price,
                    'total' => $cart->price * $cart->qty,
                ];
                OrderDetail::create($data);
            }

            //3.Gửi Mail
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            // $this->sendMail($order, $total, $subtotal);
            SendMail::dispatch($request->input('email'), $request->input('name'))
                ->delay(now()->addSeconds(2));

            DB::commit();

            //4.Xóa Cart khi submit sp xong
            Cart::destroy();
            //5.Trả về kết quả
            return redirect('cart/result')->with('notification', 'Đặt hàng thành công !');
        } catch (\Exception $err) {
            //throw $th;
            DB::rollback();
            session()->flash('error', 'Đặt hàng lỗi , Vui lòng thử lại sau !');

            return false;
        }
    }

    //Send mail
    private function sendMail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('page.checkout.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
            $message->from('xuantruong0302001@gmail.com', 'CellPhones');
            $message->to($email_to, $email_to);
            $message->subject('Lời cảm ơn !');
        });
    }

    public function result()
    {

        $notification = session('notification');
        return view('page.checkout.result', [
            'notification' => $notification,
            'title' => 'CheckOut'
        ]);
    }
}
