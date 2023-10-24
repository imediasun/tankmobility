<?php

namespace App\Containers\AppSection\Laborotory\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\AppSection\TestOrder\Models\Order;
use App\Containers\AppSection\TestOrder\Models\Test;
/**
 * @OA\Schema(
 *     title="CommentsCompatibility",
 *     description="CommentsCompatibility model",
 * )
 */

class CommentsCompatibility extends ParentModel
{
    protected $fillable = [
        'test_id','immediately','2h','6h','24h'
    ];
    protected $hidden = [

    ];


    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'DepositCompatibility';

    public $table = 'test_compatibility_comments';


    public function test()
    {
        return $this->belongsTo(Test::class, 'id', 'test_id');
    }

}
