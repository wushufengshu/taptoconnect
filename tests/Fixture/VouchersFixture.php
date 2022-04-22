<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VouchersFixture
 */
class VouchersFixture extends TestFixture
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
                'voucher_code' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2022-04-22 13:54:08',
            ],
        ];
        parent::init();
    }
}
