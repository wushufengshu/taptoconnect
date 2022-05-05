<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vouchers Model
 *
 * @property \App\Model\Table\UserCardsTable&\Cake\ORM\Association\HasMany $UserCards
 *
 * @method \App\Model\Entity\Voucher newEmptyEntity()
 * @method \App\Model\Entity\Voucher newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Voucher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Voucher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Voucher findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Voucher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Voucher[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Voucher|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Voucher saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VouchersTable extends Table
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

        $this->setTable('vouchers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserCards', [
            'foreignKey' => 'voucher_id',
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
            ->scalar('voucher_code')
            ->maxLength('voucher_code', 255)
            //->allowEmptyString('voucher_code');
            ->notEmptyString('voucher_code');

        $validator
            ->integer('duration')
            ->notEmptyString('duration');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }

    public function generate_vcode()
    {
        $str1 = str_shuffle(random_bytes(20) . sha1("Ub1v3L0XpHiL1pPiN3iNc!"));
        $str2 = date("Y-m-d H:i:s") . md5($str1);
        return strtoupper(strrev(substr(str_shuffle(md5(base64_encode($str2))), 0, 12))); //generate unique code for serial code
    }
}
