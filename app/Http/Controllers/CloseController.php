<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tickets;

class CloseController extends Controller
{
    public function close(Request $request, $id)
    {
        $tickets = Tickets::find($id);
        $tickets->active = FALSE;
        $tickets->save();
        $request->session()->flash('close', 'Ticket closed successfully.');
        return redirect('tickets');
    }
}
