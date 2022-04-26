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


    //An den iparxi variable back, j an den ekama refresh tin selida
    //tote kame set to back variable me tin proigumeni selida p itan o user
    if(!sessionStorage.getItem("back") || sessionStorage.getItem("back") != document.referrer){
        sessionStorage.setItem("back", document.referrer);
    }

    //Go back button an patisi to button me id btnBack, na paei sto proigumeno url
    document.getElementById('btnBack').addEventListener('click', function() {
        window.location.href = sessionStorage.getItem("back");
    })
</script>
