<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MusicVideoFixture
 */
class MusicVideoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'music_video';
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
                'music_video_link' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2022-04-04 07:05:13',
                'created_by' => 1,
                'modified' => '2022-04-04 07:05:13',
                'modified_by' => 1,
                'trashed' => '2022-04-04 07:05:13',
                'deleted_by' => 1,
            ],
        ];
        parent::init();
    }
}
