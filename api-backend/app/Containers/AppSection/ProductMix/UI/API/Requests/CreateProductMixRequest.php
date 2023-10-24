<?php

namespace App\Containers\AppSection\ProductMix\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

/**
 * @OA\Schema(
 *      title="CreateProductMixRequest",
 *      description="Product mix creation",
 *      type="object",
 *      required={"participant"}
 * )
 */

class CreateProductMixRequest extends ParentRequest
{
    /**
     * @OA\Property(
     *      title="confidentialMix",
     *      description="confidentialMix",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $confidentialMix;

    /**
     * @OA\Property(
     *      title="exceptionaly",
     *      description="exceptionaly",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $exceptionaly;

    /**
     * @OA\Property(
     *      title="productsList",
     *      description="Products List",
     *     type="array",
     *     @OA\Items(
     *     type="string",
     *     )
     * )
     *
     * @var array
     */

    public $productsList;

    /**
     * @OA\Property(
     *      title="volume",
     *      description="volume",
     *      example=0.5
     * )
     *
     * @var float
     */
    public $volume;

    /**
     * @OA\Property(
     *      title="phRate",
     *      description="phRate",
     *      example=0.5
     * )
     *
     * @var float
     */
    public $phRate;

    /**
     * @OA\Property(
     *      title="waterQuality",
     *      description="waterQuality",
     *      example=0.5
     * )
     *
     * @var float
     */
    public $waterQuality;

    /**
     * @OA\Property(
     *      title="conclusion",
     *      description="waterQuality",
     *      example="conclusion"
     * )
     *
     * @var string
     */
    public $conclusion;

    /**
     * @OA\Property(
     *      title="comment",
     *      description="comment",
     *      example="comment"
     * )
     *
     * @var string
     */
    public $physicalAspectsComment;


    /**
     * @OA\Property(
     *      title="agitation",
     *      description="agitation",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $agitation;

    /**
     * @OA\Property(
     *      title="introduction",
     *      description="introduction",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $introduction;

    /**
     * @OA\Property(
     *      title="globalConclusion",
     *      description="globalConclusion",
     *      example="global_conclusion"
     * )
     *
     * @var string
     */
    public $globalConclusion;

    /**
     * @OA\Property(
     *      title="globalConclusionComment",
     *      description="globalConclusionComment",
     *      example="global_conclusion_comment"
     * )
     *
     * @var string
     */
    public $globalConclusionComment;

    /**
     * @OA\Property(
     *      title="biologicConclusion",
     *      description="biologicConclusion",
     *      example="biologic_conclusion"
     * )
     *
     * @var string
     */
    public $biologicConclusion;

    /**
     * @OA\Property(
     *      title="biologicConclusionComment",
     *      description="biologicConclusionComment",
     *      example="biologic_conclusion_comment"
     * )
     *
     * @var string
     */
    public $biologicConclusionComment;

    /**
     * @OA\Property(
     *      title="countries",
     *      description="Countries for mix generation",
     *     type="array",
     *     @OA\Items(
     *     type="string",
     *     )
     * )
     *
     * @var array
     */

    public $countries;





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
     * Get the validation rules that apply to the request.
     */

    public function rules(): array
    {
        return [
            'confidential_mix' => 'required|boolean',
            'exceptionaly' => 'required|boolean',
            'products_list' => 'array|min:1|required',
            'volume' => 'required|numeric',
            'ph_rate' => 'required|numeric',
            'water_quality' => 'required|numeric',
            'conclusion' => 'required|string',
            'physical_aspects_comment' => 'required|string',
            'agitation' => 'required|boolean',
            'introduction' => 'required|boolean',
            'global_conclusion' => 'required|string',
            'global_conclusion_comment' => 'required|string',
            'biologic_conclusion' => 'required|string',
            'biologic_conclusion_comment' => 'required|string',
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
