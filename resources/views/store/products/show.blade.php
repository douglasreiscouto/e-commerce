@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">                     
                <div class="col-md-7">
                    <div class="card">                      
                        <div class="card-body">
                            <img src="{{$product->url}}" class="card-img-top" alt="...">
                            <p class="card-text">{{$product->description}}</p>                                                      
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">                     
                        <div class="card-body">
                            <h2 class="card-title">{{$product->title}}</h2>
                            <p class="card-text h3">R$ {{$product->amount}}</p> 
                            <hr/>
                                <div id="div-calc">
                                    <div class="loader" style="margin: auto; padding: 10px; display:none">

                                    </div>
                                    <form id="form-calc" class="form-inline">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" name="zipcode" maxlength="8" 
                                            class="form-control" id="zipcode" placeholder="Digite seu CEP">
                                        </div>
                                        <button type="button" id="calc" class="btn btn-primary mb-2">Calcular Frete</button>
                                    </form>
                                </div>
                            <hr/>
                            <div class = "d-flex justify-content-between aling-items-center">
                                <div class = "btn-group">
                                    <button type = "button" class = "btn btn-outline-success">Comprar</button>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
    </div>
</div>
    
@endsection

@section('js')

<script>
    $(document).ready(function(){
        $('#calc').on('click', function(){
            let cepDestination = $('#zipcode').val();
            if(cepDestination.length == 8){
                $.get('http://localhost:8000/ws/frete',{
                    cep_origem: '29800000',
                    cep_destino: cepDestination,
                    altura: {{ $product->width }},
                    comprimento: {{ $product->lenght }},
                    largura: {{ $product->height }},
                    peso: {{ $product->weight }}
                })
                .then(function(data){
                    let html = '';
                    html = '<ul class="list-group list-group-flush">';
                    $.each(data, function(i){
                        html += '<li class="list-group-item">' + data[i].tipo + ' entrega em '+ data[i].prazo_entrega + ' dias úteis R$'+ data[i].valor + '</li>'
                    })
                    html += '</ul>'
                    $('#div-calc').html(html);
                });
            }
        });
        $(document).on({
            ajaxStart: function(){
                $('#form-calc').hide();
                $('.loader').show();
            },
            ajaxStop: function(){
                $('.loader').hide();
            }
        })
    });
</script>
    
@endsection