@extends('layouts.base')

@section('content')   
<div class="row">
    <div class="col-12 d-none">
        @if(count($errors) > 0)
        <?php 
        $modalName = '';
            if ($errors->has('sp-short_name') || $errors->has('sp-name')) {
                $modalName = '#modalMC';
                } else {
                $modalName = '';
            }
        ?>
        <input id="validation_error" name="validation_error" type="text" class="form-control" value="{{ $modalName }}" hidden>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
                <h5>Proveedores</h5>
                <small class="m-0">Listado de proveedores</small>
            </div>
            <div class="card-body">
                <ul class="list-group">
                @foreach ($data as $key => $d)  
                    <li class="list-group-item d-flex justify-content-between">
                        <p id="{{$d->id}}name" class="m-auto col-8" style="font-size: 1rem; font-weight: 500;">{{ $d->name }}</p>
                        <input id="{{$d->id}}" type="hidden" class="m-0 col-8" style="font-size: 1rem; font-weight: 500;" value="">
                        <input id="{{$d->id}}-Short" type="hidden" class="m-0 col-8" style="font-size: 1rem; font-weight: 500;" value="">
                        <div class="col-4 flex-row-reverse d-inline-flex">                               
                            <button class="btn btn-light m-1 p-sm-2 p-lg-2" onclick="confirmation({{$d->id}})" data-bs-toggle="modal" data-bs-target="#ConfirmationModal"><i class="fa fa-trash-alt fs-5 px-1"></i></button>                                                                    
                            <button class="btn btn-light m-1 p-sm-2 p-lg-2" data-id="{{ $d->id }}" data-nameshort="{{ $d->short_name }}" data-name="{{ $d->name }}" data-bs-toggle="modal" data-bs-target="#modalMC"><i class="fa fa-edit fs-5 px-1"></i></button>
                        </div>
                    </li>                             
                @endforeach                            
                </ul>
            </div>
            <div class="d-flex justify-content-center ">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>                      

@endsection

@section('search')
@include('partes.search',['route' => 'source.provider.index'])
@endsection

@section('modal')       
<div class="modal fade" id="modalMC" tabindex="-1" aria-labelledby="modalMC" aria-hidden="true">        
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMC">Proveedores</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-cancha-update" action="{{ route('source.provider.edit') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-6 m-auto">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="sp-id" name="sp-id" value="" hiddenx >
                                        <div class="col-12">
                                            <p>*Nombre Corto</p>
                                            <p><input id="sp-name-short" name="sp-name-short" class="form-control form-control-sm" type="text" max-length="5" required value="{{ @old('sp-name-short') }}"></p>
                                            @error('sp-name-short')<small class="form-text text-mute ">{{ $message }}</small>@enderror
                                        </div>
                                        <div class="col-12">
                                            <p>*Nombre</p>
                                            <p><input id="sp-name" name="sp-name" class="form-control form-control-sm" type="text" max-length="50" required value="{{ @old('sp-name') }}"></p>
                                            @error('sp-name')<small id="" class="form-text text-muted">{{ $message }}</small>@enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>        
</div>  


<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ConfirmationModalLabel">¿Desea eliminar este proovedor?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a class="btn btn-primary" id="confirm-modal-a">Si</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        if(typeof($('#validation_error')[0]) === 'object') {            
            var myModal = new bootstrap.Modal(document.getElementById('modalMC'));
            myModal.show();
        }
    });
</script>

<script> 
function confirmation(aidi){
    document.getElementById("confirm-modal-a").setAttribute("href", "delete/" + aidi);
}
</script>

<script>
var modalEdit = document.getElementById('modalMC');
modalEdit.addEventListener('shown.bs.modal', function (event) {
o = event.relatedTarget
    if (!o) return;

        $("#sp-id").val("");
        $("#sp-name-short").val("");
        $("#sp-name").val("");

    if(o.dataset.id) {
        $("#sp-id").val(o.dataset.id);
        $("#sp-name-short").val(o.dataset.nameshort);
        $("#sp-name").val(o.dataset.name);
    }
})
</script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection