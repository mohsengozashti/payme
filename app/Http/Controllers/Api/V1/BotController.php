<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BotReport;
use App\Models\FundIn;
use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BotController extends Controller
{

    public function checkFundInLink(Request $request)
    {
        //validate the request
        $data = Validator::make($request->all(), ['amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'bank_name' => ['required', 'string'],
            'order_number' => ['nullable', 'string'],
            'transaction_id' => ['nullable', 'string'],]);
        if ($data->fails()){
            return $data->errors();
        }
        $data = $request->all();
        BotReport::create($data);

        //get the valid Links
        $links = $this->getValidLinksInPayTime($data['date']);

        // The CorrectLink Link is the oldest link that created and matches the payment value
        $CorrectLink = $links->where('amount', '=', $data['amount'])->first();
        FundIn::create([
            'requested_amount' => $data['amount'],
            'completed_at' => $data['date'],
            'customer_bank_name' => $data['bank_name'],
            'order_number' => $data['order_number'],
            'transaction_id' => $data['transaction_id'],
            'update_by' => 'auto',
            'status' => 1
        ]);

    }


    /**
     * @param \DateTime $dateTime
     * @return Collection
     * find every valid link in the range of payment dateTime
     */
    public function getValidLinksInPayTime(\DateTime $dateTime): Collection
    {
        $links = Link::where('created_at', '<', $dateTime)->get();
        /* @var Collection $links */
        $links = $links->filter(function (Link $link) use ($dateTime) {
            return $link->created_at->addMinutes($link->expiration_duration) > $dateTime;
        })->sortBy(function (Link $link) {
            return $link->created_at;
        }, SORT_REGULAR, false);
        return $links;
    }
}
