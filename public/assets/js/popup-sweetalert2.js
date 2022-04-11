document.getElementsByClassName('rectangle')[0].addEventListener('click', (e) => {
    //Popup to input table capacity
    Swal.fire({
        title: 'Enter the table capacity',
        input: 'number',
        showCancelButton: true,
    })
    //When done
        .then((value) => {
            //If they clicked ok
            if (value.isConfirmed) {
                //Create the table and set its capacity
                const o = addRect(0, 0, 60, 60)
                o.set('capacity', value.value)
                canvas.setActiveObject(o)
            }
        })
})

document.getElementsByClassName('circle')[0].addEventListener('click', (e) => {
    //Popup to input table capacity
    Swal.fire({
        title: 'Enter the table capacity',
        input: 'number',
        showCancelButton: true,
    })
    //When done
        .then((value) => {
            //If they clicked ok
            if (value.isConfirmed) {
                //Create the table and set its capacity
                const o = addCircle(0, 0, 60, 60)
                o.set('capacity', value.value)
                canvas.setActiveObject(o)
            }
        })
})