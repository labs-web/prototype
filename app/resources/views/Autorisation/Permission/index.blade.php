@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}.
        </div>
        @endif

        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('Autorisation/Permision/message.Permision')}}
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="{{ route('permission.create') }}" class="btn btn-info">{{__('Autorisation/Permision/message.add')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-md-12">
                        <div class="d-flex justify-content-between">

                            <div class="dropdown input-group">
                                <button class="btn btn-default mr-3 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-filter text-dark pr-2 border-right"></i>
                                    {{__('Autorisation/Permision/message.choix')}}
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($projects as $item)
                                    <a class="dropdown-item" href="/projet/{{$item->id}}/permissions">{{$item->nom}}</a>
                                    @endforeach
                                    
                                </div>
                            </div>

                            <div class=" p-0">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="permission_search" id="permission_search" class="form-control" placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Autorisation.Permision.table')
                </div>

            </div>
        </div>
    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    function fetch_data(page, search) {
        var url = '/permissions?page=' + page + '&searchPermission=' + search;
        
        $.ajax({
            url: url,
            success: function(data) {
                var newData = $(data);
                console.log(newData);
                $('#permission-table').html(newData.find('#permission-table').html());
                $('.card-footer').html(newData.find('.card-footer').html());
                var paginationHtml = newData.find('.pagination').html();
                if (paginationHtml) {
                    $('.pagination').html(paginationHtml);
                } else {
                    $('.pagination').html('');
                }
            }
        });
    }

    $('body').on('click', '.pagination a', function(param) {
        param.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search = $('#permission_search').val();
        fetch_data(page, search);
    });

    $('body').on('keyup', '#permission_search', function() {
        var search = $('#permission_search').val();
        var page = 1;
        fetch_data(page, search);
    });

    fetch_data(1, '');
});

function confirmDelete(form) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette permission ?")) {
        form.submit();
    }
}



</script>

@endsection