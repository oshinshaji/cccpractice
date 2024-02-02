<!-- After fetching data using class objects -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h3><u> Html Form ccc</u></h3>
        <?php
        include_once "sql/connection.php";
        include_once "sql/object_for_data.php";
        include_once "sql/class.php";

        $fb = new func_building();
        $fe = new func_executer();
        $newObj = new Data_Collection_Object();

        $id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
        $sql = "SELECT * FROM ccc_product WHERE product_id={$id}";

        $temp_query = $conn->query($sql);
        $row = mysqli_fetch_assoc($temp_query);

        $newObj->addData($row);
        if (!empty($newObj->getData())) {
            $_mmdata = $newObj->getData()[0];
        }
        $_mmdata = $newObj->getData()[0];

        $product_id = $_mmdata->getProduct_Id();
        $product_name = $_mmdata->getProduct_name();
        $sku = $_mmdata->getSku();
        $product_type = $_mmdata->getProduct_type();
        $category = $_mmdata->getCategory();
        $manufacturer_cost = $_mmdata->getManufacturer_Cost();
        $shipping_cost = $_mmdata->getShipping_Cost();
        $total_cost = $_mmdata->getTotal_Cost();
        $price = $_mmdata->getPrice();
        $status = $_mmdata->getStatus();

        ?></pre>

    <form method="post" action="product_process.php?product_id=<?php echo $id; ?>">
        <label for="pname">Product name:</label>
        <input type="text" id="pname" value="<?php echo $product_name ?>" name="p_data[product_name]">
        <br>
        <br>
        <label for="sku">SKU:</label>
        <input type="text" id="sku" value="<?php echo $sku ?>" name="p_data[sku]">
        <br>
        <br>
        <p>Product Type:</p>
        <input type="radio" id="simple" name="p_data[product_type]" value="Simple" <?php echo ($product_type == 'Simple') ? 'checked' : ''; ?>>
        <label for="simple">Simple</label><br>
        <input type="radio" id="bundle" name="p_data[product_type]" value="Bundle" <?php echo ($product_type == 'Bundle') ? 'checked' : ''; ?>>
        <label for="bundle">Bundle</label>
        <br>
        <br>
        <label for="category">Choose a Category:</label>
        <select name="p_data[category]" id="category">
            <option value="bargame" <?php echo ($category == 'bargame') ? 'selected' : ''; ?>>Bar & Game Room</option>
            <option value="bedroom" <?php echo ($category == 'bedroom') ? 'selected' : ''; ?>>Bedroom</option>
            <option value="decor" <?php echo ($category == 'decor') ? 'selected' : ''; ?>>Decor</option>
            <option value="diningkitchen" <?php echo ($category == 'diningkitchen') ? 'selected' : ''; ?>>Dining & Kitchen</option>
            <option value="lighting" <?php echo ($category == 'lighting') ? 'selected' : ''; ?>>Lighting</option>
            <option value="livingroom" <?php echo ($category == 'livingroom') ? 'selected' : ''; ?>>Living Room</option>
            <option value="mattresses" <?php echo ($category == 'mattresses') ? 'selected' : ''; ?>>Mattresses</option>
            <option value="office" <?php echo ($category == 'office') ? 'selected' : ''; ?>>Office</option>
            <option value="outdoor" <?php echo ($category == 'outdoor') ? 'selected' : ''; ?>>Outdoor</option>
        </select>
        <br>
        <br>
        <label for="manufacturer_cost">Manufacturer Cost:</label>
        <input type="text" id="manufacturer_cost" value="<?php echo $manufacturer_cost ?>" name="p_data[manufacturer_cost]">
        <br>
        <br>
        <label for="shipping_cost">Shipping Cost:</label>
        <input type="text" id="shipping_cost" value="<?php echo $shipping_cost ?>" name="p_data[shipping_cost]">
        <br>
        <br>
        <label for="total_cost">Total Cost:</label>
        <input type="text" id="total_cost" value="<?php echo $total_cost ?>" name="p_data[total_cost]">
        <br>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" value="<?php echo $price ?>" name="p_data[price]">
        <br>
        <br>
        <label for="status">Status:</label>
        <select name="p_data[status]" id="status">
            <option value="enabled" <?php echo ($status == 'enabled') ? 'selected' : ''; ?>>Enabled</option>
            <option value="disabled" <?php echo ($status == 'disabled') ? 'selected' : ''; ?>>Disabled</option>
        </select>
        <br>
        <br>
        <label for="created_at">Created At:</label>
        <input type="date" id="created_at" name="p_data[created_at]" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <br>
        <label for="updated_at">Updated At:</label>
        <input type="date" id="updated_at" name="p_data[updated_at]" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <br>
        <input type="submit" value="Insert" name="insert">
        
    </form>
</body>
</html>