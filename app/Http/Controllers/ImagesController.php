<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * 画像登録フォームの表示
     *
     * @return Response
     */
    public function index()
    {
        $is_image = false;
        if (Storage::disk('local')->exists('public/mycat_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('images.index', ['is_image' => $is_image]);
    }
    
   
    /**
     * 画像の保存
     *
     * @param ImagesRequest $request
     * @return Response
     */
    public function store(ImagesRequest $request)
    {
        $request->photo->storeAs('public/mycat_images', Auth::id() . '.jpg');

        return redirect('images')->with('success', '新しい画像を登録しました');
    }
    
}