<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\SuggestProduct;
use App\Models\User;
use App\Models\Admin;
use App\Enums\StatusSuggest;

class SuggestProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager_views.suggest');
    }

    public function getData()
    {
        $suggestProducts = SuggestProduct::get();

        return Datatables::of($suggestProducts)
            ->addColumn('action', function ($suggestProduct) {
                $data = '<button type="button" class="btn btn-success btn-show" data-id="' . $suggestProduct->id . '">' . trans('manager.layout.detail') . '</button>
                        <button type="button" class="btn btn-warning btn-reply" data-id="' . $suggestProduct->id . '">' . trans('manager.layout.reply') . '</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="' . $suggestProduct->id . '">' . trans('manager.layout.delete') . '</button>';

                return $data;
            })
            ->editColumn('user_id', function($suggestProduct) {
                return User::find($suggestProduct->user_id)->name;
            })
            ->editColumn('status', function($suggestProduct) {
                if ($suggestProduct->status) {
                    return '<h3><span class="label label-success">' . trans('manager.layout.replied') . '</span></h3>';
                } else {
                    return '<button type="button" class="btn btn-warning reply" data-id="' . $suggestProduct->id . '">' . trans('manager.layout.notReplied') . '</button>';
                }
            })
            ->editColumn('admin_id', function($suggestProduct) {
                if ($suggestProduct->admin_id) {
                    return Admin::find($suggestProduct->admin_id)->name;
                }
            })
            ->rawColumns(['user_id', 'action', 'status', 'admin_id'])
            ->make(true);
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
        $suggest = SuggestProduct::find($id);
        if (!$suggest) {
            return view('layouts.error');
        } else {
            $suggest->update([
                'reply' => $request->reply,
                'admin_id' => Auth::guard('admin')->id(),
                'status' => StatusSuggest::Reply,
            ]);

            return $suggest;
        }
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
