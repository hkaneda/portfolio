<?php

namespace App\Repositories\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Favorite;

class ViewRepository implements ViewRepositoryInterface
{
    // 管理者ページからお気に入りを表示させる
    public function ViewFavoriteIndex(Request $request)
    {
        $favorites = Favorite::with('item')->get();
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Favorite::query();

        // もし検索フォームが空でなければ
        if (!empty($search)) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："ウサギ ぬいぐるみ" → ["ウサギ", "ぬいぐるみ]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、user_idが一致すれば$queryとして入力された値が保持される。
            foreach ($wordArraySearched as $keyword)
                $query->where('user_id', '=', "{$keyword}")->get();
        }

        // 上記で取得した$queryをページネートにし、変数$usersに代入
        $favorites = $query->paginate(10);
        // ビューにsearchを変数として渡す
        return view('admin_user_favorites', compact('favorites', 'search'));
    }

    //管理者ページから購入履歴を表示させる
    public function ViewShowHistory(Request $request)
    {
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // もし検索フォームが空でなければ
        if (!empty($search)) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："ウサギ ぬいぐるみ" → ["ウサギ", "ぬいぐるみ]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、user_idが一致すれば$queryとして入力された値が保持される。
            foreach ($wordArraySearched as $keyword)
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
                    ->where('purchase_users.user_id', '=', "{$keyword}")->paginate(10);
        } else {
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
                // 上記で取得した$queryをページネートにし、変数$usersに代入
                ->paginate(10);
        }

        // ビューにsearchを変数として渡す
        return view('admin_user_history', compact('users', 'search'));
    }
}
