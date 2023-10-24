<?php

namespace App\Containers\AppSection\Laborotory\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\AppSection\TestOrder\Models\Test;
/**
 * @OA\Schema(
 *     title="TestCompatibility",
 *     description="TestCompatibility model",
 * )
 */

class TestCompatibility extends ParentModel
{
    protected $fillable = [
        'test_id','compatibility'
    ];

    protected $hidden = [

    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TestCompatibilityTransformer';

    public $table = 'test_compatibility';


    public function test()
    {
        return $this->belongsTo(Test::class, 'id', 'test_id');
    }

}
