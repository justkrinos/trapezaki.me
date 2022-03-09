TODO kapu to exume misokamoumeno tunto page but en to girepsa
TODO ta session variables pu katw en tha fenunte stin forma, enna pernoun apefthias ston controller opws to ekama
TODO ta mona p ena eshi stin forma ennan ta stoixeia tis kratisis

<br>
<br>

Name: {{ session()->get('full_name')}}
<br>

Phone: {{ session()->get('phone')}}

<br>

Email: {{ session()->get('email')}}
<br>
<form method="POST" action="/seven-seas/book">
@csrf
<button type="submit">Submit Booking</button>
</form>

<br>
<br>
TODO: Submit popup successfull j otan kamnis click ok na ginete redirect piso sto make a reservation
