<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SquarePosition;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userId = Auth::user()->id;
        $allPositions = [];
        $squarePositions = SquarePosition::select('squareNumber', 'positionX', 'positionY')
            ->where('userId', $userId)->get();
        foreach ($squarePositions as $position)
        {
            $allPositions[$position->squareNumber] = [
              'positionX' => $position->positionX,
              'positionY' => $position->positionY,
            ];
         }
        return view('home')->with('allPositions',$allPositions);
    }

    public function deletePositions()
    {
        $userId = Auth::user()->id;
        SquarePosition::where('userId', $userId)->delete();
        return back();
    }
}
