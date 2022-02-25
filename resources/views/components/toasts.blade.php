
{{--An irta se tunto page me ena cookie success tote kame to tuto --}}

@if (session()->has('success'))

<span id="msg">{{ session('success') }}</span>

<script>
Toastify({
    text: $("#msg").text(),
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#3cc2b4",
}).showToast();
</script>

@endif


@if (session()->has('logout'))

<span id="msg">{{ session('logout') }}</span>

<script>
Toastify({
    text: $("#msg").text(),
    duration: 5000,
    close:true,
    gravity:"top",
    position: "right",
    backgroundColor: "#3cc2b4",
}).showToast();
</script>

@endif

