<?php

namespace App\Containers\AppSection\TestOrder\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use phpseclib3\File\ASN1\Maps\Time;

/**
 * @OA\Schema(
 *      title="CreateTestOrderRequest",
 *      description="CreateTestOrderRequest",
 *      type="object",
 *      required={"products"}
 * )
 */

class CreateTestOrderRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * @OA\Property(
     *      title="products",
     *      description="products",
     *     type="array",
     *     @OA\Items(
     *     type="string",
     *     )
     * )
     *
     * @var array
     */

    public $testOrder;

    /**
     * @OA\Property(
     *      title="volume_in_filters",
     *      description="volume_in_filters",
     *      example=0.5
     * )
     *
     * @var float
     */
    public $volumeInFilters;

    /**
     * @OA\Property(
     *      title="segment",
     *      description="segment",
     *      example="segment"
     * )
     *
     * @var string
     */
    public $segment;

    /**
     * @OA\Property(
     *      title="observe_order",
     *      description="observe_order",
     *      example="observe_order"
     * )
     *
     * @var string
     */
    public $observe_order;

    /**
     * @OA\Property(
     *      title="comment",
     *      description="comment",
     *      example="comment"
     * )
     *
     * @var string
     */
    public $comment;

    /**
     * @OA\Property(
     *      title="requester",
     *      description="requester user_id",
     *      example="requester"
     * )
     *
     * @var integer
     */
    public $requester;

    /**
     * @OA\Property(
     *      title="date_of_test",
     *      description="date_of_test",
     *      example="24/05/2022"
     * )
     *
     * @var \DateTime
     */
    public $dateOfTest;

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
