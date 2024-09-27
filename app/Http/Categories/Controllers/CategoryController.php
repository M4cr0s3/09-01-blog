<?php

namespace App\Http\Categories\Controllers;

use App\Http\Categories\Requests\StoreRequest;
use App\Http\Categories\Requests\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('category.index', [
            'categories' => Category::query()
                ->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $category = Category::query()
            ->where('title', $data['title'])
            ->first();

        if ($category) {
            Session::flash('error', 'Категория с таким названием уже существует.');
            return redirect()->route('categories.index');
        }

        Category::query()->create($data);

        return redirect()->route('categories.index');
    }

    public function show(Category $category): View
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
