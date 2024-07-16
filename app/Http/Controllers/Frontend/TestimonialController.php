<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reviews; // Assuming your model is named Review, singular and without s
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\User;


class TestimonialController extends Controller
{
    public function index()
    {

        $reviewspage = Reviews::orderBy('created_at', 'desc')->paginate(3);

        // Fetch reviews (assuming you have a Review model)
        $reviews = Reviews::all(); // Example query to fetch all reviews

        // Calculate ratings based on reviews
        $ratings = [
            '5' => $reviews->where('rating', 5)->count(),
            '4' => $reviews->where('rating', 4)->count(),
            '3' => $reviews->where('rating', 3)->count(),
            '2' => $reviews->where('rating', 2)->count(),
            '1' => $reviews->where('rating', 1)->count(),
        ];

        // Calculate total reviews
        $totalReviews = $reviews->count();
$sumRatings = 0;

foreach ($reviews as $review) {
    $sumRatings += $review->rating;
}

$averageRating = $totalReviews > 0 ? $sumRatings / $totalReviews : 0;


        return view('testimonials.index', compact('reviews','averageRating', 'ratings', 'totalReviews','reviewspage'));
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sortTestimonials(Request $request)
{
    $sortBy = $request->input('sort');

    if ($sortBy === 'latest') {
        $reviews = Reviews::orderBy('created_at', 'desc')->paginate(3);
    } elseif ($sortBy === 'oldest') {
        $reviews = Reviews::orderBy('created_at', 'asc')->paginate(3);
    } elseif ($sortBy === 'highest') {
        $reviews = Reviews::orderBy('rating', 'desc')->paginate(3);
    } elseif ($sortBy === 'lowest') {
        $reviews = Reviews::orderBy('rating', 'asc')->paginate(3);
    } else {
        // Default sorting
        $reviews = Reviews::orderBy('created_at', 'desc')->paginate(3);
    }

    $view = view('testimonial.index', compact('reviews'))->render();
    return response()->json(['html' => $view]);
}
public function sortReviews(Request $request)
    {
        $sortOption = $request->query('sort', 'newest');

        // Query reviews based on sort option
        $reviews = Reviews::orderBy('created_at', $sortOption == 'oldest' ? 'asc' : 'desc')
                         ->orderBy('rating', $sortOption == 'lowest' ? 'asc' : 'desc')
                         ->get();

        return response()->json(['reviews' => $reviews]);
    }

}
