<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Models\Artikel as Blog;
use PDF, Session, Validator;

class ArtikelController extends Controller
{
    public function __construct()
    {
      $this->middleware('web');
    }

    public function beranda()
    {
      $blog = Blog::orderBy('created_at','desc')->orderBy('updated_at','desc')->paginate(5);
      return view('frontend.artikel.index', ['blog' => $blog]);
    }

    public function lihat_artikel($slug)
    {
      $tampil = Blog::where('slug',$slug)->first();
      $title = $tampil->judul;
      return view('frontend.artikel.view', compact('title'), ['tampil' => $tampil]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
      if($request->ajax()) {
        $blog = Blog::select(['id', 'judul', 'author']);
        return DataTables::of($blog)
        ->addColumn('action', function($blog) {
          return view('backend.layouts.action', [
            'model' => $blog,
            'edit_url' => route('blog.edit',$blog->id),
            'detail_url' => route('blog.show',$blog->id),
            'del_url' => route('blog.destroy',$blog->id)
          ]);
        })
        ->make(true);
      }
      $html = $htmlBuilder
              ->addColumn(['data' => 'judul', 'name' => 'judul', 'title' => 'Judul'])
              ->addColumn(['data' => 'author', 'name' => 'author', 'title' => 'Author'])
              ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
      return view('backend.admin.blog.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make(request()->all(), [
        'judul' => 'required', 'status' => 'required', 'images' => 'required', 'deskripsi' => 'required'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      $blogs = Blog::create([
        'judul' => $request->judul,
        'slug' => str_slug($request->judul, '-'),
        'author' => $request->author,
        'status' => $request->status,
        'images' => $request->fupload,
        'deskripsi' => $request->deskripsi
      ]);
      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Artikel Berhasil Disimpan"
      ]);
      return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blog = Blog::find($id);
      $title = $blog->judul;
      return view('backend.admin.blog.show', ['blog' => $blog])->with(compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $blog = Blog::find($id);
      $title = $blog->judul;
      return view('backend.admin.blog.edit', ['blog' => $blog])->with(compact('title'));
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
      $validator = Validator::make(request()->all(), [
        'judul' => 'required', 'status' => 'required', 'images' => 'required', 'deskripsi' => 'required'
      ]);
      if($validator->fails()) {
        redirect()->back()->withErrors($validator->errors());
      }
      $blogs = Blog::find($id);
      $blogs->update([
        'judul' => $request->judul,
        'slug' => str_slug($request->judul, '-'),
        'author' => $request->author,
        'status' => $request->status,
        'images' => $request->images,
        'deskripsi' => $request->deskripsi
      ]);
      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Artikel Berhasil Dirubah"
      ]);
      return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blog = Blog::find($umroh_id);
      $blog->delete();
      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Artikel Berhasil Dihapus"
      ]);
      return redirect()->route('blog.index');
    }
}
