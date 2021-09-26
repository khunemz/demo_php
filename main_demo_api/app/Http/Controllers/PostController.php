<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PostController extends Controller
{
  public function index()
  {
    try {
      $model = new Post();
      $posts = $model->all();
      $data = [
        'status' => 200,
        'message' => 'success',
        'data' => $posts
      ];
      return response($data, 200)
        ->header('Content-Type', 'application/json');
    } catch (\Throwable $th) {
      $data = [
        'status' => 500,
        'message' => 'error',
        'data' => $th->getMessage()
      ];
      return response($data, 500)
        ->header('Content-Type', 'application/json');
    }
  }
  public function show($id)
  {
    try {
      $post = DB::table('posts')
        ->where('id', '=', $id)
        ->get();


      $data = [
        'status' => 200,
        'message' => 'success',
        'data' => $post
      ];
      return response($data, 200)
        ->header('Content-Type', 'application/json');
    } catch (\Throwable $th) {
      $data = [
        'status' => 500,
        'message' => 'error',
        'data' => $th->getMessage()
      ];
      return response($data, 500)
        ->header('Content-Type', 'application/json');
    }
  }
  public function store(Request $request)
  {
    try {
      $timestamp = date('Y-m-d H:i:s');
      $validated = $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'description' => 'required',
      ]);
      DB::table('posts')->insert([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => $request->input('slug'),
        'created_at' => $timestamp,
        'updated_at' => $timestamp,
        'created_by' => -1,
        'updated_by' => -1,
      ]);

      if (!$validated) {
        throw new Exception("Error validation");
      }
      $data = [
        'status' => 200,
        'message' => 'success',
        'data' => null
      ];
      return response($data, 200)
        ->header('Content-Type', 'application/json');
    } catch (\Throwable $th) {
      $data = [
        'status' => 400,
        'message' => 'error',
        'data' => $th->getMessage()
      ];
      return response($data, 400)
        ->header('Content-Type', 'application/json');
    }
  }
  public function update(Request $request, $id)
  {
    try {
      $timestamp = date('Y-m-d H:i:s');
      $validated = $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'description' => 'required',
      ]);
      DB::table('posts')->where(['id' => $id])->update([
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'slug' => $request->input('slug'),
          'updated_at' => $timestamp,
          'updated_by' => -1,
        ]);

      if (!$validated) {
        throw new Exception("Error validation");
      }
      $data = [
        'status' => 200,
        'message' => 'success',
        'data' => null
      ];
      return response($data, 200)
        ->header('Content-Type', 'application/json');
    } catch (\Throwable $th) {
      $data = [
        'status' => 400,
        'message' => 'error',
        'data' => $th->getMessage()
      ];
      return response($data, 400)
        ->header('Content-Type', 'application/json');
    }
  }
  public function destroy($id)
  {
    try {
      DB::table('posts')->where(['id' => $id])->delete();
      $data = [
        'status' => 200,
        'message' => 'success',
        'data' => null
      ];
      return response($data, 200)
        ->header('Content-Type', 'application/json');
    } catch (\Throwable $th) {
      $data = [
        'status' => 400,
        'message' => 'error',
        'data' => $th->getMessage()
      ];
      return response($data, 400)
        ->header('Content-Type', 'application/json');
    }
  }
}
