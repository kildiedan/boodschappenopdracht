<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\controller;
use App\models\Category;
use App\Models\Grocery;



class GroceryController extends Controller
{
    public function index()
    {
        $grocery = Grocery::all()->load('category');
        return view('index',['grocery'=>$grocery]);
    }

    public function edit()
    {
        $grocery = Grocery::all()->load('category');
        return view::make('grocery.edit')->with('grocery', $grocery);
    }

    // TODO: pas route model binding toe voor compactere code
    public function show($id)
    {
        $categories = Category::all();
        $grocery = Grocery::findOrFail($id);
        return view('grocery.show',['grocery'=> $grocery], ["categories"=>$categories] );
    }

    
    public function update(Request $request,$id)
    {
        // TODO: maak een aparte form validator class aan zodat je dezelfde validatie op meerdere plekken (zoals de store method) kunt gebruiken
        request()->validate([
            "name" => ["required", "min:2"],
            "price" => ["required", "numeric", "gt:0"],
            "number" => ["required", "integer", "gt:0"],
            "category" => ["required", "integer", "gt:0"]
        ]);

        $grocery = Grocery::find($id);

        $grocery->name = $request->input('name');
        $grocery->price = $request->input('price');
        $grocery->number = $request->input('number');
        $grocery->subtotal = $grocery->number * $grocery->price;
        $grocery->category = $request->input('category');

        return redirect("/grocery");
        
    }


    public function destroy($id)
    {

        $grocery = Grocery::find($id);
        $grocery->delete();

        return redirect("/grocery");
        
    }

    
    public function create(){
        $categories = Category::all();
        return view("create",["categories"=>$categories]);

    }


    public function store(Request $request){

        $request->validate([
            "name" => ["required", "min:2"],
            "price" => ["required", "numeric", "gt:0"],
            "number" => ["required", "integer", "gt:0"],
            "category" => ["required", "integer", "gt:0"]
        ]);
        $data = $request->all();


        

        $grocery = Grocery::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'number' => $data['number'],
            'subtotal' => $data['pirce'] * $data['number'],
            'category_id' => $data['category'],
        ]);

        return redirect("/grocery");
        

    }

}
