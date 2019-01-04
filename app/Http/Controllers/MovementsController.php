<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreMovement;
use App\Movements;
use Illuminate\Http\Request;


class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $title = 'Movimientos';
        $movements = Movements::where('user_id', auth()->user()->id);

        if($request->has('type')){
            $movements = $movements->where('type',$request->get('type'));
            $title = 'Movimiento de '. $request->get('type');
        }

        $movements = $movements->orderBy('movement_date','desc')->paginate();

        return view('movements.index',compact('movements','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('movements.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMovement  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovement $request)
    {
        $movement = new Movements($request->all());
        $movement->money = $request->get('money_decimal') *100;
        $category = $request->get('category_id');

        if(!is_numeric($category)){
            $newCategory = Category::firstOrCreate(['name' => ucwords($category)]);
            $movement->category_id = $newCategory->id;
        }
        $movement->user_id = auth()->user()->id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $file = $image->store('imagenes/movements');
            $movement->image = $file;
        }
        $movement->save();
        return redirect()->route('movements.show',$movement);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movement = Movements::where('user_id', auth()->user()->id)->where('id',$id)->first();

        return view('movements.show', compact('movement'));
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
