<?php
namespace App\Http\Controllers;

use App\Http\Requests\GroceryStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\models\Category;
use App\Models\Grocery;




class GroceryController extends Controller
{
    public function index()
    {
        $grocery = Grocery::all()->load('category');
        return view('grocery.index',['grocery'=>$grocery]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $grocery = Grocery::find($id);
        return view('grocery.edit',['grocery'=> $grocery], ["categories"=>$categories] );
    }

    
    public function show($id)
    {
        $categories = Category::all();
        $grocery = Grocery::find($id);
        return view('grocery.show',['grocery'=> $grocery], ["categories"=>$categories] );
    }

    
    public function update(GroceryStoreRequest $request, $id)
    {
        
        $validated = $request->validated();
        
        


        $grocery = Grocery::find($id);
    
        $grocery->name = $request->input('name');
        $grocery->price = $request->input('price');
        $grocery->number = $request->input('number');
        $grocery->subtotal = $grocery->number * $grocery->price;
        $grocery->category_id = $request->input('category');
        $grocery->save();
        

        return redirect("/");
        
    }


    public function destroy($id)
    {

        $grocery = Grocery::find($id);
        $grocery->delete();

        return redirect("/grocery");
        
    }

    
    public function create(){
        $categories = Category::all();
        return view("grocery.create",["categories"=>$categories]);

    }


    public function store(GroceryStoreRequest $request){

        $data = $request->validated();


        

        $grocery = Grocery::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'number' => $data['number'],
            'subtotal' => $data['price'] * $data['number'],
            'category_id' => $data['category'],
        ]);

        return redirect("/");
        

    }

}
