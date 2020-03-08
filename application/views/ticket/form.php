<div class="col-md-12 col-lg-12">
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Grid Rows</h5>
        
         <form class="form-horizontal" action="<?php echo base_url('ticket/ticket/addTicket'); ?>" method="post">
            <div class="form-row">
                <div class="col-md-5">
                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Subject</label><input name="subject" id="subject" placeholder="with a placeholder" type="text" class="form-control"></div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Category</label>
                    <select id="id_type_demages" name="id_type_demages" class="form-control" required="">
                    <?php for($i=0;$i < count($demage); $i++) { ?>
                        <option value="<?php echo($demage[$i]->ID_TYPE_DEMAGES); ?>"><?php echo($demage[$i]->DEMAGE_DETAILS); ?></option>
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group"><label for="exampleText" class="">Text Area</label><textarea name="description" id="description" class="form-control"></textarea></div>
                </div>
            </div>

            <button class="mt-2 btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

