<h1>Checkout Page</h1>
<?php
$quote = $this->getQuote();
$item = $this->getItem();
$quoteCustomer = $this->getQuoteCustomer();
$customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
$customer = $this->getCustomer()->addFieldToFilter('customer_id', $customerId)->getData();
$quoteId = $quote->getId();

?>
<div class="container">
    <div class="left-division">
        <div class="items">
            <div class="col-md-8">

                <div class="box-custom">

                    <?php foreach ($item as $item): ?>
                        <?php
                        $product = Mage::getModel('catalog/product')->getCollection()
                            ->addFieldToFilter('product_id', $item->getProductId())->getData();
                        $quantity = $item->getId();
                        ?>
                        <?php foreach ($product as $product): ?>
                            <div class="product-view">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- Image and Quantity Box -->
                                            <div class="image-quantity-box">
                                                <?php
                                                $imageLink = $product->getImageLink();
                                                if (!empty($imageLink)) {
                                                    echo '<img src="' . Mage::getBaseUrl() . 'media/product/' . $imageLink . '" alt="Product Image" style="max-width: 100px;">';
                                                } ?>
                                                <p><strong>Quantity:</strong>
                                                    <input type="number" class="form-control" name="cart_data[qty]" id="qty"
                                                        style="width: 100px;" value="<?php echo $item->getQty(); ?>">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Details Box -->
                                            <div class="details-box">
                                                <p><strong>Description:</strong>
                                                    <?php echo $product->getDescription(); ?>
                                                </p>
                                                <p><strong>Name:</strong>
                                                    <?php echo $product->getName(); ?>
                                                </p>
                                                <p><strong>Price:</strong>
                                                    <?php echo $product->getPrice(); ?>
                                                </p>
                                                <p><strong>Total:</strong>
                                                    <?php echo $item->getRowTotal(); ?>
                                                </p>
                                                <!-- Remove Button -->
                                                <form action="<?php echo $this->getUrl("sales/quote/remove") ?>" method="POST">
                                                    <input type="hidden" name="item_id" value="<?php echo $quantity ?>">
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="right-division">
        <div class="billing_shipping">

            <div class="col-md-2">

                <form id="form" action="<?php echo $this->getUrl("sales/quote/save") ?>" method="post">
                    <?php
                    foreach ($customer as $customer):
                        ?>
                        <table class="formTable">
                            <tr>
                                <td>
                                    <input type="hidden" name="qc_data[quote_id]" value="<?php echo $quoteId; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="qc_data[customer_id]" value="<?php echo $customerId; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" placeholder="" name="qc_data[email]"
                                        value="<?php echo $customer->getCustomerEmail(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Billing Address
                                </td>
                                <td>
                                    <input type="textarea" placeholder="billing address" name="qc_data[billing_address]"
                                        value="<?php echo $quoteCustomer->getBillingAddress(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Billing City
                                </td>
                                <td>
                                    <input type="text" placeholder="billing city" name="qc_data[billing_city]"
                                        value="<?php echo $quoteCustomer->getBillingCity(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Billing Region
                                </td>
                                <td>
                                    <input type="text" placeholder="billing region" name="qc_data[billing_region]"
                                        value="<?php echo $quoteCustomer->getBillingRegion(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Billing Country
                                </td>
                                <td>
                                    <input type="text" placeholder="billing country" name="qc_data[billing_country]"
                                        value="<?php echo $quoteCustomer->getBillingCountry(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Billing Phone
                                </td>
                                <td>
                                    <input type="text" placeholder="billing phone" name="qc_data[billing_phone]"
                                        value="<?php echo $quoteCustomer->getBillingPhone(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shipping Address
                                </td>
                                <td>
                                    <input type="text" placeholder="shipping address" name="qc_data[shipping_address]"
                                        value="<?php echo $quoteCustomer->getShippingAddress(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shipping City
                                </td>
                                <td>
                                    <input type="text" placeholder="shipping city" name="qc_data[shipping_city]"
                                        value="<?php echo $quoteCustomer->getShippingCity(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shipping Region
                                </td>
                                <td>
                                    <input type="text" placeholder="shipping region" name="qc_data[shipping_region]"
                                        value="<?php echo $quoteCustomer->getShippingRegion(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shipping Country
                                </td>
                                <td>
                                    <input type="text" placeholder="shipping_country" name="qc_data[billing_city]"
                                        value="<?php echo $quoteCustomer->getShippingCountry(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Shipping Phone
                                </td>
                                <td>
                                    <input type="text" placeholder="shipping_phone" name="qc_data[shipping_phone]"
                                        value="<?php echo $quoteCustomer->getShippingPhone(); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Submit" name="submit">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </form>
            </div>
        </div>
        <div class="shipping-method">
    <h2>Shipping Method</h2>
    <form id="form" action="<?php echo $this->getUrl("sales/quote/shippingMethodSave") ?>" method="post">
        <table>
            <tr>
                <td>
                    <input type="hidden" name="sm_data[quote_id]" value="<?php echo $quote->getQuoteId() ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">Shipping Method:</td>
                <td>
                    <input type="radio" id="express" name="sm_data[shipping_method]" value="express" style="vertical-align: middle;" <?php echo ($quote->getShippingMethod() == 'express') ? 'checked' : ''; ?>>
                    <label for="express" style="display: inline;">Express</label>
                </td>
                <td>
                    <input type="radio" id="freight" name="sm_data[shipping_method]" value="freight" style="vertical-align: middle;" <?php echo ($quote->getShippingMethod() == 'freight') ? 'checked' : ''; ?>>
                    <label for="freight" style="display: inline;">Freight</label>
                </td>
                <td colspan="2">
                    <input type="submit" value="Submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</div>

        <div class="payment-method">
            <h2>Payment Method</h2>
            <form id="form" action="<?php echo $this->getUrl("sales/quote/paymentMethodSave") ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <input type="hidden" name="pm_data[quote_id]" value="<?php echo $quote->getQuoteId() ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Method:</td>
                        <td>
                            <label for="cod">
                                <input type="radio" id="cod" name="pm_data[payment_method]" value="COD" <?php echo ($quote->getPaymentMethod() == 'COD') ? 'checked' : ''; ?>>
                                COD
                            </label>
                        </td>
                        <td>
                            <label for="phone_order">
                                <input type="radio" id="phone_order" name="pm_data[payment_method]" value="Phone Order"
                                    <?php echo ($quote->getPaymentMethod() == 'Phone Order') ? 'checked' : ''; ?>>
                                Phone Order
                            </label>
                        </td>
                        <td>
                            <label for="credit_card">
                                <input type="radio" id="credit_card" name="pm_data[payment_method]" value="Credit Card"
                                    <?php echo ($quote->getPaymentMethod() == 'Credit Card') ? 'checked' : ''; ?>>
                                Credit Card
                            </label>
                        </td>
                        <td colspan="2">
                            <input type="submit" value="Submit" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>


    </div>
</div>