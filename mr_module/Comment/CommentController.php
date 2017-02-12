<?php
namespace MrModule\Comment;

use Mr\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index() {
        $results = Comment::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = Comment::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Comment::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}