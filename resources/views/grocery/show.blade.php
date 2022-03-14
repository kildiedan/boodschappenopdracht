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
    
    
    <tr class="grocerytable">
        <td>{{ $grocery->id }}</td>
        <td>{{ $grocery->name}}</td>
        <td>{{ $grocery->price}}</td>
        <td>{{ $grocery->number }}</td>
        <td>{{ $grocery->category->name }}</td> 
        <td class="ProductTotalCost" >{{ $grocery->subtotal}}</td>
        <td><a href = '{{$grocery->id}}/edit'>edit</a></td>
        <td><a href = '{{$grocery->id}}'>Delete</a></td>
    </tr>
    
    
    
</table>

    
@include("partials.footer")
