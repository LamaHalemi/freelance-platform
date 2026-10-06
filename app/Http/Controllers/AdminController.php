<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $categoriesCount = Category::count();
        $servicesCount = Service::count();
        $reviewsCount = Review::count();

        return view('admin.dashboard', compact(
            'usersCount',
            'categoriesCount',
            'servicesCount',
            'reviewsCount'
        ));
    }

    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function categories()
    {
        $categories = Category::latest()->get();

        return view('admin.categories', compact('categories'));
    }

    public function services()
    {
        $services = Service::with([
            'user',
            'category'
        ])->latest()->get();

        return view('admin.services', compact('services'));
    }

    public function reviews()
    {
        $reviews = Review::with([
            'service',
            'customer',
            'freelancer'
        ])->latest()->get();

        return view('admin.reviews', compact('reviews'));
    }

    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            abort(400, 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect('/admin/users');
    }

    public function deleteCategory(Category $category)
    {

        if ($category->services()->exists()) {
            abort(400, 'You cannot delete a category that has services.');
        }

        $category->delete();

        return redirect('/admin/categories');
    }

    public function deleteService(Service $service)
    {
        $service->delete();

        return redirect('/admin/services');
    }

    public function deleteReview(Review $review)
    {
        $review->delete();

        return redirect('/admin/reviews');
    }
}
