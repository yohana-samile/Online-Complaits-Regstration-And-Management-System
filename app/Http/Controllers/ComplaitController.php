<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Complait;

    class ComplaitController extends Controller {
        public function index(){
            $complaits = Complait::all();
            return view('complaits', compact('complaits'));
        }

        public function store(Request $request){
            $store = Complait::create($request->all());
            if ($store) {
                return redirect()->back()->with('success', 'Your Complaits Submitted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function view_complaint($id){
            $complait = Complait::findOrFail($id);
            if (!empty($complait)) {
                return view('view_complaint', compact('complait'));
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function update_complait(Request $request, $id){
            $complait = Complait::findOrFail($id);
            $complait->update($request->all());
            if ($complait) {
                return redirect()->back()->with('success', 'Complaits Status Updated Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }

        public function destroy_complait(Request $request, $id){
            $complait = Complait::findOrFail($id);
            $complait->delete($complait);
            if ($complait) {
                return redirect()->back()->with('success', 'Complaits Deleted Successfuly');
            }
            else{
                return redirect()->back()->withErrors('error', 'Fail Try Again!');
            }
        }
    }
