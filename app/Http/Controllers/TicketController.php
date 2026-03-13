<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function tickets() {
        return view('pages.tickets');
    }
    public function new_tickets() {
        return view('pages.new_ticket');
    }
    public function ticket_detail() {
        return view('pages.ticket_detail');
    }
}
