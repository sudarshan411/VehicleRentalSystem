<script>
    $(document).ready(function() {

    var fadeTime = 300;

    /* Assign actions */
    $("#booking_date").change(function() {
        
        
        var dates= document.querySelectorAll('input[type="date"]');
        var return_date = new Date(dates[1].valueAsDate);
        var booking_date = dates[0].value;
        //var days = return_date.getDay() - return_date.getDay();

        var base_price = parseFloat(<?php echo $vehicle['base'];?>);
        var rate = parseFloat(<?php echo $vehicle['rate'];?>);

        //var total = (days >= 1)? base_price : 0;
        //total = total + (days > 1)? days*rate : 0;

        //alert(document.getElementById("data").value);
        
        //var ret= document.querySelector("#return_date");
        //var ret2= document.getElementsByName('return_date');
        //alert(typeof dates[0].value);
        console.dir(dates[0].valueAsDate);
        alert(return_date.getDate());
        //total = 2.5;
        total = 2.5;
        
        $("#amount").fadeOut(fadeTime);
        $("#amount").val(total.toFixed(2));
        $("#amount").fadeIn(fadeTime);

    });

    //var parts ='2014-04-03'.split('-');
    // Please pay attention to the month (parts[1]); JavaScript counts months from 0:// January - 0, February - 1, etc.var mydate = new Date(parts[0], parts[1] - 1, parts[2]); 
    //console.log(mydate.toDateString());

    });
</script>