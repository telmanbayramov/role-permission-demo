<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionRoleModel;

class RoleModel extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable=['name'];

    static public function getRecord()
    {
        return RoleModel::get();
    }
    static public function getSingle($id)
    {
        return RoleModel::find($id);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
