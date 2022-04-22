<div class="table-responsive scrollbar">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Voucher Code</th>
        <th scope="col">Status</th>
        <th scope="col">Date Created</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr class="hover-actions-trigger">
        <td class="align-middle text-nowrap"><?= h($voucher->voucher_code); ?></td>
        <td class="align-middle text-nowrap">
            <?php 
            if($voucher->status == 0){
                echo "Available";
            }
            elseif($voucher->status == 1){
                echo "Used";
            }
            else{
                echo "";
            }
            ?>
        </td>
        <td class="align-middle text-nowrap"><?= h($voucher->created) ?></td>
        <td class="w-auto">
          <div class="btn-group btn-group hover-actions end-0 me-4">

            <?= $this->Html->link(__('<font color="green" size="3px"><i class="far fa-edit"></i></font>'), ['action' => 'edit', $voucher->id], [ 'escape' => false, 'class' => 'btn btn-light pe-2','data-bs-toggle' => 'tooltip','data-bs-placement' => 'top', 'title' => 'Edit']) ?>
            <?= $this->Form->postLink(__('<font color="red" size="3px"><i class="far fa-trash-alt"></i></font>'), ['action' => 'delete', $voucher->id], 
                    [
                    'confirm' => __('Are you sure you want to delete # {0}?', $voucher->id),
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