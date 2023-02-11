<?php
namespace App\Repositories\History;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryRepository implements HistoryRepositoryInterface
{
    public function ShowHistory()
    {
        $users = DB::table('purchase_users')
            ->select(
                'purchase_users.id',
                'purchase_users.user_id',
                'purchase_users.user_name',
                'purchase_users.purchase_date',
                'purchase_users.created_at',
                'purchase_details.id',
                'purchase_details.product_name',
                'purchase_details.quantity',
                'purchase_details.price'
            )
            ->join('purchase_details', 'purchase_users.id', '=', 'purchase_details.id')
            ->where('purchase_users.user_id', '=', Auth::id())
            ->paginate(10);

        return view('history', compact('users'));
    }

}
