<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\UserCard;
use Authorization\IdentityInterface;

/**
 * UserCard policy
 */
class UserCardPolicy
{
    public function canIndex(IdentityInterface $user, UserCard $userCard)
    {
    }
    /**
     * Check if $user can add UserCard
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserCard $userCard
     * @return bool
     */
    public function canAdd(IdentityInterface $user, UserCard $userCard)
    {
    }

    /**
     * Check if $user can edit UserCard
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserCard $userCard
     * @return bool
     */
    public function canEdit(IdentityInterface $user, UserCard $userCard)
    {
    }

    /**
     * Check if $user can delete UserCard
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserCard $userCard
     * @return bool
     */
    public function canDelete(IdentityInterface $user, UserCard $userCard)
    {
    }

    /**
     * Check if $user can view UserCard
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserCard $userCard
     * @return bool
     */
    public function canView(IdentityInterface $user, UserCard $userCard)
    {
    }


    protected function isAuthor(IdentityInterface $user, UserCard $userCard)
    {
        return $userCard->user_id === $user->getIdentifier();
    }
}
