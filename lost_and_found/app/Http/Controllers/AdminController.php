<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function items()
    {
        $items = Item::paginate(10); // Paginate items
        return view('admin.items', compact('items'));
    }

    public function approve(Item $item)
    {
        $item->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Item approved successfully.');
    }

    public function resolve(Item $item)
    {
        $item->update(['status' => 'resolved']);
        return redirect()->back()->with('success', 'Item marked as resolved.');
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    

   // Dashboard (Admin home)
   public function dashboard()
   {
       $lostItems = Item::where('status', 'lost')->latest()->take(5)->get();
       $foundItems = Item::where('status', 'found')->latest()->take(5)->get();
       return view('admin.dashboard', compact('lostItems', 'foundItems'));
   }


   // Resolve item (mark as resolved)
   public function resolveItem(Item $item)
   {
       $item->update(['status' => 'resolved']);
       return redirect()->back()->with('success', 'Item marked as resolved.');
   }

//    // Delete item
//    public function deleteItem(Item $item)
//    {
//        $item->delete();
//        return redirect()->back()->with('success', 'Item deleted successfully.');
//    }

   // Manage users
   public function users()
   {
       $users = User::paginate(10);
       return view('admin.users', compact('users'));
   }

   // Delete user
   public function deleteUser(User $user)
   {
       $user->delete();
       return redirect()->back()->with('success', 'User deleted successfully.');
   }

   // View statistics
   public function statistics()
   {
       $totalItems = Item::count();
       $lostItems = Item::where('status', 'lost')->count();
       $foundItems = Item::where('status', 'found')->count();
       $resolvedItems = Item::where('status', 'resolved')->count();
       $totalUsers = User::count();

       return view('admin.statistics', compact('totalItems', 'lostItems', 'foundItems', 'resolvedItems', 'totalUsers'));
   }

    // public function editItem(Request $request, Item $item)
    // {
    //     $item->update($request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'category' => 'required|string',
    //         'contact' => 'required|string',
    //     ]));
    //     return redirect()->back()->with('success', 'Item updated successfully.');
    // }
    
    // Display All Items
    public function manageItems()
    {
        $items = Item::all(); // Fetch all items
        return view('admin.manage-items', compact('items'));
    }

    // Delete an Item
    public function deleteItem($id)
    {
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return back()->with('success', 'Item deleted successfully!');
        }
        return back()->with('error', 'Item not found!');
    }

    // Edit Item Form
    // public function editItem($id)
    // {
    //     $item = Item::find($id);
    //     if ($item) {
    //         return view('admin.edit-item', compact('item'));
    //     }
    //     return back()->with('error', 'Item not found!');
    // }

    // Update Item
    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'contact' => 'required|email',
        ]);

        $item = Item::find($id);
        if ($item) {
            $item->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'contact' => $request->contact,
            ]);
            return redirect()->route('admin.manage-items')->with('success', 'Item updated successfully!');
        }

        return back()->with('error', 'Item not found!');
    }

    public function editItem(Item $item)
{
    return view('admin.edit-item', compact('item'));
}

public function createItem()
{
    return view('admin.create-item'); // Create the view for the form
}
public function storeItem(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
    ]);

    // Create a new item
    $item = new Item();
    $item->name = $validatedData['name'];
    $item->description = $validatedData['description'];
    $item->category = $validatedData['category'];
    $item->contact = $validatedData['contact'];
    $item->save();

    // Redirect back to the Manage Items page
    return redirect()->route('admin.manage-items')->with('success', 'Item added successfully.');
}


}

