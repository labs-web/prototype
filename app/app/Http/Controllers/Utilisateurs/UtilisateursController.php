<?php

namespace App\Http\Controllers\Utilisateurs;

use App\Models\User;
// use App\Exports\UserExport;
// use App\Exports\MemberExport;
// use App\Imports\MemberImport;
use Illuminate\Http\Request;
// use App\Exports\StagiaireExport;
// use App\Imports\StagiaireImport;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Autorisation\UtilisateursRepository;
use App\Http\Requests\Autorisation\CreateUtilisateursRequest;
use App\repositories\StagiaireRepository\StagiaireRepository;


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

      dd($request->attributes());
       $validatedData = $request->validated();

       if ($validatedData['password'] !== $validatedData['password_confirmation']) {
           return redirect()->back()->withErrors(['password' => 'The password confirmation does not match.'])->withInput();
       }

        $utilisateurs = $this->utilisateursRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Return a redirect response with a success message and the name of the user added
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur ajouté avec succès');
 
    }
    
    


// ========= destroy ============

    public function destroy($id)
{
    $utilisateurs = $this->utilisateursRepository->destroy($id);
    return redirect()->route('utilisateurs.index')->with('success', 'ce utilisateurs deleted successfully');
} 


// ========= show ============
public function show($id){

    $utilisateurs = $this->utilisateursRepository->find($id);

    if($utilisateurs) {

        return view('utilisateurs.view', compact('utilisateurs'));
    } else {
        abort(404);
    }
  

}


}
