<?php

namespace App\Containers\AppSection\TestOrder\DTO;

/**
 * @OA\Schema(
 *     title="CreateTestOrderDTO",
 *     description="TestOrder data transfer object",
 * )
 */
class GetTestOrderDTO
{
    /**
     * @OA\Property(
     *     title="order_id",
     *     format="integer",
     *     default="1"
     * )
     *
     * @var integer
     */

    private $order_id;

    /**
     * @OA\Property(
     *     title="order_requested_by",
     *     format="integer",
     *     default="lopushanskyi andrey"
     * )
     *
     * @var string
     */

    private $order_requested_by;


    /**
     * @OA\Property(
     *     title="order_created_at",
     *     format="datetime",
     *     default="2023-02-14T11:26:48.000000Z"
     * )
     *
     * @var datetime
     */

    private $order_created_at;


    /**
    @OA\Property(
    property="test_data",
    type="array",
    @OA\Items(ref="#/components/schemas/Test"),
    ),
     * *
     * @var array
     */


    public $productsListData;
    public $testOrderData;
    public $testData;

    public static function transform(mixed $args):GetTestOrderDTO
    {
        $dto = new self();

        $dto->productsListData = ['products_list'=>$args['productsList']];
        $dto->testData = [
            'date_of_test' => $args['date_of_test'],
            'volume_in_liters' => $args['volume_in_liters'],
            'segment' => $args['segment'],
            'comment' => $args['comment'],
            'observe_order' => $args['observe_order'],
            'requester' => $args['requester']
        ];
        $dto->ordertData = [
            'requester' => $args['requester']
        ];

        return $dto;
    }
}
