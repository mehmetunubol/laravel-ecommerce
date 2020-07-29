<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\SitePageContract;

class SitePageController extends Controller
{
    protected $sitepageRepository;

    public function __construct(SitePageContract $sitepageRepository)
    {
        $this->sitepageRepository = $sitepageRepository;
    }

    public function show($slug)
    {
        $sitepage = $this->sitepageRepository->findSitepageBySlug($slug);

        return view('site.pages.sitepages.show', compact('sitepage'));
    }

    public function getAllPages()
    {
        $sitepages = $this->sitepageRepository->listSitePages();

        return view('site.pages.sitepages.index', compact('sitepages'));
    }
}
