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
    var back = document.referrer; //vale sot variable back to proigumeno url
    //Go back button an patisi to button me id btnBack, na paei sto url p lalei to variable back
    document.getElementById('btnBack').addEventListener('click', function() {
        window.location.href = back;
    })
</script>


{{-- TODO: en dulefki polla kala  px. ama kamis refresh --}}