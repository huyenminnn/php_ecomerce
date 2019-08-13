<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Enums\StatusSuggest;
use App\Repositories\SuggestProduct\SuggestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;

class SuggestProductController extends Controller
{
    protected $suggestRepo;
    protected $userRepo;
    protected $adminRepo;

    public function __construct(
        SuggestRepositoryInterface $suggestRepo,
        UserRepositoryInterface $userRepo,
        AdminRepositoryInterface $adminRepo
    )
    {
        $this->suggestRepo = $suggestRepo;
        $this->userRepo = $userRepo;
        $this->adminRepo = $adminRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shopping_views.suggest');
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
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->product,
            'description' => $request->message,
            'status' => StatusSuggest::Pending,
        ];
        $this->suggestRepo->create($data);

        return view('shopping_views.suggest');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
