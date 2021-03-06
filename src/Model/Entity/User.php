<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $firstname
 * @property string $lastname
 * @property string|null $middlename
 * @property \Cake\I18n\FrozenDate|null $birth_date
 * @property string|null $address
 * @property string|null $user_desc
 * @property string $email
 * @property string $contactno
 * @property string|null $website
 * @property string $username
 * @property string|null $password
 * @property string|null $gender
 * @property string|null $pronouns
 * @property int $activated
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $trashed
 * @property int|null $deleted_by
 *
 * @property \App\Model\Entity\UserRole $user_role
 * @property \App\Model\Entity\Meeting[] $meetings
 * @property \App\Model\Entity\MusicVideo[] $music_video
 * @property \App\Model\Entity\SocialMedia[] $social_media
 */
class User extends Entity
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
        'role_id' => true,
        'firstname' => true,
        'lastname' => true,
        'middlename' => true,
        'birth_date' => true,
        'address' => true,
        'user_desc' => true,
        'email' => true,
        'company' => true,
        'job_title' => true,
        'business_no' => true,
        'home_no' => true,
        'fax_no' => true,
        'contactno' => true, //mobile no
        'website' => true,
        'username' => true,
        'password' => true,
        'gender' => true,
        'pronouns' => true,
        'activated' => true,
        'image' => true,
        'token' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'trashed' => true,
        'deleted_by' => true,
        'user_role' => true,
        'meetings' => true,
        'music_video' => true,
        'social_media' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    public function isAdmin($identity)
    {
        if ($identity->role_id === 1) {
            return true;
        }
    }
}
