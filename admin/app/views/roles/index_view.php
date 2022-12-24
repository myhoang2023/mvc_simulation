<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>danh sasch vai tro</h3>
            <a class="btn btn-primary" href="<?= route('role','create');?>">tao vai tro</a>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>vai tro</th>
                        <th>mo ta</th>
                        <th>trang thai</th>
                        <th>ngay tao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($roles as $key => $role): ?>
                    <tr>
                        <td><?= $key + 1;?></td>
                        <td><?= $role['name'];?></td>
                        <td><?= $role['description'];?></td>
                        <td><?= $role['status'] == ACTIVE_STATUS ? LABEL_AVTIVE_STATUS : LABEL_INAVTIVE_STATUS;?></td>
                        <td><?= date('d-m-y H:i:s', strtotime($role['created_at']))?></td>
                        <td>
                            <a href="<?= route('role','edit',['id'=>$role['id']]);?>" class="btn btn-info">sua</a>
                        </td>
                        <td><button class="btn btn-danger">xoa</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>