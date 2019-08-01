<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\SuggestProduct;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
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
        $categories = Category::get();

        return view('manager_views.suggest', ['categories' => $categories]);
    }

    public function getData()
    {
        $suggestProducts = SuggestProduct::get();

        return Datatables::of($suggestProducts)
            ->addColumn('action', function ($suggestProduct) {
                if (!$suggestProduct->status) {
                    $data = '<button type="button" class="btn btn-primary btn-reply" data-id="' . $suggestProduct->id . '">' . trans('manager.suggest.add') . '</button>
                            <button type="button" class="btn btn-danger btn-reject" data-id="' . $suggestProduct->id . '">' . trans('manager.suggest.reject') . '</button>';
                } else {
                    $data = '';
                }

                return $data;
            })
            ->editColumn('user_id', function($suggestProduct) {
                return User::find($suggestProduct->user_id)->name;
            })
            ->editColumn('status', function($suggestProduct) {
                if ($suggestProduct->status == StatusSuggest::Accept) {
                    return '<h4><span class="label label-success">' . trans('manager.layout.replied') . '</span></h4>';
                } elseif ($suggestProduct->status == StatusSuggest::Reject) {
                    return '<h4><span class="label label-danger">' . trans('manager.layout.reject') . '</span></h4>';
                } else {
                    return '<h4><span class="label label-warning">' . trans('manager.layout.pending') . '</span></h4>';
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
        $suggestProduct = SuggestProduct::find($id);

        return $suggestProduct;
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
        } elseif ($request->key) {
            $suggest->update([
                'admin_id' => Auth::guard('admin')->id(),
                'status' => StatusSuggest::Reject,
            ]);

            return $suggest;
        } else {
            $suggest->update([
                'reply' => $request->reply,
                'admin_id' => Auth::guard('admin')->id(),
                'status' => StatusSuggest::Accept,
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
