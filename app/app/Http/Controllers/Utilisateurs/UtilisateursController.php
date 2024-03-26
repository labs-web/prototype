<?php

namespace App\Http\Controllers\Utilisateurs;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\utilisateurs\UsersExport;
use App\Imports\utilisateurs\UsersImport;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Autorisation\UtilisateursRepository;
use App\Exceptions\Autorisation\UserAlreadyExistsException;
use App\Http\Requests\utilisateurs\CreateUtilisateursRequest;



class UtilisateursController extends controller
{

    
    private $utilisateursRepository;
    //

    public function __construct(UtilisateursRepository $UtilisateursRepository)
    {
        $this->utilisateursRepository = $UtilisateursRepository;
    }


// ========= index ============
    public function index(Request $request)
    {
        
            $query = $request->input('query');
            $utilisateurs = $this->utilisateursRepository->getUsers($query);
        
            if ($request->ajax()) {
                return view('utilisateurs.utilisateursTablePartial')->with('utilisateurs', $utilisateurs);
            } 
            return view('utilisateurs.index')->with('utilisateurs', $utilisateurs);
      
    }



// ========= create ============

public function create()
{
    
    return view('utilisateurs.create');
  
}

// ========= store ============


    public function store(CreateUtilisateursRequest $request)
    {
       $validatedData = $request->validated();
        try {
            $utilisateurs = $this->utilisateursRepository->create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('utilisateurs.index')->with('success', __('utilisateurs/message.User Created Successfully'));

        } catch (UserAlreadyExistsException $e) {
            return back()->withInput()->withErrors(['User_exist' => __('utilisateurs/message.A User with this Email already exist')]); 
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['unexpected_error' => __('utilisateurs/message.An unexpected error has occurred.')]);
        }
    }
    
    


// ========= destroy ============

    public function destroy($id)
{
    $utilisateurs = $this->utilisateursRepository->destroy($id);
    return redirect()->route('utilisateurs.index')->with('success', __('utilisateurs/message.User Deleted Succesfully'));
} 


// ========= show ============
public function show($id){

    $utilisateur = $this->utilisateursRepository->find($id);
    if($utilisateur) {
        return view('utilisateurs.view', compact('utilisateur'));
    } else {
        abort(404);
    }
  

}

  // ======= edit =========

  public function edit($id){

    $utilisateur = $this->utilisateursRepository->find($id);
    if($utilisateur) {

        return view('utilisateurs.update', compact('utilisateur'));

     } else {
        abort(404);
     }

 }


 // update function 



public function update(Request $request, $id)
{
    $utilisateur = $this->utilisateursRepository->find($id);

    if (!$utilisateur) {
        return redirect()->route('utilisateurs.index')->with('error', 'User not found');
    }

    $validatedData = $request->validate([
        'prenom' => ['required', 'string', 'max:25'],
        'nom' => ['required', 'string', 'max:25'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'old_password' => ['required', 'string'],
        'password' => ['required', 'string', 'confirmed', Password::defaults()],
    ]);

    // Check if the old password matches the current password
    if (!Hash::check($validatedData['old_password'], $utilisateur->password)) {
        return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect'])->withInput();
    }

    $this->utilisateursRepository->update($id, $validatedData);

    return redirect()->route('utilisateurs.index')->with('success', 'User updated successfully');
}



// export utilisateurs
public function exportUtilisateurs() 
{
   return Excel::download(new UsersExport, 'Users.xlsx');
}



// import utilisateurs ====

public function importUtilisateurs(Request $request)
{


    $request->validate([
        'utilisateurs' => 'required|mimes:xlsx,xls',
    ]);


    $import = new UsersImport;
    try {
        $importedRows = Excel::import($import, $request->file('utilisateurs'));
    
        if($importedRows) {
            $successMessage = __('utilisateurs/message.file imported succefully');
        } else {
            $successMessage =  __("utilisateurs/message.there's no new data that being imported");
        }
        
        return redirect('/utilisateurs')->with('success', $successMessage);
    } catch (\Exception $e) {
        return redirect('/utilisateurs')->with('error', __("utilisateurs/message.an error has been acourd check the syntax"));
       
        
    }

}

}
