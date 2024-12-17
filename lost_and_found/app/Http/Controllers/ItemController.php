<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Show the Report Lost Item form
    public function createLost()
    {
        return view('report-lost');
    }

    // Handle form submission for lost items
    public function storeLost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'contact' => 'required|string|max:255',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            
        }

        // Save to database
        Item::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'image' => $imagePath,
            'contact' => $validated['contact'],
            'status' => 'lost',
        ]);

        return redirect('/')->with('success', 'Lost item reported successfully!');
    }

    public function createFound()
    {
        return view('report-found'); // Show the form to report found items
    }

    public function storeFound(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'contact' => 'required|string|max:255',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')?->store('uploads', 'public');

        // Create a new found item
        Item::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'image' => $imagePath,
            'contact' => $validated['contact'],
            'status' => 'found', // Mark as 'found'
        ]);

        return redirect('/')->with('success', 'Found item reported successfully!');
    }

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
            // Default: Get all items
            $items = Item::latest()->paginate(6);
        }

        return view('items.index', compact('items'));
    }
}
