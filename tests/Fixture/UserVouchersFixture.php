<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserVouchersFixture
 */
class UserVouchersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'voucher_id' => 1,
                'created' => '2022-04-22 15:27:58',
            ],
        ];
        parent::init();
    }
}
