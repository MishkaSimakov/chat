<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [

    ];

    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        $scope = $this->getCurrentScope()->getIdentifier();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'avatar' => $user->avatar($scope === 'users' || $scope == 'parent.users' ? 25 : 45),

        ];
    }
}
