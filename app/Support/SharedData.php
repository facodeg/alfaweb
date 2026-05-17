<?php

namespace App\Support;

use App\Models\DataShare;
use App\Models\User;

class SharedData
{
    /**
     * User IDs visible to the current user. Sharing is treated as a shared workspace,
     * so both sides can read the combined data after one share record exists.
     *
     * @return array<int>
     */
    public static function userIds(User|int $user): array
    {
        $userId = $user instanceof User ? $user->id : $user;

        $sharedIds = DataShare::query()
            ->where('owner_id', $userId)
            ->orWhere('shared_with_id', $userId)
            ->get(['owner_id', 'shared_with_id'])
            ->flatMap(fn (DataShare $share) => [$share->owner_id, $share->shared_with_id])
            ->push($userId)
            ->unique()
            ->values()
            ->all();

        return array_map('intval', $sharedIds);
    }
}
