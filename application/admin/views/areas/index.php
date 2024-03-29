<div class="row-fluid">
    <div class="span12">
        <p><a href="/admin" class="btn btn-medium btn-primary"><i class="icon-chevron-left icon-white"></i> Home</a>
            <a href="/admin/index.php/areas/add" class="btn btn-medium btn-primary"><i class="icon-plus-sign icon-white"></i> Add</a>
            <a href="javascript:void()" id="savesort" class="btn btn-medium btn-primary"><i class="icon-plus-sign icon-white"></i> Save sort</a>
        </p>
    </div>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Diện tích</h2>            
        </div>        
        <div class="box-content">
            <form method="post" id="frm_sort">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Sort</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listArea)):
                        foreach ($listArea as $area):
                            ?>
                            <tr>
                                <td class="left"><?php echo $area->area_range ?></td>                                
                                <td><input maxlength="3" type="text" name="sort[<?php echo $area->id ?>][]" value="<?php echo $area->sort ?>" /></td>
                                <td class="center">
                                    <a class="btn btn-success" href="/admin/index.php/areas/edit/<?php echo $area->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        edit
                                    </a>
                                    <a class="btn btn-danger" href="/admin/index.php/areas/delete/<?php echo $area->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        delete
                                    </a>
                                    <?php if($area->is_active==0):?>
                                    <a class="btn btn-success" href="/admin/index.php/areas/active/<?php echo $area->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        Active
                                    </a>
                                    <?php else:?>
                                    <a class="btn btn-success" href="/admin/index.php/areas/unactive/<?php echo $area->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        UnActive
                                    </a>
                                    <?php endif ;?>
                                </td>
                            </tr>   
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->
<!-- alert-->
<div id="modal-from-dom" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">&times;</a>
        <h3>Warning Delete</h3>
    </div>
    <div class="modal-body">        
        <p>Do you want to delete this record?</p>
    </div>
    <div class="modal-footer">
        <a href="" class="btn danger confirm">Yes</a>
        <a href="javascript:$('#modal-from-dom').modal('hide')" class="btn secondary">No</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btn.btn-danger").click(function(e) {
            e.preventDefault();
            $(".confirm").attr("href", $(this).attr("href"));
            $('#modal-from-dom').modal('show');
        });
        $("#savesort").click(function(){
            $("#frm_sort").submit();
        });
    });

</script>