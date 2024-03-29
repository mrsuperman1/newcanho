<div class="row-fluid">
    <div class="span12">
        <p><a href="/admin" class="btn btn-medium btn-primary"><i class="icon-chevron-left icon-white"></i> Home</a>
            <a href="/admin/index.php/realestate/add" class="btn btn-medium btn-primary"><i class="icon-plus-sign icon-white"></i> Add</a>
        </p>
    </div>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tin tức Bất Động Sản</h2>            
        </div>        
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <!--<th>Ngày đăng</th>-->                        
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listRealestate)):
                        foreach ($listRealestate as $reals):
                            ?>
                            <tr>
                                <td class="left"><?php echo $reals->title ?></td>
                                <!--<td class="left"><?php //echo $realestates->created_date ?></td>-->
                                <td class="center">
                                    <a class="image-in-modal" href="#">
                                        <img class="img-logo grayscale" src="/public/images/upload/<?php 
                                        $temp=  explode("&fieldbreak;", $reals->image);
                                        echo $temp[0]; ?>"/>
                                    </a>
                                </td>
                                <td class="center">
                                    <a class="btn btn-success" href="/admin/index.php/realestate/edit/<?php echo $reals->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        edit
                                    </a>
                                    <a class="btn btn-danger" href="/admin/index.php/realestate/delete/<?php echo $reals->id ?>">
                                        <i class="icon-edit icon-white"></i>
                                        delete
                                    </a>
                                </td>
                            </tr>   
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
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
        
        $('.image-in-modal').live("click", function() {
            var imageUrl  = $(this).find('img').attr('src'),
                imageHtml = '<img src="' + imageUrl + '" />';
            loadModal(imageHtml);
        });
    });

</script>