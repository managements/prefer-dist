<?php

namespace App\Http\Controllers\Company;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoldController extends Controller
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
        return view('company.edit_sold',compact('id'));
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
