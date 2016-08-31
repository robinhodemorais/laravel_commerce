<?php
namespace CodeCommerce\Http\Controllers;
use CodeCommerce\User;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userModel->paginate(10);
        return view('users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userModel->fill($input);
        $user->save();
        return redirect()->route('users');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userModel->find($id);
        return view('users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if ($input['password'] == null) {
            $this->userModel->findOrNew($id)->update($input['name'],$input['email']);
        }else{
            $input['password'] = Hash::make($input['password']);
            $this->userModel->findOrNew($id)->update($input);
        }
        return redirect()->route('users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->userModel->findOrNew($id)->delete();
        return redirect()->route('users');
    }
}