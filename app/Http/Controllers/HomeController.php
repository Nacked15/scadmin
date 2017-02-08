<?php

namespace App\Http\Controllers;
use App\Task;
use DB;


class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::all();
        return view('home', ['tasks' => $tasks]);
    }

    public function home2()
    {
        return view('layouts.mini_home');
    }

     public function getGeneral()
    {
        return view('UI.general');
    }

     public function getBoton()
    {
        return view('UI.buttons');
    }

    public function getIcono()
    {
        return view('UI.icons');
    }

    public function getModal()
    {
        return view('UI.modals');
    }

    public function getFrmGeneral()
    {
        return view('forms.general');
    }

    public function getFrmAdvance()
    {
        return view('forms.advanced');
    }

    public function getProfile()
    {
        return view('forms.profile');
    }

    public function lock()
    {
        return view('layouts.lockscreen');
    }

    public function facts()
    {
        return view('invoices.invoice');
    }

    public function printInvoice()
    {
        return view('invoices.invoice-print');
    }

    public function getCalendar()
    {
        return view('calendar');
    }

    public function getTables()
    {
        return view('tables.data');
    }

    public function error404()
    {
        return view('errors.404');
    }

    public function error500()
    {
        return view('errors.500');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
