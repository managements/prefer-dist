<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @internal param Company $company
     */
    public function edit(int $id)
    {
        $company = Company::find($id);
        $statuses = Status::all();
        return view('company.edit_status',compact('company','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }
}
