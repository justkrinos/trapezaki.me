<div class="ms-3 mt-3">
    <div class="d-flex justify-content-left">
        <button class="btn btn-light-primary text-nowrap" type="button" id="btnBack" style="float: left;">
            <svg class="bi" width="1em" height="1em" fill="currentColor">
                <use xlink:href="/assets/vendors/bootstrap-icons/bootstrap-icons.svg#arrow-left-circle-fill">
                </use>
            </svg>
            Back</button>
    </div>
</div>


<script>
    //TODO: na mpennei to back location mesto local storage
    //      an to referrer ennen to idio me to current value tu back sto storage
    //      tote na allassei alios na miniski to idio
    //      window.location.href = to value sto storage

    var back = document.referrer; //vale sot variable back to proigumeno url
    //Go back button an patisi to button me id btnBack, na paei sto url p lalei to variable back
    document.getElementById('btnBack').addEventListener('click', function() {
        window.location.href = back;
    })
</script>
