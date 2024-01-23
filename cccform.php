<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><u> Html Form ccc</u></h3>
    <form method="post" action="process.php">
        <label for="pname">Product name:</label>
        <input type="text" id="pname" name="pname">
        <br><br>
        <label for="pname">SKU:</label>
        <input type="text" id="sku" name="sku">
        <br><br>
        <p>Product Type:</p>
        <input type="radio" id="simple" name="product_type" value="Simple">
        <label for="simple">Simple</label><br>
        <input type="radio" id="bundle" name="product_type" value="Bundle">
        <label for="bundle">Bundle</label><br><br>
        
        <label for="category">Choose a Category:</label>
        <select name="category" id="category">
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
        <label for="mcost">Manufacturer Cost:</label>
        <input type="text" id="mcost" name="mcost">
        <br>
        <br>
        <label for="scost">Shipping Cost:</label>
        <input type="text" id="scost" name="scost">
        <br>
        <br>
        <label for="tcost">Total Cost:</label>
        <input type="text" id="tcost" name="tcost">
        <br>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price">
        <br>
        <br>

        <label for="status">Status:</label>
        <select name="status" id="status">
        <option value="enabled">Enabled</option>
        <option value="disabled">Disabled</option>
        </select>
        <br>
        <br>

        <label for="created_at">Created At:</label>
        <input type="date" id="created_at" name="created_at">
        <br>
        <br>
        <label for="updated_at">Updated At:</label>
        <input type="date" id="updated_at" name="updated_at">
        <br>
        <br>

        <input type="submit" value="Submit" name="submit">
        
    </form>
</body>
</html>