<?php

namespace App\Http\Controllers;

use App\Models\position;
use App\Models\Role;
use App\Repositories\Position\PositionRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class positionController extends Controller
{

    private $PositionRepository;
    public function __construct(PositionRepository $PositionRepository)
    {
        $this->PositionRepository = $PositionRepository;
    }
    public function index()
    {
        $this->authorize('viewAny',position::class);
        $position = $this->PositionRepository->all();
        return view('position.index', compact('position'));
    }


    public function create()
    {
        $this->authorize('create',position::class);

        return view('position.create');
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $notification = array(
            'message' => 'Thêm danh mục thành công',
            'alert-type' => 'success'
        );
        $data = $request->all();
        $this->PositionRepository->create($data);
        return redirect()->route('position.index')->with($notification);
    }
    public function show($id)
    {
        $this->authorize('view',position::class);

        $item=Position::find($id);
        $current_user = Auth::user();
        $userRoles = $item->roles->pluck('id', 'role_name')->toArray();/////
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $position_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $position_names[$role['group_name']][] = $role;
        }
        $params = [
            'item' => $item,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'position_names' => $position_names,
        ];
        return view('position.show',$params);
    }

    public function edit($id)
    {
        $this->authorize('update',position::class);

        $position = $this->PositionRepository->find($id);
        return view('position.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );
        $data = $request->all();
        $this->PositionRepository->update($data, $id);
        return redirect()->route('position.index')->with($notification);
    }
    public function destroy($id)
    {
        $this->authorize('delete',position::class);

        try {
            $this->PositionRepository->delete($id);
            // return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }

    }
    function UpdatePositionRole(Request $request,$id){
        try {
            $item= Position::find($id);
            $item->roles()->detach();
            $item->roles()->attach($request->roles);
            /////có thể dùng attach detach hoặc là sync(đồng bộ hóa)
            // $item->roles()->sync($request->roles,$id);
            // dd(98765);
            // toast('Cập nhật quyền của chức vụ thành công!','success','top-right');
            return redirect()->route('position.index',$id);
        } catch (\Exception $th) {
            // toast('Cập nhật quyền của chức vụ không thành thành công!','error','top-right');
            return redirect()->route('position.index',$id);
        }
    }
}
