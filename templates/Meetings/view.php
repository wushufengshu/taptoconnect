<div class="table-responsive scrollbar">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">User Owner</th>
        <th scope="col">Meeting Date</th>
        <th scope="col">Date Created</th>
        <th scope="col">Date Modified</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="hover-actions-trigger">
        <td class="align-middle text-nowrap">
          <div class="d-flex align-items-center">
            <div class="ms-2"><?= $meeting->has('user') ? $this->Html->link($meeting->user->firstname." ".$meeting->user->lastname, ['controller' => 'Users', 'action' => 'view', $meeting->user->id]) : '' ?></div>
          </div>
        </td>
        <td class="align-middle text-nowrap"><?= $this->Text->autoParagraph(h($meeting->meeting_date)); ?></td>
        <td class="align-middle text-nowrap"><?= h($meeting->created) ?></td>
        <td class="align-middle text-nowrap"><?= h($meeting->modified) ?></td>
        <td class="w-auto">
          <div class="btn-group btn-group hover-actions end-0 me-4">

            <?= $this->Html->link(__('<font color="green" size="3px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $meeting->id], [ 'escape' => false, 'class' => 'btn btn-light pe-2','data-bs-toggle' => 'tooltip','data-bs-placement' => 'top', 'title' => 'Edit']) ?>
            <?= $this->Form->postLink(__('<font color="red" size="3px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $meeting->id], 
                    [
                    'confirm' => __('Are you sure you want to delete # {0}?', $meeting->id),
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