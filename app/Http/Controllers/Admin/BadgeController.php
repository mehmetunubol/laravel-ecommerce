<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BadgeContract;
use App\Http\Controllers\BaseController;

/**
 * Class BadgeController
 * @package App\Http\Controllers\Admin
 */
class BadgeController extends BaseController
{
    /**
     * @var BadgeContract
     */
    protected $badgeRepository;

    /**
     * BadgeController constructor.
     * @param BadgeContract $badgeRepository
     */
    public function __construct(BadgeContract $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $badges = $this->badgeRepository->listBadges();

        $this->setPageTitle('Badges', 'List of all badges');
        return view('admin.badges.index', compact('badges'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Badges', 'Create Badge');
        return view('admin.badges.create');
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
        ]);

        $params = $request->except('_token');

        $badge = $this->badgeRepository->createBadge($params);

        if (!$badge) {
            return $this->responseRedirectBack('Error occurred while creating badge.', 'error', true, true);
        }
        return $this->responseRedirect('admin.badges.index', 'Badge added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetBadge = $this->badgeRepository->findBadgeById($id);

        $this->setPageTitle('Badges', 'Edit Badge : '.$targetBadge->name);
        return view('admin.badges.edit', compact('targetBadge'));
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
        ]);

        $params = $request->except('_token');

        $badge = $this->badgeRepository->updateBadge($params);

        if (!$badge) {
            return $this->responseRedirectBack('Error occurred while updating badge.', 'error', true, true);
        }
        return $this->responseRedirectBack('Badge updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $badge = $this->badgeRepository->deleteBadge($id);

        if (!$badge) {
            return $this->responseRedirectBack('Error occurred while deleting badge.', 'error', true, true);
        }
        return $this->responseRedirect('admin.badges.index', 'Badge deleted successfully' ,'success',false, false);
    }
}
