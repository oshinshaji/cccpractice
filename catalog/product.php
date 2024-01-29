<!-- After using functions -->

<!DOCTYPE html>
<!-- oshin -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><u> Html Form ccc</u></h3>
    <form method="post" action="product_process.php">
        <label for="pname">Product name:</label>
        <input type="text" id="pname" name="p_data[product_name]">
        <br><br>
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="p_data[sku]">
        <br><br>
        <p>Product Type:</p>
        <input type="radio" id="simple" name="p_data[product_type]" value="Simple">
        <label for="simple">Simple</label><br>
        <input type="radio" id="bundle" name="p_data[product_type]" value="Bundle">
        <label for="bundle">Bundle</label><br><br>
        
        <label for="category">Choose a Category:</label>
        <select name="p_data[category]" id="category">
        <option value="bargame">Bar & Game Room</option>
        <option value="bedroom">Bedroom</option>
        <option value="decor">Decor</option>
        <option value="diningkitchen">Dining & Kitchen</option>
        <option value="lighting">Lighting</option>
        <option value="livingroom">Living Room</option>
        <option value="mattresses">Mattresses</option>
        <option value="office">Office</option>
        <option value="outdoor">Outdoor</option>
        </select>
        <br>
        <br>
        <label for="manufacturer_cost">Manufacturer Cost:</label>
        <input type="text" id="manufacturer_cost" name="p_data[manufacturer_cost]">
        <br>
        <br>
        <label for="shipping_cost">Shipping Cost:</label>
        <input type="text" id="shipping_cost" name="p_data[shipping_cost]">
        <br>
        <br>
        <label for="total_cost">Total Cost:</label>
        <input type="text" id="total_cost" name="p_data[total_cost]">
        <br>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="p_data[price]">
        <br>
        <br>

        <label for="status">Status:</label>
        <select name="p_data[status]" id="status">
        <option value="enabled">Enabled</option>
        <option value="disabled">Disabled</option>
        </select>
        <br>
        <br>

        <label for="created_at">Created At:</label>
        <input type="date" id="created_at" name="p_data[created_at]">
        <br>
        <br>
        <label for="updated_at">Updated At:</label>
        <input type="date" id="updated_at" name="p_data[updated_at]">
        <br>
        <br>
        <input type="submit" value="Insert" name="insert" >
        <br>
        <br>
        <input type="submit" value="Update" name="update" >
        
    </form>
</body>
<!-- oshin -->
<!-- onclick="update('ccc_product',$p_data,['product_name'=>'Pencil'])" -->
</html>