<form action='' method=post>
    <input type="hidden" name="id" id="id" value="<?php echo (empty($product) ? '' : $product->id); ?>"/>
    <label> 
        <span>Product name</span>
        <input type='text' name='title' id='title' value="<?php echo (empty($product) ? '' : $product->title); ?>"/>
    </label>
    <br/>
    <label>
        <span>Price</span>
        <input type='text' name='price' id='price' value="<?php echo (empty($product) ? '' : $product->price); ?>"/>
    </label>
    <br/>
    <label>
        <span>Quantity</span>
        <input type='text' name='quantity' id='quantity' value="<?php echo (empty($product) ? '' : $product->quantity); ?>"/>
    </label>
    <br/>
    <input type=submit name='save' value='Save'>
</form>
