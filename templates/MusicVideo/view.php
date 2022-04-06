<div class="table-responsive scrollbar">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">User Owner</th>
        <th scope="col">Music & Video Link</th>
        <th scope="col">Date Created</th>
        <th scope="col">Date Modified</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="hover-actions-trigger">
        <td class="align-middle text-nowrap">
          <div class="d-flex align-items-center">
            <div class="ms-2"><?= $musicVideo->has('user') ? $this->Html->link($musicVideo->user->firstname." ".$musicVideo->user->lastname, ['controller' => 'Users', 'action' => 'view', $musicVideo->user->id]) : '' ?></div>
          </div>
        </td>
        <td class="align-middle text-nowrap"><?= $this->Text->autoParagraph(h($musicVideo->music_video_link)); ?></td>
        <td class="align-middle text-nowrap"><?= h($musicVideo->created) ?></td>
        <td class="align-middle text-nowrap"><?= h($musicVideo->modified) ?></td>
        <td class="w-auto">
          <div class="btn-group btn-group hover-actions end-0 me-4">

            <?= $this->Html->link(__('<font color="green" size="3px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $musicVideo->id], [ 'escape' => false, 'class' => 'btn btn-light pe-2','data-bs-toggle' => 'tooltip','data-bs-placement' => 'top', 'title' => 'Edit']) ?>
            <?= $this->Form->postLink(__('<font color="red" size="3px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $musicVideo->id], 
                    [
                    'confirm' => __('Are you sure you want to delete # {0}?', $musicVideo->id),
                    'escape' => false, //'escape' => false - convert plain text to html
                    'class' => 'btn btn-light pe-2',
                    'data-bs-toggle' => 'tooltip',
                    'data-bs-placement' => 'top', 
                    'title' => 'Delete'
                    ]) 
            ?>
          </div>
        </td>
      </tr>

    </tbody>
  </table>
</div>