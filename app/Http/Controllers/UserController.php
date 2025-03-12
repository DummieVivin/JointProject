<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('project',[
            'projects' => $projects,
        ]);
    }

    public function storeProject(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi....',
            'description.required' => 'Deskripsi wajib disii....',
            'status.required' => 'Status wajib diisi....',
            'category.required' => 'Kategori wajib diisi....'
        ]);
        $project = Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'category' => $validated['category'],
            'user_id' => auth()->id(),

        ]);
        // dd($project);
        return redirect()->route('project')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function destroyProject($id){
        $projects = Project::find($id);
        $projects -> delete();
        return redirect()->route('project')->with('success', 'Data Berhasil Dihapus!');
    }

    public function indextodo(){
        $todos = Todo::all();
        $projects = Project::first();
        $totalScore = Todo::sum('category');

        return view('todo', [
            'todos' => $todos,
            'projects' => $projects,
            'totalScore' => $totalScore,
        ]);
    }

    public function todocreate($id) {
        $project = Project::findOrFail($id);
        return view('todocreate', compact('project'));
    }


    public function todostore(Request $request){
        // dd($request->input('project_id'));
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'category' => 'required',
            'project_id' => 'required',
        ]);

        // Membuat Todo baru
        $todo = Todo::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'project_id' => $validated['project_id'],
            'user_id' => auth()->id(),
        ]);
        // dd($todo);

        // Redirect setelah berhasil menyimpan
        return redirect()->route('todo')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function tododestroy($id){
        $todo = Todo::find($id);
        $todo -> delete();
        return redirect()->route('todo')->with('success', 'Data Berhasil Dihapus!');
    }

    public function todoedit($id){
        $todo = Todo::findOrFail($id);
        return view('todoupdate', compact('todo'));
    }

    public function updateStatus(Request $request, $id){
        $todo = Todo::findOrFail($id);

        // Validasi hanya untuk status
        $request->validate([
            'status' => 'required|in:in-progress,review,done'
        ]);

        // Update hanya status
        $todo->status = $request->status;
        $todo->save();

        return redirect()->route('todo')->with('success', 'Status berhasil diperbarui!');
    }

}

