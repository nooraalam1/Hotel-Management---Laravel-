<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('success'))
        Swal.fire({
            title: "{{session('success')}}",
            icon: "success",
            draggable: true
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: "error",
            title: "Failed",
            text: "{{session('error')}}",

        });
    @endif
</script>
