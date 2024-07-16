<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function index()
    {
        // Get the authenticated user's email
        $userEmail = Auth::user()->email;

        // Fetch reservations for the authenticated user
        $reviews = Reviews::where('email', $userEmail)->get();

        // Pass the reservations to the view
        return view('customer.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $reservations = auth()->user()->reservations; // Assuming you have a relationship set up
        return view('customer.reviews.create', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
            'heading' => 'nullable|string',

        ]);

        $user = auth()->user();

        Reviews::create([

            'user_id' => $user->id,
            'rating' => $request->rating,
            'comments' => $request->comments,
            'heading' => $request->heading,
            'email' => $user->email,
        ]);

        return redirect()->route('customer.reviews.index')->with('success', 'Review submitted successfully.');
    }
    public function edit(Reviews $review)
    {
        return view('customer.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255'
        ]);

        $review->update([
            'rating' => $request->rating,
            'comments' => $request->comments,
            'heading'=> $request->heading,
        ]);

        return redirect()->route('customer.reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $review)
    {
        $review->delete();
        return redirect()->route('customer.reviews.index')->with('danger', 'Review deleted successfully.');
    }

}


