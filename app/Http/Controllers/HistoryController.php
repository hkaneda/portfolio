<?php

namespace App\Http\Controllers;

use App\Repositories\History\HistoryRepositoryInterface as HistoryRepository;

class HistoryController extends Controller
{
private $HistoryRepository;

public function __construct(HistoryRepository $HistoryRepository)
{
    $this->HistoryRepository = $HistoryRepository;
}
/**
 * 購入履歴を表示させる
 *
 * @return void
 */
    public function showHistory()
    {
     return  $this->HistoryRepository->ShowHistory();
    }
}
