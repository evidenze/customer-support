@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
   <div class="col-md-6 mr-auto ml-auto">
       <div class="card new">
            <div class="text-center card-header"><h3>Add New Ticket</h3></div>
           <div class="card-body">
           <form class="form-horizontal" method="POST" action="{{ route('ticket.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="subject" class="col-md-12 control-label">Subject</label>

                            <div class="col-md-12">
                                <input id="subject" placeholder="eg..Payment" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-12 control-label">Department</label>

                            <div class="col-md-12">
                                <input id="department" placeholder="Customer Billing" type="text" class="form-control" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-12 control-label">Description</label>

                            <div class="col-md-12">
                                <textarea id="description" placeholder="Details description about the ticket.." rows="5" type="text" class="form-control" name="description" value="{{ old('description') }}" required></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12 control-label">Priority</label>

                            <div class="col-md-12">
                                <select class="form-control" name="priority" id="" required>
                                    <option value="" >Choose..</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                    </select>

                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
       </div>
    </div>
   </div>
</div>
</div>
@endsection
