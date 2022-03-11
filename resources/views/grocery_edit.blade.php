@include("partials.header")
<?php $totaal_prijs = 0;?>

<table>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Product</th>
        <th scope="col">Prijs</th>
        <th scope="col">Aantal</th>
        <th scope="col">Category</th>
        <th scope="col">Subtotaal</th>
        <th colspan = "2" scope="col">Edit</th>
    </tr>
    
    <?php foreach ($grocery as $product) : ?>
    <tr class="grocerytable">
        <td>{{ $product->id }}</td>
        <td>{{ $product->name}}</td>
        <td>{{ $product->price}}</td>
        <td>{{ $product->number }}</td>
        <td>{{ $product->category->category_name }}</td> 
        <td class="productTotalCost" >{{ $product->subtotal}}</td>
        <td><a href = 'edit/{{$product->id}}'>edit</a></td>
        <td><a href = 'delete/{{$product->id}}'>Delete</a></td>
    </tr>
    <?php endforeach; ?>
    
    
</table>

    
@include("partials.footer")
