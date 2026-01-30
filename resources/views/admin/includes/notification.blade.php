<style>
    .z-for-alert {
        z-index: 10000 !important;
    }
</style>
@if (Session::has('message'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            customClass: {
                container: 'z-for-alert'
            }
        });
        Toast.fire({
            icon: "info",
            title: "{{ Session::get('message') }}"
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            customClass: {
                container: 'z-for-alert'
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ Session::get('success') }}"
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            customClass: {
                container: 'z-for-alert'
            }
        });
        Toast.fire({
            icon: "error",
            title: "{{ Session::get('error') }}"
        });
    </script>
@endif
