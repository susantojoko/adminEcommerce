@extends('app')

@section('alertScript') <!-- Tambahkan yield untuk alertScript -->
<!-- Letakkan alert terpisah di sini -->
@if(session('successdel'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session("successdel") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if(session('successup'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session("successup") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if(session('successtmb'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session("successtmb") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@show
@endsection