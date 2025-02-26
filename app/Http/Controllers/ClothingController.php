<?php


namespace App\Http\Controllers;

use App\Models\Clothing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClothingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');
        $outfit = $request->query('outfit');

        $query = Clothing::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($category) {
            $query->where('category', $category);
        }

        if ($outfit) {
            $query->where('outfit', $outfit);
        }

        $clothingItems = $query->latest()->limit(20)->get(); // ✅ Fetch only 20 items

        return Inertia::render('Dashboard', [
            'clothingItems' => $clothingItems
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'brand' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image_url' => 'nullable|string',
            'outfit' => 'nullable|string'
        ]);

        Clothing::create($request->all());

        return redirect()->back()->with('success', 'Clothing item added!');
    }

    public function update(Request $request, Clothing $clothing)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'brand' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image_url' => 'nullable|string',
            'outfit' => 'nullable|string'
        ]);

        $clothing->update($request->all());

        return redirect()->back()->with('success', 'Clothing item updated!');
    }

    public function destroy(Clothing $clothing)
    {
        $clothing->delete();

        return redirect()->back()->with('success', 'Clothing item deleted!');
    }
}
