<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Contracts\SiteSearchContract;

class SiteSearchController extends BaseController
{
    protected $sitesearchRepository;

    public function __construct(SiteSearchContract $sitesearchRepository)
    {
        $this->sitesearchRepository = $sitesearchRepository;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index()
    {
        $sitesearches = $this->sitesearchRepository->listSiteSearchs();
        
        $this->setPageTitle('Site İçi Aramalar', 'Site içerisinde yapılan aramaların listesi');
        return view('admin.sitesearches.index', compact('sitesearches'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function show($id)
    {
        $sitesearch = $this->sitesearchRepository->findSiteSearchById($id);
        $sitesearch->result_ids = json_decode($sitesearch->result_ids);

        $this->setPageTitle('Site İçi Aranan Kelime', $sitesearch->search);
        return view('admin.sitesearches.show', compact('sitesearch'));
    }
}
