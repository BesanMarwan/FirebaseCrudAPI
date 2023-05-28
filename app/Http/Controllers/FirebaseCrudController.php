<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class FirebaseCrudController extends Controller
{
    private $database;
    public function __construct(){
        $this->database = FirebaseService::connect();
    }

    public function index()
    {
        $blogs = $this->database->getReference('test/blogs')->getValue();
        return response()->json($blogs);
    }

    public function create(Request $request)
    {

        $this->database
            ->getReference('test/blogs/'.$request['title'])
            ->set([
//                'id' => $request['id'] ,
                'title' => $request['title'],
                'content' => $request['content'],
            ]);

        return response()->json('blog has been created');
    }

    public function edit(Request $request)
    {
         $this->database->getReference('test/blogs/' .$request['title'])
            ->update([
                'content/' => $request['content'],
            ]);

        return response()->json('blog has been edited');
    }

    public function delete(Request $request)
    {

        $this->database
            ->getReference('test/blogs/'.$request['title'])
            ->remove();

        return response()->json('blog has been deleted');
    }
}
