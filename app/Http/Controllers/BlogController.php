<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateblogRequest;
use App\Http\Requests\UpdateblogRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\blogRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Str;

class blogController extends AppBaseController
{
    /** @var blogRepository $blogRepository*/
    private $blogRepository;

    public function __construct(blogRepository $blogRepo)
    {
        $this->blogRepository = $blogRepo;
    }

    /**
     * Display a listing of the blog.
     */
    public function index(Request $request)
    {
        $blogs = $this->blogRepository->paginate(10);

        return view('blogs.index')
            ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(CreateblogRequest $request)
    {
        $input = $request->all();

        $input["slug"] = Str::slug($input["title"], "-");

        $this->blogRepository->create($input);

        Flash::success('Blog saved successfully.');

        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified blog.
     */
    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        return view('blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        return view('blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified blog in storage.
     */
    public function update($id, UpdateblogRequest $request)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        $input = $request->all();

        $input["slug"] = Str::slug($input["title"], "-");

        $this->blogRepository->update($request->all(), $id);

        Flash::success('Blog updated successfully.');

        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified blog from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        $this->blogRepository->delete($id);

        Flash::success('Blog deleted successfully.');

        return redirect(route('blogs.index'));
    }
}
