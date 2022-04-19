<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\MeetingsTable&\Cake\ORM\Association\HasMany $Meetings
 * @property \App\Model\Table\MusicVideoTable&\Cake\ORM\Association\HasMany $MusicVideo
 * @property \App\Model\Table\SocialMediaTable&\Cake\ORM\Association\HasMany $SocialMedia
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserRoles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Meetings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('MusicVideo', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SocialMedia', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 50)
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 50)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->scalar('middlename')
            ->maxLength('middlename', 50)
            ->allowEmptyString('middlename');

        $validator
            ->date('birth_date')
            ->allowEmptyDate('birth_date');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('user_desc')
            ->allowEmptyString('user_desc');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('contactno')
            ->maxLength('contactno', 50)
            ->requirePresence('contactno', 'create')
            ->notEmptyString('contactno');

        $validator
            ->scalar('website')
            ->allowEmptyString('website');

        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->allowEmptyString('gender');

        $validator
            ->scalar('pronouns')
            ->maxLength('pronouns', 255)
            ->allowEmptyString('pronouns');

        $validator
            ->integer('activated')
            ->notEmptyString('activated');

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

        $validator
            ->scalar('token')
            ->requirePresence('token', 'create')
            ->notEmptyString('token');
        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->dateTime('trashed')
            ->allowEmptyDateTime('trashed');

        $validator
            ->integer('deleted_by')
            ->allowEmptyString('deleted_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['token']), ['errorField' => 'token']);
        $rules->add($rules->existsIn('role_id', 'UserRoles'), ['errorField' => 'role_id']);

        return $rules;
    }

    public function generate_vcard($fn,$bio,$address,$email,$contactno,$website){
    $content = "BEGIN:VCARD\r\n";
    $content .= "VERSION:4.0\r\n";
    $content .= "CLASS:PUBLIC\r\n";
    $content .= "FN:".$fn."\r\n";
    $content .= "N:".$fn." ;;;\r\n";
    $content .= "TITLE:".$bio."\r\n";
    $content .= "ORG:UBIVELOX\r\n";
    $content .= "ADR;TYPE=work:;;".$address."\r\n";
    $content .= "EMAIL;TYPE=internet,pref:".$email."\r\n";
    $content .= "TEL;TYPE=work,voice:".$contactno."\r\n";
    $content .= "TEL;TYPE=HOME,voice:".$contactno."\r\n";
    $content .= "URL:".$website."\r\n";
    $content .= "END:VCARD\r\n";
    return $content;
    }

    
}
