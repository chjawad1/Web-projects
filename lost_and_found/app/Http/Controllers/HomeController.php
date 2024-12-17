<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Handle search
        $query = $request->input('search');
        if ($query) {
            $items = Item::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->paginate(6);
        } else {
            // Default: Get recent items
            $items = Item::latest()->paginate(6);
        }
        // Handle search and fetch recent items
        $query = $request->input('search');
        $items = $query
            ? Item::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->paginate(6)
            : Item::latest()->paginate(6);
            // Fetch statistics
        $totalItems = Item::count();
        $lostItems = Item::where('status', 'lost')->count();
        $foundItems = Item::where('status', 'found')->count();
        $resolvedItems = Item::where('status', 'resolved')->count();

        

        return view('home', compact('items', 'totalItems', 'lostItems', 'foundItems', 'resolvedItems'));
    }

    
    
}

