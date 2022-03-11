@include("partials.header")

<form method="POST" action="/groceries/save">
@csrf
    <p>productnaam: <input type="text" name="name"> </p>
    <p>aantal: <input type="number" min="0" name="number"> </p>
    <p>productprijs: <input type="number" min="0" step="0.01" name="price"> </p>
    <p>categorie: 
        <select name="category">
            <option value="0" hidden>select categorie</option>
            
            @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
            @endforeach
            
        </select></p>
        
    
    <button type="submit">submit</button>
</form>

@include("partials.footer")

