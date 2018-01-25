@extends('layouts.main')

@section('content')
<div class="container">
    <h3 class="dashboard">All Tickets</h3>
</div>
<div class="container">
 @if($allTickets >= 1)
    <a class="btn btn-primary float-right" href="{{ route('ticket.create')}}" role="button">Add New Ticket</a><br><br><br>
@endif
    
      @if ( session()->has('success'))
                      <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                  @endif
    
                  @if ( session()->has('delete'))
                      <div class="alert alert-success" role="alert">{{ session()->get('delete') }}</div>
                  @endif
    @if ( session()->has('close'))
                      <div class="alert alert-success" role="alert">{{ session()->get('close') }}</div>
                  @endif
        
                  @if ( session()->has('edit'))
                      <div class="alert alert-success" role="alert">{{ session()->get('edit') }}</div>
                  @endif

  <div class="card">
            <div class="card-body">

  @if($allTickets == 0)

        <h1 class="text-center" style="padding-top:50px;">No ticket found</h1><br><br>
        <p class="text-center"><a class="btn btn-primary" href="{{ route('ticket.create')}}" role="button">Add New Ticket</a><br><br><br></p>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this ticket?<br>
        {{ $data->ticket_id }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="check" value="{{ $data->id }}">Yes</button>
      </div>
    </div>
  </div>
</div>
  @endforeach
          </tbody>
        </table><br><br>
    </div>
        {{ $datas->links() }}
  @endif
</div></div><br><br>
@endsection
