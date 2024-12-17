<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch recently reported lost and found items
        $lostItems = Item::where('status', 'lost')->latest()->take(5)->get();
        $foundItems = Item::where('status', 'found')->latest()->take(5)->get();

        // Pass the data to the dashboard view
        return view('dashboard', compact('lostItems', 'foundItems'));
    }
}