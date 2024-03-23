
<div class="col-sm-12">
    <label for="">{{__('Autorisation/action/message.name')}}</label>
    <p>{!! $action->nom !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('Autorisation/action/message.description')}}</label>
    <p>{!! $action->description !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('Autorisation/action/message.controller')}}</label>
    <p>{!! $action->controller->nom !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('Autorisation/action/message.startDate')}}</label>
    <p>{!! $action->date_debut !!}</p>
</div>

<div class="col-sm-12">
    <label for="">{{__('Autorisation/action/message.endDate')}}</label>
    <p>{!! $action->date_de_fin !!}</p>
</div>




