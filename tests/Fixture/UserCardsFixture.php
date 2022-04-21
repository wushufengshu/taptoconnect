<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserCardsFixture
 */
class UserCardsFixture extends TestFixture
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
                'card_id' => 1,
                'expiration_date' => '2022-04-20',
                'status' => 1,
                'created' => '2022-04-20 11:02:45',
            ],
        ];
        parent::init();
    }
}
