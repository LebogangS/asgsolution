<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Currencies";
        $currencies = Currency::paginate(5);
        return view('currencies', compact('title', 'currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCurrency()
    {
        $title = "Add Currency";
        return view('add-currency', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addingCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'code' => 'required',
        ]);

        $request['created_by'] = Auth::user()->email;
        $data = $request->all();
        $this->create($data);

        return redirect("currencies")->withSuccess('Currency successfully created');
    }

    public function create(array $data) {
      return Currency::create([
        'currency_name' => $data['currency'],
        'code' => $data['code'],
        'created_by' => $data['created_by'],
        'created_at' => now(),
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "View Currency";
        $currency = Currency::findOrFail($id);
        return view('currencies.show',compact('title', 'currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update Currency";
        $currency = Currency::findOrFail($id);
        return view('currencies.edit',compact('title', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'currency' => 'required',
            'code' => 'required',
        ]);

        $data = [
            'currency_name' => $request->currency,
            'code' => $request->code,
            'updated_by' => Auth::user()->email,
            'updated_at' => now(),
        ];
        Currency::whereId($id)->update($data);

        return redirect("currencies")->withSuccess('Currency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::findOrFail($id)->delete();
        return redirect("currencies")->withSuccess('Currency deleted successfully');
    }
}
