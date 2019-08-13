<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\InfoDelivery\InfoDeliveryRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    protected $userRepo;
    protected $infoDeliveryRepo;

    public function __construct(UserRepositoryInterface $userRepo, InfoDeliveryRepositoryInterface $infoDeliveryRepo)
    {
        $this->userRepo = $userRepo;
        $this->infoDeliveryRepo = $infoDeliveryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $infoDelivery = $user->infoDeliveries;

        return view('shopping_views.profile', ['user' => $user, 'infoDelivery' => $infoDelivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $infoDelivery = $user->infoDeliveries;

        return view('shopping_views.edit_profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
        ];

        $this->userRepo->update($user, $dataUpdate);

        return redirect()->route('shop.showProfile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showChangePass()
    {
        return view('shopping_views.change_password');
    }

    public function changePass(Request $request)
    {
        $user = Auth::user();
        if ($request->newPass && $request->newPass == $request->confirmPass) {
            $dataUpdate = ['password' => Hash::make($request->newPass)];
            $this->userRepo->update($user, $dataUpdate);

            return redirect()->route('shop.showProfile');
        } else {
            return redirect()->route('shop.showChangePassword');
        }
    }
}
