<?php

namespace App\Services\CustomerOrderTransform;


class OrderTransform
{
    /**
     * @param array $request
     */
    public function pushRequestIntoSession(array $request)
    {
//        session()->put('dishes', [$request['dishId'] => $request['dishQuantity']]);

//        session()->push('dishes', $request['dishQuantity']);
//        session()->push($request['dishId'], $request['dishQuantity']);
//        session()->push('dishes', [$request['dishId'] => $request['dishQuantity']]);

        session()->push('dishes', [
            'dishId' => $request['dishId'],
            'dishQuantity' => $request['dishQuantity']
         ]);
    }

    /**
     * @return array
     */
    public function getOrderedDishesFromSession(): ?array
    {
        $dishIds = session()->get('dishes');

        return isset($dishIds) ? $this->normalizeArray($dishIds) : null;
    }

    /**
     * @param array $array
     * @return array
     */
    private function normalizeArray(array $array): array
    {
        $result = [];
        foreach ($array as $val) {
            $result[] = $val['dishId'];
        }

        $result = array_unique($result);

        return $result;
    }

    private function deleteItemFromOrder()
    {

    }

}