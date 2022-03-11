<?php
declare(strict_types=1);

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Services\General\User\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\General
 * @author pimenvibritania@gmail.com
 */
class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(private UserService $userService){}

    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('pages.general.user.index')
            ->with(['users' => $this->userService->getEntities()]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('pages.general.user.create');
    }

    /**
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $this->userService->createEntity();
        return redirect()->route('users.index');
    }

}
