<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetSearchCustomerAction extends Controller
{
    public function __invoke(Request $request)
    {
        $customers = Customer::SearchCustomers($request->search)
            ->select('id', 'name', 'kana', 'tel')->paginate(50);
        return response()->json($customers);
    }
}