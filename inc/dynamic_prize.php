<script>
    $(document).ready(function() {

    var fadeTime = 300;

    /* Assign actions */
    $("input[class$='_date']").change(function() {
        
        var return_date = new Date($("#return_date").val());
        var booking_date = new Date($("#booking_date").val());
        var days = return_date.getDay() - return_date.getDay();

        var base_price = <?php echo $vehicle['base'];?>
        var base_price = <?php echo $vehicle['rate'];?>
        
        

        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function() {
            $('#cart-subtotal').html(subtotal.toFixed(2));
            $('#cart-tax').html(tax.toFixed(2));
            $('.cart-total').html(total.toFixed(2));
            if (total == 0) {
            $('.checkout').fadeOut(fadeTime);
            } else {
            $('.checkout').fadeIn(fadeTime);
            }
            $('.totals-value').fadeIn(fadeTime);
        });
    });

    });
</script>