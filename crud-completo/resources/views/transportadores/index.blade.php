@extends('layouts.appTransporter')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1>Transportadores</h1>
        <a class="btn btn-primary btn-md" href="{{ route('transportadors.create') }}">Cadastrar</a>
    </div>
    <hr style="margin-top: 0px;">

    @if ($message = Session::get('success'))
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
                title: '{{ $message }}'
            })
        </script>
    @endif

    <div class="table-responsive-sm">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NomeCompleto</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actuacao</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">BI F</th>
                    <th scope="col">BI T</th>
                    <th scope="col">Carta</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($transportadores as $key=>$transportador)
                    <tr class="">
                        <td scope="row">{{++$key}}</td>
                        <td>{{$transportador->nomeCompleto}}</td>
                        <td>{{$transportador->celular}}</td>
                        <td>{{$transportador->email}}</td>
                        <td>{{$transportador->areaActuacao}}</td>
                        <td>{{$transportador->areaActuacao}}</td>
                        <td>
                            <img width="45px" src="{{ asset('images/bi/frontal/' . $transportador->biFrontal)}}">
                        </td>
                        <td >
                            <img width="45px" src="{{ asset('images/bi/traseiras/' . $transportador->biTraseira) }}" />
                        </td>
                        <td style="d-flex">
                            <img width="45px" src="{{ asset('images/cartas/' . $transportador->cartaConducao) }}" />
                        </td>
                        <td>
                            <div class="d-flex ">
                                <a href="{{ route('transportadors.edit', $transportador->id) }}" class="btn-link btn btn-success mx-1" style="padding-top: 4px; padding-bottom: 4px;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('transportadors.destroy', $transportador->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" onclick="deleteConfirm(event)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <script>
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;

            Swal.fire({
                title: "Apagar Dados?",
                text: "Uma vez aceite, será impossivel reverter esta acção!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, apagar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
