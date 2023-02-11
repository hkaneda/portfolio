<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\View\ViewRepositoryInterface as ViewRepository;


class ViewController extends Controller
{
    private $ViewRepository;

    public function __construct(ViewRepository $ViewRepository)
    {
        $this->ViewRepository = $ViewRepository;
    }

    // 管理者ページからお気に入りを表示させる
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function favoriteIndex(Request $request)
    {
        return $this->ViewRepository->ViewFavoriteIndex($request);
    }

    //管理者ページから購入履歴を表示させる
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function showHistory(Request $request)
    {
       return $this->ViewRepository->ViewShowHistory($request);
    }
}
