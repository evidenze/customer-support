@extends('layouts.main')

@section('content')
<div class="container">
    <h4 class="dashboard">DASHBOARD</h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body" style="background-color:#1e88e5;color:#fff;">
                <h1 class="stat"><a class="data" href="{{ route('tickets') }}">{{ $allTickets }}</a></h1>
                <h3><a class="data" href="{{ route('tickets') }}">Total Tickets</a></h3>
              </div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body" style="background-color:#ef5350  ;color:#fff;">
                <h1 class="stat">{{ $open }}</h1>
                <h3>Active Tickets</h3>
              </div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body" style="background-color:#00e676 ;color:#fff;">
               <h1 class="stat">{{ $closed }}</h1>
                <h3>Closed Tickets</h3>
              </div>
            </div>
            
        </div>
    </div><br><br>
    <hr>

    <div class="card">
      <div class="card-body">
    <h4 style="margin-top:20px;color:#263238;font-weight:bold;">TICKETS</h4>

  @if($allTickets >= 1)
    <p>Click on ticket ID to show details<p>
    <a class="btn btn-primary float-right" href="{{ route('ticket.create')}}" role="button">Add New Ticket</a><br><br>
  @endif

  @if($allTickets == 0)

        <h2 class="text-center">No ticket found</h2><br><br>
        <p class="text-center"><a class="btn btn-primary float-center" href="{{ route('ticket.create')}}" role="button">Add New Ticket</a></p>
  @else
        <table class="table table-striped">

      <thead>
        <tr>
          <th scope="col">Ticket ID</th>
          <th scope="col">Subject</th>
          <th scope="col">Status</th>
          <th scope="col">Priority</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
  @foreach($datas as $data)
        <tr>
          <td><a class="id" href="{{ route('ticket.show', $data->id) }}">{{ $data->ticket_id }}</td>
          <td>{{ $data->subject }}</td>
          <td>
            @if($data->active == 1)
                              <span class="badge badge-success">Active</span>
            @else
              <span class="badge badge-secondary">Closed</span>
            @endif
          </td>
          <td>{{ $data->priority }}</td>
          <td>
        @if($data->active == null)

             <button type="button" class="btn btn-success" disabled>Edit</button>&nbsp&nbsp
             <button type="button" class="btn btn-warning" disabled>Close</button>
        @else
          <a class="btn btn-success edit" href="{{ route('ticket.edit', $data->id)}}" role="button">Edit</a>&nbsp&nbsp
          <a class="btn btn-warning" href="{{ route('close', $data->id)}}">Close</a>
        @endif
          &nbsp&nbsp          
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>                                                  
        </td>
        </tr>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to remove this ticket?<br>
        {{ $data->ticket_id }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="check" value="{{ $data->id }}">Delete</button>
      </div>
    </div>
  </div>
</div>
  @endforeach
          </tbody>
        </table><br><br><br>
      </div>
        {{ $datas->links() }}
  @endif
    </div></div><br><br><br>
@endsection
