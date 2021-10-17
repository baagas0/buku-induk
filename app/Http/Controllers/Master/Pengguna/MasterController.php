<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use Illuminate\Http\Request;
use App\Master;
use App\MasterRole;
use App\Role;
use App\User;
use Illuminate\Pagination\Paginator;

class MasterController extends Controller
{
    public function getIndex()
    {
        $data['roles'] = MasterRole::all();
        return view('master.user.master.main', $data);
    }

    public function postData(Request $req)
    {
        // Paginator::currentPageResolver(fn () => $req->pagination['page']);
        $filter = $req->get('query');

        $query = Master::query();

        if (isset($filter['name'])) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');
            $query->orWhere('email', 'like', '%' . $filter['name'] . '%');
        }

        if (isset($filter['role'])) {
            $query->where('master_role_id', $filter['role']);
        }

        $query->with('role')
            ->orderBy('id', 'desc');
        return new DataResource($query->paginate(10));
    }

    public function postCreate(Request $req)
    {
        $u = new Master();
        $u->name = $req->name;
        $u->email = $req->email;
        $u->master_role_id = $req->master_role_id;
        $u->password = bcrypt($req->password);
        $u->save();
    }

    public function getDetail($id)
    {
        return Master::find($id);
    }

    public function postUpdate(Request $req, $id)
    {
        $u = Master::findOrFail($id);
        $u->name = $req->name;
        $u->email = $req->email;
        $u->master_role_id = $req->master_role_id;
        if (!empty($req->password)) {
            $u->password = bcrypt($req->password);
        }
        $u->save();
    }

    public function postDelete($id)
    {
        $u = Master::findOrFail($id);
        $u->delete();
    }
}
