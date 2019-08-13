<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductDetail\ProductDetailRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Session;

class CartController extends Controller
{
    protected $productRepo;
    protected $productDetailRepo;
    protected $userRepo;

    public function __construct(
        ProductRepositoryInterface $productRepo,
        ProductDetailRepositoryInterface $productDetailRepo,
        UserRepositoryInterface $userRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
        $this->productDetailRepo = $productDetailRepo;
    }

    public function index()
    {
        $user = $this->userRepo->findById(Auth::user()->id);
        $info = $user->infoDeliveries;
        $cart = Session::get('cart');
        $total = 0;
        if (!$cart) {
            return view('shopping_views.cart', ['total' => $total]);
        } else {
            foreach ($cart as $product) {
                $total += $product['subTotal'];
            }

            return view('shopping_views.cart', ['cart' => $cart, 'total' => $total, 'info' => $info]);
        }
    }

    public function addToCart(Request $req, $id)
    {
        try {
            $product = $this->product->findOrFail($id);
            $data = [
                'product_id' => $id,
                'color' => $req->color,
                'size' => $req->size,
            ];
            $product_detail = $this->productDetailRepo->findFirst($data);

            $addProduct = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => $req->quantity,
                "price" => $product->price,
                "color" => $req->color,
                "size" => $req->size,
                "subTotal" => $product->price * $req->quantity,
            ];

            $key = $product_detail->id;
            $this->store($key, $addProduct);
        } catch (ModelNotFoundException $e) {
            header('HTTP/1.1 500 Internal Server Booboo');
            die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
        }
    }

    public function store($key, $product){
        $cart = Session::get('cart');

        if (!$cart) {
            $cart = [
                $key => $product,
            ];
        } elseif (isset($cart[$key])) {
            $cart[$key]['quantity'] += $product['quantity'];
            $cart[$key]['subTotal'] += $product['quantity'] * $product['price'];
        } else {
            $cart[$key] = $product;
        }
        Session::put('cart', $cart);

        return Session::get('cart');
    }

    public function plus(Request $req, $id)
    {
        $cart = Session::get('cart');
        $product_detail = $this->productDetailRepo->findById($id);
        if (isset($cart[$id]) && $cart[$id]['quantity'] < $product_detail->quantity) {
            $cart[$id]['quantity'] ++;
            $cart[$id]['subTotal'] += $product_detail->price;
            Session::put('cart', $cart);
            $total = $this->getTotal();

            return ['subTotal' => $cart[$id]['subTotal'], 'id' => $id, 'totalCart' => $total];
        } elseif ($cart[$id]['quantity'] == $product_detail->quantity) {
            return ['numberMax' => $product_detail->quantity, 'id' => $id];
        } else {
            header('HTTP/1.1 500 Internal Server Booboo');
            die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
        }
    }

    public function minus(Request $req, $id)
    {
        $cart = Session::get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] == 1) {
                $this->deleteProduct($req, $id);
            }
            $product_detail = $this->productDetailRepo->findById($id);
            $cart[$id]['quantity'] --;
            $cart[$id]['subTotal'] -= $product_detail->price;
            Session::put('cart', $cart);
            $total = $this->getTotal();

            return ['subTotal' => $cart[$id]['subTotal'], 'id' => $id, 'totalCart' => $total];
        }
    }

    public function deleteProduct(Request $req, $id)
    {
        $cart = Session::get('cart');
        if (isset(($cart[$id]))) {
            unset($cart[$id]);
            Session::put('cart', $cart);
            $total = $this->getTotal();

            return ['id' => $id, 'totalCart' => $total];
        }
    }

    public function getTotal(){
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $product) {
            $total += $product['subTotal'];
        }

        return ['total' => $total];
    }

    public function getCart(){
        $cart = Session::get('cart');
        if (!$cart) {
            return ['flag' => trans('shopping.layout.nothing')];
        }
        return ['cart' => Session::get('cart'), 'url' => config('app.url')];
    }
}
