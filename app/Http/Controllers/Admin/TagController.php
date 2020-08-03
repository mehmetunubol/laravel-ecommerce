<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;

/**
 * Class TagController
 * @package App\Http\Controllers\Admin
 */
class TagController extends BaseController
{
    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * TagController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = $this->categoryRepository->listTags();

        $this->setPageTitle('Tags', 'List of all tags');
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = $this->categoryRepository->listTags();

        $this->setPageTitle('Tags', 'Create Tag');
        return view('admin.tags.create', compact('tags'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');
        
        $params['parent_id'] = $this->categoryRepository->findTagId();
        $tag = $this->categoryRepository->createCategory($params);

        if (!$tag) {
            return $this->responseRedirectBack('Error occurred while creating tag.', 'error', true, true);
        }
        return $this->responseRedirect('admin.tags.index', 'Tag added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetTag = $this->categoryRepository->findCategoryById($id);
        $tags = $this->categoryRepository->listTags();

        $this->setPageTitle('Tags', 'Edit Tag : '.$targetTag->name);
        return view('admin.tags.edit', compact('tags', 'targetTag'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $params['parent_id'] = $this->categoryRepository->findTagId();
        $tag = $this->categoryRepository->updateCategory($params);

        if (!$tag) {
            return $this->responseRedirectBack('Error occurred while updating tag.', 'error', true, true);
        }
        return $this->responseRedirectBack('Tag updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $tag = $this->categoryRepository->deleteCategory($id);

        if (!$tag) {
            return $this->responseRedirectBack('Error occurred while deleting tag.', 'error', true, true);
        }
        return $this->responseRedirect('admin.tags.index', 'Tag deleted successfully' ,'success',false, false);
    }
}
