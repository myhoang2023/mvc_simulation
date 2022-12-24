<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="<?=route('role','store');?>" class="p-3 border" method="POST">
                <div class="form-group">
                    <label for="">vai tro</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">mo ta</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    
                </div>
                <button class="btn btn-primary" name="save">luu</button>
            </form>
        </div>
    </div>
</div>