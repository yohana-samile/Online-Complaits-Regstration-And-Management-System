<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;

    class RegisterUserController extends Controller {
        public function index(){
            $users = User::all();
            return view('users', compact('users'));
        }

        public function register(){
            return view('/auth/register');
        }

        public function store(Request $request){
            $validatedData = $request->validate([
                'name' =>'required',
                'password' =>'required'
            ]);
            $nameParts = explode(' ', $validatedData['name']);
            $username = strtolower($nameParts[0]);
            $domain = '';
            if (count($nameParts) > 1) {
                $domain = strtolower(implode('', array_slice($nameParts, 1)));
            }
            $generated_email = $username . '@' . $domain . 'aru.ac.tz';
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $generated_email,
                'password' => Hash::make($validatedData['password']),
            ]);
            if ($user) {
                return redirect()->back()->with('success', 'New Staff User Registered Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_user($id){
            $user = User::findOrFail($id);
            if (!empty($user)) {
                return view('view_user', compact('user'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function edit_user($id){
            $user = User::findOrFail($id);
            return view('edit_user', compact('user'));
            if (empty($user)) {
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_edit_user(Request $request){
            $id = $request->input('id');
            $user = User::findOrFail($id);
            $user->update($request->all());
            if ($user) {
                return redirect()->back()->with('success', 'users records Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_user(Request $request, $id){
            $user = User::findOrFail($id);
            $user->delete($user);
            if ($user) {
                return redirect()->back()->with('success', 'Staff User Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
