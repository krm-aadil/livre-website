<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('crm')->except(['welcome', 'subscribe']); // Apply the CRM middleware for all methods except 'welcome' and 'subscribe'
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storePublicly('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
            $validatedData['image'] = $imagePath;
        }

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function welcome()
    {
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function subscribe(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email|unique:subscribers',
    ]);

    Subscriber::create($validatedData);

    return redirect()->back()->with('success', 'You are successfully subscribed.');
}

}
