<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\SitePageContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Log;

class SitePageController extends BaseController
{
    /**
     * @var SitePageContract
     */
    protected $sitepageRepository;

    /**
     * CategoryController constructor.
     * @param SitePageContract $sitepageRepository
     */
    public function __construct(SitePageContract $sitepageRepository)
    {
        $this->sitepageRepository = $sitepageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sitepages = $this->sitepageRepository->listSitePages();

        $this->setPageTitle('SitePages', 'List of all Site Pages');
        return view('admin.sitepages.index', compact('sitepages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('SitePages', 'Create Site Page');
        return view('admin.sitepages.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $sitepage = $this->sitepageRepository->createSitePage($params);
        Log::error($sitepage);
        if (!$sitepage) {
            return $this->responseRedirectBack('Error occurred while creating sitepage.', 'error', true, true);
        }
        return $this->responseRedirect('admin.sitepages.index', 'Site Page added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $sitepage = $this->sitepageRepository->findSitePageById($id);

        $this->setPageTitle('SitePages', 'Edit Site Page : '.$sitepage->title);
        return view('admin.sitepages.edit', compact('sitepage'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'logo'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $sitepage = $this->sitepageRepository->updateSitePage($params);

        if (!$sitepage) {
            return $this->responseRedirectBack('Error occurred while updating sitepage.', 'error', true, true);
        }
        return $this->responseRedirectBack('SitePage updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $sitepage = $this->sitepageRepository->deleteSitePage($id);

        if (!$sitepage) {
            return $this->responseRedirectBack('Error occurred while deleting sitepage.', 'error', true, true);
        }
        return $this->responseRedirect('admin.sitepages.index', 'SitePage deleted successfully' ,'success',false, false);
    }
}