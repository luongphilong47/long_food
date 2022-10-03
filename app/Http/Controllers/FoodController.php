<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $food = Food::all();
        // dd($food);
        // return view('food.home_food', compact('food'));
        return view('food.home_food', ['food' => Food::all()]);
    }

    public function getChitietsp(Request $resq){
        $food = Food::where('id', $resq->id->fisrt());
        return view('food.detail_food', compact('food'));
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
        $request->validate([
            'name'=>'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'gia' => 'required',
            'gia_km' => 'required',
            'description' => 'required',
        ]);

        [
            'name.required' => 'Ban chua nhap thong tin san pham',
            'image_file.minmes' => 'Chi chap nhan anh voi dung kich thuoc',
            'image_file.max' => 'Anh gioi han dung luong khoang 10000',
            'gia.required' => 'Chua nhap gia',
            'gia_km.required' => 'Chua nhap gia khuyen mai',
            'description.required' => 'Chua nhap mo ta',
        ]; //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('image_file'))
        {
            $file = $request->file('image_file');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('imgs'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
        }
            $food=new Food();
            $food->name=$request->input('name');
            $food->gia=$request->input('gia');
            $food->gia_km=$request->input('gia_km');
            $food->ct_id=$request->input('ct_id');
            $food->image=$name;
            $food->save();
            return redirect('foods')->with('success','Bạn đã thêm thành công');
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
        $food = Food::all();
        $food = Food::find($id);
        // dd($car);
        return view('food.detail_food', ['food' => $food]);
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