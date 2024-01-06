@extends('layouts.appTransporter')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-0">
        <h1> Editar Transportador - <span class="nameView">{{ $transportador->nomeCompleto }}</span></h1>
        <h5 class="text-end">Formulario de Edição</h5>
    </div>
    <hr style="margin-top: 0px;">
    @if ($errors->any)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center align-content-center mb-5">
        <div class="col-10 my-2">
            <!--  -->
            <div class="col-12">
                <div class="col-xl-12">
                    <!--User id  -->
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img class="rounded-circle logo-form" src="{{ asset('assets/img/user(8).png') }}" alt="Profile"
                                class="rounded-circle">
                            <h4 class="pt-2 fw-1">Actualize os dados do transportador {{ $transportador->nomeCompleto }} já
                                existente no sistema.</h4>
                        </div>
                    </div>
                    <!-- User id -->
                </div>

                <div class="view-dados-Pessoais-user mt-3">
                    <form class="row g-3 mt-3 needs-validation" novalidate method="post"
                        action="{{ route('transportadors.update',['transportador'=>$transportador->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-12 col-md-6 col-lg-7 mb-3">
                            <label for="nomeCompleto" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto"  value="{{$transportador->nomeCompleto}}" required>
                            <div class="invalid-feedback fw-1">
                                Por favor, insira um nome válido.
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-5 mb-3 fw-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$transportador->email}}" required>
                            <div class="invalid-feedback">
                                Por favor, insira um email válido.
                            </div>
                        </div>

                        <div class="col-sm-6 col-sm-4 col-md-4  col-lg-4 mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="{{$transportador->celular}}">
                            <div class="invalid-feedback fw-1">
                                Por favor, insira um número válido.
                            </div>
                        </div>

                        <div class="col-sm-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                            <label for="nrTelefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{$transportador->telefone}}" required>
                            <div class="invalid-feedback fw-1">
                                Por favor, insira um número alternativo válido .
                            </div>
                        </div>


                        <div class="col-sm-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                            <label for="areaActuacao" class="form-label">Área Actuação
                                <i class="bi bi-info-circle px-2" style="font-size: .8rem !important;"></i>
                            </label>

                            <select class="form-select" id="areaActuacao" name="areaActuacao" required>
                                @foreach (json_decode('{"Local":"Local", "Interprovincial":"Interprovincial", "Internacional":"Internacional", "Todos Destinos":"Todos Destinos"}', true) as $optionKey => $optionValue)
                                    <option value="{{$optionKey}}" {{(isset($transportador->areaActuacao) && $transportador->areaActuacao == $optionKey) ? 'selected' : ''}}>{{$optionValue}}</option>
                                    @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma Área Actuação válida.
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-7 col-lg-8 mb-3 fw-1">
                            <label for="morada" class="form-label">Morada</label>
                            <input type="text" class="form-control" id="morada" name="morada" value="{{$transportador->morada}}"  required>
                            <div class="invalid-feedback">
                                Por favor, insira uma morada válida.
                            </div>
                        </div>


                        <div class="col-sm-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                            <label for="tipoEmpresa" class="form-label">Categoria Empresarial
                                <i class="bi bi-info-circle px-2" style="font-size: .8rem !important;"></i>
                            </label>

                            <select class="form-select" id="tipoEmpresa" name="tipoEmpresa" required>
                                @foreach (json_decode('{"Empresa":"Empresa", "Singular":"Singular", "Não Definido":"Não Definido"}', true) as $optionKey => $optionValue)
                                    <option value="{{$optionKey}}" {{(isset($transportador->tipoEmpresa) && $transportador->tipoEmpresa == $optionKey) ? 'selected' : ''}}>{{$optionValue}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Selecione uma categoria Empresarial válida.
                            </div>
                        </div>

                        <div class="titulo-form-header mb-4 text-muted">
                            <a>Dados Bancários e Validação de Documentos</a>
                        </div>


                        <div class="col-sm-6 col-sm-4 col-md-4 col-lg-3 mb-3">
                            <label for="areaActuacao" class="form-label">Método de Pagamento
                                <i class="bi bi-info-circle px-2" style="font-size: .8rem !important;"></i>
                            </label>

                            <select class="form-select" id="metodoPagamento" name="metodoPagamento" required>
                                @foreach (json_decode('{"Emola":"Emola", "Mkesh":"Mkesh", "Mpesa":"Mpesa", "Absa":"Absa", "BIM":"BIM"}', true) as $optionKey => $optionValue)
                                <option value="{{$optionKey}}" {{(isset($transportador->metodoPagamento) && $transportador->metodoPagamento == $optionKey) ? 'selected' : ''}}>{{$optionValue}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Selecione um Método de Pagamento válido.
                            </div>
                        </div>

                        <div class="col-sm-5 col-sm-4 col-md-6 col-lg-3 mb-3 fw-1">
                            <label for="contaPagamento" class="form-label">Nº conta Pagamento</label>
                            <input type="number" class="form-control" id="contaPagamento" name="contaPagamento" value="{{$transportador->contaPagamento}}" required>
                            <div class="invalid-feedback">
                                Por favor, insira um Nº conta válido.
                            </div>
                        </div>

                        <div class="col-sm-5 col-sm-4 col-md-6 col-lg-3 mb-3 fw-1">
                            <label for="cartaValidade" class="form-label">Validade da Carta</label>
                            <input type="date" class="form-control" id="cartaValidade" name="cartaValidade" value="{{$transportador->cartaValidade}}" required>
                            <div class="invalid-feedback">
                                Por favor, insira a validade da carta.
                            </div>
                        </div>

                        <div class="col-sm-3 col-sm-3 col-md-4 col-lg-3 mb-3">
                            <label for="cartaConducao">Foto da Carta</label>
                            <img src="{{ asset('images/cartas/'.$transportador->cartaConducao)}}" alt="" class="img-product"  id="file-preview"/>
                            <input type="file" name="cartaConducao" accept="image/*" onchange="showFile(event)">
                        </div>



                        <div class="col-sm-3 col-sm-3 col-md-4 col-lg-4 ">
                            <label>BI Frontal</label>
                            <img src="{{ asset('images/bi/frontal/'.$transportador->biFrontal)}}" alt="" class="img-product"  id="file-preview2"/>
                            <input type="file" name="biFrontal" accept="image/*" onchange="showFile2(event)">
                        </div>

                        <div class="col-sm-3 col-sm-3 col-md-4 col-lg-4 ">
                            <label>BI Traseiro</label>
                            <img src="{{ asset('images/bi/traseiras/'.$transportador->biTraseira)}}" alt="" class="img-product"  id="file-preview3"/>
                            <input type="file" name="biTraseira" accept="image/*" onchange="showFile3(event)">
                        </div>

                        <div class="col-sm-3 col-sm-3 col-md-4 col-lg-4 ">
                            <label>Licensa</label>
                            <img src="{{ asset('images/licensas/'.$transportador->licensa)}}" alt="" class="img-product"  id="file-preview4"/>
                            <input type="file" name="licensa" accept="image/*" onchange="showFile4(event)">
                        </div>

                        <input type="hidden" name="id" value="{{$transportador->id}}">

                        <div class="d-flex gap-2 col-12 mx-auto btns-actions-forms mt-3 mb-5 justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-12 col-lg-5 mt-4">Gravar
                                Dados</button>
                        </div>

                    </form>
                </div>




            </div>
            <!-- End  -->

        </div>
    </div>


    <script>
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }

        function showFile2(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview2');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }

        function showFile3(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview3');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }

        function showFile4(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview4');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
