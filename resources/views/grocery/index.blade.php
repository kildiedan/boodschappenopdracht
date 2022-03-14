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
        <th scope="col">Edit</th>
    </tr>
    
    <?php foreach ($grocery as $product) : ?>
    <tr class="grocerytable">
        <td><?= $product->id; ?></td>
        <td><?= $product->name;?></td>
        <td class="productPrice" value="1"><?= $product->price;?></td>
        <td><?= $product->number; ?></td>
        <td><?= $product->category->category_name; ?></td>
        <td class="productTotalCost" ><?= $product->subtotal;?></td>
        <td><a href = 'groceries/{{$product->id}}'>edit</a></td>
        

        <?php $totaal_prijs += $product->subtotal;?>
    </tr>
    <?php endforeach; ?>
    
    </tr>
    <tr id="totaalrow">
        <td colspan="5">Totaal</td>
                    <td id="totalCost" class="productTotalCost"><?= $totaal_prijs ?></td>
    </tr>
</table>

    
@include("partials.footer")
