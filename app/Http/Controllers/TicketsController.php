<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tickets;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketsController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tickets::latest()->paginate(5);

        /**
         * Number of all tickets
         * @var string
         */
        $allTickets = Tickets::all()->count();

        /**
         * Number of closed tickets
         * @var string
         */
        $closed = Tickets::where('active', FALSE)->count();

        /**
         * Number of active tickets
         */
        $open = Tickets::where('active', 1)->count();

            return view('dashboard',['datas' => $data, 'allTickets' => $allTickets,'closed' => $closed, 'open' => $open]);
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new');
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
          'description' => 'required',
          'subject' => 'required',
          'priority' => 'required',
          'department' => 'required',
      ]);

          $tickets = new Tickets;

          $tickets->description = $request->description;
          $tickets->subject = $request->subject;
          $tickets->priority = $request->priority;
          $tickets->department = $request->department;
          $tickets->active = TRUE;
          $tickets->ticket_id = str_random(10);

          $tickets->save();
          $request->session()->flash('success', 'New ticket added successfully.');

          return redirect('tickets');
    }

    /**
     * Display a specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Tickets::find($id);
            return view('show',['ticket' => $ticket]);
    }

    /**
     * Show the form for editing a specific ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Tickets::find($id);
            return view('edit',['ticket' => $ticket]);
    }

    /**
     * Update a specified ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
          'description' => 'required',
          'subject' => 'required',
          'priority' => 'required',
          'department' => 'required',
      ]);

          $tickets = Tickets::find($id);

          $tickets->description = $request->description;
          $tickets->subject = $request->subject;
          $tickets->priority = $request->priority;
          $tickets->department = $request->department;

          $tickets->save();
          $request->session()->flash('edit', 'Ticket updated successfully.');
          return redirect('tickets');

    }

    /**
     * Remove a specified ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ticket = Tickets::find($id);
        $ticket->delete();
        $request->session()->flash('delete', 'Ticket deleted successfully.');
        return redirect('tickets');
    }

    /**
     * Update a specified ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
      $data = Tickets::latest()->paginate(10);
      $allTickets = Tickets::all()->count();
      return view('tickets',['datas'=> $data, 'allTickets' => $allTickets]);
    }
}
