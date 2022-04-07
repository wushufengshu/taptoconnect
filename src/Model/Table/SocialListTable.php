<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialList Model
 *
 * @property \App\Model\Table\SocialMediaTable&\Cake\ORM\Association\HasMany $SocialMedia
 *
 * @method \App\Model\Entity\SocialList newEmptyEntity()
 * @method \App\Model\Entity\SocialList newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SocialList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialList get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialList findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SocialList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialList[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialList|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialList saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialList[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialList[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialList[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialList[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SocialListTable extends Table
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

        $this->setTable('social_list');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SocialMedia', [
            'foreignKey' => 'social_list_id',
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
            ->scalar('social_name')
            ->maxLength('social_name', 255)
            ->allowEmptyString('social_name');

        $validator
            ->scalar('image')
            ->allowEmptyFile('image');

        return $validator;
    }
}
