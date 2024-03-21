@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('utilisateurs/message.Users list') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('utilisateurs.create') }}" class="btn btn-info btnAdd"> <i class="fas fa-plus"></i>
                            {{ __('utilisateurs/message.Create a User') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Small boxes (Stat box) -->
            <div class="card">

                <div class="card-header col-md-12">
                    <div class=" p-0">
                        <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                            <input type="text" name="search" class="form-control float-right" id="searchInput"
                                placeholder="{{ __('utilisateurs/message.Search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="resulthtml">
                    @include('utilisateurs.utilisateursTablePartial')
                </div>

            </div>

        </div>


    </section>
    <!-- /.content -->
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-utilisateur', function() {
            var utilisateurId = $(this).data('utilisateur-id');
            var utilisateurName = $(this).data('utilisateur-name'); // Retrieve utilisateur name
            console.log(utilisateurId);
            console.log(utilisateurName); // Log the utilisateur name to verify

            var deleteUrl = "{{ route('utilisateurs.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(':id', utilisateurId);
            console.log(deleteUrl);

            // Update modal content with the utilisateur name
            $('#modal-default .modal-body').html(`
    <div>
        {{ __('utilisateurs/message.if you are sure you want to delete this utilisateur') }}
        <strong>"${utilisateurName}"</strong>
        {{ __('utilisateurs/message.Click the Delete button to continue') }}
    </div>
`);
            // Update form action URL
            $('#deleteForm').attr('action', deleteUrl);
        });
    });


    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('utilisateurs.index') }}', {
            data: {
                query: query,
                page: page
            },
            success: (data) => updateTable(data)
        });
        history.pushState(null, null, '?query=' + query + '&page=' + page);
    };



    const updateTable = (html) => {
        try {
            $('#resulthtml').html(html); // Target the tbody element and update its content
            updatePaginationLinks();
        } catch (error) {}
    };


    const updatePaginationLinks = () => {
        $('button[page-number]').each(function() {
            $(this).on('click', function() {
                pageNumber = $(this).attr('page-number')
                search(searchQuery, pageNumber)
            })
        })
    }


    $(document).ready(() => {


        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
    });
</script>
