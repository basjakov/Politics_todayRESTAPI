<?php

namespace App\Http\Controllers\Api;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class newsApiController extends Controller
{
    public function GetAllnews(){
            $news = news::get()->toJson(JSON_PRETTY_PRINT);
            return response($news,200);
    }
    public function CreateNews(Request $request){
            $news = new news;

            $news->title = $request->title;
            $news->date = $request->date;
            $news->author = $request->author;
            $news->category = $request->category;
            $news->news = $request->news;
            $news->save();

            return response()->json([
                'message'=>'News created successfuled',
            ],201);
    }
    public function GetNews($id){
            if(news::where('id',$id)->exists()){
                $news = news::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
                return response($news,200);
            }else{
                return response()->json([
                     "message"=> "Student not found"  
                ],404);
            }
    }
    public function UpdateNews(Request $request,$id){
        if(news::where('id',$id)->exists()){
            $news = news::findOrFail($id);

            $news->title = $request->title;
            $news->date = $request->date;
            $news->author = $request->author;
            $news->category = $request->category;
            $news->news = $request->news;
            $news->save();

            return response()->json([
                'message'=>'News updated successfuled',
            ],201);
        }
        return response()->json(['message'=>'News not found',],201);
          
    }
    public function DeleteNews($id){
        if(news::where('id',$id)->exists()){
            $news = news::findOrFail($id);

            $news->delete();

            return response()->json([
                'message'=>'News delated successfuled',
            ],201);
        }else{
            return response()->json([
                'message'=>'News not found',
            ],201);
        }    
    }
}
