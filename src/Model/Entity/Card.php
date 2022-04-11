<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string|null $serial_code
 * @property string|null $verification_code
 * @property string|null $card_link
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User[] $users
 */
class Card extends Entity
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
        'serial_code' => true,
        'verification_code' => true,
        'card_link' => true,
        'created' => true,
        'users' => true,
    ];
}
