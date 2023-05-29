<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_pay'));

        $code = 'HISTORE' . mt_rand(0000000, 9999999);
        $carts = Cart::with(['product', 'user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => $request->insurance_price,
            'tax_price' => $request->tax_price,
            'total_price' => $request->total_price,
            'total_pay' => $request->total_pay,
            'transaction_status' => "PENDING",
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'HITRX' . mt_rand(0000000, 9999999);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx,
            ]);
        }

        Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)
            ->delete();

        return view('pages.cart', [
            'carts' => $carts
        ]);
    }
}
