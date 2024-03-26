<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('utilisateurs/message.User Name') }}</th>
                    <th>{{ __('utilisateurs/message.User Lastname') }}</th>
                    <th>{{ __('utilisateurs/message.User Email') }}</th>             
                   <th class="text-center" >Actions</th>

                </tr>
            </thead>
    

            <tbody id="tbodyresults">
          
                @foreach($utilisateurs as $utilisateur)

                    <tr>
                        <td>{{ $utilisateur->prenom }}</td>
                        <td>{{ $utilisateur->nom }}</td>
                        <td>{{ $utilisateur->email }}</td>

            
                        <td class="text-center w-25">
                            <a class="btn btn-default btn-sm" href="{{ route('utilisateurs.show', $utilisateur->id) }}">
                                <i class="far fa-eye"></i>
                            </a>


                            <a href="{{route('utilisateurs.edit', $utilisateur->id)}}" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>

                   
                            <button type="button" class="btn btn-sm btn-danger delete-utilisateur" data-toggle="modal" data-target="#modal-default" data-utilisateur-id="{{ $utilisateur->id }}" data-utilisateur-name="{{ $utilisateur->prenom }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>



                        
                    </tr>

             @endforeach
          
            
            
            </tbody>
        </table>
    </div>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" style="display: inline-block;" action="" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">{{ __('utilisateurs/message.Are you sure you want to delete this utilisateur?') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                
                    <!-- Modal body content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  


    <div class="card-footer clearfix">
        
            <div class="float-right">
            <div id="paginationContainer">                 
                @if ($utilisateurs->lastPage() > 1)
                <ul class="pagination m-0">
                    @if ($utilisateurs->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $utilisateurs->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $utilisateurs->lastPage(); $i++)
                        @if ($i == $utilisateurs->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($utilisateurs->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $utilisateurs->currentPage() + 1 }}" rel="next"
                                aria-label="@lang('pagination.next')">»</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">»</span>
                        </li>
                    @endif
                </ul>
            @endif              
            </div>
        </div>  
        
         <div class="float-left d-flex">
            <a href="{{route('export.utilisateurs')}}" style="height: 32px;" class="btn btn-default btn-sm text-bold">
                <i class="fa-solid fa-file-export"></i>  {{ __('utilisateurs/message.Export') }}
            </a>
            
            <form action="{{ route('import.utilisateurs') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="utilisateurs" id="formFileInpututilisateurs" style="position: absolute; left: -9999px;">
                <button type="button" id="fileButtonutilisateurs" class="btn btn-default btn-sm mt-0 mx-2 text-bold"><i class="fa-solid fa-file-arrow-down"></i> {{ __('utilisateurs/message.Import') }} </button>
            </form>

            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButtonutilisateurs').click(function() {
                $('#formFileInpututilisateurs').click();
            });
        
            $('#formFileInpututilisateurs').change(function() {
              
                $('#importForm').submit();
            });
        });
        </script> 
                                            
           
    </div>

</div>



