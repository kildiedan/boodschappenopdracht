<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\controller;
use App\models\Category;
use App\Models\Grocery;


class GroceryController extends Controller
{
    public function index()
    {
        $grocery = Grocery::all()->load('category');
        return view('index',['grocery'=>$grocery]);
    }

    // TODO: functienamen camelCase
    // TODO: beperk constroller methods tot standaard CRUD methods, dus in dit geval houd je het bij edit voor deze route
    public function ChangeIndex()
    {
        $grocery = Grocery::all()->load('category');
        return view('grocery_edit',['grocery'=>$grocery]);
    }

    // TODO: pas route model binding toe voor compactere code
    public function show($id)
    {
        $categories = Category::all();
        $grocery = Grocery::findOrFail($id);
        return view('grocery_update',['grocery'=> $grocery], ["categories"=>$categories] );
    }

    // TODO: onderstaande inhoud hoort niet bij een edit method maar update method (edit method laad alleen de edit view, update method volgt na het posten van
    // de form in de edit view)
    public function edit(Request $request,$id)
    {
        // TODO: maak een aparte form validator class aan zodat je dezelfde validatie op meerdere plekken (zoals de store method) kunt gebruiken
        request()->validate([
            "name" => ["required", "min:2"],
            "price" => ["required", "numeric", "gt:0"],
            "number" => ["required", "integer", "gt:0"],
            "category" => ["required", "integer", "gt:0"]
        ]);

        $name = $request->input('name');
        $price = $request->input('price');
        $number = $request->input('number');
        $subtotal = $number * $price;
        $category = $request->input('category');


        // TODO: gebruik eloquent ipv eigen geschreven queries voor eenvoudige zaken als het updaten. Je kunt mass-assignment toepassen door een array van waarden
        // uit de validatie mee te geven aan de update method
        DB::update('update groceries set name = ?,price=?,number=?,subtotal=?,caregory_id=? where id = ?',[$name,$price,$number,$subtotal,$category,$id]);
        // TODO: return een redirect naar de overzichtspagina na een bijwerk-aktie
        echo "Record updated successfully.";
        echo '<a href = "/groceries">Click Here</a> to go back.';
    }


    public function destroy($id)
    {
        // TODO: gebruik eloquent ipv eigen geschreven queries
        DB::delete('delete from groceries where id = ?',[$id]);
        // TODO: return een redirect naar de overzichtspagina
        echo "Record deleted successfully.";
        echo '<a href = "/groceries">Click Here</a> to go back.';
    }

    // TODO: gebruik liever geen eigen method names maar alleen CRUD names
    public function insertform(){
        $categories = Category::all();
        return view("create",["categories"=>$categories]);

    }


    public function store(Request $request){

        request()->validate([
            "name" => ["required", "min:2"],
            "price" => ["required", "numeric", "gt:0"],
            "number" => ["required", "integer", "gt:0"],
            "category" => ["required", "integer", "gt:0"]
        ]);
        $name = $request->input('name');
        $price = $request->input('price');
        $number = $request->input('number');
        $subtotal = $number * $price;
        $category = $request->input('category');


        // TODO: gebruik eloquent ipv eigen geschreven queries
        $data=array('name'=>$name,"price"=>$price,"number"=>$number, "subtotal"=>$subtotal, "category_id"=>$category);
        DB::table('groceries')->insert($data);

        // TODO: return een redirect naar de overzichtspagina na een store-aktie
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/groceries">Click Here</a> to go back.';


    }

}
