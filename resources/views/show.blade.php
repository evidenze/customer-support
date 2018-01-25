@extends('layouts.main')

@section('content')
<div class="container">
    <h5 class="dashboard">TICKET DETAILS</h5>
</div>

<div class="container">
    @if ( session()->has('edit'))
                      <div class="alert alert-success" role="alert">{{ session()->get('edit') }}</div>
                  @endif
    <div class="card">
    <div class="card-body">
@if($ticket->active == null)
    <div class="alert alert-danger" role="alert">
  This ticket as been marked as closed
</div>
@endif
    <div class="row">
        <div class="col-md-3">
            <h5 class="show">Ticket ID</h5><br>
            <h6>{{ $ticket->ticket_id }}</h6>
            
        </div>
    <div class="col-md-3">
        <h5 class="show">Status</h5><br>
        <h6>@if($ticket->active == 1)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-secondary">Closed</span>
            @endif
            </h6>
        
    </div>
    <div class="col-md-3">
        <h5 class="show">Date Created</h5><br>
        <h6>{{ $ticket->created_at }}</h6>
        
    </div>
    <div class="col-md-3">
        <h5 class="show">Date Updated</h5><br>
        <h6>{{ $ticket->updated_at }}</h6>
        
    </div>
</div>
</div><br><br><br>
<div class="container">
    <h5 class="show">Description</h5><br>
    <p>{{ $ticket->description }}</p><br><br><br>

    @if($ticket->active == null)
       <button type="button" class="btn btn-success" disabled>Edit</button>&nbsp&nbsp
       <button type="button" class="btn btn-warning" disabled>Close</button>
    @else
    <a class="btn btn-success edit" href="{{ route('ticket.edit', $ticket->id)}}" role="button">Edit</a>&nbsp&nbsp
    <a class="btn btn-warning" href="{{ route('close', $ticket->id)}}" role="button">Close</a>
    @endif 
    &nbsp&nbsp<a class="btn btn-danger" href="{{ route('ticket.destroy', $ticket->id)}}" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" role="button">Delete</a>
                                                      <form id="delete-form" action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" style="display: none;">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                     </form><br><br><br>
</div>
</div>
</div>
@endsection
