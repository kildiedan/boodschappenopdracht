@include("partials.header")
    <form action = "/groceries/edit/<?php echo $grocery->id; ?>" method = "post">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td>
                <input type = 'text' name = 'name'
                value = '<?php echo $grocery->name; ?>'/> </td>
            </tr>
            <tr>
                <td>price</td>
                <td>
                <input type = 'text' name = 'price'
                value = '<?php echo $grocery->price; ?>'/>
                </td>
            </tr>
            <tr>
                <td>number</td>
                <td>
                <input type = 'text' name = 'number'
                value = '<?php echo $grocery->number; ?>'/>
                </td>
            </tr>
            <tr>
                <td>category</td>
                <td>
                <select name="category">
            
            @foreach($categories as $category)
                <option value="{{ $category->id }}" <?php if($category->id == $grocery->category_id ){echo "selected"; };?>> {{ $category->category_name }}</option>
            @endforeach
        </select>
                </td>
            </tr>
            <tr>
                <td colspan = '2'>
                <input type = 'submit' value = "Update grocery" />
                </td>
            </tr>
        </table>
    </form>
    @include("partials.footer")