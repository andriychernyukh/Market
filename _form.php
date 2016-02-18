<form action='' method=post>
    <input type="hidden" name="id" id="id" value="<?php echo (empty($product) ? '' : $product->id); ?>"/>
    <label> 
        <span class="span">Product name</span>
        <input type='text' name='title' id='title' value="<?php echo (empty($product) ? '' : $product->title); ?>"/>
        <span>*<?php echo (!isset($validateResult['fieldsErrors']['title']['errorMsg']) ? '' : $validateResult['fieldsErrors']['title']['errorMsg']); ?></span>
    </label>
    <br/>
    <label>
        <span class="span">Price</span>
        <input type='text' name='price' id='price' value="<?php echo (empty($product) ? '' : $product->price); ?>"/>
        <span>*<?php echo (!isset($validateResult['fieldsErrors']['price']['errorMsg']) ? '' : $validateResult['fieldsErrors']['price']['errorMsg']); ?></span>
    </label>
    <br/>
    <label>
        <span class="span">Quantity</span>
        <input type='text' name='quantity' id='quantity' value="<?php echo (empty($product) ? '' : $product->quantity); ?>"/>
        <span>*<?php echo (!isset($validateResult['fieldsErrors']['quantity']['errorMsg']) ? '' : $validateResult['fieldsErrors']['quantity']['errorMsg']); ?></span>
    </label>
    <br/>
    <input class="button button-yes" type=submit name='save' value='Save'>
</form>
