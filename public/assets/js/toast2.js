    if(sessionStorage.getItem('reservation') == 'success'){
        Toastify({
            text: "The reservation was successfully booked, check your email for more information!",
            duration: 5000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: 'right', // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true // Prevents dismissing of toast on hover
        }).showToast();
    }
    sessionStorage.removeItem("reservation");
