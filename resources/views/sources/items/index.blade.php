@extends('layouts.base')

@section('content')	

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
                <h5>Items</h5>
                <small class="m-0">Listado de items</small>
            </div>
            <div class="card-body">
                <ul class="list-group">
                @foreach ($data as $key => $d)
                @if(isset($d->provider->name))
                    <li class="list-group-item d-flex justify-content-between">
                    <p class="m-0" style="font-size: 1rem; font-weight: 500;">{{ $d->ean }}</p>
                    <p class="m-0 text-secondary" style="font-size: .7rem; font-weight: 700;">{{ $d->provider->name}}</p>
                    <i class="fas fa-chevron-right text-secondary"></i>
                </li> 
                @endif                                                    
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
    @include('partes.search',['route' => 'source.item.index'])
@endsection

@section('modal')
    <div class="modal fade" id="modalMC" tabindex="-1" aria-labelledby="modalMC" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalMC">Items</h5> 
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-6 m-auto">
                            <div class="row">
                                <div class="col-12">
                                    <form class="" action="{{ route('source.item.create') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                                <label class="form-label" >Codigo de barras</label>
                                                <input  class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Codigo de barras" value="{{old('barcode')}}">
                                                @error('barcode')<small id="" class="form-text text-mute ">{{ $message }}</small>@enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">BUSCAR</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
@if (count($errors)>0)  
    <script type="text/javascript"> 
        var myModal = new bootstrap.Modal(document.getElementById('modalMC'));
        myModal.show();
    </script>
@endif
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection