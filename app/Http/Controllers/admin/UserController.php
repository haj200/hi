<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    $users = User::paginate(10);
    return view('admin.users.index', compact('users'));
}


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_Fr' => 'required',
            'Prenom_Fr' => 'required',
            'Nom_Ar' => 'required',
            'Prenom_Ar' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'Nom_Fr' => $request->Nom_Fr,
            'Prenom_Fr' => $request->Prenom_Fr,
            'Nom_Ar' => $request->Nom_Ar,
            'Prenom_Ar' => $request->Prenom_Ar,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'Nom_Fr' => 'required',
            'Prenom_Fr' => 'required',
            'Nom_Ar' => 'required',
            'Prenom_Ar' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'Nom_Fr' => $request->Nom_Fr,
            'Prenom_Fr' => $request->Prenom_Fr,
            'Nom_Ar' => $request->Nom_Ar,
            'Prenom_Ar' => $request->Prenom_Ar,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    
    public function show($id)
    {

        $user = User::findOrFail($id);
         $user->load('auxiliaires');
         $entiteTerritoriale = $user->entiteTerritoriale;
         $auxiliaires = $user->auxiliaires()->paginate(10);
        
    
        return view('admin.users.show', compact('user','auxiliaires','entiteTerritoriale'));
    }

}
