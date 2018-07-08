<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SquarePosition;
use Illuminate\Support\Facades\Auth;

class SquarePositionController extends Controller
{


    public function positions (Request $request) {
        $userId = Auth::user()->id;
        $squareId = $request->squareId;
        $positionX = $request->positionX;
        $positionY = $request->positionY;
        $squarePosition = SquarePosition::where([
            ['userId', '=', $userId],
            ['squareNumber', '=', $squareId],
        ])->first();
        if (!$squarePosition){
            SquarePosition::insert(
                ['userId' => $userId, 'positionX' => $positionX, 'positionY' => $positionY, 'squareNumber' => $squareId]
            );
        }
        else{
            SquarePosition::where([
                ['userId', '=', $userId],
                ['squareNumber', '=', $squareId],
            ])
                ->update(['positionX' => $positionX, 'positionY' => $positionY]);
        }


        //$user = Auth::user();

        //print($user->id);
       //return $request->squareId;
        // $posts = Post::where('id',1)->get
        //$squares = SquarePosition::where([
         //       ['status', '=', '1'],
          //      ['subscribed', '<>', '1'],
           // ])->get();
      // return $request->all();
    }
}
