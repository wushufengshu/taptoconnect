<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeetingsFixture
 */
class MeetingsFixture extends TestFixture
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
                'meeting_date' => '2022-04-04 07:05:19',
                'created' => '2022-04-04 07:05:19',
                'created_by' => 1,
                'modified' => '2022-04-04 07:05:19',
                'modified_by' => 1,
                'trashed' => '2022-04-04 07:05:19',
                'deleted_by' => 1,
            ],
        ];
        parent::init();
    }
}
