<?php

namespace App\Containers\AppSection\Laborotory\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Containers\AppSection\TestOrder\Models\Test;
/**
 * @OA\Schema(
 *     title="MousseCompatibility",
 *     description="MousseCompatibility model",
 * )
 */

class MousseCompatibility extends ParentModel
{
    protected $fillable = [
        'test_id','immediately','2h','6h','24h'
    ];
    protected $hidden = [

    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'MousseCompatibility';

    public $table = 'test_compatibility_mousse';


    public function test()
    {
        return $this->belongsTo(Test::class, 'id', 'test_id');
    }

}
