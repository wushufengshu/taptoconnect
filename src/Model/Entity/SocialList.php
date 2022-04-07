<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialList Entity
 *
 * @property int $id
 * @property string|null $social_name
 * @property string|null $image
 *
 * @property \App\Model\Entity\SocialMedia[] $social_media
 */
class SocialList extends Entity
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
        'social_name' => true,
        'image' => true,
        'social_media' => true,
    ];
}
