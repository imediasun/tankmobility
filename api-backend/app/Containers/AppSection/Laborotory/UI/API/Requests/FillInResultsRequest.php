<?php

namespace App\Containers\AppSection\Laborotory\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
/**
 * @OA\Schema(
 *      title="FillInResultsRequest",
 *      description="FillInResultsRequest",
 *      type="object",
 *      required={"test_id","deposit","mousse","number_of_reversals","filter300","filter150","filter50","comment","compatibility_conclusion"}
 * )
 */
class FillInResultsRequest extends ParentRequest
{

    /**
     * @OA\Property(
     *      title="test_id",
     *      description="test_id",
     *     type="integer",
     * )
     *
     * @var integer
     */

    public $test_id;

    /**
     * @OA\Property(
     *      title="compatibility_conclusion",
     *      description="compatibility_conclusion",
     *     type="bool",
     * )
     *
     * @var bool
     */

    public $compatibility_conclusion;



    /**
     * @OA\Property(
     *      title="deposit",
     *      description="deposit",
     *     type="array",
     *     @OA\Items(
     *     type="bool",
     *     )
     * )
     *
     * @var array
     */

    public $deposit;

    /**
     * @OA\Property(
     *      title="mousse",
     *      description="mousse",
     *     type="array",
     *     @OA\Items(
     *     type="bool",
     *     )
     * )
     *
     * @var array
     */

    public $mousse;

    /**
     * @OA\Property(
     *      title="number_of_reversals",
     *      description="number_of_reversals",
     *     type="array",
     *     @OA\Items(
     *     type="integer",
     *     )
     * )
     *
     * @var array
     */

    public $number_of_reversals;

    /**
     * @OA\Property(
     *      title="filter300",
     *      description="filter300",
     *     type="array",
     *     @OA\Items(
     *     type="integer",
     *     )
     * )
     *
     * @var array
     */

    public $filter300;

    /**
     * @OA\Property(
     *      title="filter150",
     *      description="filter150",
     *     type="array",
     *     @OA\Items(
     *     type="integer",
     *     )
     * )
     *
     * @var array
     */

    public $filter150;

    /**
     * @OA\Property(
     *      title="filter50",
     *      description="filter50",
     *     type="array",
     *     @OA\Items(
     *     type="integer",
     *     )
     * )
     *
     * @var array
     */

    public $filter50;

    /**
     * @OA\Property(
     *      title="comment",
     *      description="comment0",
     *     type="array",
     *     @OA\Items(
     *     type="string",
     *     )
     * )
     *
     * @var array
     */

    public $comment;

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
        'test_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'test_id' => 'required',
            "deposit" => 'required|array|min:1',
            "mousse" => 'required|array|min:1',
            "number_of_reversals" => 'required|array|min:1',
            "filter300" => 'required|array|min:1',
            "filter150" => 'required|array|min:1',
            "filter50" => 'required|array|min:1',
            "comments" => 'required|array|min:1',
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
