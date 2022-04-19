<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserCard Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $card_id
 * @property \Cake\I18n\FrozenDate $expiration_date
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Card $card
 */
class UserCard extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'card_id' => true,
        'expiration_date' => true,
        'status' => true,
        'created' => true,
        'user' => true,
        'card' => true,
    ];
}
