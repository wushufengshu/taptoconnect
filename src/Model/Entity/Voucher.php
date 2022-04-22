<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Voucher Entity
 *
 * @property int $id
 * @property string|null $voucher_code
 * @property int $status
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\UserCard[] $user_cards
 */
class Voucher extends Entity
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
        'voucher_code' => true,
        'status' => true,
        'created' => true,
        'user_cards' => true,
    ];
}
