
<div class="col-sm-12">
    <label for="">{{__('GestionProjets/task/message.name')}}</label>
    <p>{!! $task->nom !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('GestionProjets/task/message.description')}}</label>
    <p>{!! $task->description !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('GestionProjets/task/message.project')}}</label>
    <p>{!! $task->project->nom !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('GestionProjets/task/message.startDate')}}</label>
    <p>{!! $task->date_debut !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('GestionProjets/task/message.endDate')}}</label>
    <p>{!! $task->date_de_fin !!}</p>
</div>




