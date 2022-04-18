@php
    use App\Models\User3;
@endphp

<html>
    {{-- TOOD na ginei omorfi i selida --}}
    <h1 style="color: rgb(95, 241, 95)">Succesfully booked!</h1>
    <p>You have successfully booked a table for {{ $user3->username }}</p>
    <p>You will be notified by email when the table is ready.</p>
    <p>Thank you for using our service!</p>
</html>

