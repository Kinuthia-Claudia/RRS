<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class WelcomeController extends Controller
{
    public function index()
    {

        $specials = Category::where('name', 'specials')->with('menus')->first();

        return view('welcome', compact('specials'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
    public function contactus()
    {
        return view('contactus'); // Adjust 'contact' to match your blade file name
    }

    // Method to handle the contact form submission
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Process and store the data in the database
        Contactus::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ]);

        // Optionally, redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
