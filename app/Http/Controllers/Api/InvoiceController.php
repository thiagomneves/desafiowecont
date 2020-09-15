<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Invoice;
use Illuminate\Support\Facades\Validator;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $invoices = Invoice::where('user_id', $user->id)->paginate(5);

        return response($invoices, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'value' => 'required|integer',
                'emission' => 'required|date',
                'due' => 'required|date',
                'status' => 'required|integer',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = auth()->user();

        $invoice = new Invoice();
        $invoice->user_id = $user->id;
        $invoice->value = $request->value;
        $invoice->emission = $request->emission;
        $invoice->due = $request->due;
        $invoice->status = $request->status;
        $invoice->save();

        return response()->json($invoice, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();

        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(null, 404);
        } elseif ($user->id === $invoice->user_id) {
            return response()->json($invoice, 200);
        } else {
            return response()->json(null, 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                'value' => 'required|integer',
                'emission' => 'required|date',
                'due' => 'required|date',
                'status' => 'required|integer',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $user = auth()->user();
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(null, 404);
        } elseif ($user->id === $invoice->user_id) {
            $invoice->user_id = $user->id;
            $invoice->value = $request->value;
            $invoice->emission = $request->emission;
            $invoice->due = $request->due;
            $invoice->status = $request->status;
            $invoice->save();

            return response()->json($invoice, 200);
        } else {
            return response()->json(null, 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(null, 404);
        } elseif ($user->id === $invoice->user_id) {
            $invoice->delete();
            return response()->json($invoice, 200);
        } else {
            return response()->json(null, 401);
        }

    }
}
