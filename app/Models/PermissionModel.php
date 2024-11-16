<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'slug', 'groupby'];

    /**
     * Retrieve permissions grouped by 'groupby' and related permissions.
     */
    static public function getRecord() {
        $getPermission = PermissionModel::select('id', 'name', 'groupby')
        ->distinct('groupby')
        ->get();        $result = array();
        foreach ($getPermission as $value) {
            $getPermissionGroup = PermissionModel::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = array();
            foreach ($getPermissionGroup as $valueG) {
                $dataG = array();
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }
    

    /**
     * Retrieves a single record by ID
     */
    public static function getSingle($id)
    {
        return PermissionModel::find($id);
    }

    /**
     * Retrieves all permissions in a given group
     */
    public static function getPermissionGroup($groupby)
    {
        return PermissionModel::where('groupby', '=', $groupby)->get(); 
    }
}
