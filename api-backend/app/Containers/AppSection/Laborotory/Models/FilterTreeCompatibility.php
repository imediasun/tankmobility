<?php

namespace App\Containers\AppSection\Laborotory\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Containers\AppSection\TestOrder\Models\Test;
/**
 * @OA\Schema(
 *     title="ilterTreeCompatibility",
 *     description="ilterTreeCompatibility model",
 * )
 */

class FilterTreeCompatibility extends ParentModel
{
    protected $fillable = [
        'test_id','immediately','2h','6h','24h'
    ];
    protected $hidden = [

    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'FilterTreeCompatibility';

    public $table = 'test_compatibility_filter_tree';


    public function test()
    {
        return $this->belongsTo(Test::class, 'id', 'test_id');
    }

}
