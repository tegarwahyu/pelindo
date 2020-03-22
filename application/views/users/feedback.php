<div class="col-md-12 col-lg-12">
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Feedback</h5>
    <?php foreach($ticket as $u){ 
      
      ?>
         <form class="form-horizontal" action="<?php echo base_url('users/users/addFeedback/'.$u->ID_TICKET); ?>" method="post">
            <div class="form-row">
                <input type="hidden" name="id_ticket" class="form-control" value="<?php echo $u->ID_TICKET; ?>" class="form-control">
                <div class="col-md-5">
                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Score</label>
                        <input name="score" id="score" placeholder="Submit Score 1 - 5" type="text" class="form-control"></div>
                </div>
            </div>
             <div class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group"><label for="exampleText" class="">Komentar</label>
                        <textarea name="comment" id="comment" class="form-control"></textarea></div>
                </div>
            </div>


            <button class="mt-2 btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    <?php } ?>
    </div>
</div>

