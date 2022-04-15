    {{-- Toast dependency --}}
    <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">

    {{-- Include for flash messages --}}
    <script src="../assets/vendors/toastify/toastify.js"></script>


    @if (Auth::guard('user2')->user()->status == 2)
        <script>
            Toastify({ //an exw error fkale toast
                text: 'Your account is disabled! Please contact the administrator.',
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#a61403",
            }).showToast();
        </script>
    @endif
