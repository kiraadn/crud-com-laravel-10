
@if (!empty(session('success')))
    <div id="autoCloseAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
    </div>

    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })
    </script>
@endif


@if (!empty(session('error')))
    <div id="autoCloseAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
    </div>

    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: '{{session('error')}}'
        })
    </script>

@endif


<script>
    // Fecha o alerta automaticamente após 5 segundos (5000 milissegundos)
    setTimeout(function() {
        var autoCloseAlert = document.getElementById('autoCloseAlert');
        autoCloseAlert.classList.remove('show');
        autoCloseAlert.classList.add('d-none');
    }, 2000);
</script>
